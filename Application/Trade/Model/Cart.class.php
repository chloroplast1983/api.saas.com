<?php
namespace Trade\Model;

use Trade\Model\CartProduct;
use Core;

/**
 * Cart 购物车领域对象
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class Cart
{

    /**
     * @var \Web\Model\Guest $guest 用户对象
     */
    private $guest;
    /**
     * @var array $cartProductList 购物车商品
     */
    private $cartProductList;

    /**
     * Cart 购物车领域对象 构造函数
     */
    public function __construct(\Web\Model\Guest $guest)
    {
        $this->cartProductList = array();
        $this->guest = $guest;
    }

    /**
     * Cart 购物车领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->cartProductList);
        unset($this->guest);
    }

    /**
     * 设置用户对象
     * @param \Web\Model\Guest $guest 用户对象
     */
    public function setGuest(\Web\Model\Guest $guest)
    {
        $this->guest = $guest;
    }

    /**
     * 获取用户对象
     * @return \Web\Model\Guest $user 用户对象
     */
    public function getGuest()
    {
        return $this->guest;
    }

    /**
     * 购物车赋值购物商品
     * @param array $cartProductList
     */
    public function setCartProductList(array $cartProductList)
    {
        $this->cartProductList = $cartProductList;
    }

    /**
     * 返回购物车的购物商品
     */
    public function getCartProductList()
    {
        return $this->cartProductList;
    }

    /**
     * 购物车添加购物商品
     * @param \Trade\Model\CartProduct $cartProduct
     */
    public function addCartProduct(CartProduct $cartProduct)
    {
        $this->cartProductList[] = $cartProduct;
        return $cartProduct->addToCart($this);
    }

    /**
     * 编辑购物车的购物商品
     * @param \Trade\Model\CartProduct $cartProduct
     */
    public function editCartProduct(CartProduct $cartProduct)
    {
        return $cartProduct->editFromCart($this);
    }

    /**
     * 删除购物车的购物商品
     * @param \Trade\Model\CartProduct $cartProduct
     */
    public function deleteCartProduct(CartProduct $cartProduct)
    {
        if (in_array($cartProduct, $this->cartProductList)) {
        }
        return $cartProduct->deleteFromCart($this);
    }

    /**
     * 生成订单
     *
     * 后期要根据商品分类生成不同的订单
     */
    public function confirmOrder()
    {

        //循环购物车cartProductList
        $cartProductList = $this->getCartProductList();
        if (empty($cartProductList)) {
            return false;
        }

        //从guest的sourceShop 获取 vendor
        $repository = Core::$_container->get('Web\Repository\Guest\GuestRepository');

        $guest = $repository->getOne($this->getGuest->getId());

        $this->setGuest($guest);

        $orderProductList = array();
        foreach ($cartProductList as $cartProduct) {
            $orderProductList[] = $cartProduct->toOrderProduct();
        }
        //转换成orderProductList
        $price = $this->calculatePrice();
        //生成order
        $order = new \Trade\Model\Order();
        $order->setPrice($price);
        $order->setVendor($this->getGuest()->getSourceShop());
        $order->setGuest($this->getGuest());
        //临时使用order
        return $order->add();
        //调用commonOrderService
        // $commonOrderService = new \Trade\Service\CommonOrderService($order);
        // $commonOrderService->add();
        //commonOrderService->add();
    }

    private function calculatePrice()
    {

        $price = 0;

        $cartProductList = $this->getCartProductList();
        if (empty($cartProductList)) {
            //无订单商品发挥false
            return false;
        }
        foreach ($cartProductList as $cartProduct) {
            $price += $cartProduct->getProductPrice()->getPrice();
        }
        return $price;
    }
}
