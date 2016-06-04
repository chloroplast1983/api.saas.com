<?php
namespace Web\Translator;

use System\Classes\Translator;

class ShopSlideTranslator extends Translator
{

    public function translate(array $expression)
    {

        $shopSlide = new \Web\Model\ShopSlide($expression['shopSlidesId']);
        $shopSlide->setSlide($expression['fileId']);
        // $shopSlide->setShop(new \Web\Model\Shop($expression['userId']));
        $shopSlide->setCreateTime($expression['createTime']);
        $shopSlide->setStatusTime($expression['statusTime']);
        $shopSlide->setStatus($expression['status']);
        return $shopSlide;
    }
}
