<?php
namespace Product\Repository\CommonProductPrice;

use Product\Repository\CommonProductPrice\Query;
use Product\Translator\CommonProductPriceTranslator;

/**
 * CommonProductPrice仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class CommonProductPriceRepository
{

    /**
     * @var Query\CommonProductPriceRowCacheQuery $commonProductPriceRowCacheQuery 行缓存
     */
    private $commonProductPriceRowCacheQuery;

    public function __construct(Query\CommonProductPriceRowCacheQuery $commonProductPriceRowCacheQuery)
    {
        $this->commonProductPriceRowCacheQuery = $commonProductPriceRowCacheQuery;
    }

    /**
     * 获取通用商品价格
     * @param integer $id 通用商品价格id
     */
    public function getOne($id)
    {
        //获取用户数据
        $commonProductPriceInfo = $this->commonProductPriceRowCacheQuery->getOne($id);
        if (empty($commonProductPriceInfo)) {
            return false;
        }
        //翻译器 -- 开始
        $commonProductPriceTranslator = new CommonProductPriceTranslator();
        //翻译器 -- 结束
        return $commonProductPriceTranslator->translate($commonProductPriceInfo);
    }

    /**
     * 批量获取通用商品价格
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {

        $commonProductPriceList = array();
        //获取用户数据
        $commonProductPriceInfoList = $this->commonProductPriceRowCacheQuery->getList($ids);
        
        foreach ($commonProductPriceInfoList as $commonProductPriceInfo) {
            //翻译器 -- 开始
            $commonProductPriceTranslator = new CommonProductPriceTranslator();
            //翻译器 -- 结束
            $commonProductPriceList[] = $commonProductPriceTranslator->translate($commonProductPriceInfo);
        }
        
        return $commonProductPriceList;
    }

    /**
     * 获取通用商品的通用商品价格列表
     */
    public function getListByProduct(int $productId, int $offset = 0, int $size = 20)
    {

        $condition = 'productId = '.$productId;

        $commonProductPriceInfoList = $this->commonProductPriceRowCacheQuery->select($condition.' AND status=0 LIMIT '.$offset.','.$size, 'commonProductPriceId');

        if (empty($commonProductPriceInfoList)) {
            return false;
        }
        $ids = array();
        foreach ($commonProductPriceInfoList as $commonProductPriceInfo) {
            $ids[] = $commonProductPriceInfo['commonProductPriceId'];
        }
        return $this->getList($ids);
    }
}
