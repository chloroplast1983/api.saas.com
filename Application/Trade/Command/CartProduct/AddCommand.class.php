<?php
namespace Trade\Command\CartProduct;

use System\Interfaces\Pcommand;
use Trade\Model\CartProduct;
use Trade\Model\Cart;

/**
 * 添加购物车商品命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class AddCommand implements Pcommand
{

    private $cartProduct;

    private $cart;

    /**
     * @Inject("Trade\Persistence\CartDb")
     */
    private $dbLayer;

    public function __construct(CartProduct $cartProduct, Cart $cart)
    {
        $this->cartProduct = $cartProduct;
        $this->cart = $cart;
    }

    public function execute()
    {
        //拼接数据库数组
        $mysqlDataArray = array('guestId'=>$this->cart->getGuest()->getId(),
                                'productId'=>$this->cartProduct->getProduct()->getId(),
                                'number'=>$this->cartProduct->getNumber(),
                                'productPriceId'=>$this->cartProduct->getProductPrice()->getProductPrice()->getId(),
                                'createTime'=>$this->cartProduct->getCreateTime());

        //写入数据库,如果成功,写入缓存
        $id = $this->dbLayer->insert($mysqlDataArray, true);
        if (!$id) {
            return false;
        }
        //返回用户主键id,写会$user对象,为领域服务间互相调用服务
        $this->cartProduct->setId($id);
        return true;
    }

    public function report()
    {

    }
}
