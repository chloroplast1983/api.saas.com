<?php
namespace User\View;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Collection;

class BankAccountSerializer extends AbstractSerializer
{

    protected $type = 'bankAccounts';

    public function getAttributes($bankAccount, array $fields = null)
    {

        return [
            'bankCardHolderName'  => $bankAccount->getBankCardHolderName(),
            'bankCardNumber'  => $bankAccount->getBankCardNumber(),
            'bankCardCellphone' => $bankAccount->getBankCardCellphone(),
            'createTime' => $bankAccount->getCreateTime(),
            'updateTime' => $bankAccount->getUpdateTime(),
        ];
    }

    public function getId($bankAccount)
    {
        
        return $bankAccount->getId();
    }

    public function getLinks($bankAccount)
    {
        return ['self' => '/users/' . $bankAccount->getUser()->getId().'/bankAccounts/'.$bankAccount->getId()];
    }
}
