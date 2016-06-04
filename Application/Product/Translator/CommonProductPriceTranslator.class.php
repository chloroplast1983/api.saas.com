<?php
namespace Product\Translator;

use System\Classes\Translator;
use Product\Service\CommonProductPriceService;
use Product\Model\ProductPrice;

class CommonProductPriceTranslator extends Translator
{

    public function translate(array $expression)
    {

        $commonProductPriceService = new CommonProductPriceService(new ProductPrice($expression['commonProductPriceId']));
        $commonProductPriceService->getProductPrice()->setCreateTime($expression['createTime']);
        $commonProductPriceService->getProductPrice()->setStatus($expression['status']);
        $commonProductPriceService->getProductPrice()->setStatusTime($expression['statusTime']);
        $commonProductPriceService->setSpecification($expression['specification']);
        $commonProductPriceService->getProductPrice()->setPrice($expression['price']);
        return $commonProductPriceService;
    }
}
