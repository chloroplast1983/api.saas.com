<?php
namespace Trade\Model;

use Core;

/**
 * Order order订单领域对象
 * @author chloroplast
 * @version 1.0.0:2016.04.21
 */

class Order
{

    /**
     * @var int $id 订单id
     */
    private $id;
    /**
     * @var int $updateTime 订单更新时间
     */
    private $updateTime;
    /**
     * @var int $createTime 订单添加时间
     */
    private $createTime;
    /**
     * @var int $statusTime 订单状态变更时间
     */
    private $statusTime;
    /**
     * @var int $payTime 订单状态支付时间
     */
    private $payTime;
    /**
     * @var int $status 订单状态
     */
    private $status;
    /**
     * @var int $payType 订单支付类型
     */
    private $payType;
    /**
     * @var int $price 订单价格
     */
    private $price;
    /**
     * @var \User\Model\User $vendor 订单卖家
     */
    private $vendor;
    /**
     * @var \Web\Model\Guest $guest 订单买家
     */
    private $guest;
    /**
     * @var \Trade\Model\OrderProduct $orderProductList 商品列表
     */
    private $orderProductList;
    /**
     * @var int $category 订单类型
     */
    private $category;

    /**
     * Order order订单领域对象 构造函数
     */
    public function __construct(int $id = 0)
    {
        global $_FWGLOBAL;
        $this->id = !empty($id) ? $id : 0;
        $this->updateTime = $_FWGLOBAL['timestamp'];
        $this->createTime = $_FWGLOBAL['timestamp'];
        $this->statusTime = $_FWGLOBAL['timestamp'];
        $this->payTime = 0;
        $this->status = ORDER_STATUS_WAIT_PAY;
        $this->payType = PAY_TYPE_UNDEFINED;//这里多加了一种类型,还未测试
        $this->category = ORDER_CATEGORY_COMMON;
        $this->price = 0;
        $this->vendor = 0;
        $this->guest = 0;
        $this->productList = array();
    }

    /**
     * Order order订单领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->id);
        unset($this->updateTime);
        unset($this->createTime);
        unset($this->statusTime);
        unset($this->payTime);
        unset($this->status);
        unset($this->payType);
        unset($this->price);
        unset($this->vendor);
        unset($this->guest);
        unset($this->productList);
        unset($this->category);
    }

    /**
     * 设置订单id
     * @param int $id 订单id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * 获取订单id
     * @return int $id 订单id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 设置订单更新时间
     * @param int $updateTime 订单更新时间
     */
    public function setUpdateTime(int $updateTime)
    {
        $this->updateTime = $updateTime;
    }

    /**
     * 获取订单更新时间
     * @return int $updateTime 订单更新时间
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    /**
     * 设置订单添加时间
     * @param int $createTime 订单添加时间
     */
    public function setCreateTime(int $createTime)
    {
        $this->createTime = $createTime;
    }

    /**
     * 获取订单添加时间
     * @return int $createTime 订单添加时间
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * 设置订单状态变更时间
     * @param int $statusTime 订单状态变更时间
     */
    public function setStatusTime(int $statusTime)
    {
        $this->statusTime = $statusTime;
    }

    /**
     * 获取订单状态变更时间
     * @return int $statusTime 订单状态变更时间
     */
    public function getStatusTime()
    {
        return $this->statusTime;
    }

    /**
     * 设置订单状态支付时间
     * @param int $payTime 订单状态支付时间
     */
    public function setPayTime(int $payTime)
    {
        $this->payTime = $payTime;
    }

    /**
     * 获取订单状态支付时间
     * @return int $payTime 订单状态支付时间
     */
    public function getPayTime()
    {
        return $this->payTime;
    }

    /**
     * 设置订单状态
     * @param int $status 订单状态
     */
    public function setStatus(int $status)
    {
        $this->status= in_array($status, array(ORDER_STATUS_WAIT_PAY,ORDER_STATUS_GUEST_CANCEL,ORDER_STATUS_VENDOR_CANCEL,ORDER_STATUS_AUTO_CANCEL,ORDER_STATUS_PAY,ORDER_STATUS_WAIT_CONFIRM_PAY,ORDER_STATUS_SUCESS)) ? $status : ORDER_STATUS_WAIT_PAY;
    }

    /**
     * 获取订单状态
     * @return int $status 订单状态
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * 设置订单支付类型
     * @param int $payType 订单支付类型
     */
    public function setPayType(int $payType)
    {
        $this->payType= in_array($payType, array(PAY_TYPE_CHENGXINYOU_PAYMENT,PAY_TYPE_OFFLINE_PAYMENT)) ? $payType : PAY_TYPE_OFFLINE_PAYMENT;
    }

    /**
     * 获取订单支付类型
     * @return int $payType 订单支付类型
     */
    public function getPayType()
    {
        return $this->payType;
    }

    /**
     * 设置订单类型
     * @param int $category 订单类型
     */
    public function setCategory(int $category)
    {
        $this->category= in_array($category, array(ORDER_CATEGORY_TOURIST,ORDER_CATEGORY_COMMON)) ? $category : ORDER_CATEGORY_COMMON;
    }

    /**
     * 获取订单类型
     * @return int $category 订单状态
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * 设置订单价格
     * @param int $price 订单价格
     */
    public function setPrice(int $price)
    {
        $this->price = $price;
    }

    /**
     * 获取订单价格
     * @return int $price 订单价格
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * 设置订单卖家
     * @param \User\Model\User $vendor 订单卖家
     */
    public function setVendor(\User\Model\User $vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * 获取订单卖家
     * @return \User\Model\User $vendor 订单卖家
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * 设置订单买家
     * @param \Web\Model\Guest $guest 订单买家
     */
    public function setGuest(\Web\Model\Guest $guest)
    {
        $this->guest = $guest;
    }

    /**
     * 获取订单买家
     * @return \Web\Model\Guest $guest 订单买家
     */
    public function getGuest()
    {
        return $this->guest;
    }

    /**
     * 添加订单商品
     * @param array $product
     */
    public function attachProduct(\Trade\Model\OrderProduct $product)
    {
        $this->productList[] = $product;
    }

    /**
     * 获取订单中的商品列表
     * @return array $productList
     */
    public function getProductList()
    {
        return $this->productList;
    }

    /**
     * 添加订单
     */
    public function add()
    {
        //计算订单总价

        //调用添加命令
        $command = Core::$_container->call(['Trade\Command\Order\OrderCommandFactory','createCommand'], ['type'=>'add','data'=>$this]);
        if (!$command->execute()) {
            //订单添加失败返回false
            return false;
        }
        //添加订单商品
        $productList = $this->getProductList();
        if (empty($productList)) {
            //无订单商品返回false
            return false;
        }
        foreach ($productList as $product) {
            if (!$product->addToOrder($this)) {
                return false;
            }
        }
        return true;
    }

    /**
     * 计算订单总价
     */
    // private function calculatePrice(){

    // 	$productList = $this->getProductList();
 //        if(empty($productList)){
 //        	//无订单商品发挥false
 //        	return false;
 //        }
 //        foreach($productList as $product){
 //        	// $this->price += $product->getProductPrice()->
 //        }
    // }

    /**
     * 支付订单
     */
    public function pay()
    {
        global $_FWGLOBAL;
        $this->setPayTime($_FWGLOBAL['timestamp']);
        //调用命令
        $command = Core::$_container->call(['Trade\Command\Order\OrderCommandFactory','createCommand'], ['type'=>'pay','data'=>$this]);
        return $command->execute();
    }

    /**
     * 买家取消订单
     */
    public function guestCancel()
    {
        //调用命令
        $command = Core::$_container->call(['Trade\Command\Order\OrderCommandFactory','createCommand'], ['type'=>'guestCancel','data'=>$this]);
        return $command->execute();
    }

    /**
     * 卖家取消订单
     */
    public function vendorCancel()
    {
        //调用命令
        $command = Core::$_container->call(['Trade\Command\Order\OrderCommandFactory','createCommand'], ['type'=>'vendorCacel','data'=>$this]);
        return $command->execute();
    }

    /**
     * 确认支付订单
     */
    public function confirmPay()
    {
        //调用命令
        $command = Core::$_container->call(['Trade\Command\Order\OrderCommandFactory','createCommand'], ['type'=>'confirmPay','data'=>$this]);
        return $command->execute();
    }
}
