<?php
namespace Application\Translator;

use System\Classes\Translator;

class ApplicationTranslator extends Translator
{

    public function translate(array $expression)
    {

        $application = new \Application\Model\Application($expression['userId']);
        $application->setTitle($expression['title']);
        $application->setContactPeople($expression['contactPeople']);
        $application->setContactPeoplePhone($expression['contactPeoplePhone']);
        $application->setContactPeopleQQ($expression['contactPeopleQQ']);
        $application->setProvince(new \Area\Model\Area($expression['province']));
        $application->setCity(new \Area\Model\Area($expression['city']));
        $application->setAddress($expression['address']);
        $application->setIdentifyCardFrontPhoto($expression['identifyCardFrontPhoto']);
        $application->setIdentifyCardBackPhoto($expression['identifyCardBackPhoto']);
        $application->setBankCardHolderName($expression['bankCardHolderName']);
        $application->setBankCardNumber($expression['bankCardNumber']);
        $application->setBankCardCellphone($expression['bankCardCellphone']);
        $application->setUpdateTime($expression['updateTime']);
        $application->setCreateTime($expression['createTime']);
        $application->setStatus($expression['status']);
        $application->setStatusTime($expression['statusTime']);

        return $application;
    }
}
