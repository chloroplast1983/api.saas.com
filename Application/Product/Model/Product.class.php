<?php
namespace Product\Model;

use Core;
use System\Classes\Transaction;

/**
 * Product 商品领域对象
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */

class Product
{

    /**
     * @var int $id 商品id
     */
    private $id;
    /**
     * @var \User\Model\User $user 商品用户
     */
    private $user;
    /**
     * @var string $name 商户名称
     */
    private $name;
    /**
     * @var int $updateTime 商品更新时间
     */
    private $updateTime;
    /**
     * @var int $createTime 商品添加时间
     */
    private $createTime;
    /**
     * @var int $statusTime 商品状态变更时间
     */
    private $statusTime;
    /**
     * @var int $status 商品状态
     */
    private $status;
    /**
     * @var int $category 商品类型
     */
    private $category;
    /**
     * @var string $feature 商品特色
     */
    private $feature;
    /**
     * @var string $description 商品描述
     */
    private $description;
    /**
     * @var array 商品幻灯片列表
     */
    private $productSlideList;

    /**
     * Product 商品领域对象 构造函数
     */
    public function __construct(int $id = 0)
    {
        global $_FWGLOBAL;
        $this->id = !empty($id) ? $id : 0;
        $this->user = '';
        $this->name = '';
        $this->updateTime = $_FWGLOBAL['timestamp'];
        $this->createTime = $_FWGLOBAL['timestamp'];
        $this->statusTime = $_FWGLOBAL['timestamp'];
        $this->status = PRODUCT_STATUS_IN_STOCK;
        $this->category = PRODUCT_CATEGORY_COMMON;
        $this->feature = '';
        $this->description = '';
        $this->productSlideList = array();
    }

    /**
     * Product 商品领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->id);
        unset($this->user);
        unset($this->name);
        unset($this->updateTime);
        unset($this->createTime);
        unset($this->statusTime);
        unset($this->status);
        unset($this->category);
        unset($this->feature);
        unset($this->description);
        unset($this->productSlideList);
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
     * 设置商户名称
     * @param string $name 商户名称
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * 获取商户名称
     * @return string $name 商户名称
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * 设置商品更新时间
     * @param int $updateTime 商品更新时间
     */
    public function setUpdateTime(int $updateTime)
    {
        $this->updateTime = $updateTime;
    }

    /**
     * 获取商品更新时间
     * @return int $updateTime 商品更新时间
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    /**
     * 设置商品添加时间
     * @param int $createTime 商品添加时间
     */
    public function setCreateTime(int $createTime)
    {
        $this->createTime = $createTime;
    }

    /**
     * 获取商品添加时间
     * @return int $createTime 商品添加时间
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * 设置商品状态变更时间
     * @param int $statusTime 商品状态变更时间
     */
    public function setStatusTime(int $statusTime)
    {
        $this->statusTime = $statusTime;
    }

    /**
     * 获取商品状态变更时间
     * @return int $statusTime 商品状态变更时间
     */
    public function getStatusTime()
    {
        return $this->statusTime;
    }

    /**
     * 设置商品状态
     * @param int $status 商品状态
     */
    public function setStatus(int $status)
    {
        $this->status= in_array($status, array(PRODUCT_STATUS_IN_STOCK,PRODUCT_STATUS_ON_SALE,PRODUCT_STATUS_DELETE,PRODUCT_STATUS_PERMANENTLY_DELETE)) ? $status : PRODUCT_STATUS_IN_STOCK;
    }

    /**
     * 获取商品状态
     * @return int $status 商品状态
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * 设置商品类型
     * @param int $category 商品类型
     */
    public function setCategory(int $category)
    {
        $this->category= in_array($category, array(PRODUCT_CATEGORY_TOURIST,PRODUCT_CATEGORY_TICKET,PRODUCT_CATEGORY_COMMON)) ? $category : PRODUCT_CATEGORY_COMMON;
    }

    /**
     * 获取商品类型
     * @return int $category 商品类型
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * 设置商品特色
     * @param string $feature 商品特色
     */
    public function setFeature(string $feature)
    {
        $this->feature = $feature;
    }

    /**
     * 获取商品特色
     * @return string $feature 商品特色
     */
    public function getFeature()
    {
        return $this->feature;
    }

    /**
     * 设置商品描述
     * @param string $description 商品描述
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * 获取商品描述
     * @return string $description 商品描述
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * 添加商品幻灯片
     * @todo 还未测试
     * @param array $productSlide
     */
    public function attachProductSlideList(\Product\Model\ProductSlide $productSlide)
    {
        $this->productSlideList[] = $productSlide;
    }

    /**
     * 设置商品幻灯片
     */
    public function setProductSlideList(array $productSlideList)
    {
        $this->productSlideList = $productSlideList;
    }

    /**
     * 获取店铺产品分类
     */
    public function getProductSlideList()
    {
        return $this->productSlideList;
    }

    /**
     * 添加商品
     */
    public function add()
    {
         //调用添加命令
        Transaction::beginTransaction();
        $command = Core::$_container->call(['Product\Command\Product\ProductCommandFactory','createCommand'], ['type'=>'add','data'=>$this]);
        if (!$command->execute()) {
            Transaction::rollBack();
            return false;
        }
        //添加幻灯片
        if (!empty($this->getProductSlideList())) {
            foreach ($this->getProductSlideList() as $productSlide) {
                if (!$productSlide->addToProduct($this)) {
                    Transaction::rollBack();
                    return false;
                }
            }
        }
        Transaction::Commit();
        return true;
    }

    /**
     * 删除商品
     */
    public function delete()
    {
         //调用添加命令
        $command = Core::$_container->call(['Product\Command\Product\ProductCommandFactory','createCommand'], ['type'=>'delete','data'=>$this]);
        return $command->execute();
    }

    /**
     * 编辑商品
     */
    public function edit()
    {
         //调用添加命令
        $command = Core::$_container->call(['Product\Command\Product\ProductCommandFactory','createCommand'], ['type'=>'edit','data'=>$this]);
        return $command->execute();
    }

    /**
     * 下架商品
     */
    public function off()
    {
         //调用添加命令
        $command = Core::$_container->call(['Product\Command\Product\ProductCommandFactory','createCommand'], ['type'=>'off','data'=>$this]);
        return $command->execute();
    }

    /**
     * 上架商品
     */
    public function on()
    {
         //调用添加命令
        $command = Core::$_container->call(['Product\Command\Product\ProductCommandFactory','createCommand'], ['type'=>'on','data'=>$this]);
        return $command->execute();
    }

    /**
     * 添加商品幻灯片
     */
    public function addSlide(\Product\Model\ProductSlide $productSlide)
    {
        //添加店铺幻灯片
        return $productSlide->addToProduct($this);
    }

    /**
     * 删除商品幻灯片
     */
    public function deleteSlide(\Product\Model\ProductSlide $productSlide)
    {
        return $productSlide->deleteFromProduct($this);
    }
}
