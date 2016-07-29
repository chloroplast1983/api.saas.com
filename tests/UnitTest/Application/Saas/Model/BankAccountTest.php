<?php
namespace Saas\Model;

use tests\GenericTestCase;
use Common;

/**
 * Saas\Model\BankAccount.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.17
 */

class BankAccountTest extends GenericTestCase
{

    use Common\Model\ObjectTest;

    private $stub;

    public function setUp()
    {
        $this->stub = new BankAccount();
    }

    /**
     * BankAccount saas用户银行账户领域对象,测试构造函数
     */
    public function testBankAccountConstructor()
    {
        //测试初始化银行账户id
        $idParameter = $this->getPrivateProperty('Saas\Model\BankAccount', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化银行持卡人姓名
        $bankCardHolderNameParameter = $this->getPrivateProperty('Saas\Model\BankAccount', 'bankCardHolderName');
        $this->assertEmpty($bankCardHolderNameParameter->getValue($this->stub));

        //测试初始化卡号
        $bankCardNumberParameter = $this->getPrivateProperty('Saas\Model\BankAccount', 'bankCardNumber');
        $this->assertEmpty($bankCardNumberParameter->getValue($this->stub));

        //测试初始化银行预留手机
        $bankCardCellphoneParameter = $this->getPrivateProperty('Saas\Model\BankAccount', 'bankCardCellphone');
        $this->assertEmpty($bankCardCellphoneParameter->getValue($this->stub));

        //测试初始化账户添加时间
        $createTimeParameter = $this->getPrivateProperty('Saas\Model\BankAccount', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化账户更新时间
        $updateTimeParameter = $this->getPrivateProperty('Saas\Model\BankAccount', 'updateTime');
        $this->assertGreaterThan(0, $updateTimeParameter->getValue($this->stub));
    }

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

    //status 测试 ------------------------------------------------------ start
    /**
     * 循环测试 CrewGroup setStatus() 是否符合预定范围
     *
     * @dataProvider statusProvider
     */
    public function testSetStatus($actual, $expected)
    {
        $this->stub->setStatus($actual);
        $this->assertEquals($expected, $this->stub->getStatus());
    }

    /**
     * 循环测试 CrewGroup setStatus() 数据构建器
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
     * 设置 CrewGroup setStatus() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusWrongType()
    {
        $this->stub->setStatus('string');
    }
    //status 测试 ------------------------------------------------------   end
}
