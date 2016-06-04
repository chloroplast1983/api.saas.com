<?php
namespace Trade\Command\CartProduct;

use System\Interfaces\Pcommand;
use Trade\Model\CartProduct;
use Trade\Model\Cart;

/**
 * 删除购物车商品命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class DeleteCommand implements Pcommand
{

    private $cartProduct;

    private $cart;

    /**
     * @Inject("Trade\Persistence\CartProductDb")
     */
    private $dbLayer;

    public function __construct(CartProduct $cartProduct, Cart $cart)
    {
        $this->cartProduct = $cartProduct;
        $this->cart = $cart;
    }

    public function execute()
    {
        $conditionArray = array('guestId'=>$this->cart->getGuest()->getId(),'cartId'=>$this->cartProduct->getId());
        //写入数据库,如果成功,写入缓存
        $rows = $this->dbLayer->delete($conditionArray);
        if (!$rows) {
            return false;
        }
        return true;
    }

    public function report()
    {

    }
}
