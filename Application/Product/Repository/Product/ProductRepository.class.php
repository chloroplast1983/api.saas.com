<?php
namespace Product\Repository\Product;

use Product\Repository\Product\Query;
use Product\Translator\ProductTranslator;
use Core;

/**
 * Product仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class ProductRepository
{

    /**
     * @var Query\ProductRowCacheQuery $productRowCacheQuery 行缓存
     */
    private $productRowCacheQuery;

    /**
     * @var Query\ProductDescriptionRowCacheQuery $productDescriptionRowCacheQuery 行缓存
     */
    private $productDescriptionRowCacheQuery;

    public function __construct(Query\ProductRowCacheQuery $productRowCacheQuery, Query\ProductDescriptionRowCacheQuery $productDescriptionRowCacheQuery)
    {
        $this->productRowCacheQuery = $productRowCacheQuery;
        $this->productDescriptionRowCacheQuery = $productDescriptionRowCacheQuery;
    }

    /**
     * 获取商品
     * @param integer $id 商品id
     */
    public function getOne($id)
    {
        //获取用户数据
        $productInfo = $this->productRowCacheQuery->getOne($id);
        if (empty($productInfo)) {
            return false;
        }
        $productDescriptionInfo = $this->productDescriptionRowCacheQuery->getOne($id);
        if (empty($productDescriptionInfo)) {
            return false;
        }

        $productInfo = array_merge($productInfo, $productDescriptionInfo);

        //翻译器 -- 开始
        $productTranslator = new ProductTranslator();
        //翻译器 -- 结束
        $product = $productTranslator->translate($productInfo);
        //获取幻灯片 -- 开始
        $repository = Core::$_container->get('Product\Repository\ProductSlide\ProductSlideRepository');
        $productSlideList = $repository->getListByProduct($id);
        if (!empty($productSlideList)) {
            $product->setProductSlideList($productSlideList);
        }
        //获取幻灯片 -- 结束
        
        return $product;
    }

    /**
     * 批量获取商品,没有获取详情
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {

        $productList = array();
        //获取用户数据
        $productInfoList = $this->productRowCacheQuery->getList($ids);
        
        foreach ($productInfoList as $productInfo) {
            // var_dump($productInfo);exit();
            //翻译器 -- 开始
            $productTranslator = new ProductTranslator();
            //翻译器 -- 结束
            $product = $productTranslator->translate($productInfo);

            //临时处理,这里需要修改. 这里需要修改成设置幻灯片,放在product表内 -- 开始
            $repository = Core::$_container->get('Product\Repository\ProductSlide\ProductSlideRepository');
            $productSlideList = $repository->getListByProduct($productInfo['productId']);
            
            if (!empty($productSlideList)) {
                $product->setProductSlideList($productSlideList);
            }
            //临时处理,这里需要修改. 这里需要修改成设置幻灯片,放在product表内 -- 结束
            $productList[] = $product;
        }
        
        return $productList;
    }

    /**
     * 根据条件查询商品
     */
    public function filter(array $filter = array(), array $sort = array(), int $offset = 0, int $size = 20)
    {

        if (isset($filter['userId'])) {
            $condition = 'userId = '.$filter['userId'];
        }
        //filter 转换为条件
        $condition = empty($condition) ? '1' : $condition;

        $productList = $this->productRowCacheQuery->select($condition.' LIMIT '.$offset.','.$size, 'productId');

        if (empty($productList)) {
            return false;
        }
        $ids = array();
        foreach ($productList as $productInfo) {
            $ids[] = $productInfo['productId'];
        }
        return $this->getList($ids);
    }
}
