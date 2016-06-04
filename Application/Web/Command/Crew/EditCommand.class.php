<?php
namespace Web\Command\Crew;

use System\Interfaces\Pcommand;
use Web\Model\Crew;

/**
 * 编辑员工命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class EditCommand implements Pcommand
{

    private $Crew;

    /**
     * @Inject("Web\Persistence\CrewDb")
     */
    private $dbLayer;

    /**
     * @Inject("Web\Persistence\CrewCache")
     */
    private $cacheLayer;

    public function __construct(Crew $crew)
    {
        $this->crew = $crew;
    }

    public function execute()
    {
        //拼接数据库数组
        $mysqlDataArray = array('password'=>$this->crew->getPassword(),
                                'updateTime'=>$this->crew->getUpdateTime(),
                                'realName'=>$this->crew->getRealName(),
                                'weixinAccount'=>$this->crew->getWeixinAccount());
        //拼接更新条件数组
        $conditionArray = array('id'=>$this->crew->getId());

        $row = $this->dbLayer->update($mysqlDataArray, $conditionArray);
        if (!$row) {
            return false;
        }

        //如果更新成功,删除缓存,这里暂时不重写缓存等后续有时间在更新
        $this->cacheLayer->del($this->crew->getId());
        return true;
    }

    public function report()
    {

    }
}
