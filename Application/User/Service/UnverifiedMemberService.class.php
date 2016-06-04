<?php
namespace User\Service;

use User\Model\User;
use Core;

/**
 * 未审核用户角色
 *
 * @author chloroplast
 * @version 1.0.0:20160227
 */
class UnverifiedMemberService implements UnverifiedMemberServiceInterface
{

    /**
     * @var User $user 用户对象
     */
    private $user;


    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * 设置user对象
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * 获取user对象
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * 审核
     */
    public function verify()
    {
        $command = Core::$_container->call(['User\Command\User\UserCommandFactory','createCommand'], ['type'=>'verify','data'=>$this->user]);
        return $command->execute();
    }
}
