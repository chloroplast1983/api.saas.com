<?php
namespace Web\Model;

/**
 * Crew 网店员工领域对象
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class Crew
{

    /**
     * @var int $id 网店员工id
     */
    private $id;
    /**
     * @var string $cellPhone 员工手机号
     */
    private $cellPhone;
    /**
     * @var string $nickName 昵称
     */
    private $nickName;
    /**
     * @var string $userName 员工用户名预留字段
     */
    private $userName;
    /**
     * @var string $realName 员工真实姓名
     */
    private $realName;
    /**
     * @var string $weixinAccount 微信账户
     */
    private $weixinAccount;
    /**
     * @var string $password 用户密码
     */
    private $password;
    /**
     * @var int $signUpTime 注册时间
     */
    private $signUpTime;
    /**
     * @var int $updateTime 更新时间
     */
    private $updateTime;
    /**
     * @var \Web\Model\Shop $sourceShop 来源店铺
     */
    private $sourceShop;
    /**
     * @var string $salt 用户密码的盐
     */
    private $salt;

    /**
     * Crew 网店员工领域对象 构造函数
     */
    public function __construct(int $id = 0)
    {
        global $_FWGLOBAL;
        $this->id = !empty($id) ? $id : 0;
        $this->cellPhone = '';
        $this->nickName = '';
        $this->userName = '';
        $this->realName = '';
        $this->weixinAccount = '';
        $this->password = '';
        $this->signUpTime = $_FWGLOBAL['timestamp'];
        $this->updateTime = $_FWGLOBAL['timestamp'];
        $this->sourceShop = '';
    }

    /**
     * Crew 网店员工领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->id);
        unset($this->cellPhone);
        unset($this->nickName);
        unset($this->userName);
        unset($this->realName);
        unset($this->weixinAccount);
        unset($this->password);
        unset($this->signUpTime);
        unset($this->sourceShop);
        unset($this->updateTime);
    }

    /**
     * 设置网店员工id
     * @param int $id 网店员工id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * 获取网店员工id
     * @return int $id 网店员工id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 设置用户手机号
     * @param string $cellPhone 用户手机号
     */
    public function setCellPhone(string $cellPhone)
    {
        $this->cellPhone = is_numeric($cellPhone) ? $cellPhone : '';
    }

    /**
     * 获取用户手机号
     * @return string $cellPhone 用户手机号
     */
    public function getCellPhone()
    {
        return $this->cellPhone;
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
     * 设置员工用户名预留字段
     * @param string $userName 员工用户名预留字段
     */
    public function setUserName(string $userName)
    {
        $this->userName = $userName;
    }

    /**
     * 获取员工用户名预留字段
     * @return string $userName 员工用户名预留字段
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * 设置员工真实姓名
     * @param string $realName 员工真实姓名
     */
    public function setRealName(string $realName)
    {
        $this->realName = $realName;
    }

    /**
     * 获取员工真实姓名
     * @return string $realName 员工真实姓名
     */
    public function getRealName()
    {
        return $this->realName;
    }

    /**
     * 设置微信账户
     * @param string $weixinAccount 微信账户
     */
    public function setWeixinAccount(string $weixinAccount)
    {
        $this->weixinAccount = $weixinAccount;
    }

    /**
     * 获取微信账户
     * @return string $weixinAccount 微信账户
     */
    public function getWeixinAccount()
    {
        return $this->weixinAccount;
    }

    /**
     * 设置用户密码
     * @param string $password 用户密码
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * 获取用户密码
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
     * 设置来源店铺
     * @param \Web\Model\Shop $sourceShop 来源店铺
     */
    public function setSourceShop(\Web\Model\Shop $sourceShop)
    {
        $this->sourceShop = $sourceShop;
    }

    /**
     * 获取来源店铺
     * @return \Web\Model\Shop $sourceShop 来源店铺
     */
    public function getSourceShop()
    {
        return $this->sourceShop;
    }

    /**
     * 添加员工
     */
    public function add()
    {
        //调用添加命令
        $command = Core::$_container->call(['Web\Command\Crew\CrewCommandFactory','createCommand'], ['type'=>'add','data'=>$this]);
        return $command->execute();
    }

    /**
     * 编辑员工
     */
    public function edit()
    {
        //调用添加命令
        $command = Core::$_container->call(['Web\Command\Crew\CrewCommandFactory','createCommand'], ['type'=>'edit','data'=>$this]);
        return $command->execute();
    }

    /**
     * 删除员工
     */
    public function delete()
    {
        
    }

    /**
     * 加入到员工组
     */
    private function joinGroup()
    {

    }
}
