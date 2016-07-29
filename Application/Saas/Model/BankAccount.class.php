<?php
namespace Saas\Model;

use Marmot\Core;
use Common;

/**
 * BankAccount saas用户银行账户领域对象
 * @author chloroplast
 * @version 1.0.0:2016.04.17
 */

class BankAccount
{

    /**
     * @var Object 对象性状
     */
    use Common\Model\Object;
    /**
     * @var int $id 银行账户id
     */
    private $id;
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
     * BankAccount saas用户银行账户领域对象 构造函数
     */
    public function __construct(int $id = 0)
    {
        global $_FWGLOBAL;
        $this->id = !empty($id) ? $id : 0;
        $this->bankCardHolderName = '';
        $this->bankCardNumber = '';
        $this->bankCardCellphone = '';
        $this->createTime = $_FWGLOBAL['timestamp'];
        $this->updateTime = $_FWGLOBAL['timestamp'];
        $this->statusTime = $_FWGLOBAL['timestamp'];
        $this->status = STATUS_NORMAL;
    }

    /**
     * BankAccount saas用户银行账户领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->id);
        unset($this->bankCardHolderName);
        unset($this->bankCardNumber);
        unset($this->bankCardCellphone);
        unset($this->createTime);
        unset($this->updateTime);
        unset($this->status);
        unset($this->statusTime);
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
    public function getBankCardHolderName() : string
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
    public function getBankCardNumber() : string
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
    public function getBankCardCellphone() : string
    {
        return $this->bankCardCellphone;
    }

    /**
     * 设置银行状态
     * @param int $status 表单申请状态
     */
    public function setStatus(int $status)
    {
        $this->status= in_array($status, array(STATUS_NORMAL,STATUS_DELETE)) ? $status : STATUS_NORMAL;
    }
}
