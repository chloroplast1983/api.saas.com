<?php
namespace Product\View;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Resource;

class CommonProductPriceServiceSerializer extends AbstractSerializer
{

    protected $type = 'commonProductPrices';

    public function getAttributes($commonProductPrice, array $fields = null)
    {

        return [
            'createTime' => $commonProductPrice->getProductPrice()->getCreateTime(),
            'statusTime' => $commonProductPrice->getProductPrice()->getStatusTime(),
            'status' => $commonProductPrice->getProductPrice()->getStatus(),
            'specification' => $commonProductPrice->getSpecification(),
            'price' => $commonProductPrice->getProductPrice()->getPrice()
            // 'description' => $product->getDescription(),
        ];
    }

    public function getId($commonProductPrice)
    {
        
        return $commonProductPrice->getProductPrice()->getId();
    }
}
