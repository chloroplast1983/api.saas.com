<?php
namespace Trade\Model;

use GenericTestCase;

/**
 * Trade\Model\OrderProduct.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.29
 */

class OrderProductTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Trade\Model\OrderProduct();
    }

    /**
     * OrderProduct 订单商品,测试构造函数
     */
    public function testOrderProductConstructor()
    {
        //测试初始化订单
        // $orderParameter = $this->getPrivateProperty('Trade\Model\OrderProduct','order');
        // $this->assertEmpty($orderParameter->getValue($this->stub));

        //测试初始化商品
        $productParameter = $this->getPrivateProperty('Trade\Model\OrderProduct', 'product');
        $this->assertEmpty($productParameter->getValue($this->stub));

        //测试初始化订单商品数量
        $numberParameter = $this->getPrivateProperty('Trade\Model\OrderProduct', 'number');
        $this->assertEquals(0, $numberParameter->getValue($this->stub));

        //测试初始化商品价格
        $productPriceParameter = $this->getPrivateProperty('Trade\Model\OrderProduct', 'productPrice');
        $this->assertEmpty($productPriceParameter->getValue($this->stub));

    }


    //order 测试 ------------------------------------------------------- start
    /**
     * 设置 OrderProduct setOrder() 正确的传参类型,期望传值正确
     */
    // public function testSetOrderCorrectType(){
    // 	$object = new \Trade\Model\Order();		//根据需求自己添加对象的设置,如果需要
    // 	$this->stub->setOrder($object);
    // 	$this->assertSame($object,$this->stub->getOrder());
    // }

    /**
     * 设置 OrderProduct setOrder() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    // public function testSetOrderWrongType(){
    // 	$this->stub->setOrder('string');
    // }
    //order 测试 -------------------------------------------------------   end

    //product 测试 ----------------------------------------------------- start
    /**
     * 设置 OrderProduct setProduct() 正确的传参类型,期望传值正确
     */
    public function testSetProductCorrectType()
    {
        $object = new \Product\Model\Product();         //根据需求自己添加对象的设置,如果需要
        $this->stub->setProduct($object);
        $this->assertSame($object, $this->stub->getProduct());
    }

    /**
     * 设置 OrderProduct setProduct() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetProductWrongType()
    {
        $this->stub->setProduct('string');
    }
    //product 测试 -----------------------------------------------------   end

    //number 测试 ------------------------------------------------------ start
    /**
     * 设置 OrderProduct setNumber() 正确的传参类型,期望传值正确
     */
    public function testSetNumberCorrectType()
    {
        $this->stub->setNumber(1);
        $this->assertEquals(1, $this->stub->getNumber());
    }

    /**
     * 设置 OrderProduct setNumber() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetNumberWrongType()
    {
        $this->stub->setNumber('string');
    }

    /**
     * 设置 OrderProduct setNumber() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetNumberWrongTypeButNumeric()
    {
        $this->stub->setNumber('1');
        $this->assertTrue(is_int($this->stub->getNumber()));
        $this->assertEquals(1, $this->stub->getNumber());
    }
    //number 测试 ------------------------------------------------------   end

    //productPrice 测试 ------------------------------------------------ start
    /**
     * 设置 OrderProduct setProductPrice() 正确的传参类型,期望传值正确
     */
    public function testSetProductPriceCorrectType()
    {
        // $object = new \Product\Service\CommonProductPriceService(new \Product\Model\ProductPrice());		//根据需求自己添加对象的设置,如果需要
        // $this->stub->setProductPrice($object);
        // $this->assertSame($object,$this->stub->getProductPrice());
    }

    /**
     * 设置 OrderProduct setProductPrice() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetProductPriceWrongType()
    {
        $this->stub->setProductPrice('string');
    }
    //productPrice 测试 ------------------------------------------------   end
}
