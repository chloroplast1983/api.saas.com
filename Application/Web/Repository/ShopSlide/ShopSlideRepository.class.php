<?php
namespace Web\Repository\ShopSlide;

use Web\Repository\ShopSlide\Query;
use Web\Translator\ShopSlideTranslator;

/**
 * 店铺幻灯片仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class ShopSlideRepository
{

    /**
     * @var Query\ShopSlideRowCacheQuery $shopSlideRowCacheQuery 行缓存
     */
    private $shopSlideRowCacheQuery;

    public function __construct(Query\ShopSlideRowCacheQuery $shopSlideRowCacheQuery)
    {
        $this->shopSlideRowCacheQuery = $shopSlideRowCacheQuery;
    }

    /**
     * 获取店铺幻灯片对象
     * @param integer $id 员工id
     */
    public function getOne(int $id)
    {
        $shopSlideInfo = $this->shopSlideRowCacheQuery->getOne($id);
        
        //翻译器 -- 开始
        $shopSlideTranslator = new ShopSlideTranslator();
        //翻译器 -- 结束
        return $shopSlideTranslator->translate($shopSlideInfo);
    }

    /**
     * 批量获取店铺幻灯片对象
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {

        $shopSlideList = array();
        $shopSlideInfoList = $this->shopSlideRowCacheQuery->getList($ids);
        
        foreach ($shopSlideInfoList as $shopSlideInfo) {
            //翻译器 -- 开始
            $shopSlideTranslator = new ShopSlideTranslator();
            //翻译器 -- 结束
            $shopSlideList[] = $shopSlideTranslator->translate($shopSlideInfo);
        }
        
        return $shopSlideList;
    }
}
