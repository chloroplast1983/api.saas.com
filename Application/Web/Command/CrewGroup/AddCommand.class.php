<?php
namespace Web\Command\CrewGroup;

use System\Interfaces\Pcommand;
use Web\Model\CrewGroup;

/**
 * 添加员工组命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class AddCommand implements Pcommand
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
        $mysqlDataArray = array('name'=>$this->crewGroup->getName(),
                                'createTime'=>$this->crewGroup->getCreateTime(),
                                'updateTime'=>$this->crewGroup->getUpdateTime(),
                                'purview'=>$this->crewGroup->getPurview(),
                                'status'=>$this->crewGroup->getStatus(),
                                'statusTime'=>$this->crewGroup->getStatusTime());

        ////写入数据库,如果成功,写入缓存
        $id = $this->dbLayer->insert($mysqlDataArray, true);
        if (!$id) {
            return false;
        }

        //返回用户主键id,写会$user对象,为领域服务间互相调用服务
        $this->crewGroup->setId($id);
        
        return true;
    }

    public function report()
    {

    }
}
