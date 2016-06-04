<?php
namespace Web\Model;

/**
 * CrewGroup 网店员工组领域对象
 * @author chloroplast
 * @version 1.0.0:2016.04.28
 */

class CrewGroup
{

    /**
     * @var int $id 网店员工组id
     */
    private $id;
    /**
     * @var string $name 员工组名称
     */
    private $name;
    /**
     * @var int $createTime 添加时间
     */
    private $createTime;
    /**
     * @var int $updateTime 更新时间
     */
    private $updateTime;
    /**
     * @var string $purview 权限
     */
    private $purview;
    /**
     * @var int $statusTime 状态变更时间
     */
    private $statusTime;
    /**
     * @var int $status 状态
     */
    private $status;

    /**
     * CrewGroup 网店员工组领域对象 构造函数
     */
    public function __construct()
    {
        global $_FWGLOBAL;
        $this->id = 0;
        $this->name = '';
        $this->createTime = $_FWGLOBAL['timestamp'];
        $this->updateTime = $_FWGLOBAL['timestamp'];
        $this->purview = '';
        $this->statusTime = $_FWGLOBAL['timestamp'];
        $this->status = STATUS_NORMAL;
    }

    /**
     * CrewGroup 网店员工组领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->id);
        unset($this->name);
        unset($this->createTime);
        unset($this->updateTime);
        unset($this->purview);
        unset($this->statusTime);
        unset($this->status);
    }

    /**
     * 设置网店员工组id
     * @param int $id 网店员工组id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * 获取网店员工组id
     * @return int $id 网店员工组id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 设置员工组名称
     * @param string $name 员工组名称
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * 获取员工组名称
     * @return string $name 员工组名称
     */
    public function getName()
    {
        return $this->name;
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
     * 设置权限
     * @param string $purview 权限
     */
    public function setPurview(string $purview)
    {
        $this->purview = $purview;
    }

    /**
     * 获取权限
     * @return string $purview 权限
     */
    public function getPurview()
    {
        return $this->purview;
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
     * 添加员工组
     */
    public function add()
    {
        //调用添加命令
        $command = Core::$_container->call(['Web\Command\CrewGroup\CrewGroupCommandFactory','createCommand'], ['type'=>'add','data'=>$this]);
        return $command->execute();
    }

    /**
     * 编辑员工组
     */
    public function edit()
    {
        //调用编辑命令
        $command = Core::$_container->call(['Web\Command\CrewGroup\CrewGroupCommandFactory','createCommand'], ['type'=>'edit','data'=>$this]);
        return $command->execute();
    }

    /**
     * 删除员工组
     */
    public function delete()
    {
        //调用删除命令
        $command = Core::$_container->call(['Web\Command\CrewGroup\CrewGroupCommandFactory','createCommand'], ['type'=>'delete','data'=>$this]);
        return $command->execute();
    }
}
