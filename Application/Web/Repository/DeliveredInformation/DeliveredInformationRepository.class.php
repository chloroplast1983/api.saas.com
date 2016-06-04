<?php
namespace Web\Repository\DeliveredInformation;

use Web\Repository\DeliveredInformation\Query;
use Web\Translator\DeliveredInformationTranslator;

/**
 * 收货地址仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class DeliveredInformationRepository
{

    /**
     * @var Query\DeliveredInformationRowCacheQuery $deliveredInformationRowCacheQuery 行缓存
     */
    private $deliveredInformationRowCacheQuery;

    public function __construct(Query\DeliveredInformationRowCacheQuery $deliveredInformationRowCacheQuery)
    {
        $this->deliveredInformationRowCacheQuery = $deliveredInformationRowCacheQuery;
    }

    /**
     * 获取收货地址对象
     * @param integer $id 员工id
     */
    public function getOne(int $id)
    {
        $deliveredInformationInfo = $this->deliveredInformationRowCacheQuery->getOne($id);
        
        //翻译器 -- 开始
        $deliveredInformationTranslator = new DeliveredInformationTranslator();
        //翻译器 -- 结束
        return $deliveredInformationTranslator->translate($deliveredInformationInfo);
    }

    /**
     * 批量获取收货地址对象
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {

        $deliveredInformationList = array();
        //获取用户数据
        $deliveredInformationInfoList = $this->deliveredInformationRowCacheQuery->getList($ids);
        
        foreach ($deliveredInformationInfoList as $deliveredInformationInfo) {
            //翻译器 -- 开始
            $deliveredInformationTranslator = new DeliveredInformationTranslator();
            //翻译器 -- 结束
            $deliveredInformationList[] = $deliveredInformationTranslator->translate($deliveredInformationInfo);
        }
        
        return $deliveredInformationList;
    }
}
