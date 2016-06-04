<?php
namespace Web\Model;

use GenericTestCase;

/**
 * Web\Model\ShopSlide.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class ShopSlideTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Web\Model\ShopSlide();
    }

    /**
     * ShopSlide 网店幻灯片领域对象,测试构造函数
     */
    public function testShopSlideConstructor()
    {
        //测试初始化幻灯片id
        $idParameter = $this->getPrivateProperty('Web\Model\ShopSlide', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化店铺
        // $shopParameter = $this->getPrivateProperty('Web\Model\ShopSlide','shop');
        // $this->assertEmpty($shopParameter->getValue($this->stub));

        //测试初始化幻灯片图片id
        $slideParameter = $this->getPrivateProperty('Web\Model\ShopSlide', 'slide');
        $this->assertEquals(0, $slideParameter->getValue($this->stub));

        //测试初始化幻灯片添加时间
        $createTimeParameter = $this->getPrivateProperty('Web\Model\ShopSlide', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化幻灯片状态变更时间
        $statusTimeParameter = $this->getPrivateProperty('Web\Model\ShopSlide', 'statusTime');
        $this->assertGreaterThan(0, $statusTimeParameter->getValue($this->stub));

        //测试初始化幻灯片状态
        $statusParameter = $this->getPrivateProperty('Web\Model\ShopSlide', 'status');
        $this->assertEquals(STATUS_NORMAL, $statusParameter->getValue($this->stub));

    }


    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 ShopSlide setId() 正确的传参类型,期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 ShopSlide setId() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 ShopSlide setId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetIdWrongTypeButNumeric()
    {
        $this->stub->setId('1');
        $this->assertTrue(is_int($this->stub->getId()));
        $this->assertEquals(1, $this->stub->getId());
    }
    //id 测试 ----------------------------------------------------------   end

    //shop 测试 -------------------------------------------------------- start
    /**
     * 设置 ShopSlide setShop() 正确的传参类型,期望传值正确
     */
    // public function testSetShopCorrectType(){
    // 	$object = new \Web\Model\Shop();		//根据需求自己添加对象的设置,如果需要
    // 	$this->stub->setShop($object);
    // 	$this->assertSame($object,$this->stub->getShop());
    // }

    /**
     * 设置 ShopSlide setShop() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    // public function testSetShopWrongType(){
    // 	$this->stub->setShop('string');
    // }
    //shop 测试 --------------------------------------------------------   end

    //slide 测试 ------------------------------------------------------- start
    /**
     * 设置 ShopSlide setSlide() 正确的传参类型,期望传值正确
     */
    public function testSetSlideCorrectType()
    {
        $this->stub->setSlide(1);
        $this->assertEquals(1, $this->stub->getSlide());
    }

    /**
     * 设置 ShopSlide setSlide() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetSlideWrongType()
    {
        $this->stub->setSlide('string');
    }

    /**
     * 设置 ShopSlide setSlide() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
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
     * 设置 ShopSlide setCreateTime() 正确的传参类型,期望传值正确
     */
    public function testSetCreateTimeCorrectType()
    {
        $this->stub->setCreateTime(1461050232);
        $this->assertEquals(1461050232, $this->stub->getCreateTime());
    }

    /**
     * 设置 ShopSlide setCreateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCreateTimeWrongType()
    {
        $this->stub->setCreateTime('string');
    }

    /**
     * 设置 ShopSlide setCreateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetCreateTimeWrongTypeButNumeric()
    {
        $this->stub->setCreateTime('1461050232');
        $this->assertTrue(is_int($this->stub->getCreateTime()));
        $this->assertEquals(1461050232, $this->stub->getCreateTime());
    }
    //createTime 测试 --------------------------------------------------   end

    //statusTime 测试 -------------------------------------------------- start
    /**
     * 设置 ShopSlide setStatusTime() 正确的传参类型,期望传值正确
     */
    public function testSetStatusTimeCorrectType()
    {
        $this->stub->setStatusTime(1461050232);
        $this->assertEquals(1461050232, $this->stub->getStatusTime());
    }

    /**
     * 设置 ShopSlide setStatusTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusTimeWrongType()
    {
        $this->stub->setStatusTime('string');
    }

    /**
     * 设置 ShopSlide setStatusTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetStatusTimeWrongTypeButNumeric()
    {
        $this->stub->setStatusTime('1461050232');
        $this->assertTrue(is_int($this->stub->getStatusTime()));
        $this->assertEquals(1461050232, $this->stub->getStatusTime());
    }
    //statusTime 测试 --------------------------------------------------   end

    //status 测试 ------------------------------------------------------ start
    /**
     * 循环测试 ShopSlide setStatus() 是否符合预定范围
     *
     * @dataProvider statusProvider
     */
    public function testSetStatus($actual, $expected)
    {
        $this->stub->setStatus($actual);
        $this->assertEquals($expected, $this->stub->getStatus());
    }

    /**
     * 循环测试 ShopSlide setStatus() 数据构建器
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
     * 设置 ShopSlide setStatus() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusWrongType()
    {
        $this->stub->setStatus('string');
    }
    //status 测试 ------------------------------------------------------   end
}
