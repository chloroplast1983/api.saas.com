<?php
//通用商品
namespace Trade\View;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Collection;

class CartSerializer extends AbstractSerializer
{

    protected $type = 'carts';

    public function getAttributes($cart, array $fields = null)
    {

        return [
            'createTime' => $cart->getCreateTime(),
            'number' => $cart->getNumber()
        ];
    }

    public function getId($cart)
    {
        
        return $cart->getId();
    }

    public function getLinks($cart)
    {
        return ['self' => '/carts/' . $cart->getId()];
    }

    public function product($cart)
    {
        if ($cart->getProduct() instanceof \Product\Service\CommpnProductService) {
             $product = new Resource($cart->getProduct(), new \Product\View\CommpnProductServiceSerializer);
        }
        return new Relationship($product);
    }
}
