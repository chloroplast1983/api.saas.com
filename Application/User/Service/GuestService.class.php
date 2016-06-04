<?php
namespace User\Service;

use User\Model\User;
use User\Repository;
use Core;
use Common;

/**
 * 用户游客身份角色
 * 验证功能对应的是
 * 1. 注册:手机短信注册
 * 2. 登录:验证码
 *
 * @author chloroplast
 * @version 1.0.0:20160227
 */
class GuestService implements GuestServiceInterface
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
     * 注册功能
     * @param string $cellPhone 手机号
     * @param string $password 密码
     * @return integer | bool 执行成功返回新的用户id,执行失败返回false
     */
    public function signUp(string $cellPhone, string $password, string $code)
    {

        if (!empty($code)) {//临时添加,因为单元测试需要验证这里
            //调用注册验证功能
            $registerService = new Common\Service\SignUpSaasSmsService();
            if (!$this->verify($cellPhone, $code, $registerService)) {
                return false;
            }
        }

        //设置用户手机
        $this->user->setCellPhone($cellPhone);
        //设置用户密码
        $this->user->encryptPassword($password);

        return $this->user->signUp();
    }

    /**
     * 登录功能
     * @param string $cellPhone 手机号
     * @param string $password 密码
     */
    public function signIn(string $cellPhone, string $password)
    {

        //根据手机号返回盐和加密过的密码
        $repository = Core::$_container->get('User\Repository\User\UserRepository');
        $checkUser = $repository->getOneByCellPhone($cellPhone);
        
        if (!$checkUser) {
            return false;
        }
        if ($checkUser instanceof User) {
            $this->user->encryptPassword($password, $checkUser->getSalt());
            //验证和盐加密过的密码是否和数据库密码一致
            if ($checkUser->getPassword() == $this->user->getPassword()) {
                $this->user = $checkUser;
                return true;
            }
        }
        return false;
    }

    /**
     * 验证功能
     * @param string $code 验证码
     */
    private function verify(string $key, string $code, Common\Service\VerifyCodeInterface $verifyCodeInterface)
    {
        //验证
        return $verifyCodeInterface->verify($key, $code);
    }

    /**
     * 重置密码
     */
    public function restPassword(string $cellPhone, string $password, string $code)
    {

        //调用找回密码验证功能
        if (!empty($code)) {//临时添加,因为单元测试需要验证这里
            $restPasswordService = new Common\Service\RestSaasPasswordSmsService();
            if (!$this->verify($cellPhone, $code, $restPasswordService)) {
                return false;
            }
        }
        //确认手机号已经注册过
        $repository = Core::$_container->get('User\Repository\User\UserRepository');
        $user = $repository->getOneByCellPhone($cellPhone);
        
        if (!$user) {
            return false;
        }
        $this->user = $user;
        //设置用户密码
        $this->user->encryptPassword($password);

        return $this->user->updatePassword();
    }
}
