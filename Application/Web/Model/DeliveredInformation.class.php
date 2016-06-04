<?php
namespace Web\Model;

/**
 * DeliveredInformation 网店用户配送信息领域对象
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class DeliveredInformation
{

    /**
     * @var int $id 配送信息id
     */
    private $id;
    /**
     * @var \Web\Model\Guest $guest 网店用户
     */
    private $guest;
    /**
     * @var string $consignee 收货人
     */
    private $consignee;
    /**
     * @var string $consigneeAddress 收货地址
     */
    private $consigneeAddress;
    /**
     * @var \Area\Model\Area $province 收货地址所在省
     */
    private $province;
    /**
     * @var \Area\Model\Area $city 收货地址所在市
     */
    private $city;
    /**
     * @var \Area\Model\Area $district 收货地址所在区
     */
    private $district;
    /**
     * @var string $consigneePhone 收货人联系电话
     */
    private $consigneePhone;
    /**
     * @var string $consigneePostalCode 收货人地址邮政编码
     */
    private $consigneePostalCode;
    /**
     * @var int $createTime 添加时间
     */
    private $createTime;
    /**
     * @var int $updateTime 更新时间
     */
    private $updateTime;
    /**
     * @var string $version 快照版本
     */
    private $version;
    /**
     * @var int $status 状态
     */
    private $status;

    /**
     * DeliveredInformation 网店用户配送信息领域对象 构造函数
     */
    public function __construct(int $id = 0)
    {
        global $_FWGLOBAL;
        $this->id = !empty($id) ? $id : 0;
        $this->guest = '';
        $this->consignee = '';
        $this->consigneeAddress = '';
        $this->province = '';
        $this->city = '';
        $this->district = '';
        $this->consigneePhone = '';
        $this->consigneePostalCode = '';
        $this->createTime = $_FWGLOBAL['timestamp'];
        $this->updateTime = $_FWGLOBAL['timestamp'];
        $this->version = '';
        $this->status = STATUS_NORMAL;
    }

    /**
     * DeliveredInformation 网店用户配送信息领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->id);
        unset($this->guest);
        unset($this->consignee);
        unset($this->consigneeAddress);
        unset($this->province);
        unset($this->city);
        unset($this->district);
        unset($this->consigneePhone);
        unset($this->consigneePostalCode);
        unset($this->createTime);
        unset($this->updateTime);
        unset($this->version);
        unset($this->status);
    }

    /**
     * 设置配送信息id
     * @param int $id 配送信息id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * 获取配送信息id
     * @return int $id 配送信息id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 设置网店用户
     * @param \Web\Model\Guest $guest 网店用户
     */
    public function setGuest(\Web\Model\Guest $guest)
    {
        $this->guest = $guest;
    }

    /**
     * 获取网店用户
     * @return \Web\Model\Guest $guest 网店用户
     */
    public function getGuest()
    {
        return $this->guest;
    }

    /**
     * 设置收货人
     * @param string $consignee 收货人
     */
    public function setConsignee(string $consignee)
    {
        $this->consignee = $consignee;
    }

    /**
     * 获取收货人
     * @return string $consignee 收货人
     */
    public function getConsignee()
    {
        return $this->consignee;
    }

    /**
     * 设置收货地址
     * @param string $consigneeAddress 收货地址
     */
    public function setConsigneeAddress(string $consigneeAddress)
    {
        $this->consigneeAddress = $consigneeAddress;
    }

    /**
     * 获取收货地址
     * @return string $consigneeAddress 收货地址
     */
    public function getConsigneeAddress()
    {
        return $this->consigneeAddress;
    }

    /**
     * 设置收货地址所在省
     * @param \Area\Model\Area $province 收货地址所在省
     */
    public function setProvince(\Area\Model\Area $province)
    {
        $this->province = $province;
    }

    /**
     * 获取收货地址所在省
     * @return \Area\Model\Area $province 收货地址所在省
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * 设置收货地址所在市
     * @param \Area\Model\Area $city 收货地址所在市
     */
    public function setCity(\Area\Model\Area $city)
    {
        $this->city = $city;
    }

    /**
     * 获取收货地址所在市
     * @return \Area\Model\Area $city 收货地址所在市
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * 设置收货地址所在区
     * @param \Area\Model\Area $district 收货地址所在区
     */
    public function setDistrict(\Area\Model\Area $district)
    {
        $this->district = $district;
    }

    /**
     * 获取收货地址所在区
     * @return \Area\Model\Area $district 收货地址所在区
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * 设置收货人联系电话
     * @param string $consigneePhone 收货人联系电话
     */
    public function setConsigneePhone(string $consigneePhone)
    {
        $this->consigneePhone = $consigneePhone;
    }

    /**
     * 获取收货人联系电话
     * @return string $consigneePhone 收货人联系电话
     */
    public function getConsigneePhone()
    {
        return $this->consigneePhone;
    }

    /**
     * 设置收货人地址邮政编码
     * @param string $consigneePostalCode 收货人地址邮政编码
     */
    public function setConsigneePostalCode(string $consigneePostalCode)
    {
        $this->consigneePostalCode = $consigneePostalCode;
    }

    /**
     * 获取收货人地址邮政编码
     * @return string $consigneePostalCode 收货人地址邮政编码
     */
    public function getConsigneePostalCode()
    {
        return $this->consigneePostalCode;
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
     * 设置更新时间
     * @param int $updateTime 更新时间
     */
    public function setUpdateTime(int $updateTime)
    {
        $this->updateTime = $updateTime;
    }

    /**
     * 获取更新时间
     * @return int $updateTime 更新时间
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    /**
     * 设置快照版本
     * @param string $version 快照版本
     */
    public function setVersion(string $version)
    {
        $this->version = $version;
    }

    /**
     * 获取快照版本
     * @return string $version 快照版本
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * 设置状态
     * @param int $status 状态
     */
    public function setStatus(int $status)
    {
        $this->status= in_array($status, array(STATUS_NORMAL,STATUS_DELETE)) ? $status : STATUS_NORMAL;
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
     * 添加配送地址
     */
    public function add()
    {
        //调用添加命令
        $command = Core::$_container->call(['Web\Command\DeliveredInformation\DeliveredInformationCommandFactory','createCommand'], ['type'=>'add','data'=>$this]);
        return $command->execute();
    }

    /**
     * 编辑配送地址
     */
    public function edit()
    {
        //调用添加命令
        $command = Core::$_container->call(['Web\Command\DeliveredInformation\DeliveredInformationCommandFactory','createCommand'], ['type'=>'edit','data'=>$this]);
        return $command->execute();
    }

    /**
     * 删除配送地址
     */
    public function delete()
    {
        //调用添加命令
        $command = Core::$_container->call(['Web\Command\DeliveredInformation\DeliveredInformationCommandFactory','createCommand'], ['type'=>'delete','data'=>$this]);
        return $command->execute();
    }
}
