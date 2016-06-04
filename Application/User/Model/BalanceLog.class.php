<?php
namespace User\Model;

/**
 * BalanceLog saas用户交易记录
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */

class BalanceLog
{

    /**
     * @var int $id 银行账户id
     */
    private $id;
    /**
     * @var \User\Model\User $user saas用户
     */
    private $user;
    /**
     * @var int $money 交易记录金额
     */
    private $money;
    /**
     * @var int $createTime 账户添加时间
     */
    private $createTime;
    /**
     * @var int $type 交易记录类型
     */
    private $type;

    /**
     * BalanceLog saas用户交易记录 构造函数
     */
    public function __construct()
    {
        global $_FWGLOBAL;
        $this->id = 0;
        $this->user = '';
        $this->money = 0;
        $this->createTime = $_FWGLOBAL['timestamp'];
        $this->type = BALANCE_TYPE_REVENUE;
    }

    /**
     * BalanceLog saas用户交易记录 析构函数
     */
    public function __destruct()
    {
        unset($this->id);
        unset($this->user);
        unset($this->money);
        unset($this->createTime);
        unset($this->type);
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

    /**
     * 设置saas用户
     * @param \User\Model\User $user saas用户
     */
    public function setUser(\User\Model\User $user)
    {
        $this->user = $user;
    }

    /**
     * 获取saas用户
     * @return \User\Model\User $user saas用户
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * 设置交易记录金额
     * @param int $money 交易记录金额
     */
    public function setMoney(int $money)
    {
        $this->money = $money;
    }

    /**
     * 获取交易记录金额
     * @return int $money 交易记录金额
     */
    public function getMoney()
    {
        return $this->money;
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
     * 设置交易记录类型
     * @param int $type 交易记录类型
     */
    public function setType(int $type)
    {
        $this->type= in_array($type, array(BALANCE_TYPE_REVENUE,BALANCE_TYPE_EXPENSE)) ? $type : BALANCE_TYPE_REVENUE;
    }

    /**
     * 获取交易记录类型
     * @return int $type 交易记录类型
     */
    public function getType()
    {
        return $this->type;
    }
}
