<?php
namespace Web\Model;

use Core;

/**
 * Shop 网店领域对象
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class Shop
{

    /**
     * @var \User\Model\User $user 网店属主,saas用户对象
     */
    private $user;
    /**
     * @var string $contactPeoplePhone 联系人电话
     */
    private $contactPeoplePhone;
    /**
     * @var string $title 商户名称
     */
    private $title;
    /**
     * @var string $contactPeople 联系人
     */
    private $contactPeople;
    /**
     * @var string $contactPeopleQQ 联系人qq
     */
    private $contactPeopleQQ;
    /**
     * @var \Area\Model\Area $province 店铺所在省
     */
    private $province;
    /**
     * @var \Area\Model\Area $city 店铺所在市
     */
    private $city;
    /**
     * @var string $address 店铺地址
     */
    private $address;
    /**
     * @var int $createTime 添加时间
     */
    private $createTime;
     /**
     * @var int $updateTime 更新时间
     */
    private $updateTime;
    /**
     * @var int $statusTime 状态变更时间
     */
    private $statusTime;
    /**
     * @var int $status 状态
     */
    private $status;
    /**
     * @var arry $productTypeList 商品分类
     */
    private $productTypeList;
    /**
     * @var arry shopSlideList 店铺幻灯片
     */
    private $shopSlideList;

    /**
     * Shop 网店领域对象 构造函数
     */
    public function __construct(int $id = 0)
    {
        global $_FWGLOBAL;
        $this->user = new \User\Model\User($id);
        $this->contactPeoplePhone = '';
        $this->title = '';
        $this->contactPeople = '';
        $this->contactPeopleQQ = '';
        $this->province = '';
        $this->city = '';
        $this->address = '';
        $this->createTime = $_FWGLOBAL['timestamp'];
        $this->statusTime = $_FWGLOBAL['timestamp'];
        $this->updateTime = $_FWGLOBAL['timestamp'];
        $this->status = SHOP_STATUS_NORMAL;
        $this->productTypeList = array();
        $this->shopSlideList = array();
    }

    /**
     * Shop 网店领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->user);
        unset($this->contactPeoplePhone);
        unset($this->title);
        unset($this->contactPeople);
        unset($this->contactPeopleQQ);
        unset($this->province);
        unset($this->city);
        unset($this->address);
        unset($this->createTime);
        unset($this->statusTime);
        unset($this->status);
        unset($this->updateTime);
        unset($this->productTypeList);
        unset($this->shopSlideList);
    }

    /**
     * 设置店铺id,等同于属主id
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->user->setId($id);
    }

    /**
     * 获取店铺id,等同于属主id
     */
    public function getId()
    {
        return $this->user->getId();
    }
    /**
     * 设置网店属主,saas用户对象
     * @param \User\Model\User $user 网店属主,saas用户对象
     */
    public function setUser(\User\Model\User $user)
    {
        $this->user = $user;
    }

    /**
     * 获取网店属主,saas用户对象
     * @return \User\Model\User $user 网店属主,saas用户对象
     */
    public function getUser()
    {
        return $this->user;
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
     * 设置联系人qq
     * @param string $contactPeopleQQ 联系人qq
     */
    public function setContactPeopleQQ(string $contactPeopleQQ)
    {
        $this->contactPeopleQQ = is_numeric($contactPeopleQQ) ? $contactPeopleQQ : '';
    }

    /**
     * 获取联系人qq
     * @return string $contactPeopleQQ 联系人qq
     */
    public function getContactPeopleQQ()
    {
        return $this->contactPeopleQQ;
    }

    /**
     * 设置店铺所在省
     * @param \Area\Model\Area $province 店铺所在省
     */
    public function setProvince(\Area\Model\Area $province)
    {
        $this->province = $province;
    }

    /**
     * 获取店铺所在省
     * @return \Area\Model\Area $province 店铺所在省
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * 设置店铺所在市
     * @param \Area\Model\Area $city 店铺所在市
     */
    public function setCity(\Area\Model\Area $city)
    {
        $this->city = $city;
    }

    /**
     * 获取店铺所在市
     * @return \Area\Model\Area $city 店铺所在市
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * 设置店铺地址
     * @param string $address 店铺地址
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    /**
     * 获取店铺地址
     * @return string $address 店铺地址
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * 设置添加时间
     * @param int $createTime 添加时间
     */
    public function setCreateTime(int $createTime)
    {
        $this->createTime = $createTime;
    }

    /**
     * 获取添加时间
     * @return int $createTime 添加时间
     */
    public function getCreateTime()
    {
        return $this->createTime;
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
     * 设置状态
     * @param int $status 状态
     */
    public function setStatus(int $status)
    {
        $this->status= in_array($status, array(SHOP_STATUS_NORMAL,SHOP_STATUS_BLOCKED)) ? $status : SHOP_STATUS_NORMAL;
    }

    /**
     * 获取状态
     * @return int $status 状态
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * 设置店铺产品分类
     * @param array $productTypeList
     */
    public function attachProductType(\Web\Model\ProductType $productType)
    {
        $this->productTypeList[] = $productType;
    }

    /**
     * 获取店铺产品分类
     */
    public function getProductTypeList()
    {
        return $this->productTypeList;
    }

    /**
     * 设置店铺幻灯片
     * @todo 还未测试
     * @param array $shopSlide
     */
    public function attachShopSlideList(\Web\Model\ShopSlide $shopSlide)
    {
        $this->shopSlideList[] = $shopSlide;
    }

    /**
     * 获取店铺产品分类
     */
    public function getShopSlideList()
    {
        return $this->shopSlideList;
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
     * 添加店铺
     */
    public function add()
    {
        //调用添加命令
        $command = Core::$_container->call(['Web\Command\Shop\ShopCommandFactory','createCommand'], ['type'=>'add','data'=>$this]);
        return $command->execute();
    }

    /**
     * 添加店铺幻灯片
     */
    public function addSlide(\Web\Model\ShopSlide $shopSlide)
    {
        //添加店铺幻灯片
        return $shopSlide->addToShop($this);
    }

    /**
     * 删除店铺幻灯片
     */
    public function deleteSlide(\Web\Model\ShopSlide $shopSlide)
    {
        return $shopSlide->deleteFromShop($this);
    }
}
