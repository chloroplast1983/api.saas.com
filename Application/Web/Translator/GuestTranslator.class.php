<?php
namespace Web\Translator;

use System\Classes\Translator;

class GuestTranslator extends Translator
{

    public function translate(array $expression)
    {

        $guest = new \Web\Model\Guest($expression['guestId']);
        $guest->setCellPhone($expression['cellPhone']);
        $guest->setNickName($expression['nickName']);
        $guest->setUserName($expression['userName']);
        $guest->setPassword($expression['password']);
        $guest->setSalt($expression['salt']);
        $guest->setSignUpTime($expression['signUpTime']);
        $guest->setUpdateTime($expression['updateTime']);
        $guest->setSourceShop(new \Web\Model\Shop($expression['source']));
        return $guest;
    }
}
