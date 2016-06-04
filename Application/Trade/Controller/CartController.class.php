<?php
namespace Trade\Controller;

use System\Classes\Controller;
use Core;
use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Parameters;
use Tobscure\JsonApi\Resource;

/**
 * 购物车应用层服务
 * @author chloroplast
 * @version 1.0.20160222
 */
class CartController extends Controller
{

    /**
     * 对应路由 /carts?filter['userId']=1
     * /carts[/{ids}]
     * GET方法传参
     * 获取用户id的购物车数据
     *
     * 示例: users/1/carts 获取id(用户id)为1的购物车数据
     *
     * @return jsonApi
     */
    public function get()
    {

        $filter = $this->getRequest()->get('filter');
        $cartArry = Core::$_dbDriver->query('SELECT * FROM pcore_cart WHERE guestId='.$filter['guestId']);
        echo json_encode($cartArry);
        return true;
    }

    /**
     * 对应路由 /carts
     * POST方法传参
     * 为用户uid为1的购物车添加数据
     *
     * @param jsonApi array("data"=>array(
     *                                    "type"=>"cart",
     *                                    "attributes"=>array(
     *                                                      "productId"=>"商品id",
     *                                                      "number"=>"商品数量",
     *                                                      "productPriceId"=>"商品价格id",
     *                                                      "guestId"=>"买家id"
     *                                                      )
     *                                      )
     * @return jsonApi
     */
    public function addProduct()
    {

        //如果商品重复,则商品数量 + 1

        $data = $this->getRequest()->post("data");

        $cart = new \Trade\Model\Cart(new \Web\Model\Guest($data['attributes']['guestId']));
        $cartProduct = new \Trade\Model\CartProduct();
        $cartProduct->setNumber($data['attributes']['number']);
        $cartProduct->setProduct(new \Product\Model\Product($data['attributes']['productId']));
        $cartProduct->setProductPrice(new \Product\Service\CommonProductPriceService(new \Product\Model\ProductPrice($data['attributes']['productPriceId'])));
        $cart->addCartProduct($cartProduct);


        $representation = new Resource($cartProduct, new \Trade\View\CartProductSerializer);
        $representation->with(['product','productPrice']);
        $document = new Document($representation);
        // $collection->with($include);
        // $collection->fields(['productTypes'=>['statusTime']]);
        
        $document->addLink('self', 'http://api.51chengxinyou.com/products');
        $this->render($document);
        return true;
    }

    /**
     * 对应路由 /carts
     * PUT方法传参
     * 为用户uid为1的购物车添加数据
     *
     *
     * @return jsonApi
     */
    public function editProduct()
    {

    }

    /**
     * 对应路由 /carts/{id:\d+}
     * DELETE方法传参
     * 为用户uid为1的购物车添加数据
     *
     *
     * @return jsonApi
     */
    public function deleteProduct(int $id)
    {
        // $document = new Document();
        // $document->setMeta(['key' => 'value']);
        // $document->setJsonapi('v1.0');
        // $this->render($document);
  //       return true;
    }

    /**
     * 对应路由 /carts/confirmOrder
     * POST方法传参
     * 为用户uid为1的购物车添加数据
     *
     * @param jsonApi array("data"=>array(
     *                                    "type"=>"cart",
     *                                    "attributes"=>array(
     *                                                      "guestId"=>"买家id",
     *                                                      "userId"=>"卖家id"
     *                                                      )
     *                                      )
     * @return jsonApi
     */
    public function confirmOrder()
    {

        $data = $this->getRequest()->post("data");

        $cartArry = Core::$_dbDriver->query('SELECT * FROM pcore_cart WHERE guestId='.$data['attributes']['guestId']);

        $price = 0;
        if (!empty($cartArry)) {
            foreach ($cartArry as $val) {
                $productPriceList[] = $val['productPriceId'];
                $singlePrice = Core::$_dbDriver->query('SELECT price FROM pcore_product_price_common WHERE commonProductPriceId ='.$val['productPriceId']);
                $singlePrice = $singlePrice[0]['price'];

                $price += $singlePrice*$val['number'];
            }
        }
        // $price = $price[0]['sumPrice'];

        $order = new \Trade\Model\Order();
        $order->setPrice($price);
        $order->setGuest(new \Web\Model\Guest($data['attributes']['guestId']));
        $order->setVendor(new \User\Model\User($data['attributes']['userId']));
        $command = Core::$_container->call(['Trade\Command\Order\OrderCommandFactory','createCommand'], ['type'=>'add','data'=>$order]);
        $command->execute();

        foreach ($cartArry as $val) {
            $orderProduct = new \Trade\Model\OrderProduct();
            $orderProduct->setProduct(new \Product\Model\Product($val['productId']));
            $orderProduct->setNumber($val['number']);
            $orderProduct->setProductPrice(new \Product\Model\ProductPrice($val['productPriceId']));
            $orderProduct->addToOrder($order);
        }
        Core::$_dbDriver->delete('pcore_cart', array('guestId'=>$data['attributes']['guestId']));
        echo json_encode(array('result'=>true));
        return true;
        // self::$_dbDriver->insert('pcore_order',array('userId'=>$cartArry[0]['userId'],'guestId'=>$cartArry[0]['guestId']));
        // self::$_dbDriver->insert('pcore_order_product');
        // $cart = new \Trade\Model\Cart(new \Web\Model\Guest($guestId));
        // //仓库获取cart详情


        // return $cart->confirmOrder();
    }
}
