<?php
namespace Web\Translator;

use System\Classes\Translator;

class ProductTypeTranslator extends Translator
{

    public function translate(array $expression)
    {

        $productType = new \Web\Model\ProductType($expression['productTypeId']);
        $productType->setName($expression['name']);
        $productType->setUser(new \User\Model\User($expression['userId']));
        $productType->setCreateTime($expression['createTime']);
        $productType->setStatusTime($expression['statusTime']);
        $productType->setStatus($expression['status']);
        return $productType;
    }
}
