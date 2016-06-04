<?php
namespace Trade\Command\Cart;

use System\Interfaces\Pcommand;
use Trade\Model\Cart;

/**
 * 删除购物车商品命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class TruncateCommand implements Pcommand
{

    private $cartProduct;

    private $cart;

    /**
     * @Inject("Trade\Persistence\CartProductDb")
     */
    private $dbLayer;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function execute()
    {
        //清空属于该用户的购物车
        $conditionArray = array('guestId'=>$this->cart->getGuest()->getId());
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
