<?php
namespace Application\Model;

use Area\Model\Area;
use Common;
use Saas\Model\User;
use Shop\Model\Shop;
use Saas\Model\BankAccount;

/**
 * Application 用户申请表单领域对象
 *
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */

abstract class Application
{

    /**
     * @var Object 对象性状
     */
    use Common\Model\Object;
    /**
     * @var \User\Model\User $user saas用户
     */
    private $user;
    /**
     * @var \Shop\Model\Shop 店铺
     */
    private $applyShop;
    /**
     * @var int $identifyCardFrontPhoto 身份证正面照片
     */
    private $identifyCardFrontPhoto;
    /**
     * @var int $identifyCardBackPhoto 身份证背面身照片
     */
    private $identifyCardBackPhoto;
    /**
     * @var \Saas\Model\BankAccount 银行账户
     */
    private $applyBankAccount;

    /**
     * Application 用户申请表单 构造函数
     */
    public function __construct(int $id = 0)
    {
        global $_FWGLOBAL;
        $this->user = new User($id);
        $this->applyShop = new Shop();
        $this->applyBankAccount = new BankAccount();
        $this->identifyCardFrontPhoto = 0;
        $this->identifyCardBackPhoto = 0;
        $this->updateTime = $_FWGLOBAL['timestamp'];
        $this->createTime = $_FWGLOBAL['timestamp'];
        $this->statusTime = $_FWGLOBAL['timestamp'];
        $this->status = APPLICATION_PENDING;
    }

    /**
     * Application 用户申请表单 析构函数
     */
    public function __destruct()
    {
        unset($this->user);
        unset($this->applyShop);
        unset($this->applyBankAccount);
        unset($this->identifyCardFrontPhoto);
        unset($this->identifyCardBackPhoto);
        unset($this->updateTime);
        unset($this->createTime);
        unset($this->status);
        unset($this->statusTime);
    }

    /**
     * 设置表单id
     * @param int $id 表单id
     */
    public function setId(int $id)
    {
        $this->user->setId($id);
    }

    /**
     * 获取表单id
     * @return int $id 表单id
     */
    public function getId() : int
    {
        return $this->user->getId();
    }

    /**
     * 设置saas用户
     * @param \Saas\Model\User $user saas用户
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * 获取saas用户
     * @return \Saas\Model\User $user saas用户
     */
    public function getUser() : User
    {
        return $this->user;
    }

    /**
     * 设置申请店铺
     * @param \Shop\Model\Shop $shop 申请店铺
     */
    public function setApplyShop(Shop $shop)
    {
        $this->applyShop = $shop;
    }

    /**
     * 获取申请店铺
     * @return \Shop\Model\Shop $shop 申请店铺
     */
    public function getApplyShop()
    {
        return $this->applyShop;
    }

    /**
     * 设置申请银行账户
     * @param \Saas\Model\BankAccount $bankAccount 银行账户
     */
    public function setApplyBankAccount(BankAccount $bankAccount)
    {
        $this->applyBankAccount = $bankAccount;
    }

    /**
     * 获取申请银行账户
     * @return \Saas\Model\BankAccount $bankAccount 银行账户
     */
    public function getApplyBankAccount()
    {
        return $this->applyBankAccount;
    }

    /**
     * 设置身份证正面照片
     * @param int $identifyCardFrontPhoto 身份证正面照片
     */
    public function setIdentifyCardFrontPhoto(int $identifyCardFrontPhoto)
    {
        $this->identifyCardFrontPhoto = $identifyCardFrontPhoto;
    }

    /**
     * 获取身份证正面照片
     * @return int $identifyCardFrontPhoto 身份证正面照片
     */
    public function getIdentifyCardFrontPhoto() : int
    {
        return $this->identifyCardFrontPhoto;
    }

    /**
     * 设置身份证背面身照片
     * @param int $identifyCardBackPhoto 身份证背面身照片
     */
    public function setIdentifyCardBackPhoto(int $identifyCardBackPhoto)
    {
        $this->identifyCardBackPhoto = $identifyCardBackPhoto;
    }

    /**
     * 获取身份证背面身照片
     * @return int $identifyCardBackPhoto 身份证背面身照片
     */
    public function getIdentifyCardBackPhoto() : int
    {
        return $this->identifyCardBackPhoto;
    }

    /**
     * 设置表单申请状态
     * @param int $status 表单申请状态
     */
    public function setStatus(int $status)
    {
        $this->status= in_array($status, array(
            APPLICATION_PENDING,
            APPLICATION_VERIFIED,
            APPLICATION_DECLINE)) ? $status : APPLICATION_PENDING;
    }
}
