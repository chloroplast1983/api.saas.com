<?php
namespace Product\Repository\ProductSlide;

use Product\Repository\ProductSlide\Query;
use Product\Translator\ProductSlideTranslator;

/**
 * ProductSlide仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class ProductSlideRepository
{

    /**
     * @var Query\ProductSlideRowCacheQuery $productSlideRowCacheQuery 行缓存
     */
    private $productSlideRowCacheQuery;

    public function __construct(Query\ProductSlideRowCacheQuery $productSlideRowCacheQuery)
    {
        $this->productSlideRowCacheQuery = $productSlideRowCacheQuery;
    }

    /**
     * 获取通用商品幻灯片
     * @param integer $id 通用商品价格id
     */
    public function getOne($id)
    {
        //获取用户数据
        $productSlideInfo = $this->productSlideRowCacheQuery->getOne($id);
        if (empty($productSlideInfo)) {
            return false;
        }
        //翻译器 -- 开始
        $productSlideTranslator = new ProductSlideTranslator();
        //翻译器 -- 结束
        return $productSlideTranslator->translate($productSlideInfo);
    }

    /**
     * 批量获取通用商品价格
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {

        $productSlideList = array();
        //获取用户数据
        $productSlideInfoList = $this->productSlideRowCacheQuery->getList($ids);
        
        foreach ($productSlideInfoList as $productSlideInfo) {
            //翻译器 -- 开始
            $productSlideTranslator = new ProductSlideTranslator();
            //翻译器 -- 结束
            $productSlideList[] = $productSlideTranslator->translate($productSlideInfo);
        }
        
        return $productSlideList;
    }

    /**
     * 获取通用商品的通用商品价格列表
     */
    public function getListByProduct(int $productId)
    {

        $condition = 'productId = '.$productId;

        $productSlideInfoList = $this->productSlideRowCacheQuery->select($condition.' AND status=0', 'productSlideId');
        
        if (empty($productSlideInfoList)) {
            return false;
        }
        $ids = array();
        foreach ($productSlideInfoList as $productSlideInfo) {
            $ids[] = $productSlideInfo['productSlideId'];
        }
        return $this->getList($ids);
    }
}
