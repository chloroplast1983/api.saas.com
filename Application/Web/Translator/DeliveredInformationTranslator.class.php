<?php
namespace Web\Translator;

use System\Classes\Translator;

class DeliveredInformationTranslator extends Translator
{

    public function translate(array $expression)
    {

        $deliveredInformation = new \Web\Model\DeliveredInformation($expression['deliveredInformationId']);
        $deliveredInformation->setGuest(new \Web\Model\Guest($expression['guestId']));
        $deliveredInformation->setConsignee($expression['consignee']);
        $deliveredInformation->setConsigneeAddress($expression['consigneeAddress']);
        $deliveredInformation->setProvince(new \Area\Model\Area($expression['consigneeProvince']));
        $deliveredInformation->setCity(new \Area\Model\Area($expression['consigneeCity']);
        $deliveredInformation->setDistrict(new \Area\Model\Area($expression['consigneeDistrict']);
        $deliveredInformation->setConsigneePhone($expression['consigneePhone']);
        $deliveredInformation->setConsigneePostalCode($expression['consigneePostalCode']);
        $deliveredInformation->setCreateTime($expression['createTime']);
        $deliveredInformation->setUpdateTime($expression['updateTime']);
        $deliveredInformation->setStatusTime($expression['statusTime']);
        $deliveredInformation->setStatus($expression['status']);
        return $deliveredInformation;
    }
}
