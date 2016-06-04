<?php
namespace Web\Model;

use GenericTestCase;

/**
 * Web\Model\Guest.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.23
 */

class GuestTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Web\Model\Guest();
    }

    /**
     * Guest 网店用户领域对象,测试构造函数
     */
    public function testGuestConstructor()
    {
        //测试初始化网店用户id
        $idParameter = $this->getPrivateProperty('Web\Model\Guest', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化用户手机号
        $cellPhoneParameter = $this->getPrivateProperty('Web\Model\Guest', 'cellPhone');
        $this->assertEmpty($cellPhoneParameter->getValue($this->stub));

        //测试初始化昵称
        $nickNameParameter = $this->getPrivateProperty('Web\Model\Guest', 'nickName');
        $this->assertEmpty($nickNameParameter->getValue($this->stub));

        //测试初始化用户名预留字段
        $userNameParameter = $this->getPrivateProperty('Web\Model\Guest', 'userName');
        $this->assertEmpty($userNameParameter->getValue($this->stub));

        //测试初始化用户密码
        $passwordParameter = $this->getPrivateProperty('Web\Model\Guest', 'password');
        $this->assertEmpty($passwordParameter->getValue($this->stub));

        //测试初始化注册时间
        $signUpTimeParameter = $this->getPrivateProperty('Web\Model\Guest', 'signUpTime');
        $this->assertGreaterThan(0, $signUpTimeParameter->getValue($this->stub));

        //测试初始化来源店铺
        $sourceShopParameter = $this->getPrivateProperty('Web\Model\Guest', 'sourceShop');
        $this->assertInstanceOf('Web\Model\Shop', $sourceShopParameter->getValue($this->stub));

    }


    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 Guest setId() 正确的传参类型,期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 Guest setId() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 Guest setId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetIdWrongTypeButNumeric()
    {
        $this->stub->setId('1');
        $this->assertTrue(is_int($this->stub->getId()));
        $this->assertEquals(1, $this->stub->getId());
    }
    //id 测试 ----------------------------------------------------------   end

    //cellPhone 测试 --------------------------------------------------- start
    /**
     * 设置 Guest setCellPhone() 正确的传参类型,期望传值正确
     */
    public function testSetCellPhoneCorrectType()
    {
        $this->stub->setCellPhone('15202939435');
        $this->assertEquals('15202939435', $this->stub->getCellPhone());
    }

    /**
     * 设置 Guest setCellPhone() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCellPhoneWrongType()
    {
        $this->stub->setCellPhone(array(1,2,3));
    }

    /**
     * 设置 Guest setCellPhone() 正确的传参类型,但是不属于手机格式,期望返回空.
     */
    public function testSetCellPhoneCorrectTypeButNotEmail()
    {
        $this->stub->setCellPhone('15202939435'.'a');
        $this->assertEquals('', $this->stub->getCellPhone());
    }
    //cellPhone 测试 ---------------------------------------------------   end

    //nickName 测试 ---------------------------------------------------- start
    /**
     * 设置 Guest setNickName() 正确的传参类型,期望传值正确
     */
    public function testSetNickNameCorrectType()
    {
        $this->stub->setNickName('string');
        $this->assertEquals('string', $this->stub->getNickName());
    }

    /**
     * 设置 Guest setNickName() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetNickNameWrongType()
    {
        $this->stub->setNickName(array(1,2,3));
    }
    //nickName 测试 ----------------------------------------------------   end

    //userName 测试 ---------------------------------------------------- start
    /**
     * 设置 Guest setUserName() 正确的传参类型,期望传值正确
     */
    public function testSetUserNameCorrectType()
    {
        $this->stub->setUserName('string');
        $this->assertEquals('string', $this->stub->getUserName());
    }

    /**
     * 设置 Guest setUserName() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUserNameWrongType()
    {
        $this->stub->setUserName(array(1,2,3));
    }
    //userName 测试 ----------------------------------------------------   end

    //password 测试 ---------------------------------------------------- start
    /**
     * 设置 Guest setPassword() 正确的传参类型,期望传值正确
     */
    public function testSetPasswordCorrectType()
    {
        $this->stub->setPassword('string');
        $this->assertEquals('string', $this->stub->getPassword());
    }

    /**
     * 设置 Guest setPassword() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetPasswordWrongType()
    {
        $this->stub->setPassword(array(1,2,3));
    }
    //password 测试 ----------------------------------------------------   end

    //signUpTime 测试 -------------------------------------------------- start
    /**
     * 设置 Guest setSignUpTime() 正确的传参类型,期望传值正确
     */
    public function testSetSignUpTimeCorrectType()
    {
        $this->stub->setSignUpTime(1461392001);
        $this->assertEquals(1461392001, $this->stub->getSignUpTime());
    }

    /**
     * 设置 Guest setSignUpTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetSignUpTimeWrongType()
    {
        $this->stub->setSignUpTime('string');
    }

    /**
     * 设置 Guest setSignUpTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetSignUpTimeWrongTypeButNumeric()
    {
        $this->stub->setSignUpTime('1461392001');
        $this->assertTrue(is_int($this->stub->getSignUpTime()));
        $this->assertEquals(1461392001, $this->stub->getSignUpTime());
    }
    //signUpTime 测试 --------------------------------------------------   end

    //updateTime 测试 -------------------------------------------------- start
    /**
     * 设置 Guest setUpdateTime() 正确的传参类型,期望传值正确
     */
    public function testSetUpdateTimeCorrectType()
    {
        $this->stub->setUpdateTime(1461048262);
        $this->assertEquals(1461048262, $this->stub->getUpdateTime());
    }

    /**
     * 设置 Guest setUpdateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUpdateTimeWrongType()
    {
        $this->stub->setUpdateTime('string');
    }

    /**
     * 设置 Guest setUpdateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetUpdateTimeWrongTypeButNumeric()
    {
        $this->stub->setUpdateTime('1461048262');
        $this->assertTrue(is_int($this->stub->getUpdateTime()));
        $this->assertEquals(1461048262, $this->stub->getUpdateTime());
    }
    //updateTime 测试 --------------------------------------------------   end
    
    //sourceShop 测试 -------------------------------------------------- start
    /**
     * 设置 Guest setSourceShop() 正确的传参类型,期望传值正确
     */
    public function testSetSourceShopCorrectType()
    {
        $object = new \Web\Model\Shop();        //根据需求自己添加对象的设置,如果需要
        $this->stub->setSourceShop($object);
        $this->assertSame($object, $this->stub->getSourceShop());
    }

    /**
     * 设置 Guest setSourceShop() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetSourceShopWrongType()
    {
        $this->stub->setSourceShop('string');
    }
    //sourceShop 测试 --------------------------------------------------   end
}
