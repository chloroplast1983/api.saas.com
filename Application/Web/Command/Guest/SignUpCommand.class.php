<?php
namespace Web\Command\Guest;

use System\Interfaces\Pcommand;
use Web\Model\Guest;

/**
 * 用户注册命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class SignUpCommand implements Pcommand
{

    private $guest;

    /**
     * @Inject("Web\Persistence\GuestDb")
     */
    private $dbLayer;

    /**
     * @Inject("Web\Persistence\GuestCache")
     */
    private $cacheLayer;

    public function __construct(Guest $guest)
    {
        $this->guest = $guest;
    }

    public function execute()
    {

        //拼接数据库数组
        $mysqlDataArray = array('cellPhone'=>$this->guest->getCellPhone(),
                                'salt'=>$this->guest->getSalt(),
                                'password'=>$this->guest->getPassword(),
                                'signUpTime'=>$this->guest->getSignUpTime(),
                                'userName'=>$this->guest->getUserName(),
                                'nickName'=>$this->guest->getNickName(),
                                'updateTime'=>$this->guest->getUpdateTime(),
                                'source'=>$this->guest->getSourceShop()->getId());

        //写入数据库,如果成功,写入缓存
        $id = $this->dbLayer->insert($mysqlDataArray, true);
        if (!$id) {
            return false;
        }

        //返回用户主键id,写会$user对象,为领域服务间互相调用服务
        $this->guest->setId($id);
        return true;
    }

    public function report()
    {

    }
}
