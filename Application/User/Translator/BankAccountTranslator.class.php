<?php
namespace User\Translator;

use System\Classes\Translator;

class BankAccountTranslator extends Translator
{

    public function translate(array $expression)
    {

        $bankAccount = new \User\Model\BankAccount($expression['id']);
        $bankAccount->setUser(\User\Model\User($expression['userId']));
        $bankAccount->setBankCardHolderName($expression['bankCardHolderName']);
        $bankAccount->setBankCardNumber($expression['bankCardNumber']);
        $bankAccount->setBankCardCellphone($expression['bankCardCellphone']);
        $bankAccount->setCreateTime($expression['createTime']);
        $bankAccount->setUpdateTime($expression['updateTime']);

        return $bankAccount;
    }
}
