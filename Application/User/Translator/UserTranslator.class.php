<?php
namespace User\Translator;

use System\Classes\Translator;

class UserTranslator extends Translator
{

    public function translate(array $expression)
    {

        $user = new \User\Model\User($expression['userId']);
        $user->setCellPhone($expression['cellPhone']);
        $user->setPassword($expression['password']);
        $user->setSalt($expression['salt']);
        $user->setType($expression['type']);
        $user->setSignUpTime($expression['signUpTime']);
        $user->setUpdateTime($expression['updateTime']);
        $user->setNickName($expression['nickName']);
        $user->setUserName($expression['userName']);
        $user->setStatus($expression['status']);
        $user->setStatusTime($expression['statusTime']);
        return $user;
    }
}
