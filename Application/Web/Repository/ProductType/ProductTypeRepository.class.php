<?php
namespace Web\Repository\ProductType;

use Web\Repository\ProductType\Query;
use Web\Translator\ProductTypeTranslator;

/**
 * 店铺商品分类仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class ProductTypeRepository
{

    /**
     * @var Query\ProductTypeRowCacheQuery $productTypeRowCacheQuery 行缓存
     */
    private $productTypeRowCacheQuery;

    public function __construct(Query\ProductTypeRowCacheQuery $productTypeRowCacheQuery)
    {
        $this->productTypeRowCacheQuery = $productTypeRowCacheQuery;
    }

    /**
     * 获取店铺商品分类对象
     * @param integer $id 员工id
     */
    public function getOne(int $id)
    {
        $productTypeInfo = $this->productTypeRowCacheQuery->getOne($id);
        
        //翻译器 -- 开始
        $productTypeTranslator = new ProductTypeTranslator();
        //翻译器 -- 结束
        return $productTypeTranslator->translate($ProductTypeInfo);
    }

    /**
     * 批量获取店铺商品分类对象
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {

        $productTypeList = array();
        $productTypeInfoList = $this->productTypeRowCacheQuery->getList($ids);
        
        foreach ($productTypeInfoList as $productTypeInfo) {
            //翻译器 -- 开始
            $productTypeTranslator = new ProductTypeTranslator();
            //翻译器 -- 结束
            $productTypeList[] = $productTypeTranslator->translate($ProductTypeInfo);
        }
        
        return $ProductTypeList;
    }
}
