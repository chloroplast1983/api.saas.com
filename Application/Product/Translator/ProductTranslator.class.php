<?php
namespace Product\Translator;

use System\Classes\Translator;

class ProductTranslator extends Translator
{

    public function translate(array $expression)
    {

        $product = new \Product\Model\Product($expression['productId']);
        $product->setUser(new \User\Model\User($expression['userId']));
        $product->setName($expression['name']);
        $product->setUpdateTime($expression['updateTime']);
        $product->setCreateTime($expression['createTime']);
        $product->setStatusTime($expression['statusTime']);
        $product->setStatus($expression['status']);
        $product->setCategory($expression['category']);
        $product->setFeature($expression['feature']);
        if (isset($expression['description'])) {
            $product->setDescription($expression['description']);
        }
        return $product;
    }
}
