<?php
namespace Application\Model;

use Area\Model\Area;

/**
 * Application 用户申请表单领域对象
 *
 * 这里Organization 和 Personal 的申请表单分开单独2个对象是因为考虑后期这里需要完全分离出2个不同的对象,
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */

class Application
{

    /**
     * @var \User\Model\User $user saas用户
     */
    private $user;
    /**
     * @var string $title 商户名称
     */
    private $title;
    /**
     * @var string $contactPeople 联系人
     */
    private $contactPeople;
    /**
     * @var string $contactPeoplePhone 联系人电话
     */
    private $contactPeoplePhone;
    /**
     * @var string $contactPeopleQQ 联系人QQ
     */
    private $contactPeopleQQ;
    /**
     * @var Area\Model\Area $province 用户住址省
     */
    private $province;
    /**
     * @var Area\Model\Area $city 用户住址市
     */
    private $city;
    /**
     * @var string $address 地址
     */
    private $address;
    /**
     * @var int $identifyCardFrontPhoto 身份证正面照片
     */
    private $identifyCardFrontPhoto;
    /**
     * @var int $identifyCardBackPhoto 身份证背面身照片
     */
    private $identifyCardBackPhoto;
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
     * @var int $updateTime 表单更新时间
     */
    private $updateTime;
    /**
     * @var int $createTime 表单添加时间
     */
    private $createTime;
    /**
     * @var int $status 表单申请状态
     */
    private $status;
    /**
     * @var int $statusTime 商品状态变更时间
     */
    private $statusTime;

    /**
     * Application 用户申请表单 构造函数
     */
    public function __construct(int $id = 0)
    {
        global $_FWGLOBAL;
        $this->user = new \User\Model\User($id);
        $this->title = '';
        $this->contactPeople = '';
        $this->contactPeoplePhone = '';
        $this->contactPeopleQQ = '';
        $this->province = '';
        $this->city = '';
        $this->address = '';
        $this->identifyCardFrontPhoto = 0;
        $this->identifyCardBackPhoto = 0;
        $this->bankCardHolderName = '';
        $this->bankCardNumber = '';
        $this->bankCardCellphone = '';
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
        unset($this->title);
        unset($this->contactPeople);
        unset($this->contactPeoplePhone);
        unset($this->contactPeopleQQ);
        unset($this->province);
        unset($this->city);
        unset($this->address);
        unset($this->identifyCardFrontPhoto);
        unset($this->identifyCardBackPhoto);
        unset($this->bankCardHolderName);
        unset($this->bankCardNumber);
        unset($this->bankCardCellphone);
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
    public function getId()
    {
        return $this->user->getId();
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
     * 设置商户名称
     * @param string $title 商户名称
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * 获取商户名称
     * @return string $title 商户名称
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * 设置联系人
     * @param string $contactPeople 联系人
     */
    public function setContactPeople(string $contactPeople)
    {
        $this->contactPeople = $contactPeople;
    }

    /**
     * 获取联系人
     * @return string $contactPeople 联系人
     */
    public function getContactPeople()
    {
        return $this->contactPeople;
    }

    /**
     * 设置联系人电话
     * @param string $contactPeoplePhone 联系人电话
     */
    public function setContactPeoplePhone(string $contactPeoplePhone)
    {
        $this->contactPeoplePhone = is_numeric($contactPeoplePhone) ? $contactPeoplePhone : '';
    }

    /**
     * 获取联系人电话
     * @return string $contactPeoplePhone 联系人电话
     */
    public function getContactPeoplePhone()
    {
        return $this->contactPeoplePhone;
    }

    /**
     * 设置联系人QQ
     * @param string $contactPeopleQQ 联系人QQ
     */
    public function setContactPeopleQQ(string $contactPeopleQQ)
    {
        $this->contactPeopleQQ = is_numeric($contactPeopleQQ) ? $contactPeopleQQ : '';
    }

    /**
     * 获取联系人QQ
     * @return string $contactPeopleQQ 联系人QQ
     */
    public function getContactPeopleQQ()
    {
        return $this->contactPeopleQQ;
    }

    /**
     * 设置用户住址省
     * @param \Area\Model\Area $province 用户住址省
     */
    public function setProvince(\Area\Model\Area $province)
    {
        $this->province = $province;
    }

    /**
     * 获取用户住址省
     * @return \Area\Model\Area $province 用户住址省
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * 设置用户住址市
     * @param \Area\Model\Area $city 用户住址市
     */
    public function setCity(\Area\Model\Area $city)
    {
        $this->city = $city;
    }

    /**
     * 获取用户住址市
     * @return Area\Model\Area $city 用户住址市
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * 设置地址
     * @param string $address 地址
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    /**
     * 获取地址
     * @return string $address 地址
     */
    public function getAddress()
    {
        return $this->address;
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
    public function getIdentifyCardFrontPhoto()
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
    public function getIdentifyCardBackPhoto()
    {
        return $this->identifyCardBackPhoto;
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
     * 设置表单更新时间
     * @param int $updateTime 表单更新时间
     */
    public function setUpdateTime(int $updateTime)
    {
        $this->updateTime = $updateTime;
    }

    /**
     * 获取表单更新时间
     * @return int $updateTime 表单更新时间
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    /**
     * 设置表单添加时间
     * @param int $createTime 表单添加时间
     */
    public function setCreateTime(int $createTime)
    {
        $this->createTime = $createTime;
    }

    /**
     * 获取表单添加时间
     * @return int $createTime 表单添加时间
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * 设置表单申请状态
     * @param int $status 表单申请状态
     */
    public function setStatus(int $status)
    {
        $this->status= in_array($status, array(APPLICATION_PENDING,APPLICATION_VERIFIED,APPLICATION_DECLINE)) ? $status : APPLICATION_PENDING;
    }

    /**
     * 获取表单申请状态
     * @return int $status 表单申请状态
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * 设置表单状态变更时间
     * @param int $statusTime 商品状态变更时间
     */
    public function setStatusTime(int $statusTime)
    {
        $this->statusTime = $statusTime;
    }

    /**
     * 获取表单状态变更时间
     * @return int $statusTime 商品状态变更时间
     */
    public function getStatusTime()
    {
        return $this->statusTime;
    }
}
