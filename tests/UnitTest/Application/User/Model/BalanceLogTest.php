<?php
namespace User\Persistence;

use GenericTestCase;

/**
 * User\Model\BalanceLog.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */

class BalanceLogTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \User\Model\BalanceLog();
    }

    /**
     * BalanceLog saas用户交易记录,测试构造函数
     */
    public function testBalanceLogConstructor()
    {
        //测试初始化银行账户id
        $idParameter = $this->getPrivateProperty('User\Model\BalanceLog', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化saas用户
        $userParameter = $this->getPrivateProperty('User\Model\BalanceLog', 'user');
        $this->assertEmpty($userParameter->getValue($this->stub));

        //测试初始化交易记录金额
        $moneyParameter = $this->getPrivateProperty('User\Model\BalanceLog', 'money');
        $this->assertEquals(0, $moneyParameter->getValue($this->stub));

        //测试初始化账户添加时间
        $createTimeParameter = $this->getPrivateProperty('User\Model\BalanceLog', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化交易记录类型
        $typeParameter = $this->getPrivateProperty('User\Model\BalanceLog', 'type');
        $this->assertEquals(BALANCE_TYPE_REVENUE, $typeParameter->getValue($this->stub));

    }


    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 BalanceLog setId() 正确的传参类型,期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 BalanceLog setId() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 BalanceLog setId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetIdWrongTypeButNumeric()
    {
        $this->stub->setId('1');
        $this->assertTrue(is_int($this->stub->getId()));
        $this->assertEquals(1, $this->stub->getId());
    }
    //id 测试 ----------------------------------------------------------   end

    //user 测试 -------------------------------------------------------- start
    /**
     * 设置 BalanceLog setUser() 正确的传参类型,期望传值正确
     */
    public function testSetUserCorrectType()
    {
        $object = new \User\Model\User();       //根据需求自己添加对象的设置,如果需要
        $this->stub->setUser($object);
        $this->assertSame($object, $this->stub->getUser());
    }

    /**
     * 设置 BalanceLog setUser() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUserWrongType()
    {
        $this->stub->setUser('string');
    }
    //user 测试 --------------------------------------------------------   end

    //money 测试 ------------------------------------------------------- start
    /**
     * 设置 BalanceLog setMoney() 正确的传参类型,期望传值正确
     */
    public function testSetMoneyCorrectType()
    {
        $this->stub->setMoney(1);
        $this->assertEquals(1, $this->stub->getMoney());
    }

    /**
     * 设置 BalanceLog setMoney() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetMoneyWrongType()
    {
        $this->stub->setMoney('string');
    }

    /**
     * 设置 BalanceLog setMoney() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetMoneyWrongTypeButNumeric()
    {
        $this->stub->setMoney('1');
        $this->assertTrue(is_int($this->stub->getMoney()));
        $this->assertEquals(1, $this->stub->getMoney());
    }
    //money 测试 -------------------------------------------------------   end

    //createTime 测试 -------------------------------------------------- start
    /**
     * 设置 BalanceLog setCreateTime() 正确的传参类型,期望传值正确
     */
    public function testSetCreateTimeCorrectType()
    {
        $this->stub->setCreateTime(1460989748);
        $this->assertEquals(1460989748, $this->stub->getCreateTime());
    }

    /**
     * 设置 BalanceLog setCreateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCreateTimeWrongType()
    {
        $this->stub->setCreateTime('string');
    }

    /**
     * 设置 BalanceLog setCreateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetCreateTimeWrongTypeButNumeric()
    {
        $this->stub->setCreateTime('1460989748');
        $this->assertTrue(is_int($this->stub->getCreateTime()));
        $this->assertEquals(1460989748, $this->stub->getCreateTime());
    }
    //createTime 测试 --------------------------------------------------   end

    //type 测试 -------------------------------------------------------- start
    /**
     * 循环测试 BalanceLog setType() 是否符合预定范围
     *
     * @dataProvider typeProvider
     */
    public function testSetType($actual, $expected)
    {
        $this->stub->setType($actual);
        $this->assertEquals($expected, $this->stub->getType());
    }

    /**
     * 循环测试 BalanceLog setType() 数据构建器
     */
    public function typeProvider()
    {
        return array(
            array(BALANCE_TYPE_REVENUE,BALANCE_TYPE_REVENUE),
            array(BALANCE_TYPE_EXPENSE,BALANCE_TYPE_EXPENSE),
            array(9999,BALANCE_TYPE_REVENUE),
        );
    }

    /**
     * 设置 BalanceLog setType() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetTypeWrongType()
    {
        $this->stub->setType('string');
    }
    //type 测试 --------------------------------------------------------   end
}
