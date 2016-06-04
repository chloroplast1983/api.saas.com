<?php
namespace Web\Command\Crew;

use System\Interfaces\Pcommand;
use Web\Model\Crew;

/**
 * 添加员工命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class AddCommand implements Pcommand
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
        $mysqlDataArray = array('cellPhone'=>$this->crew->getCellPhone(),
                                'salt'=>$this->crew->getSalt(),
                                'password'=>$this->crew->getPassword(),
                                'userName'=>$this->crew->getUserName(),
                                'signUpTime'=>$this->crew->getSignUpTime(),
                                'source'=>$this->crew->getSourceShop()->getId(),
                                'updateTime'=>$this->crew->getUpdateTime(),
                                'realName'=>$this->crew->getRealName(),
                                'weixinAccount'=>$this->crew->getWeixinAccount());

        ////写入数据库,如果成功,写入缓存
        $id = $this->dbLayer->insert($mysqlDataArray, true);
        if (!$id) {
            return false;
        }

        //返回用户主键id,写会$user对象,为领域服务间互相调用服务
        $this->crew->setId($id);
        
        return true;
    }

    public function report()
    {

    }
}
