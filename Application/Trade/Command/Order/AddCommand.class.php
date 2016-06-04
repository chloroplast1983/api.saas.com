<?php
namespace Trade\Command\Order;

use System\Interfaces\Pcommand;
use Trade\Model\Order;

/**
 * 添加订单命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class AddCommand implements Pcommand
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
        $mysqlDataArray = array('status'=>$this->order->getStatus(),
                                'payTime'=>$this->order->getPayTime(),
                                'payType'=>$this->order->getPayType(),
                                'updateTime'=>$this->order->getUpdateTime(),
                                'createTime'=>$this->order->getCreateTime(),
                                'statusTime'=>$this->order->getStatusTime(),
                                'category'=>$this->order->getCategory(),
                                'price'=>$this->order->getPrice(),
                                'userId'=>$this->order->getVendor()->getId(),
                                'guestId'=>$this->order->getGuest()->getId());

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
