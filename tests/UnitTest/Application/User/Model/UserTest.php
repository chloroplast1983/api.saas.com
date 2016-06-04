<?php
namespace User\Model;

use GenericTestCase;

/**
 * User\Model\User.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class UserTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \User\Model\User();
    }

    /**
     * User 网店用户领域对象,测试构造函数
     */
    public function testUserConstructor()
    {
        //测试初始化网店用户id
        $idParameter = $this->getPrivateProperty('User\Model\User', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化用户手机号
        $cellPhoneParameter = $this->getPrivateProperty('User\Model\User', 'cellPhone');
        $this->assertEmpty($cellPhoneParameter->getValue($this->stub));

        //测试初始化昵称
        $nickNameParameter = $this->getPrivateProperty('User\Model\User', 'nickName');
        $this->assertEmpty($nickNameParameter->getValue($this->stub));

        //测试初始化用户名预留字段
        $userNameParameter = $this->getPrivateProperty('User\Model\User', 'userName');
        $this->assertEmpty($userNameParameter->getValue($this->stub));

        //测试初始化用户密码
        $passwordParameter = $this->getPrivateProperty('User\Model\User', 'password');
        $this->assertEmpty($passwordParameter->getValue($this->stub));

        //测试初始化注册时间
        $signUpTimeParameter = $this->getPrivateProperty('User\Model\User', 'signUpTime');
        $this->assertGreaterThan(0, $signUpTimeParameter->getValue($this->stub));

        //测试初始化更新时间
        $updateTimeParameter = $this->getPrivateProperty('User\Model\User', 'updateTime');
        $this->assertGreaterThan(0, $updateTimeParameter->getValue($this->stub));

        //测试初始化用户状态
        $statusParameter = $this->getPrivateProperty('User\Model\User', 'status');
        $this->assertEquals(USER_STATUS_NORMAL, $statusParameter->getValue($this->stub));

        //测试初始化状态变更时间
        $statusTimeParameter = $this->getPrivateProperty('User\Model\User', 'statusTime');
        $this->assertGreaterThan(0, $statusTimeParameter->getValue($this->stub));

        //测试初始化用户类型
        $typeParameter = $this->getPrivateProperty('User\Model\User', 'type');
        $this->assertEquals(TRAVEL_UNDEFINED, $typeParameter->getValue($this->stub));
    }


    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 User setId() 正确的传参类型,期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 User setId() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 User setId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
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
     * 设置 User setCellPhone() 正确的传参类型,期望传值正确
     */
    public function testSetCellPhoneCorrectType()
    {
        $this->stub->setCellPhone('15202939435');
        $this->assertEquals('15202939435', $this->stub->getCellPhone());
    }

    /**
     * 设置 User setCellPhone() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCellPhoneWrongType()
    {
        $this->stub->setCellPhone(array(1,2,3));
    }

    /**
     * 设置 User setCellPhone() 正确的传参类型,但是不属于手机格式,期望返回空.
     */
    public function testSetCellPhoneCorrectTypeButNotEmail()
    {
        $this->stub->setCellPhone('15202939435'.'a');
        $this->assertEquals('', $this->stub->getCellPhone());
    }
    //cellPhone 测试 ---------------------------------------------------   end

    //nickName 测试 ---------------------------------------------------- start
    /**
     * 设置 User setNickName() 正确的传参类型,期望传值正确
     */
    public function testSetNickNameCorrectType()
    {
        $this->stub->setNickName('string');
        $this->assertEquals('string', $this->stub->getNickName());
    }

    /**
     * 设置 User setNickName() 错误的传参类型,期望期望抛出TypeError exception
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
     * 设置 User setUserName() 正确的传参类型,期望传值正确
     */
    public function testSetUserNameCorrectType()
    {
        $this->stub->setUserName('string');
        $this->assertEquals('string', $this->stub->getUserName());
    }

    /**
     * 设置 User setUserName() 错误的传参类型,期望期望抛出TypeError exception
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
     * 设置 User setPassword() 正确的传参类型,期望传值正确
     */
    public function testSetPasswordCorrectType()
    {
        $this->stub->setPassword('string');
        $this->assertEquals('string', $this->stub->getPassword());
    }

    /**
     * 设置 User setPassword() 错误的传参类型,期望期望抛出TypeError exception
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
     * 设置 User setSignUpTime() 正确的传参类型,期望传值正确
     */
    public function testSetSignUpTimeCorrectType()
    {
        $this->stub->setSignUpTime(1461048262);
        $this->assertEquals(1461048262, $this->stub->getSignUpTime());
    }

    /**
     * 设置 User setSignUpTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetSignUpTimeWrongType()
    {
        $this->stub->setSignUpTime('string');
    }

    /**
     * 设置 User setSignUpTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetSignUpTimeWrongTypeButNumeric()
    {
        $this->stub->setSignUpTime('1461048262');
        $this->assertTrue(is_int($this->stub->getSignUpTime()));
        $this->assertEquals(1461048262, $this->stub->getSignUpTime());
    }
    //signUpTime 测试 --------------------------------------------------   end

    //updateTime 测试 -------------------------------------------------- start
    /**
     * 设置 User setUpdateTime() 正确的传参类型,期望传值正确
     */
    public function testSetUpdateTimeCorrectType()
    {
        $this->stub->setUpdateTime(1461048262);
        $this->assertEquals(1461048262, $this->stub->getUpdateTime());
    }

    /**
     * 设置 User setUpdateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUpdateTimeWrongType()
    {
        $this->stub->setUpdateTime('string');
    }

    /**
     * 设置 User setUpdateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetUpdateTimeWrongTypeButNumeric()
    {
        $this->stub->setUpdateTime('1461048262');
        $this->assertTrue(is_int($this->stub->getUpdateTime()));
        $this->assertEquals(1461048262, $this->stub->getUpdateTime());
    }
    //updateTime 测试 --------------------------------------------------   end

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
        $anotherUser = new \User\Model\User();
        $anotherUser->encryptPassword($password, $salt);

        //校验第一次生成的密码和盐,再次加密期望一致
        $this->assertEquals($this->stub->getPassword(), $anotherUser->getPassword());
    }
    //encryptPassword 测试 ----------------------------------------------  end

    //status 测试 ------------------------------------------------------ start
    /**
     * 循环测试 User setStatus() 是否符合预定范围
     *
     * @dataProvider statusProvider
     */
    public function testSetStatus($actual, $expected)
    {
        $this->stub->setStatus($actual);
        $this->assertEquals($expected, $this->stub->getStatus());
    }

    /**
     * 循环测试 User setStatus() 数据构建器
     */
    public function statusProvider()
    {
        return array(
            array(USER_STATUS_NORMAL,USER_STATUS_NORMAL),
            array(USER_STATUS_VERIFIED,USER_STATUS_VERIFIED),
            array(9999,USER_STATUS_NORMAL),
        );
    }

    /**
     * 设置 User setStatus() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusWrongType()
    {
        $this->stub->setStatus('string');
    }
    //status 测试 ------------------------------------------------------   end

    //statusTime 测试 -------------------------------------------------- start
    /**
     * 设置 User setStatusTime() 正确的传参类型,期望传值正确
     */
    public function testSetStatusTimeCorrectType()
    {
        $this->stub->setStatusTime(1461676779);
        $this->assertEquals(1461676779, $this->stub->getStatusTime());
    }

    /**
     * 设置 User setStatusTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusTimeWrongType()
    {
        $this->stub->setStatusTime('string');
    }

    /**
     * 设置 User setStatusTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetStatusTimeWrongTypeButNumeric()
    {
        $this->stub->setStatusTime('1461676779');
        $this->assertTrue(is_int($this->stub->getStatusTime()));
        $this->assertEquals(1461676779, $this->stub->getStatusTime());
    }
    //statusTime 测试 --------------------------------------------------   end

    //type 测试 -------------------------------------------------------- start
    /**
     * 循环测试 User setType() 是否符合预定范围
     *
     * @dataProvider typeProvider
     */
    public function testSetType($actual, $expected)
    {
        $this->stub->setType($actual);
        $this->assertEquals($expected, $this->stub->getType());
    }

    /**
     * 循环测试 User setType() 数据构建器
     */
    public function typeProvider()
    {
        return array(
            array(TRAVEL_UNDEFINED,TRAVEL_UNDEFINED),
            array(TRAVEL_AGENCY,TRAVEL_AGENCY),
            array(TRAVEL_WHOLESALER,TRAVEL_WHOLESALER),
            array(TRAVEL_OPERATOR,TRAVEL_OPERATOR),
            array(TRAVEL_PERSONAL,TRAVEL_PERSONAL),
            array(9999,TRAVEL_UNDEFINED),
        );
    }

    /**
     * 设置 User setType() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetTypeWrongType()
    {
        $this->stub->setType('string');
    }
    //type 测试 --------------------------------------------------------   end
}
