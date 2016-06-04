<?php
namespace Product\Translator;

use System\Classes\Translator;

class ProductSlideTranslator extends Translator
{

    public function translate(array $expression)
    {

        $productSlide = new \Product\Model\ProductSlide($expression['productSlideId']);
        $productSlide->setSlide($expression['fileId']);
        $productSlide->setCreateTime($expression['createTime']);
        $productSlide->setStatus($expression['status']);
        $productSlide->setStatusTime($expression['statusTime']);
        return $productSlide;
    }
}
