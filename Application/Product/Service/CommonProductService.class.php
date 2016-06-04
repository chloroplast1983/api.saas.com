<?php
namespace Product\Service;

use Product\Model\Product;
use Web\Model\ProductType;

/**
 * CommonProductService 通用商品角色
 * @author chloroplast
 * @version 1.0.0:2016.04.23
 */

class CommonProductService implements ProductInterface
{

    /**
     * @var \Web\Model\ProductType $productType 商品分类对象
     */
    private $productType;
    /**
     * @var \Product\Model\Product $product 商品对象
     */
    private $product;
    /**
     * @var array $productPriceList 商品价格列表
     */
    private $productPriceList;

    /**
     * CommonProductService 通用商品角色 构造函数
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->productType = new ProductType();
        $this->productPriceList = array();
    }

    /**
     * CommonProductService 通用商品角色 析构函数
     */
    public function __destruct()
    {
        unset($this->productType);
        unset($this->product);
        unset($this->productPriceList);
    }

    /**
     * 设置商品分类对象
     * @param \Web\Model\ProductType $productType 商品分类对象
     */
    public function setProductType(\Web\Model\ProductType $productType)
    {
        $this->productType = $productType;
    }

    /**
     * 获取商品分类对象
     * @return \Web\Model\ProductType $productType 商品分类对象
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * 设置商品对象
     * @param \Product\Model\Product $product 商品对象
     */
    public function setProduct(\Product\Model\Product $product)
    {
        $this->product = $product;
    }

    /**
     * 获取商品对象
     * @return \Product\Model\Product $product 商品对象
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * 添加通用商品价格到商品类内
     * @param \Product\Service\CommonProductPriceService $commonProductPrice 通用商品价格
     */
    public function attachProductPrice(\Product\Service\CommonProductPriceService $commonProductPrice)
    {
        $this->productPriceList[] = $commonProductPrice;
    }

    /**
     * 返回通用商品的商品价格
     */
    public function getProductPriceList()
    {
        return $this->productPriceList;
    }

    /**
     * 添加商品
     */
    public function addProduct()
    {
        //添加分类映射关系,暂时不做
        return $this->product->add();
        ;
    }

    /**
     * 编辑商品
     */
    public function editProduct()
    {
        return $this->product->edit();
    }

    /**
     * 删除商品
     */
    public function deleteProduct()
    {
        return $this->product->delete();
    }

    /**
     * 上架商品
     */
    public function on()
    {
        return $this->product->on();
    }

    /**
     * 下架商品
     */
    public function off()
    {
        return $this->product->off();
    }

    /**
     * 添加价格
     */
    public function addPrice(\Product\Service\ProductPriceInterface $productPrice)
    {
        return $productPrice->addPriceToProduct($this);
    }

    /**
     * 删除价格
     */
    public function deletePrice(\Product\Service\ProductPriceInterface $productPrice)
    {
        return $productPrice->deletePriceToProduct($this);
    }

    /**
     * 编辑价格
     */
    public function editPrice(\Product\Service\ProductPriceInterface $productPrice)
    {
        return $productPrice->edit($this);
    }
}
