<?php
namespace Web\Model;

use GenericTestCase;

/**
 * Web\Model\Crew.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class CrewTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Web\Model\Crew();
    }

    /**
     * Crew 网店员工领域对象,测试构造函数
     */
    public function testCrewConstructor()
    {
        //测试初始化网店员工id
        $idParameter = $this->getPrivateProperty('Web\Model\Crew', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化用户手机号
        $cellPhoneParameter = $this->getPrivateProperty('Web\Model\Crew', 'cellPhone');
        $this->assertEmpty($cellPhoneParameter->getValue($this->stub));

        //测试初始化昵称
        $nickNameParameter = $this->getPrivateProperty('Web\Model\Crew', 'nickName');
        $this->assertEmpty($nickNameParameter->getValue($this->stub));

        //测试初始化员工用户名预留字段
        $userNameParameter = $this->getPrivateProperty('Web\Model\Crew', 'userName');
        $this->assertEmpty($userNameParameter->getValue($this->stub));

        //测试初始化员工真实姓名
        $realNameParameter = $this->getPrivateProperty('Web\Model\Crew', 'realName');
        $this->assertEmpty($realNameParameter->getValue($this->stub));

        //测试初始化微信账户
        $weixinAccountParameter = $this->getPrivateProperty('Web\Model\Crew', 'weixinAccount');
        $this->assertEmpty($weixinAccountParameter->getValue($this->stub));

        //测试初始化用户密码
        $passwordParameter = $this->getPrivateProperty('Web\Model\Crew', 'password');
        $this->assertEmpty($passwordParameter->getValue($this->stub));

        //测试初始化注册时间
        $signUpTimeParameter = $this->getPrivateProperty('Web\Model\Crew', 'signUpTime');
        $this->assertGreaterThan(0, $signUpTimeParameter->getValue($this->stub));

        //测试初始化来源店铺
        $sourceShopParameter = $this->getPrivateProperty('Web\Model\Crew', 'sourceShop');
        $this->assertEmpty($sourceShopParameter->getValue($this->stub));

    }


    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 Crew setId() 正确的传参类型,期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 Crew setId() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 Crew setId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
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
     * 设置 Crew setCellPhone() 正确的传参类型,期望传值正确
     */
    public function testSetCellPhoneCorrectType()
    {
        $this->stub->setCellPhone('15202939435');
        $this->assertEquals('15202939435', $this->stub->getCellPhone());
    }

    /**
     * 设置 Crew setCellPhone() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCellPhoneWrongType()
    {
        $this->stub->setCellPhone(array(1,2,3));
    }

    /**
     * 设置 Crew setCellPhone() 正确的传参类型,但是不属于手机格式,期望返回空.
     */
    public function testSetCellPhoneCorrectTypeButNotEmail()
    {
        $this->stub->setCellPhone('15202939435'.'a');
        $this->assertEquals('', $this->stub->getCellPhone());
    }
    //cellPhone 测试 ---------------------------------------------------   end

    //nickName 测试 ---------------------------------------------------- start
    /**
     * 设置 Crew setNickName() 正确的传参类型,期望传值正确
     */
    public function testSetNickNameCorrectType()
    {
        $this->stub->setNickName('string');
        $this->assertEquals('string', $this->stub->getNickName());
    }

    /**
     * 设置 Crew setNickName() 错误的传参类型,期望期望抛出TypeError exception
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
     * 设置 Crew setUserName() 正确的传参类型,期望传值正确
     */
    public function testSetUserNameCorrectType()
    {
        $this->stub->setUserName('string');
        $this->assertEquals('string', $this->stub->getUserName());
    }

    /**
     * 设置 Crew setUserName() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUserNameWrongType()
    {
        $this->stub->setUserName(array(1,2,3));
    }
    //userName 测试 ----------------------------------------------------   end

    //realName 测试 ---------------------------------------------------- start
    /**
     * 设置 Crew setRealName() 正确的传参类型,期望传值正确
     */
    public function testSetRealNameCorrectType()
    {
        $this->stub->setRealName('string');
        $this->assertEquals('string', $this->stub->getRealName());
    }

    /**
     * 设置 Crew setRealName() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetRealNameWrongType()
    {
        $this->stub->setRealName(array(1,2,3));
    }
    //realName 测试 ----------------------------------------------------   end

    //weixinAccount 测试 ----------------------------------------------- start
    /**
     * 设置 Crew setWeixinAccount() 正确的传参类型,期望传值正确
     */
    public function testSetWeixinAccountCorrectType()
    {
        $this->stub->setWeixinAccount('string');
        $this->assertEquals('string', $this->stub->getWeixinAccount());
    }

    /**
     * 设置 Crew setWeixinAccount() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetWeixinAccountWrongType()
    {
        $this->stub->setWeixinAccount(array(1,2,3));
    }
    //weixinAccount 测试 -----------------------------------------------   end

    //password 测试 ---------------------------------------------------- start
    /**
     * 设置 Crew setPassword() 正确的传参类型,期望传值正确
     */
    public function testSetPasswordCorrectType()
    {
        $this->stub->setPassword('string');
        $this->assertEquals('string', $this->stub->getPassword());
    }

    /**
     * 设置 Crew setPassword() 错误的传参类型,期望期望抛出TypeError exception
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
     * 设置 Crew setSignUpTime() 正确的传参类型,期望传值正确
     */
    public function testSetSignUpTimeCorrectType()
    {
        $this->stub->setSignUpTime(1461049456);
        $this->assertEquals(1461049456, $this->stub->getSignUpTime());
    }

    /**
     * 设置 Crew setSignUpTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetSignUpTimeWrongType()
    {
        $this->stub->setSignUpTime('string');
    }

    /**
     * 设置 Crew setSignUpTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetSignUpTimeWrongTypeButNumeric()
    {
        $this->stub->setSignUpTime('1461049456');
        $this->assertTrue(is_int($this->stub->getSignUpTime()));
        $this->assertEquals(1461049456, $this->stub->getSignUpTime());
    }
    //signUpTime 测试 --------------------------------------------------   end

    //updateTime 测试 -------------------------------------------------- start
    /**
     * 设置 Crew setUpdateTime() 正确的传参类型,期望传值正确
     */
    public function testSetUpdateTimeCorrectType()
    {
        $this->stub->setUpdateTime(1461048262);
        $this->assertEquals(1461048262, $this->stub->getUpdateTime());
    }

    /**
     * 设置 Crew setUpdateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUpdateTimeWrongType()
    {
        $this->stub->setUpdateTime('string');
    }

    /**
     * 设置 Crew setUpdateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
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
     * 设置 Crew setSourceShop() 正确的传参类型,期望传值正确
     */
    public function testSetSourceShopCorrectType()
    {
        $object = new \Web\Model\Shop();        //根据需求自己添加对象的设置,如果需要
        $this->stub->setSourceShop($object);
        $this->assertSame($object, $this->stub->getSourceShop());
    }

    /**
     * 设置 Crew setSourceShop() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetSourceShopWrongType()
    {
        $this->stub->setSourceShop('string');
    }
    //sourceShop 测试 --------------------------------------------------   end

    //encryptPassword 测试 ---------------------------------------------  start
    /**
     * 设置User encryptPassword() salt传空,期望产生salt值和加密过的密码
     */
    public function testUserEncryptPasswordWithoutSalt()
    {
        //初始化密码
        $password = '111111';
        $this->stub->encryptPassword($password);

        //确认密码是一个32位长度和salt一起加密过的md5值
        $this->assertEquals(32, strlen($this->stub->getPassword()));

        //确认盐是一个4位长度
        $this->assertEquals(4, strlen($this->stub->getSalt()));
    }

    /**
     * 设置User encryptPassword()
     *
     * 1. 先生成密码和salt
     * 2. 传入salt和原始密码,确认再次加密后的值和第一次生成的密码一致
     */
    public function testUserEncryptPasswordWithSalt()
    {
        //初始化密码
        $password = '111111';
        $this->stub->encryptPassword($password);
        $salt = $this->stub->getSalt();

        //初始化一个新的用户,再次加密
        $anotherUser = new \Web\Model\Crew();
        $anotherUser->encryptPassword($password, $salt);

        //校验第一次生成的密码和盐,再次加密期望一致
        $this->assertEquals($this->stub->getPassword(), $anotherUser->getPassword());
    }
    //encryptPassword 测试 ----------------------------------------------  end
}
