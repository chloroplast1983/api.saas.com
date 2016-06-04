<?php
namespace Product\Service;

use GenericTestCase;

/**
 * Product\Service\CommonProductService.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.23
 */

class CommonProductServiceTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Product\Service\CommonProductService(new \Product\Model\Product());
    }

    /**
     * CommonProductService 通用商品角色,测试构造函数
     */
    public function testCommonProductServiceConstructor()
    {
        //测试初始化商品分类对象
        $productTypeParameter = $this->getPrivateProperty('Product\Service\CommonProductService', 'productType');
        $this->assertInstanceOf('Web\Model\ProductType', $productTypeParameter->getValue($this->stub));

        //测试初始化商品对象
        $productParameter = $this->getPrivateProperty('Product\Service\CommonProductService', 'product');
        $this->assertInstanceOf('Product\Model\Product', $productParameter->getValue($this->stub));
    }


    //productType 测试 ------------------------------------------------- start
    /**
     * 设置 CommonProductService setProductType() 正确的传参类型,期望传值正确
     */
    public function testSetProductTypeCorrectType()
    {
        $object = new \Web\Model\ProductType();         //根据需求自己添加对象的设置,如果需要
        $this->stub->setProductType($object);
        $this->assertSame($object, $this->stub->getProductType());
    }

    /**
     * 设置 CommonProductService setProductType() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetProductTypeWrongType()
    {
        $this->stub->setProductType('string');
    }
    //productType 测试 -------------------------------------------------   end

    //product 测试 ----------------------------------------------------- start
    /**
     * 设置 CommonProductService setProduct() 正确的传参类型,期望传值正确
     */
    public function testSetProductCorrectType()
    {
        $object = new \Product\Model\Product();         //根据需求自己添加对象的设置,如果需要
        $this->stub->setProduct($object);
        $this->assertSame($object, $this->stub->getProduct());
    }

    /**
     * 设置 CommonProductService setProduct() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetProductWrongType()
    {
        $this->stub->setProduct('string');
    }
    //product 测试 -----------------------------------------------------   end

    //CommonProductPrice 测试 ------------------------------------------- start
    /**
     * 设置 CommonProductService attachProductPrice() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testAttachProductPriceWrongType()
    {
        $this->stub->attachProductPrice('string');
    }
    //CommonProductPrice 测试 --------------------------------------------- end
}
