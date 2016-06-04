<?php
namespace Trade\Command\OrderProduct;

use System\Interfaces\Pcommand;
use Trade\Model\OrderProduct;
use Trade\Model\Order;

/**
 * 添加订单命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class AddCommand implements Pcommand
{

    private $orderProduct;

    private $order;

    /**
     * @Inject("Trade\Persistence\OrderProductDb")
     */
    private $dbLayer;

    /**
     * @Inject("Trade\Persistence\OrderProductCache")
     */
    private $cacheLayer;

    public function __construct(OrderProduct $orderProduct, Order $order)
    {
        $this->orderProduct = $orderProduct;
        $this->order = $order;
    }

    public function execute()
    {
        //拼接数据库数组
        $mysqlDataArray = array('orderId'=>$this->order->getId(),
                                'productId'=>$this->orderProduct->getProduct()->getId(),
                                'number'=>$this->orderProduct->getNumber(),
                                'productPriceId'=>$this->orderProduct->getProductPrice()->getId());

        //写入数据库,如果成功,写入缓存
        $id = $this->dbLayer->insert($mysqlDataArray, true);
        if (!$id) {
            return false;
        }
        //返回用户主键id,写会$user对象,为领域服务间互相调用服务
        $this->order->setId($id);
        return true;
    }

    public function report()
    {

    }
}
