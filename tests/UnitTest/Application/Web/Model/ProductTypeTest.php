<?php
namespace Web\Model;

use GenericTestCase;

/**
 * Web\Model\ProductType.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class ProductTypeTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Web\Model\ProductType();
    }

    /**
     * ProductType 用户自定义商品分类领域对象,测试构造函数
     */
    public function testProductTypeConstructor()
    {
        //测试初始化商品id
        $idParameter = $this->getPrivateProperty('Web\Model\ProductType', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化商品分类用户
        $userParameter = $this->getPrivateProperty('Web\Model\ProductType', 'user');
        $this->assertEmpty($userParameter->getValue($this->stub));

        //测试初始化商品分类名称
        $nameParameter = $this->getPrivateProperty('Web\Model\ProductType', 'name');
        $this->assertEmpty($nameParameter->getValue($this->stub));

        //测试初始化添加时间
        $createTimeParameter = $this->getPrivateProperty('Web\Model\ProductType', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化更新时间
        $updateTimeParameter = $this->getPrivateProperty('Web\Model\ProductType', 'updateTime');
        $this->assertGreaterThan(0, $updateTimeParameter->getValue($this->stub));

        //测试初始化状态变更时间
        $statusTimeParameter = $this->getPrivateProperty('Web\Model\ProductType', 'statusTime');
        $this->assertGreaterThan(0, $statusTimeParameter->getValue($this->stub));

        //测试初始化状态
        $statusParameter = $this->getPrivateProperty('Web\Model\ProductType', 'status');
        $this->assertEquals(STATUS_NORMAL, $statusParameter->getValue($this->stub));

    }


    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 ProductType setId() 正确的传参类型,期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 ProductType setId() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 ProductType setId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetIdWrongTypeButNumeric()
    {
        $this->stub->setId('1');
        $this->assertTrue(is_int($this->stub->getId()));
        $this->assertEquals(1, $this->stub->getId());
    }
    //id 测试 ----------------------------------------------------------   end

    //name 测试 -------------------------------------------------------- start
    /**
     * 设置 ProductType setName() 正确的传参类型,期望传值正确
     */
    public function testSetNameCorrectType()
    {
        $this->stub->setName('string');
        $this->assertEquals('string', $this->stub->getName());
    }

    /**
     * 设置 ProductType setName() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetNameWrongType()
    {
        $this->stub->setName(array(1,2,3));
    }
    //name 测试 --------------------------------------------------------   end

    //user 测试 -------------------------------------------------------- start
    /**
     * 设置 Product setUser() 正确的传参类型,期望传值正确
     */
    public function testSetUserCorrectType()
    {
        $object = new \User\Model\User();       //根据需求自己添加对象的设置,如果需要
        $this->stub->setUser($object);
        $this->assertSame($object, $this->stub->getUser());
    }

    /**
     * 设置 Product setUser() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUserWrongType()
    {
        $this->stub->setUser('string');
    }
    //user 测试 --------------------------------------------------------   end
    
    //createTime 测试 -------------------------------------------------- start
    /**
     * 设置 ProductType setCreateTime() 正确的传参类型,期望传值正确
     */
    public function testSetCreateTimeCorrectType()
    {
        $this->stub->setCreateTime(1461029383);
        $this->assertEquals(1461029383, $this->stub->getCreateTime());
    }

    /**
     * 设置 ProductType setCreateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCreateTimeWrongType()
    {
        $this->stub->setCreateTime('string');
    }

    /**
     * 设置 ProductType setCreateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetCreateTimeWrongTypeButNumeric()
    {
        $this->stub->setCreateTime('1461029383');
        $this->assertTrue(is_int($this->stub->getCreateTime()));
        $this->assertEquals(1461029383, $this->stub->getCreateTime());
    }
    //createTime 测试 --------------------------------------------------   end

    //updateTime 测试 -------------------------------------------------- start
    /**
     * 设置 ProductType setUpdateTime() 正确的传参类型,期望传值正确
     */
    public function testSetUpdateTimeCorrectType()
    {
        $this->stub->setUpdateTime(1460993856);
        $this->assertEquals(1460993856, $this->stub->getUpdateTime());
    }

    /**
     * 设置 ProductType setUpdateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUpdateTimeWrongType()
    {
        $this->stub->setUpdateTime('string');
    }

    /**
     * 设置 ProductType setUpdateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetUpdateTimeWrongTypeButNumeric()
    {
        $this->stub->setUpdateTime('1460993856');
        $this->assertTrue(is_int($this->stub->getUpdateTime()));
        $this->assertEquals(1460993856, $this->stub->getUpdateTime());
    }
    //updateTime 测试 --------------------------------------------------   end
    
    //statusTime 测试 -------------------------------------------------- start
    /**
     * 设置 ProductType setStatusTime() 正确的传参类型,期望传值正确
     */
    public function testSetStatusTimeCorrectType()
    {
        $this->stub->setStatusTime(1461029383);
        $this->assertEquals(1461029383, $this->stub->getStatusTime());
    }

    /**
     * 设置 ProductType setStatusTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusTimeWrongType()
    {
        $this->stub->setStatusTime('string');
    }

    /**
     * 设置 ProductType setStatusTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetStatusTimeWrongTypeButNumeric()
    {
        $this->stub->setStatusTime('1461029383');
        $this->assertTrue(is_int($this->stub->getStatusTime()));
        $this->assertEquals(1461029383, $this->stub->getStatusTime());
    }
    //statusTime 测试 --------------------------------------------------   end

    //status 测试 ------------------------------------------------------ start
    /**
     * 循环测试 ProductType setStatus() 是否符合预定范围
     *
     * @dataProvider statusProvider
     */
    public function testSetStatus($actual, $expected)
    {
        $this->stub->setStatus($actual);
        $this->assertEquals($expected, $this->stub->getStatus());
    }

    /**
     * 循环测试 ProductType setStatus() 数据构建器
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
     * 设置 ProductType setStatus() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusWrongType()
    {
        $this->stub->setStatus('string');
    }
    //status 测试 ------------------------------------------------------   end
}
