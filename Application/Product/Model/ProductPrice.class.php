<?php
namespace Product\Model;

use Product\Model\Product;

/**
 * ProductPrice 商品价格父类领域对象
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 * @todo updateTime
 */

class ProductPrice
{

    /**
     * @var int $id 商品价格id
     */
    private $id;
    /**
     * @var /Product/Model/Product $product 商品对象
     */
    // private $product;
    /**
     * @var int $createTime 添加时间
     */
    private $createTime;
    /**
     * @var int $statusTime 状态变更时间
     */
    private $statusTime;
    /**
     * @var int $status 状态
     */
    private $status;
    /**
     * @var int $price 价格
     */
    private $price;


    /**
     * ProductPrice 商品价格父类领域对象 构造函数
     */
    public function __construct(int $id = 0)
    {
        global $_FWGLOBAL;
        $this->id = !empty($id) ? $id : 0;
        // $this->product = '';
        $this->createTime = $_FWGLOBAL['timestamp'];
        $this->statusTime = $_FWGLOBAL['timestamp'];
        $this->status = STATUS_NORMAL;
        $this->price = 0;
    }

    /**
     * ProductPrice 商品价格父类领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->id);
        // unset($this->product);
        unset($this->createTime);
        unset($this->statusTime);
        unset($this->status);
        unset($this->price);
    }

    /**
     * 设置商品价格id
     * @param int $id 商品价格id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * 获取商品价格id
     * @return int $id 商品价格id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 设置商品对象
     * @param \Product\Model\Product $product 商品对象
     */
    // public function setProduct(Product $product){
    // 	$this->product = $product;
    // }

    /**
     * 获取商品对象
     * @return /Product/Model/Product $product 商品对象
     */
    // public function getProduct(){
    // 	return $this->product;
    // }

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
     * 设置价格
     * @param int $price 价格
     */
    public function setPrice(int $price)
    {
        $this->price = $price;
    }

    /**
     * 获取价格
     * @return int $price 价格
     */
    public function getPrice()
    {
        return $this->price;
    }
}
