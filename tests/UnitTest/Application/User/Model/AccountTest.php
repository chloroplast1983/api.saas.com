<?php
namespace User\Persistence;

use GenericTestCase;

/**
 * User\Model\Account.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.17
 */

class AccountTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \User\Model\Account();
    }

    /**
     * Account saas用户账户,测试构造函数
     */
    public function testAccountConstructor()
    {
        //测试初始化saas用户账户余额
        $balanceParameter = $this->getPrivateProperty('User\Model\Account', 'balance');
        $this->assertEquals(0, $balanceParameter->getValue($this->stub));

    }


    //balance 测试 ----------------------------------------------------- start
    /**
     * 设置 Account setBalance() 正确的传参类型,期望传值正确
     */
    public function testSetBalanceCorrectType()
    {
        $this->stub->setBalance(1);
        $this->assertEquals(1, $this->stub->getBalance());
    }

    /**
     * 设置 Account setBalance() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetBalanceWrongType()
    {
        $this->stub->setBalance('string');
    }

    /**
     * 设置 Account setBalance() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetBalanceWrongTypeButNumeric()
    {
        $this->stub->setBalance('1');
        $this->assertTrue(is_int($this->stub->getBalance()));
        $this->assertEquals(1, $this->stub->getBalance());
    }
    //balance 测试 -----------------------------------------------------   end
}
