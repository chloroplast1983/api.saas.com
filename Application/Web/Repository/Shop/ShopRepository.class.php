<?php
namespace Web\Repository\Shop;

use Web\Repository\Shop\Query;
use Web\Translator\ShopTranslator;

/**
 * 店铺商品分类仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class ShopRepository
{

    /**
     * @var Query\ShopRowCacheQuery $shopRowCacheQuery 行缓存
     */
    private $shopRowCacheQuery;

    public function __construct(Query\ShopRowCacheQuery $shopRowCacheQuery)
    {
        $this->shopRowCacheQuery = $shopRowCacheQuery;
    }

    /**
     * 获取店铺对象
     * @param integer $id 员工id
     */
    public function getOne(int $id)
    {
        $shopInfo = $this->shopRowCacheQuery->getOne($id);
        
        //翻译器 -- 开始
        $shopTranslator = new ShopTranslator();
        //翻译器 -- 结束
        return $shopTranslator->translate($shopInfo);
    }

    /**
     * 批量获取店铺对象
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {

        $shopList = array();
        $shopInfoList = $this->shopRowCacheQuery->getList($ids);
        
        foreach ($shopInfoList as $shopInfo) {
            //翻译器 -- 开始
            $shopTranslator = new ShopTranslator();
            //翻译器 -- 结束
            $shopList[] = $shopTranslator->translate($shopInfo);
        }
        
        return $shopList;
    }
}
