<?php
namespace Trade\Model;

use GenericTestCase;

/**
 * Trade\Model\CartProduct.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class CartProductTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Trade\Model\CartProduct();
    }

    /**
     * Cart 购物车领域对象,测试构造函数
     */
    public function testCartConstructor()
    {
        //测试初始化购物车id
        $idParameter = $this->getPrivateProperty('Trade\Model\CartProduct', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化购物车数量
        $numberParameter = $this->getPrivateProperty('Trade\Model\CartProduct', 'number');
        $this->assertEquals(0, $numberParameter->getValue($this->stub));

        //测试初始化商品对象
        $productParameter = $this->getPrivateProperty('Trade\Model\CartProduct', 'product');
        $this->assertEmpty($productParameter->getValue($this->stub));

        //测试初始化添加时间
        $createTimeParameter = $this->getPrivateProperty('Trade\Model\CartProduct', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化商品价格对象
        $productPriceParameter = $this->getPrivateProperty('Trade\Model\CartProduct', 'productPrice');
        $this->assertEmpty($productPriceParameter->getValue($this->stub));

        // //测试初始化用户对象
        // $guestParameter = $this->getPrivateProperty('Trade\Model\CartProduct','guest');
        // $this->assertEmpty($guestParameter->getValue($this->stub));

    }


    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 Cart setId() 正确的传参类型,期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 Cart setId() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 Cart setId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetIdWrongTypeButNumeric()
    {
        $this->stub->setId('1');
        $this->assertTrue(is_int($this->stub->getId()));
        $this->assertEquals(1, $this->stub->getId());
    }
    //id 测试 ----------------------------------------------------------   end

    //number 测试 ------------------------------------------------------ start
    /**
     * 设置 Cart setNumber() 正确的传参类型,期望传值正确
     */
    public function testSetNumberCorrectType()
    {
        $this->stub->setNumber(1);
        $this->assertEquals(1, $this->stub->getNumber());
    }

    /**
     * 设置 Cart setNumber() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetNumberWrongType()
    {
        $this->stub->setNumber('string');
    }

    /**
     * 设置 Cart setNumber() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetNumberWrongTypeButNumeric()
    {
        $this->stub->setNumber('1');
        $this->assertTrue(is_int($this->stub->getNumber()));
        $this->assertEquals(1, $this->stub->getNumber());
    }
    //number 测试 ------------------------------------------------------   end

    //product 测试 ----------------------------------------------------- start
    /**
     * 设置 Cart setProduct() 正确的传参类型,期望传值正确
     */
    public function testSetProductCorrectType()
    {
        $object = new \Product\Model\Product();         //根据需求自己添加对象的设置,如果需要
        $this->stub->setProduct($object);
        $this->assertSame($object, $this->stub->getProduct());
    }

    /**
     * 设置 Cart setProduct() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetProductWrongType()
    {
        $this->stub->setProduct('string');
    }
    //product 测试 -----------------------------------------------------   end

    //createTime 测试 -------------------------------------------------- start
    /**
     * 设置 Cart setCreateTime() 正确的传参类型,期望传值正确
     */
    public function testSetCreateTimeCorrectType()
    {
        $this->stub->setCreateTime(1461047076);
        $this->assertEquals(1461047076, $this->stub->getCreateTime());
    }

    /**
     * 设置 Cart setCreateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCreateTimeWrongType()
    {
        $this->stub->setCreateTime('string');
    }

    /**
     * 设置 Cart setCreateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetCreateTimeWrongTypeButNumeric()
    {
        $this->stub->setCreateTime('1461047076');
        $this->assertTrue(is_int($this->stub->getCreateTime()));
        $this->assertEquals(1461047076, $this->stub->getCreateTime());
    }
    //createTime 测试 --------------------------------------------------   end

    //productPrice 测试 ------------------------------------------------ start
    /**
     * 设置 Cart setProductPrice() 正确的传参类型,期望传值正确
     */
    public function testSetProductPriceCorrectType()
    {
        // $object = $this->getMockBuilder('Product\Model\ProductPrice')
  //                 ->getMockForAbstractClass();		//根据需求自己添加对象的设置,如果需要
        // $this->stub->setProductPrice($object);
        // $this->assertSame($object,$this->stub->getProductPrice());
    }

    /**
     * 设置 Cart setProductPrice() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetProductPriceWrongType()
    {
        $this->stub->setProductPrice('string');
    }
    //productPrice 测试 ------------------------------------------------   end
}
