<?php
namespace Product\Persistence;

use GenericTestCase;

/**
 * Product\Model\ProductPrice.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class ProductPriceTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Product\Model\ProductPrice();
        // $this->stub = $this->getMockBuilder('Product\Model\ProductPrice')
     //          ->getMockForAbstractClass();
    }

    /**
     * ProductPrice 商品价格父类领域对象,测试构造函数
     */
    public function testProductPriceConstructor()
    {
        //测试初始化商品价格id
        $idParameter = $this->getPrivateProperty('Product\Model\ProductPrice', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化商品对象
        // $productParameter = $this->getPrivateProperty('Product\Model\ProductPrice','product');
        // $this->assertEmpty($productParameter->getValue($this->stub));

        //测试初始化添加时间
        $createTimeParameter = $this->getPrivateProperty('Product\Model\ProductPrice', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化状态变更时间
        $statusTimeParameter = $this->getPrivateProperty('Product\Model\ProductPrice', 'statusTime');
        $this->assertGreaterThan(0, $statusTimeParameter->getValue($this->stub));

        //测试初始化状态
        $statusParameter = $this->getPrivateProperty('Product\Model\ProductPrice', 'status');
        $this->assertEquals(STATUS_NORMAL, $statusParameter->getValue($this->stub));

    }


    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 ProductPrice setId() 正确的传参类型,期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 ProductPrice setId() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 ProductPrice setId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetIdWrongTypeButNumeric()
    {
        $this->stub->setId('1');
        $this->assertTrue(is_int($this->stub->getId()));
        $this->assertEquals(1, $this->stub->getId());
    }
    //id 测试 ----------------------------------------------------------   end

    //product 测试 ----------------------------------------------------- start
    // /**
    //  * 设置 ProductPrice setProduct() 正确的传参类型,期望传值正确
    //  */
    // public function testSetProductCorrectType(){
    // 	$object = new \Product\Model\Product();		//根据需求自己添加对象的设置,如果需要
    // 	$this->stub->setProduct($object);
    // 	$this->assertSame($object,$this->stub->getProduct());
    // }

    // /**
    //  * 设置 ProductPrice setProduct() 错误的传参类型,期望期望抛出TypeError exception
    //  *
    //  * @expectedException TypeError
    //  */
    // public function testSetProductWrongType(){
    // 	$this->stub->setProduct('string');
    // }
    //product 测试 -----------------------------------------------------   end

    //createTime 测试 -------------------------------------------------- start
    /**
     * 设置 ProductPrice setCreateTime() 正确的传参类型,期望传值正确
     */
    public function testSetCreateTimeCorrectType()
    {
        $this->stub->setCreateTime(1461046291);
        $this->assertEquals(1461046291, $this->stub->getCreateTime());
    }

    /**
     * 设置 ProductPrice setCreateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCreateTimeWrongType()
    {
        $this->stub->setCreateTime('string');
    }

    /**
     * 设置 ProductPrice setCreateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetCreateTimeWrongTypeButNumeric()
    {
        $this->stub->setCreateTime('1461046291');
        $this->assertTrue(is_int($this->stub->getCreateTime()));
        $this->assertEquals(1461046291, $this->stub->getCreateTime());
    }
    //createTime 测试 --------------------------------------------------   end

    //statusTime 测试 -------------------------------------------------- start
    /**
     * 设置 ProductPrice setStatusTime() 正确的传参类型,期望传值正确
     */
    public function testSetStatusTimeCorrectType()
    {
        $this->stub->setStatusTime(1461046291);
        $this->assertEquals(1461046291, $this->stub->getStatusTime());
    }

    /**
     * 设置 ProductPrice setStatusTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusTimeWrongType()
    {
        $this->stub->setStatusTime('string');
    }

    /**
     * 设置 ProductPrice setStatusTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetStatusTimeWrongTypeButNumeric()
    {
        $this->stub->setStatusTime('1461046291');
        $this->assertTrue(is_int($this->stub->getStatusTime()));
        $this->assertEquals(1461046291, $this->stub->getStatusTime());
    }
    //statusTime 测试 --------------------------------------------------   end

    //status 测试 ------------------------------------------------------ start
    /**
     * 循环测试 ProductPrice setStatus() 是否符合预定范围
     *
     * @dataProvider statusProvider
     */
    public function testSetStatus($actual, $expected)
    {
        $this->stub->setStatus($actual);
        $this->assertEquals($expected, $this->stub->getStatus());
    }

    /**
     * 循环测试 ProductPrice setStatus() 数据构建器
     */
    public function statusProvider()
    {
        return array(
            array(STATUS_NORMAL,STATUS_NORMAL),
            array(STATUS_DELETE,STATUS_DELETE),
            array(9999,STATUS_NORMAL),
        );
    }

    /**
     * 设置 ProductPrice setStatus() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusWrongType()
    {
        $this->stub->setStatus('string');
    }
    //status 测试 ------------------------------------------------------   end
}
