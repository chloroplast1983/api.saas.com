<?php
namespace Web\Command\Guest;

use System\Interfaces\Pcommand;
use Web\Model\Guest;

/**
 * 用户修改密码命令命令
 * @author chloroplast
 * @version 1.0.20160222
 */
class UpdatePasswordCommand implements Pcommand
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
        $mysqlDataArray = array('password'=>$this->guest->getPassword(),
                                'salt'=>$this->guest->getSalt(),
                                'updateTime'=>$this->guest->getUpdateTime());
        //拼接更新条件数组
        $conditionArray = array('guestId'=>$this->guest->getId());

        $row = $this->dbLayer->update($mysqlDataArray, $conditionArray);

        //如果更新成功,删除缓存,这里暂时不重写缓存等后续有时间在更新
        $this->cacheLayer->del($this->guest->getId());
        return true;
    }

    public function report()
    {

    }
}
