<?php
namespace Trade\Model;

use Product\Model\Product;
use Product\Model\ProductPrice;
use Core;

/**
 * OrderProduct 订单商品
 * @author chloroplast
 * @version 1.0.0:2016.04.29
 */

class OrderProduct
{

    /**
     * @var \Product\Model\Product $product 商品
     */
    private $product;
    /**
     * @var int $number 订单商品数量
     */
    private $number;
    /**
     * @var \Product\Model\ProductPrice $productPrice 商品价格
     */
    private $productPrice;

    /**
     * OrderProduct 订单商品 构造函数
     */
    public function __construct()
    {
        global $_FWGLOBAL;
        $this->product = '';
        $this->number = 0;
        $this->productPrice = '';
    }

    /**
     * OrderProduct 订单商品 析构函数
     */
    public function __destruct()
    {
        unset($this->product);
        unset($this->number);
        unset($this->productPrice);
    }

    /**
     * 设置商品
     * @param \Product\Model\Product $product 商品
     */
    public function setProduct(\Product\Model\Product $product)
    {
        $this->product = $product;
    }

    /**
     * 获取商品
     * @return \Product\Model\Product $product 商品
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * 设置订单商品数量
     * @param int $number 订单商品数量
     */
    public function setNumber(int $number)
    {
        $this->number = $number;
    }

    /**
     * 获取订单商品数量
     * @return int $number 订单商品数量
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * 设置商品价格
     * @param \Product\Model\ProductPrice $productPrice 商品价格
     */
    public function setProductPrice(\Product\Model\ProductPrice $productPrice)
    {
        $this->productPrice = $productPrice;
    }

    /**
     * 获取商品价格
     * @return \Product\Model\ProductPrice $productPrice 商品价格
     */
    public function getProductPrice()
    {
        return $this->productPrice;
    }

    /**
     * 添加订单商品
     */
    public function addToOrder(Order $order)
    {
         //调用添加命令
        $command = Core::$_container->call(['Trade\Command\OrderProduct\OrderProductCommandFactory','createCommand'], ['type'=>'add','data'=>$this,'target'=>$order]);
        return $command->execute();
    }
}
