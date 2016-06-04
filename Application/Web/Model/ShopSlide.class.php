<?php
namespace Web\Model;

use Web\Model\Shop;

/**
 * ShopSlide 网店幻灯片领域对象
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class ShopSlide
{

    /**
     * @var int $id 幻灯片id
     */
    private $id;
    /**
     * @var /Web/Model/Shop $shop 店铺
     */
    // private $shop;
    /**
     * @var int $slide 幻灯片图片id
     */
    private $slide;
    /**
     * @var int $createTime 幻灯片添加时间
     */
    private $createTime;
    /**
     * @var int $statusTime 幻灯片状态变更时间
     */
    private $statusTime;
    /**
     * @var int $status 幻灯片状态
     */
    private $status;

    /**
     * ShopSlide 网店幻灯片领域对象 构造函数
     */
    public function __construct(int $id = 0)
    {
        global $_FWGLOBAL;
        $this->id = !empty($id) ? $id : 0;
        // $this->shop = '';
        $this->slide = 0;
        $this->createTime = $_FWGLOBAL['timestamp'];
        $this->statusTime = $_FWGLOBAL['timestamp'];
        $this->status = STATUS_NORMAL;
    }

    /**
     * ShopSlide 网店幻灯片领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->id);
        // unset($this->shop);
        unset($this->slide);
        unset($this->createTime);
        unset($this->statusTime);
        unset($this->status);
    }

    /**
     * 设置幻灯片id
     * @param int $id 幻灯片id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * 获取幻灯片id
     * @return int $id 幻灯片id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 设置店铺
     * @param \Web\Model\Shop $shop 店铺
     */
    // public function setShop(Shop $shop){
    // 	$this->shop = $shop;
    // }

    /**
     * 获取店铺
     * @return /Web/Model/Shop $shop 店铺
     */
    // public function getShop(){
    // 	return $this->shop;
    // }

    /**
     * 设置幻灯片图片id
     * @param int $slide 幻灯片图片id
     */
    public function setSlide(int $slide)
    {
        $this->slide = $slide;
    }

    /**
     * 获取幻灯片图片id
     * @return int $slide 幻灯片图片id
     */
    public function getSlide()
    {
        return $this->slide;
    }

    /**
     * 设置幻灯片添加时间
     * @param int $createTime 幻灯片添加时间
     */
    public function setCreateTime(int $createTime)
    {
        $this->createTime = $createTime;
    }

    /**
     * 获取幻灯片添加时间
     * @return int $createTime 幻灯片添加时间
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * 设置幻灯片状态变更时间
     * @param int $statusTime 幻灯片状态变更时间
     */
    public function setStatusTime(int $statusTime)
    {
        $this->statusTime = $statusTime;
    }

    /**
     * 获取幻灯片状态变更时间
     * @return int $statusTime 幻灯片状态变更时间
     */
    public function getStatusTime()
    {
        return $this->statusTime;
    }

    /**
     * 设置幻灯片状态
     * @param int $status 幻灯片状态
     */
    public function setStatus(int $status)
    {
        $this->status= in_array($status, array(STATUS_NORMAL,STATUS_DELETE)) ? $status : STATUS_NORMAL;
    }

    /**
     * 获取幻灯片状态
     * @return int $status 幻灯片状态
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * 添加
     */
    public function addToShop(Shop $shop)
    {
         //调用添加命令
        $command = Core::$_container->call(['Web\Command\ShopSlide\ShopSlideCommandFactory','createCommand'], ['type'=>'add','data'=>$this,'target'=>$shop]);
        return $command->execute();
    }

    /**
     * 删除
     */
    public function deleteFromShop(Shop $shop)
    {
         //调用删除命令
        $command = Core::$_container->call(['Web\Command\ShopSlide\ShopSlideCommandFactory','createCommand'], ['type'=>'delete','data'=>$this,'target'=>$shop]);
        return $command->execute();
    }
}
