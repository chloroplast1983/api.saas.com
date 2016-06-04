<?php
namespace Web\Translator;

use System\Classes\Translator;

class ShopTranslator extends Translator
{

    public function translate(array $expression)
    {

        $shop = new \Web\Model\Shop($expression['userId']);
        $shop->setContactPeoplePhone($expression['contactPeoplePhone']);
        $shop->setTitle($expression['title']);
        $shop->setContactPeople($expression['contactPeople']);
        $shop->setContactPeopleQQ($expression['contactPeopleQQ']);
        $shop->setProvince(new \Area\Model\Area($expression['province']));
        $shop->setCity(new \Area\Model\Area($expression['city']));
        $shop->setAddress($expression['address']);
        $shop->setCreateTime($expression['createTime']);
        $shop->setStatusTime($expression['statusTime']);
        $shop->setStatus($expression['status']);
        $shop->setUpdateTime($expression['updateTime']);
        return $shop;
    }
}
