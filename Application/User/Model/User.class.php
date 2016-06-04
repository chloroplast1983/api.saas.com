<?php
namespace User\Model;

use Area\Model\Area;
use Core;

/**
 * 用户领域对象
 * @author chloroplast
 * @version 1.0.0: 20160222
 */

class User
{
    
    /**
     * @var int $id 用户uid
     */
    private $id;
    /**
     * @var string $cellPhone 用户手机号
     */
    private $cellPhone;
    /**
     * @var string $nickName 昵称
     */
    private $nickName;
    /**
     * @var string $userName 用户名预留字段
     */
    private $userName;
    /**
     * @var string $password 用户密码
     */
    private $password;
    /**
     * @var int $updateTime 更新时间
     */
    private $updateTime;
    /**
     * @var int $signUpTime 注册时间
     */
    private $signUpTime;
    /**
     * @var string $salt 用户密码的盐
     */
    private $salt;
    /**
     * @var int $status 用户状态
     */
    private $status;
    /**
     * @var int $statusTime 状态变更时间
     */
    private $statusTime;
    /**
     * @var int type
     */
    private $type;

    public function __construct(int $id = 0)
    {
        global $_FWGLOBAL;
        $this->id = !empty($id) ? $id : 0;
        $this->cellPhone = '';
        $this->nickName = '';
        $this->userName = '';
        $this->password = '';
        $this->signUpTime = $_FWGLOBAL['timestamp'];
        $this->updateTime = $_FWGLOBAL['timestamp'];
        $this->salt = '';
        $this->status = USER_STATUS_NORMAL;
        $this->statusTime = $_FWGLOBAL['timestamp'];
        $this->type = TRAVEL_UNDEFINED;
    }

    public function __destruct()
    {
        unset($this->id);
        unset($this->cellPhone);
        unset($this->nickName);
        unset($this->userName);
        unset($this->password);
        unset($this->signUpTime);
        unset($this->salt);
        unset($this->updateTime);
        unset($this->status);
        unset($this->statusTime);
        unset($this->type);
    }
    
    /**
     * 设置用户id
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * Gets the value of id.
     *
     * @return int $id 用户uid
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 设置用户手机号码
     * @param string $cellPhone
     */
    public function setCellPhone(string $cellPhone)
    {
        $this->cellPhone = is_numeric($cellPhone) ? $cellPhone : '';
    }

    /**
     * Gets the value of cellPhone.
     *
     * @return string $cellPhone 用户名,现在用手机号
     */
    public function getCellPhone()
    {
        return $this->cellPhone;
    }

    /**
     * 设置用户密码
     *
     * @param string $password 用户密码
     * @param string $salt 盐
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * 加密用户密码
     * 如果盐不存在则生成盐
     * @param string $salt 盐
     * @return string 返回加密的密码
     */
    public function encryptPassword(string $password, string $salt = '')
    {
        //没有盐,自动生成盐
        $this->salt = empty($salt) ? $this->generateSalt() : $salt;
        $this->password = md5(md5($password).$this->salt);
    }

    /**
     * 随机生成 SALT_LENGTH 长度的盐
     *
     * @return string $salt 盐
     */
    private function generateSalt()
    {
        $salt = '';
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol)-1;

        for ($i=0; $i<SALT_LENGTH; $i++) {
            $salt.=$strPol[rand(0, $max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }
        return $salt;
    }
    
    /**
     * Gets the value of password.
     *
     * @return string $password 用户密码
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * 设置salt
     * @param string $salt 盐
     */
    public function setSalt(string $salt)
    {
        $this->salt = $salt;
    }

    /**
     * Gets the value of salt.
     *
     * @return string $salt 用户密码的盐
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * 设置注册时间
     * @param int $signUpTime 注册时间
     */
    public function setSignUpTime(int $signUpTime)
    {
        $this->signUpTime = $signUpTime;
    }

    /**
     * 获取注册时间
     * @return int $signUpTime 注册时间
     */
    public function getSignUpTime()
    {
        return $this->signUpTime;
    }

    /**
     * 设置更新时间
     * @param int $updateTime 商品更新时间
     */
    public function setUpdateTime(int $updateTime)
    {
        $this->updateTime = $updateTime;
    }

    /**
     * 获取更新时间
     * @return int $updateTime 商品更新时间
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    /**
     * 设置昵称
     * @param string $nickName 昵称
     */
    public function setNickName(string $nickName)
    {
        $this->nickName = $nickName;
    }

    /**
     * 获取昵称
     * @return string $nickName 昵称
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * 设置用户名预留字段
     * @param string $userName 用户名预留字段
     */
    public function setUserName(string $userName)
    {
        $this->userName = $userName;
    }

    /**
     * 获取用户名预留字段
     * @return string $userName 用户名预留字段
     */
    public function getUserName()
    {
        return $this->userName;
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * 设置状态变更时间
     * @param int $statusTime 状态变更时间
     */
    public function setStatusTime(int $statusTime)
    {
        $this->statusTime = $statusTime;
    }

    /**
     * 获取状态变更时间
     * @return int $statusTime 状态变更时间
     */
    public function getStatusTime()
    {
        return $this->statusTime;
    }
    
    /**
     * 设置用户类型
     * @param int $type 用户类型
     */
    public function setType(int $type)
    {
        $this->type= in_array($type, array(TRAVEL_UNDEFINED,TRAVEL_AGENCY,TRAVEL_WHOLESALER,TRAVEL_OPERATOR,TRAVEL_PERSONAL)) ? $type : TRAVEL_UNDEFINED;
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
     * 注册
     * @return bool 是否注册成功
     */
    public function signUp()
    {
        //调用注册命令
        $command = Core::$_container->call(['User\Command\User\UserCommandFactory','createCommand'], ['type'=>'signUp','data'=>$this]);
        return $command->execute();
    }

    /**
     * 更新密码
     * @return bool 是否登陆成功
     */
    public function updatePassword()
    {
        //调用更新密码命令
        $command = Core::$_container->call(['User\Command\User\UserCommandFactory','createCommand'], ['type'=>'updatePassword','data'=>$this]);
        return $command->execute();
    }
}
