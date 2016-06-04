<?php
namespace Product\Service;

use GenericTestCase;
use Product\Model\ProductPrice;
use Product\Model\Product;

/**
 * Product\Service\CommonProductPriceService.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.23
 */

class CommonProductPriceServiceTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Product\Service\CommonProductPriceService(new ProductPrice());

    }

    /**
     * CommonProductPriceService 通用商品价格角色,测试引用接口正确
     */
    public function testCommonProductPriceImplementInterFace()
    {
        $this->assertInstanceOf('Product\Service\ProductPriceInterface', $this->stub);
    }

    /**
     * CommonProductPriceService 通用商品价格角色,测试构造函数
     */
    public function testCommonProductPriceServiceConstructor()
    {

        //测试初始化规格
        $specificationParameter = $this->getPrivateProperty('Product\Service\CommonProductPriceService', 'specification');
        $this->assertEmpty($specificationParameter->getValue($this->stub));

        //测试初始化价格
        $productPriceParameter = $this->getPrivateProperty('Product\Service\CommonProductPriceService', 'productPrice');
        $this->assertInstanceOf('Product\Model\ProductPrice', $productPriceParameter->getValue($this->stub));

    }

    //specification 测试 ----------------------------------------------- start
    /**
     * 设置 CommonProductPriceService setSpecification() 正确的传参类型,期望传值正确
     */
    public function testSetSpecificationCorrectType()
    {
        $this->stub->setSpecification('string');
        $this->assertEquals('string', $this->stub->getSpecification());
    }

    /**
     * 设置 CommonProductPriceService setSpecification() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetSpecificationWrongType()
    {
        $this->stub->setSpecification(array(1,2,3));
    }
    //specification 测试 -----------------------------------------------   end

    //productPrice 测试 -----------------------------------------------  start
    /**
     * 设置 CommonProductPriceService setProductPrice() 正确的传参类型,期望传值正确
     */
    public function testSetProductPriceCorrectType()
    {
        $object = new ProductPrice();       //根据需求自己添加对象的设置,如果需要
        $this->stub->setProductPrice($object);
        $this->assertSame($object, $this->stub->getProductPrice());
    }

    /**
     * 设置 CommonProductPriceService setProductPrice() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetProductPriceWrongType()
    {
        $this->stub->setProductPrice('string');
    }
    //productPrice 测试 ------------------------------------------------   end
}
