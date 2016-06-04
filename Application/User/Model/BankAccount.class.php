<?php
namespace User\Model;

use User\Model\User;
use Core;

/**
 * BankAccount saas用户银行账户领域对象
 * @author chloroplast
 * @version 1.0.0:2016.04.17
 */

class BankAccount
{

    /**
     * @var int $id 银行账户id
     */
    private $id;
    /**
     * @var \User\Model\User $user saas用户
     */
    // private $user;
    /**
     * @var string $bankCardHolderName 银行持卡人姓名
     */
    private $bankCardHolderName;
    /**
     * @var string $bankCardNumber 卡号
     */
    private $bankCardNumber;
    /**
     * @var string $bankCardCellphone 银行预留手机
     */
    private $bankCardCellphone;
    /**
     * @var int $createTime 账户添加时间
     */
    private $createTime;
    /**
     * @var int $updateTime 账户更新时间
     */
    private $updateTime;

    /**
     * BankAccount saas用户银行账户领域对象 构造函数
     */
    public function __construct(int $id = 0)
    {
        global $_FWGLOBAL;
        $this->id = !empty($id) ? $id : 0;
        // $this->user = '';
        $this->bankCardHolderName = '';
        $this->bankCardNumber = '';
        $this->bankCardCellphone = '';
        $this->createTime = $_FWGLOBAL['timestamp'];
        $this->updateTime = $_FWGLOBAL['timestamp'];
    }

    /**
     * BankAccount saas用户银行账户领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->id);
        // unset($this->user);
        unset($this->bankCardHolderName);
        unset($this->bankCardNumber);
        unset($this->bankCardCellphone);
        unset($this->createTime);
        unset($this->updateTime);
    }

    /**
     * 设置银行账户id
     * @param int $id 银行账户id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * 获取银行账户id
     * @return int $id 银行账户id
     */
    public function getId()
    {
        return $this->id;
    }

    // /**
    //  * 设置saas用户
    //  * @param \User\Model\User $user saas用户
    //  */
    // public function setUser(\User\Model\User $user){
    // 	$this->user = $user;
    // }

    // /**
    //  * 获取saas用户
    //  * @return \User\Model\User $user saas用户
    //  */
    // public function getUser(){
    // 	return $this->user;
    // }

    /**
     * 设置银行持卡人姓名
     * @param string $bankCardHolderName 银行持卡人姓名
     */
    public function setBankCardHolderName(string $bankCardHolderName)
    {
        $this->bankCardHolderName = $bankCardHolderName;
    }

    /**
     * 获取银行持卡人姓名
     * @return string $bankCardHolderName 银行持卡人姓名
     */
    public function getBankCardHolderName()
    {
        return $this->bankCardHolderName;
    }

    /**
     * 设置卡号
     * @param string $bankCardNumber 卡号
     */
    public function setBankCardNumber(string $bankCardNumber)
    {
        $this->bankCardNumber = $bankCardNumber;
    }

    /**
     * 获取卡号
     * @return string $bankCardNumber 卡号
     */
    public function getBankCardNumber()
    {
        return $this->bankCardNumber;
    }

    /**
     * 设置银行预留手机
     * @param string $bankCardCellphone 银行预留手机
     */
    public function setBankCardCellphone(string $bankCardCellphone)
    {
        $this->bankCardCellphone = is_numeric($bankCardCellphone) ? $bankCardCellphone : '';
    }

    /**
     * 获取银行预留手机
     * @return string $bankCardCellphone 银行预留手机
     */
    public function getBankCardCellphone()
    {
        return $this->bankCardCellphone;
    }

    /**
     * 设置账户添加时间
     * @param int $createTime 账户添加时间
     */
    public function setCreateTime(int $createTime)
    {
        $this->createTime = $createTime;
    }

    /**
     * 获取账户添加时间
     * @return int $createTime 账户添加时间
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * 设置账户更新时间
     * @param int $updateTime 账户更新时间
     */
    public function setUpdateTime(int $updateTime)
    {
        $this->updateTime = $updateTime;
    }

    /**
     * 获取账户更新时间
     * @return int $updateTime 账户更新时间
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    /**
     * 添加银行账户
     */
    public function addToUser(User $user)
    {
        //调用添加命令
        $command = Core::$_container->call(['User\Command\Bank\BankCommandFactory','createCommand'], ['type'=>'add','data'=>$this,'target'=>$user]);
        return $command->execute();
    }

    /**
     * 编辑银行账户
     */
    public function editFromUser(User $user)
    {
        //调用编辑命令
        $command = Core::$_container->call(['User\Command\Bank\BankCommandFactory','createCommand'], ['type'=>'add','data'=>$this,'target'=>$user]);
        return $command->execute();
    }
}
