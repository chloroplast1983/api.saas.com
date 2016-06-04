<?php
namespace Trade\Command\CartProduct;

use System\Interfaces\Pcommand;
use Trade\Model\CartProduct;
use Trade\Model\Cart;

/**
 * 编辑购物车商品命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class EditCommand implements Pcommand
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

        $mysqlDataArray = array('number'=>$this->cartProduct->getNumber());

        $conditionArray = array('guestId'=>$this->cart->getGuest()->getId(),'cartId'=>$this->cartProduct->getId());
        //写入数据库,如果成功,写入缓存
        $rows = $this->dbLayer->update($mysqlDataArray, $conditionArray);
        if (!$rows) {
            return false;
        }
        return true;
    }

    public function report()
    {

    }
}
