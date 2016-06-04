<?php
namespace Web\Translator;

use System\Classes\Translator;

class CrewTranslator extends Translator
{

    public function translate(array $expression)
    {

        $crew = new \Web\Model\Crew($expression['webCrewId']);
        $crew->setCellPhone($expression['cellPhone']);
        $crew->setNickName($expression['nickName']);
        $crew->setUserName($expression['userName']);
        $crew->setRealName($expression['realName']);
        $crew->setWeixinAccount($expression['weixinAccount']);
        $crew->setSignUpTime($expression['signUpTime']);
        $crew->setUpdateTime($expression['updateTime']);
        $crew->setStatusTime($expression['statusTime']);
        $crew->setStatus($expression['status']);
        $crew->setSourceShop(new \Web\Model\Shop($expression['source']));
        return $crew;
    }
}
