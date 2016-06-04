<?php
namespace User\Command\User;

use System\Interfaces\Pcommand;
use User\Model\User;

/**
 * 审核用户命令
 * @author chloroplast
 * @version 1.0.20160222
 */
class VerifyCommand implements Pcommand
{

    private $user;

    /**
     * @Inject("User\Persistence\UserDb")
     */
    private $dbLayer;
    /**
     * @Inject("User\Persistence\UserCache")
     */
    private $cacheLayer;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function execute()
    {
        //拼接数据库数组
        $mysqlDataArray = array('status'=>USER_STATUS_VERIFIED,
                                'statusTime'=>$this->user->getStatusTime());
        //拼接更新条件数组
        $conditionArray = array('userId'=>$this->user->getId());

        $row = $this->dbLayer->update($mysqlDataArray, $conditionArray);
        if (!$row) {
            return false;
        }
        $this->user->setStatus(USER_STATUS_VERIFIED);
        //如果更新成功,删除缓存,这里暂时不重写缓存等后续有时间在更新
        $this->cacheLayer->del($this->user->getId());
        return true;
    }

    public function report()
    {

    }
}
