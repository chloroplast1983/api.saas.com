<?php
namespace User\Model;

/**
 * Account saas用户账户
 * @author chloroplast
 * @version 1.0.0:2016.04.17
 */

class Account
{

    /**
     * @var int $balance saas用户账户余额
     */
    private $balance;

    /**
     * Account saas用户账户 构造函数
     */
    public function __construct()
    {
        global $_FWGLOBAL;
        $this->balance = 0;
    }

    /**
     * Account saas用户账户 析构函数
     */
    public function __destruct()
    {
        unset($this->balance);
    }

    /**
     * 设置saas用户账户余额
     * @param int $balance saas用户账户余额
     */
    public function setBalance(int $balance)
    {
        $this->balance = $balance;
    }

    /**
     * 获取saas用户账户余额
     * @return int $balance saas用户账户余额
     */
    public function getBalance()
    {
        return $this->balance;
    }
}
