<?php
namespace User\Service;

use User\Model\User;
use Core;

/**
 * 已审核用户角色
 *
 * @author chloroplast
 * @version 1.0.0:20160227
 */
class VerifiedMemberService implements VerifiedMemberServiceInterface
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
}
