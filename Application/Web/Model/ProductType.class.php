<?php
namespace Web\Model;

/**
 * ProductType 用户自定义商品分类领域对象
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class ProductType
{

    /**
     * @var int $id 商品id
     */
    private $id;
    /**
     * @var string $name 商品分类名称
     */
    private $name;
    /**
     * @var \User\Model\User $user 商品用户
     */
    private $user;
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
     * ProductType 用户自定义商品分类领域对象 构造函数
     */
    public function __construct(int $id = 0)
    {
        global $_FWGLOBAL;
        $this->id = !empty($id) ? $id : 0;
        $this->name = '';
        $this->user = '';
        $this->createTime = $_FWGLOBAL['timestamp'];
        $this->updateTime = $_FWGLOBAL['timestamp'];
        $this->statusTime = $_FWGLOBAL['timestamp'];
        $this->status = STATUS_NORMAL;
    }

    /**
     * ProductType 用户自定义商品分类领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->id);
        unset($this->name);
        unset($this->user);
        unset($this->createTime);
        unset($this->updateTime);
        unset($this->statusTime);
        unset($this->status);
    }

    /**
     * 设置商品id
     * @param int $id 商品id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * 获取商品id
     * @return int $id 商品id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 设置商品分类名称
     * @param string $name 商品分类名称
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * 获取商品分类名称
     * @return string $name 商品分类名称
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * 设置商品用户
     * @param \User\Model\User $user 商品用户
     */
    public function setUser(\User\Model\User $user)
    {
        $this->user = $user;
    }

    /**
     * 获取商品用户
     * @return \User\Model\User $user 商品用户
     */
    public function getUser()
    {
        return $this->user;
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
     * 添加
     */
    public function add()
    {
         //调用添加命令
        $command = Core::$_container->call(['Web\Command\ProductType\ProductTypeCommandFactory','createCommand'], ['type'=>'add','data'=>$this]);
        return $command->execute();
    }

    /**
     * 编辑
     */
    public function edit()
    {
         //调用编辑命令
        $command = Core::$_container->call(['Web\Command\ProductType\ProductTypeCommandFactory','createCommand'], ['type'=>'edit','data'=>$this]);
        return $command->execute();
    }

    /**
     * 删除
     */
    public function delete()
    {
         //调用编辑命令
        $command = Core::$_container->call(['Web\Command\ProductType\ProductTypeCommandFactory','createCommand'], ['type'=>'delete','data'=>$this]);
        return $command->execute();
    }
}
