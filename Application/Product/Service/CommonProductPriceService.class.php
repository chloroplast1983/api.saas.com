<?php
namespace Product\Service;

use Product\Model\ProductPrice;
use Product\Model\Product;
use Core;

/**
 * CommonProductPriceService 通用商品价格角色
 * @author chloroplast
 * @version 1.0.0:2016.04.23
 */

class CommonProductPriceService implements ProductPriceInterface
{

    /**
     * @var Product\Model\ProductPrice 商品价格
     */
    private $productPrice;

    /**
     * @var string $specification 规格
     */
    private $specification;

    /**
     * CommonProductPriceService 通用商品价格角色 构造函数
     */
    public function __construct(ProductPrice $productPrice)
    {
        $this->productPrice = $productPrice;
        $this->specification = '';
    }

    /**
     * CommonProductPriceService 通用商品价格角色 析构函数
     */
    public function __destruct()
    {
        unset($this->productPrice);
        unset($this->specification);
    }

    /**
     * 设定商品价格
     */
    public function setProductPrice(ProductPrice $productPrice)
    {
        $this->productPrice = $productPrice;
    }

    /**
     * 返回商品价格
     */
    public function getProductPrice()
    {
        return $this->productPrice;
    }

    /**
     * 设置规格
     * @param string $specification 规格
     */
    public function setSpecification(string $specification)
    {
        $this->specification = $specification;
    }

    /**
     * 获取规格
     * @return string $specification 规格
     */
    public function getSpecification()
    {
        return $this->specification;
    }

    /**
     * 添加通用商品价格
     */
    public function addToProduct(Product $product)
    {
        //调用注册命令
        $command = Core::$_container->call(['Product\Command\CommonProductPrice\CommonProductPriceCommandFactory','createCommand'], ['type'=>'add','data'=>$this,'target'=>$product]);
        return $command->execute();
    }
    /**
     * 编辑通用商品价格
     */
    public function editFromProduct(Product $product)
    {
        //调用注册命令
        $command = Core::$_container->call(['Product\Command\CommonProductPrice\CommonProductPriceCommandFactory','createCommand'], ['type'=>'edit','data'=>$this,'target'=>$product]);
        return $command->execute();
    }

    /**
     * 删除通用商品价格
     */
    public function deleteFromProduct(Product $product)
    {
                //调用注册命令
        $command = Core::$_container->call(['Product\Command\CommonProductPrice\CommonProductPriceCommandFactory','createCommand'], ['type'=>'delete','data'=>$this,'target'=>$product]);
        return $command->execute();
    }
}
