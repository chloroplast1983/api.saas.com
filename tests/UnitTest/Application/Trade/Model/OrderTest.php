<?php
namespace Trade\Model;

use GenericTestCase;

/**
 * Trade\Model\Order.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.21
 */

class OrderTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Trade\Model\Order();
    }

    /**
     * Order order订单领域对象,测试构造函数
     */
    public function testOrderConstructor()
    {
        //测试初始化订单id
        $idParameter = $this->getPrivateProperty('Trade\Model\Order', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化订单更新时间
        $updateTimeParameter = $this->getPrivateProperty('Trade\Model\Order', 'updateTime');
        $this->assertGreaterThan(0, $updateTimeParameter->getValue($this->stub));

        //测试初始化订单添加时间
        $createTimeParameter = $this->getPrivateProperty('Trade\Model\Order', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化订单状态变更时间
        $statusTimeParameter = $this->getPrivateProperty('Trade\Model\Order', 'statusTime');
        $this->assertGreaterThan(0, $statusTimeParameter->getValue($this->stub));

        //测试初始化订单状态支付时间
        $payTimeParameter = $this->getPrivateProperty('Trade\Model\Order', 'payTime');
        $this->assertEquals(0, $payTimeParameter->getValue($this->stub));

        //测试初始化订单状态
        $statusParameter = $this->getPrivateProperty('Trade\Model\Order', 'status');
        $this->assertEquals(ORDER_STATUS_WAIT_PAY, $statusParameter->getValue($this->stub));

        //测试初始化订单支付类型
        $payTypeParameter = $this->getPrivateProperty('Trade\Model\Order', 'payType');
        $this->assertEquals(PAY_TYPE_OFFLINE_PAYMENT, $payTypeParameter->getValue($this->stub));

        //测试初始化订单价格
        $priceParameter = $this->getPrivateProperty('Trade\Model\Order', 'price');
        $this->assertEquals(0, $priceParameter->getValue($this->stub));

        //测试初始化订单卖家
        $vendorParameter = $this->getPrivateProperty('Trade\Model\Order', 'vendor');
        $this->assertEmpty($vendorParameter->getValue($this->stub));

        //测试初始化订单买家
        $guestParameter = $this->getPrivateProperty('Trade\Model\Order', 'guest');
        $this->assertEmpty($guestParameter->getValue($this->stub));

    }


    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 Order setId() 正确的传参类型,期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 Order setId() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 Order setId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetIdWrongTypeButNumeric()
    {
        $this->stub->setId('1');
        $this->assertTrue(is_int($this->stub->getId()));
        $this->assertEquals(1, $this->stub->getId());
    }
    //id 测试 ----------------------------------------------------------   end

    //updateTime 测试 -------------------------------------------------- start
    /**
     * 设置 Order setUpdateTime() 正确的传参类型,期望传值正确
     */
    public function testSetUpdateTimeCorrectType()
    {
        $this->stub->setUpdateTime(1461245854);
        $this->assertEquals(1461245854, $this->stub->getUpdateTime());
    }

    /**
     * 设置 Order setUpdateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUpdateTimeWrongType()
    {
        $this->stub->setUpdateTime('string');
    }

    /**
     * 设置 Order setUpdateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetUpdateTimeWrongTypeButNumeric()
    {
        $this->stub->setUpdateTime('1461245854');
        $this->assertTrue(is_int($this->stub->getUpdateTime()));
        $this->assertEquals(1461245854, $this->stub->getUpdateTime());
    }
    //updateTime 测试 --------------------------------------------------   end

    //createTime 测试 -------------------------------------------------- start
    /**
     * 设置 Order setCreateTime() 正确的传参类型,期望传值正确
     */
    public function testSetCreateTimeCorrectType()
    {
        $this->stub->setCreateTime(1461245854);
        $this->assertEquals(1461245854, $this->stub->getCreateTime());
    }

    /**
     * 设置 Order setCreateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCreateTimeWrongType()
    {
        $this->stub->setCreateTime('string');
    }

    /**
     * 设置 Order setCreateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetCreateTimeWrongTypeButNumeric()
    {
        $this->stub->setCreateTime('1461245854');
        $this->assertTrue(is_int($this->stub->getCreateTime()));
        $this->assertEquals(1461245854, $this->stub->getCreateTime());
    }
    //createTime 测试 --------------------------------------------------   end

    //statusTime 测试 -------------------------------------------------- start
    /**
     * 设置 Order setStatusTime() 正确的传参类型,期望传值正确
     */
    public function testSetStatusTimeCorrectType()
    {
        $this->stub->setStatusTime(1461245854);
        $this->assertEquals(1461245854, $this->stub->getStatusTime());
    }

    /**
     * 设置 Order setStatusTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusTimeWrongType()
    {
        $this->stub->setStatusTime('string');
    }

    /**
     * 设置 Order setStatusTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetStatusTimeWrongTypeButNumeric()
    {
        $this->stub->setStatusTime('1461245854');
        $this->assertTrue(is_int($this->stub->getStatusTime()));
        $this->assertEquals(1461245854, $this->stub->getStatusTime());
    }
    //statusTime 测试 --------------------------------------------------   end

    //payTime 测试 ----------------------------------------------------- start
    /**
     * 设置 Order setPayTime() 正确的传参类型,期望传值正确
     */
    public function testSetPayTimeCorrectType()
    {
        $this->stub->setPayTime(1461245854);
        $this->assertEquals(1461245854, $this->stub->getPayTime());
    }

    /**
     * 设置 Order setPayTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetPayTimeWrongType()
    {
        $this->stub->setPayTime('string');
    }

    /**
     * 设置 Order setPayTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetPayTimeWrongTypeButNumeric()
    {
        $this->stub->setPayTime('1461245854');
        $this->assertTrue(is_int($this->stub->getPayTime()));
        $this->assertEquals(1461245854, $this->stub->getPayTime());
    }
    //payTime 测试 -----------------------------------------------------   end

    //status 测试 ------------------------------------------------------ start
    /**
     * 循环测试 Order setStatus() 是否符合预定范围
     *
     * @dataProvider statusProvider
     */
    public function testSetStatus($actual, $expected)
    {
        $this->stub->setStatus($actual);
        $this->assertEquals($expected, $this->stub->getStatus());
    }

    /**
     * 循环测试 Order setStatus() 数据构建器
     */
    public function statusProvider()
    {
        return array(
            array(ORDER_STATUS_WAIT_PAY,ORDER_STATUS_WAIT_PAY),
            array(ORDER_STATUS_GUEST_CANCEL,ORDER_STATUS_GUEST_CANCEL),
            array(ORDER_STATUS_VENDOR_CANCEL,ORDER_STATUS_VENDOR_CANCEL),
            array(ORDER_STATUS_AUTO_CANCEL,ORDER_STATUS_AUTO_CANCEL),
            array(ORDER_STATUS_PAY,ORDER_STATUS_PAY),
            array(ORDER_STATUS_WAIT_CONFIRM_PAY,ORDER_STATUS_WAIT_CONFIRM_PAY),
            array(ORDER_STATUS_SUCESS,ORDER_STATUS_SUCESS),
            array(9999,ORDER_STATUS_WAIT_PAY),
        );
    }

    /**
     * 设置 Order setStatus() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusWrongType()
    {
        $this->stub->setStatus('string');
    }
    //status 测试 ------------------------------------------------------   end

    //payType 测试 ----------------------------------------------------- start
    /**
     * 循环测试 Order setPayType() 是否符合预定范围
     *
     * @dataProvider payTypeProvider
     */
    public function testSetPayType($actual, $expected)
    {
        $this->stub->setPayType($actual);
        $this->assertEquals($expected, $this->stub->getPayType());
    }

    /**
     * 循环测试 Order setPayType() 数据构建器
     */
    public function payTypeProvider()
    {
        return array(
            array(PAY_TYPE_CHENGXINYOU_PAYMENT,PAY_TYPE_CHENGXINYOU_PAYMENT),
            array(PAY_TYPE_OFFLINE_PAYMENT,PAY_TYPE_OFFLINE_PAYMENT),
            array(9999,PAY_TYPE_OFFLINE_PAYMENT),
        );
    }

    /**
     * 设置 Order setPayType() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetPayTypeWrongType()
    {
        $this->stub->setPayType('string');
    }
    //payType 测试 -----------------------------------------------------   end

    //category 测试 ---------------------------------------------------- start
    /**
     * 循环测试 Order setCategory() 是否符合预定范围
     *
     * @dataProvider categoryProvider
     */
    public function testSetCategory($actual, $expected)
    {
        $this->stub->setCategory($actual);
        $this->assertEquals($expected, $this->stub->getCategory());
    }

    /**
     * 循环测试 Order setCategory() 数据构建器
     */
    public function categoryProvider()
    {
        return array(
            array(ORDER_CATEGORY_TOURIST,ORDER_CATEGORY_TOURIST),
            array(ORDER_CATEGORY_COMMON,ORDER_CATEGORY_COMMON),
            array(9999,ORDER_CATEGORY_COMMON),
        );
    }

    /**
     * 设置 Order setCategory() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCategoryWrongType()
    {
        $this->stub->setCategory('string');
    }
    //category 测试 ----------------------------------------------------   end

    //price 测试 ------------------------------------------------------- start
    /**
     * 设置 Order setPrice() 正确的传参类型,期望传值正确
     */
    public function testSetPriceCorrectType()
    {
        $this->stub->setPrice(1);
        $this->assertEquals(1, $this->stub->getPrice());
    }

    /**
     * 设置 Order setPrice() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetPriceWrongType()
    {
        $this->stub->setPrice('string');
    }

    /**
     * 设置 Order setPrice() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetPriceWrongTypeButNumeric()
    {
        $this->stub->setPrice('1');
        $this->assertTrue(is_int($this->stub->getPrice()));
        $this->assertEquals(1, $this->stub->getPrice());
    }
    //price 测试 -------------------------------------------------------   end

    //vendor 测试 ------------------------------------------------------ start
    /**
     * 设置 Order setVendor() 正确的传参类型,期望传值正确
     */
    public function testSetVendorCorrectType()
    {
        $object = new \User\Model\User();       //根据需求自己添加对象的设置,如果需要
        $this->stub->setVendor($object);
        $this->assertSame($object, $this->stub->getVendor());
    }

    /**
     * 设置 Order setVendor() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetVendorWrongType()
    {
        $this->stub->setVendor('string');
    }
    //vendor 测试 ------------------------------------------------------   end

    //guest 测试 ------------------------------------------------------- start
    /**
     * 设置 Order setGuest() 正确的传参类型,期望传值正确
     */
    public function testSetGuestCorrectType()
    {
        $object = new \Web\Model\Guest();       //根据需求自己添加对象的设置,如果需要
        $this->stub->setGuest($object);
        $this->assertSame($object, $this->stub->getGuest());
    }

    /**
     * 设置 Order setGuest() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetGuestWrongType()
    {
        $this->stub->setGuest('string');
    }
    //guest 测试 -------------------------------------------------------   end
}
