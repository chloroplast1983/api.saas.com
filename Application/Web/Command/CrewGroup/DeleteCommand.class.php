<?php
namespace Web\Command\CrewGroup;

use System\Interfaces\Pcommand;
use Web\Model\CrewGroup;

/**
 * 删除员工组命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class DeleteCommand implements Pcommand
{

    private $Crew;

    /**
     * @Inject("Web\Persistence\CrewGroupDb")
     */
    private $dbLayer;

    /**
     * @Inject("Web\Persistence\CrewGroupCache")
     */
    private $cacheLayer;

    public function __construct(Crew $crewGroup)
    {
        $this->crewGroup = $crewGroup;
    }

    public function execute()
    {
        //拼接数据库数组
        $mysqlDataArray = array('status'=>STATUS_DELETE,
                                'statusTime'=>$this->crewGroup->getStatusTime());
        //拼接更新条件数组
        $conditionArray = array('deliveredInformationId'=>$this->crewGroup->getId());

        $row = $this->dbLayer->update($mysqlDataArray, $conditionArray);
        if (!$row) {
            return false;
        }
        $this->crewGroup->setStatus(STATUS_DELETE);
        //如果更新成功,删除缓存,这里暂时不重写缓存等后续有时间在更新
        $this->cacheLayer->del($this->crewGroup->getId());
        return true;
    }

    public function report()
    {

    }
}
