<?php
//通用商品
namespace Trade\View;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Resource;

class CartProductSerializer extends AbstractSerializer
{

    protected $type = 'cartProducts';

    public function getAttributes($cartProduct, array $fields = null)
    {

        return [
            'createTime' => $cartProduct->getCreateTime(),
            'number' => $cartProduct->getNumber()
        ];
    }

    public function getId($cartProduct)
    {
        
        return $cartProduct->getId();
    }

    // public function getLinks($cartProduct) {
    //     return ['self' => '/carts/' . $cartProduct->getId()];
    // }

    public function product($cartProduct)
    {
        // if($cartProduct->getProduct() instanceof \Product\Service\CommpnProductService){
        // 	 $product = new Resource($cart->getProduct(),new \Product\View\CommpnProductServiceSerializer);
        // }
        $product = new Resource($cartProduct->getProduct(), new \Product\View\ProductSerializer);
        return new Relationship($product);
    }

    public function productPrice($cartProduct)
    {
        // if($cartProduct->getProductPrice() instanceof \Product\Service\CommpnProductService){
            
        // }
        $productPrice = new Resource($cartProduct->getProductPrice(), new \Product\View\CommonProductPriceServiceSerializer);
        return new Relationship($productPrice);
    }
}
