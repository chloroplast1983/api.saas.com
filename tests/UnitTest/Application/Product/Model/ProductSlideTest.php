<?php
namespace Product\Persistence;

use GenericTestCase;

/**
 * Product\Model\ProductSlide.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class ProductSlideTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Product\Model\ProductSlide();
    }

    /**
     * ProductSlide 商品幻灯片领域对象,测试构造函数
     */
    public function testProductSlideConstructor()
    {
        //测试初始化幻灯片id
        $idParameter = $this->getPrivateProperty('Product\Model\ProductSlide', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化商品
        // $productParameter = $this->getPrivateProperty('Product\Model\ProductSlide','product');
        // $this->assertEmpty($productParameter->getValue($this->stub));

        //测试初始化幻灯片图片id
        $slideParameter = $this->getPrivateProperty('Product\Model\ProductSlide', 'slide');
        $this->assertEquals(0, $slideParameter->getValue($this->stub));

        //测试初始化幻灯片添加时间
        $createTimeParameter = $this->getPrivateProperty('Product\Model\ProductSlide', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化幻灯片状态变更时间
        $statusTimeParameter = $this->getPrivateProperty('Product\Model\ProductSlide', 'statusTime');
        $this->assertGreaterThan(0, $statusTimeParameter->getValue($this->stub));

        //测试初始化幻灯片状态
        $statusParameter = $this->getPrivateProperty('Product\Model\ProductSlide', 'status');
        $this->assertEquals(STATUS_NORMAL, $statusParameter->getValue($this->stub));

    }


    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 ProductSlide setId() 正确的传参类型,期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 ProductSlide setId() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 ProductSlide setId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetIdWrongTypeButNumeric()
    {
        $this->stub->setId('1');
        $this->assertTrue(is_int($this->stub->getId()));
        $this->assertEquals(1, $this->stub->getId());
    }
    //id 测试 ----------------------------------------------------------   end

    //product 测试 ----------------------------------------------------- start
    /**
     * 设置 ProductSlide setProduct() 正确的传参类型,期望传值正确
     */
    // public function testSetProductCorrectType(){
    // 	$object = new \Product\Model\Product();		//根据需求自己添加对象的设置,如果需要
    // 	$this->stub->setProduct($object);
    // 	$this->assertSame($object,$this->stub->getProduct());
    // }

    /**
     * 设置 ProductSlide setProduct() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    // public function testSetProductWrongType(){
    // 	$this->stub->setProduct('string');
    // }
    //product 测试 -----------------------------------------------------   end

    //slide 测试 ------------------------------------------------------- start
    /**
     * 设置 ProductSlide setSlide() 正确的传参类型,期望传值正确
     */
    public function testSetSlideCorrectType()
    {
        $this->stub->setSlide(1);
        $this->assertEquals(1, $this->stub->getSlide());
    }

    /**
     * 设置 ProductSlide setSlide() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetSlideWrongType()
    {
        $this->stub->setSlide('string');
    }

    /**
     * 设置 ProductSlide setSlide() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetSlideWrongTypeButNumeric()
    {
        $this->stub->setSlide('1');
        $this->assertTrue(is_int($this->stub->getSlide()));
        $this->assertEquals(1, $this->stub->getSlide());
    }
    //slide 测试 -------------------------------------------------------   end

    //createTime 测试 -------------------------------------------------- start
    /**
     * 设置 ProductSlide setCreateTime() 正确的传参类型,期望传值正确
     */
    public function testSetCreateTimeCorrectType()
    {
        $this->stub->setCreateTime(1461049991);
        $this->assertEquals(1461049991, $this->stub->getCreateTime());
    }

    /**
     * 设置 ProductSlide setCreateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCreateTimeWrongType()
    {
        $this->stub->setCreateTime('string');
    }

    /**
     * 设置 ProductSlide setCreateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetCreateTimeWrongTypeButNumeric()
    {
        $this->stub->setCreateTime('1461049991');
        $this->assertTrue(is_int($this->stub->getCreateTime()));
        $this->assertEquals(1461049991, $this->stub->getCreateTime());
    }
    //createTime 测试 --------------------------------------------------   end

    //statusTime 测试 -------------------------------------------------- start
    /**
     * 设置 ProductSlide setStatusTime() 正确的传参类型,期望传值正确
     */
    public function testSetStatusTimeCorrectType()
    {
        $this->stub->setStatusTime(1461049991);
        $this->assertEquals(1461049991, $this->stub->getStatusTime());
    }

    /**
     * 设置 ProductSlide setStatusTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusTimeWrongType()
    {
        $this->stub->setStatusTime('string');
    }

    /**
     * 设置 ProductSlide setStatusTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetStatusTimeWrongTypeButNumeric()
    {
        $this->stub->setStatusTime('1461049991');
        $this->assertTrue(is_int($this->stub->getStatusTime()));
        $this->assertEquals(1461049991, $this->stub->getStatusTime());
    }
    //statusTime 测试 --------------------------------------------------   end

    //status 测试 ------------------------------------------------------ start
    /**
     * 循环测试 ProductSlide setStatus() 是否符合预定范围
     *
     * @dataProvider statusProvider
     */
    public function testSetStatus($actual, $expected)
    {
        $this->stub->setStatus($actual);
        $this->assertEquals($expected, $this->stub->getStatus());
    }

    /**
     * 循环测试 ProductSlide setStatus() 数据构建器
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
     * 设置 ProductSlide setStatus() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusWrongType()
    {
        $this->stub->setStatus('string');
    }
    //status 测试 ------------------------------------------------------   end
}
