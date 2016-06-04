<?php
namespace Web\Command\DeliveredInformation;

use System\Interfaces\Pcommand;
use Web\Model\DeliveredInformation;

/**
 * 添加配送地址命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class AddCommand implements Pcommand
{

    private $deliveredInformation;

    /**
     * @Inject("Web\Persistence\DeliveredInformationDb")
     */
    private $dbLayer;

    /**
     * @Inject("Web\Persistence\DeliveredInformationCache")
     */
    private $cacheLayer;

    public function __construct(DeliveredInformation $deliveredInformation)
    {
        $this->deliveredInformation = $deliveredInformation;
    }

    public function execute()
    {
        //拼接数据库数组
        $mysqlDataArray = array('guestId'=>$this->deliveredInformation->getGuest()->getId(),
                                'consignee'=>$this->deliveredInformation->getConsignee(),
                                'consigneeAddress'=>$this->deliveredInformation->getConsigneeAddress(),
                                'consigneeProvince'=>$this->deliveredInformation->getProvince()->getId(),
                                'consigneeCity'=>$this->deliveredInformation->getCity()->getId(),
                                'consigneeDistrict'=>$this->deliveredInformation->getDistrict()->getId(),
                                'consigneePhone'=>$this->deliveredInformation->getConsigneePhone(),
                                'consigneePostalCode'=>$this->deliveredInformation->getConsigneePostalCode(),
                                'createTime'=>$this->deliveredInformation->getCreateTime(),
                                'updateTime'=>$this->deliveredInformation->getUpdateTime(),
                                'status'=>$this->deliveredInformation->getStatus(),
                                'statusTime'=>$this->deliveredInformation->getStatusTime());

        ////写入数据库,如果成功,写入缓存
        $id = $this->dbLayer->insert($mysqlDataArray, true);
        if (!$id) {
            return false;
        }

        //返回用户主键id,写会$user对象,为领域服务间互相调用服务
        $this->deliveredInformation->setId($id);
        return true;
    }

    public function report()
    {

    }
}
