<?php
//通用商品
namespace Trade\View;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Collection;

class OrderSerializer extends AbstractSerializer
{

    protected $type = 'order';

    public function getAttributes($order, array $fields = null)
    {

        return [
            // 'createTime' => $order->getCreateTime(),
            // 'number' => $cart->getNumber()
        ];
    }

    public function getId($order)
    {
        
        return $order->getId();
    }

    public function getLinks($order)
    {
        return ['self' => '/orders/' . $cart->getId()];
    }

    public function products($order)
    {
        //从orderProduct 中取出 product 对象
        // $products = new Collection($order->getProductList(),new \Product\View\ProductSerializer);
        // return new Relationship($products);
    }
}
