<?php
namespace User\Persistence;

use GenericTestCase;

/**
 * User\Model\BankAccount.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.17
 */

class BankAccountTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \User\Model\BankAccount();
    }

    /**
     * BankAccount saas用户银行账户领域对象,测试构造函数
     */
    public function testBankAccountConstructor()
    {
        //测试初始化银行账户id
        $idParameter = $this->getPrivateProperty('User\Model\BankAccount', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化saas用户
        // $userParameter = $this->getPrivateProperty('User\Model\BankAccount','user');
        // $this->assertEmpty($userParameter->getValue($this->stub));

        //测试初始化银行持卡人姓名
        $bankCardHolderNameParameter = $this->getPrivateProperty('User\Model\BankAccount', 'bankCardHolderName');
        $this->assertEmpty($bankCardHolderNameParameter->getValue($this->stub));

        //测试初始化卡号
        $bankCardNumberParameter = $this->getPrivateProperty('User\Model\BankAccount', 'bankCardNumber');
        $this->assertEmpty($bankCardNumberParameter->getValue($this->stub));

        //测试初始化银行预留手机
        $bankCardCellphoneParameter = $this->getPrivateProperty('User\Model\BankAccount', 'bankCardCellphone');
        $this->assertEmpty($bankCardCellphoneParameter->getValue($this->stub));

        //测试初始化账户添加时间
        $createTimeParameter = $this->getPrivateProperty('User\Model\BankAccount', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化账户更新时间
        $updateTimeParameter = $this->getPrivateProperty('User\Model\BankAccount', 'updateTime');
        $this->assertGreaterThan(0, $updateTimeParameter->getValue($this->stub));

    }


    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 BankAccount setId() 正确的传参类型,期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 BankAccount setId() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 BankAccount setId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
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
     * 设置 BankAccount setUser() 正确的传参类型,期望传值正确
     */
    // public function testSetUserCorrectType(){
    // 	$object = new \User\Model\User();		//根据需求自己添加对象的设置,如果需要
    // 	$this->stub->setUser($object);
    // 	$this->assertSame($object,$this->stub->getUser());
    // }

    /**
     * 设置 BankAccount setUser() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    // public function testSetUserWrongType(){
    // 	$this->stub->setUser('string');
    // }
    //user 测试 --------------------------------------------------------   end

    //bankCardHolderName 测试 ------------------------------------------ start
    /**
     * 设置 BankAccount setBankCardHolderName() 正确的传参类型,期望传值正确
     */
    public function testSetBankCardHolderNameCorrectType()
    {
        $this->stub->setBankCardHolderName('string');
        $this->assertEquals('string', $this->stub->getBankCardHolderName());
    }

    /**
     * 设置 BankAccount setBankCardHolderName() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetBankCardHolderNameWrongType()
    {
        $this->stub->setBankCardHolderName(array(1,2,3));
    }
    //bankCardHolderName 测试 ------------------------------------------   end

    //bankCardNumber 测试 ---------------------------------------------- start
    /**
     * 设置 BankAccount setBankCardNumber() 正确的传参类型,期望传值正确
     */
    public function testSetBankCardNumberCorrectType()
    {
        $this->stub->setBankCardNumber('string');
        $this->assertEquals('string', $this->stub->getBankCardNumber());
    }

    /**
     * 设置 BankAccount setBankCardNumber() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetBankCardNumberWrongType()
    {
        $this->stub->setBankCardNumber(array(1,2,3));
    }
    //bankCardNumber 测试 ----------------------------------------------   end

    //bankCardCellphone 测试 ------------------------------------------- start
    /**
     * 设置 BankAccount setBankCardCellphone() 正确的传参类型,期望传值正确
     */
    public function testSetBankCardCellphoneCorrectType()
    {
        $this->stub->setBankCardCellphone('15202939435');
        $this->assertEquals('15202939435', $this->stub->getBankCardCellphone());
    }

    /**
     * 设置 BankAccount setBankCardCellphone() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetBankCardCellphoneWrongType()
    {
        $this->stub->setBankCardCellphone(array(1,2,3));
    }

    /**
     * 设置 BankAccount setBankCardCellphone() 正确的传参类型,但是不属于手机格式,期望返回空.
     */
    public function testSetBankCardCellphoneCorrectTypeButNotEmail()
    {
        $this->stub->setBankCardCellphone('15202939435'.'a');
        $this->assertEquals('', $this->stub->getBankCardCellphone());
    }
    //bankCardCellphone 测试 -------------------------------------------   end

    //createTime 测试 -------------------------------------------------- start
    /**
     * 设置 BankAccount setCreateTime() 正确的传参类型,期望传值正确
     */
    public function testSetCreateTimeCorrectType()
    {
        $this->stub->setCreateTime(1460902917);
        $this->assertEquals(1460902917, $this->stub->getCreateTime());
    }

    /**
     * 设置 BankAccount setCreateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCreateTimeWrongType()
    {
        $this->stub->setCreateTime('string');
    }

    /**
     * 设置 BankAccount setCreateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetCreateTimeWrongTypeButNumeric()
    {
        $this->stub->setCreateTime('1460902917');
        $this->assertTrue(is_int($this->stub->getCreateTime()));
        $this->assertEquals(1460902917, $this->stub->getCreateTime());
    }
    //createTime 测试 --------------------------------------------------   end

    //updateTime 测试 -------------------------------------------------- start
    /**
     * 设置 BankAccount setUpdateTime() 正确的传参类型,期望传值正确
     */
    public function testSetUpdateTimeCorrectType()
    {
        $this->stub->setUpdateTime(1460902917);
        $this->assertEquals(1460902917, $this->stub->getUpdateTime());
    }

    /**
     * 设置 BankAccount setUpdateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUpdateTimeWrongType()
    {
        $this->stub->setUpdateTime('string');
    }

    /**
     * 设置 BankAccount setUpdateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetUpdateTimeWrongTypeButNumeric()
    {
        $this->stub->setUpdateTime('1460902917');
        $this->assertTrue(is_int($this->stub->getUpdateTime()));
        $this->assertEquals(1460902917, $this->stub->getUpdateTime());
    }
    //updateTime 测试 --------------------------------------------------   end
}
