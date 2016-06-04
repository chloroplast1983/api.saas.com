<?php
namespace Web\Command\DeliveredInformation;

use System\Interfaces\Pcommand;
use Web\Model\DeliveredInformation;

/**
 * 删除配送地址命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class DeleteCommand implements Pcommand
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
        $mysqlDataArray = array('status'=>STATUS_DELETE,
                                'statusTime'=>$this->deliveredInformation->getStatusTime());
        //拼接更新条件数组
        $conditionArray = array('deliveredInformationId'=>$this->deliveredInformation->getId());

        $row = $this->dbLayer->update($mysqlDataArray, $conditionArray);
        if (!$row) {
            return false;
        }
        $this->deliveredInformation->setStatus(STATUS_DELETE);
        //如果更新成功,删除缓存,这里暂时不重写缓存等后续有时间在更新
        $this->cacheLayer->del($this->deliveredInformation->getId());
        return true;
    }

    public function report()
    {

    }
}
