<?php
namespace Trade\Model;

use Core;

/**
 * CartProduct 购物车商品领域对象
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class CartProduct
{

    /**
     * @var int $id 购物车id
     */
    private $id;
    /**
     * @var int $number 购物车数量
     */
    private $number;
    /**
     * @var \Product\Model\Product $product 商品对象
     */
    private $product;
    /**
     * @var int $createTime 添加时间
     */
    private $createTime;
    /**
     * @var \Product\Model\ProductPrice $productPrice 商品价格对象
     */
    private $productPrice;

    /**
     * Cart 购物车领域对象 构造函数
     */
    public function __construct()
    {
        global $_FWGLOBAL;
        $this->id = 0;
        $this->number = 0;
        $this->product = '';
        $this->createTime = $_FWGLOBAL['timestamp'];
        $this->productPrice = '';
    }

    /**
     * Cart 购物车领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->id);
        unset($this->number);
        unset($this->product);
        unset($this->createTime);
        unset($this->productPrice);
    }

    // public function intial(int $number,Product $product,ProductPrice $productPrice){

    // }

    /**
     * 设置购物车id
     * @param int $id 购物车id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * 获取购物车id
     * @return int $id 购物车id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 设置购物车数量
     * @param int $number 购物车数量
     */
    public function setNumber(int $number)
    {
        $this->number = $number;
    }

    /**
     * 获取购物车数量
     * @return int $number 购物车数量
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * 设置商品对象
     * @param \Product\Model\Product $product 商品对象
     */
    public function setProduct(\Product\Model\Product $product)
    {
        $this->product = $product;
    }

    /**
     * 获取商品对象
     * @return \Product\Model\Product $product 商品对象
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * 设置添加时间
     * @param int $createTime 添加时间
     */
    public function setCreateTime(int $createTime)
    {
        $this->createTime = $createTime;
    }

    /**
     * 获取添加时间
     * @return int $createTime 添加时间
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * 设置商品价格对象
     * @param \Product\Service\ProductPriceInterface $productPrice 商品价格对象
     */
    public function setProductPrice(\Product\Service\ProductPriceInterface $productPrice)
    {
        $this->productPrice = $productPrice;
    }

    /**
     * 获取商品价格对象
     * @return \Product\Model\ProductPrice $productPrice 商品价格对象
     */
    public function getProductPrice()
    {
        return $this->productPrice;
    }

    public function addToCart(Cart $cart)
    {
        //调用命令
        $command = Core::$_container->call(['Trade\Command\CartProduct\CartProductCommandFactory','createCommand'], ['type'=>'add','data'=>$this,'target'=>$cart]);
        return $command->execute();
    }

    public function editFromCart(Cart $cart)
    {
        //调用命令
        $command = Core::$_container->call(['Trade\Command\CartProduct\CartProductCommandFactory','createCommand'], ['type'=>'edit','data'=>$this,'target'=>$cart]);
        return $command->execute();
    }

    public function deleteFromCart(Cart $cart)
    {
        //调用命令
        $command = Core::$_container->call(['Trade\Command\CartProduct\CartProductCommandFactory','createCommand'], ['type'=>'delete','data'=>$this,'target'=>$cart]);
        return $command->execute();
    }

    public function toOrderProduct()
    {
        $orderProduct = new \Trade\Model\orderProduct();
        $orderProduct->setProduct($this->getProduct());
        $orderProduct->setNumber($this->getNumber());
        $orderProduct->setProductPrice($this->getProductPrice);
        return $orderProduct;
    }
}
