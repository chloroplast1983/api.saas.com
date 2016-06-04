<?php
namespace Web\Service;

use Web\Model\Guest;
use Guest\Repository;
use Core;
use Common;

/**
 * 买家游客身份角色
 * 验证功能对应的是
 * 1. 注册:手机短信注册
 * 2. 登录:验证码
 *
 * @todo 改进,用户的手机号和source
 *
 * @author chloroplast
 * @version 1.0.0:20160227
 */
class UnregisteredGuestService implements UnregisteredGuestServiceInterface
{

    /**
     * @var guest $guest 用户对象
     */
    private $guest;


    public function __construct(Guest $guest)
    {
        $this->guest = $guest;
    }

    /**
     * 设置guest对象
     */
    public function setGuest(Guest $guest)
    {
        $this->guest = $guest;
    }

    /**
     * 获取guest对象
     */
    public function getGuest()
    {
        return $this->guest;
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
            $registerService = new Common\Service\SignUpWebSmsService();
            if (!$this->verify($cellPhone, $code, $registerService)) {
                return false;
            }
        }

        //设置用户手机
        $this->guest->setCellPhone($cellPhone);
        //设置用户密码
        $this->guest->encryptPassword($password);

        return $this->guest->signUp();
    }

    /**
     * 登录功能
     * @param string $cellPhone 手机号
     * @param string $password 密码
     */
    public function signIn(string $cellPhone, string $password)
    {

        //根据手机号返回盐和加密过的密码
        $repository = Core::$_container->get('Web\Repository\Guest\GuestRepository');
        $checkguest = $repository->getOneByCellPhone($cellPhone);
        
        if (!$checkguest) {
            return false;
        }
        if ($checkguest instanceof guest) {
            $this->guest->encryptPassword($password, $checkguest->getSalt());
            //验证和盐加密过的密码是否和数据库密码一致
            if ($checkguest->getPassword() == $this->guest->getPassword()) {
                $this->guest = $checkguest;
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
            $restPasswordService = new Common\Service\RestWebPasswordSmsService();
            if (!$this->verify($cellPhone, $code, $restPasswordService)) {
                return false;
            }
        }
        //确认手机号已经注册过
        $repository = Core::$_container->get('Web\Repository\Guest\GuestRepository');
        $guest = $repository->getOneByCellPhone($cellPhone);
        
        if (!$guest) {
            return false;
        }
        $this->guest = $guest;
        //设置用户密码
        $this->guest->encryptPassword($password);

        return $this->guest->updatePassword();
    }
}
