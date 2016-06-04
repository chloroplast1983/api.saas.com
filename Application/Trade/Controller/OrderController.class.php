<?php
namespace Trade\Controller;

use System\Classes\Controller;
use Core;
use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Parameters;
use Tobscure\JsonApi\Resource;

/**
 * 订单应用层服务
 * @author chloroplast
 * @version 1.0.20160222
 */
class OrderController extends Controller
{

    /**
     * 获取订单
     * GET
     */
    public function get(string $ids = '')
    {

        if (is_numeric($ids)) {
            $orderArry = Core::$_dbDriver->query('SELECT * FROM pcore_order WHERE orderId='.$ids);
            $orderProducts = Core::$_dbDriver->query('SELECT * FROM pcore_order_product WHERE orderId='.$ids);
            echo json_encode(array('order'=>$orderArry,'orderProducts'=>$orderProducts));
            return true;
        } else {
            $filter = $this->getRequest()->get('filter');
            $orderArry = Core::$_dbDriver->query('SELECT * FROM pcore_order WHERE guestId='.$filter['guestId']);
            echo json_encode(array('order'=>$orderArry));
            return true;
        }
    }

    /**
     * 编辑订单,通用订单 运费
     * PUT
     */

    public function edit()
    {

    }

    /**
     * 支付订单
     * PUT
     *
     * @param jsonApi array("data"=>array(
     *                                    "type"=>"order",
     *                                    "attributes"=>array(
     *                                                      "payType"=>"支付方式",
     *                                                      ),
     *                                      )
     */
    public function pay($id)
    {
        // var_dump(11);exit();
        $data = $this->getRequest()->put("data");
        //安全判断
        $order = new \Trade\Model\Order($id);
        $commonOrderService = new \Trade\Service\CommonOrderService($order);

        $commonOrderService->pay($data['attributes']['payType']);
        echo json_encode(array('result'=>true));
        return true;
    }
}
