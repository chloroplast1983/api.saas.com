<?php
namespace Saas\Model;

use Common;
use Marmot\Core;
use User;

/**
 * 用户领域对象
 * @author chloroplast
 * @version 1.0.0: 20160222
 */

class User extends User\Model\User
{

    /**
     * @var int type
     */
    private $type;

    public function __construct(int $id = 0)
    {
        parent::__construct();
        $this->status = USER_STATUS_NORMAL;
        $this->type = TRAVEL_UNDEFINED;
    }

    public function __destruct()
    {
        parent::__destruct();
        unset($this->type);
    }
    
    /**
     * 设置用户类型
     * @param int $type 用户类型
     */
    public function setType(int $type)
    {
        $this->type= in_array($type, array(
                                    TRAVEL_UNDEFINED,
                                    TRAVEL_AGENCY,
                                    TRAVEL_WHOLESALER,
                                    TRAVEL_OPERATOR,
                                    TRAVEL_PERSONAL
                                    )) ? $type : TRAVEL_UNDEFINED;
    }

    /**
     * 获取用户类型
     * @return int $type 用户类型
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * 设置用户状态
     * @param int $status 用户状态
     */
    public function setStatus(int $status)
    {
        $this->status= in_array($status, array(USER_STATUS_NORMAL,USER_STATUS_VERIFIED)) ? $status : USER_STATUS_NORMAL;
    }

    /**
     * 获取用户状态
     * @return int $status 用户状态
     */
    public function getStatus() : int
    {
        return $this->status;
    }

    /**
     * 注册
     * @return bool 是否注册成功
     */
    public function signUp() : bool
    {

    }

    /**
     * 更新密码
     * @return bool 是否登陆成功
     */
    public function updatePassword() : bool
    {

    }
}
