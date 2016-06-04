<?php
namespace Trade\Command\Order;

use System\Interfaces\Pcommand;
use Trade\Model\Order;

/**
 * 卖家取消订单命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class VendorCancelCommand implements Pcommand
{

    private $order;

    /**
     * @Inject("Trade\Persistence\OrderDb")
     */
    private $dbLayer;

    /**
     * @Inject("Trade\Persistence\OrderCache")
     */
    private $cacheLayer;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function execute()
    {
        //拼接数据库数组
        $mysqlDataArray = array('status'=>ORDER_STATUS_VENDOR_CANCEL,
                                'statusTime'=>$this->order->getStatusTime());
        //拼接更新条件数组
        $conditionArray = array('orderId'=>$this->order->getId());

        $row = $this->dbLayer->update($mysqlDataArray, $conditionArray);
        if (!$row) {
            return false;
        }
        $this->order->setStatus(ORDER_STATUS_VENDOR_CANCEL);
        //如果更新成功,删除缓存,这里暂时不重写缓存等后续有时间在更新
        $this->cacheLayer->del($this->order->getId());
        return true;
    }

    public function report()
    {

    }
}
