<?php
namespace User\Service;

use User\Model\User;
use User\Repository;
use Core;
use GenericTestsDatabaseTestCase;
use Common;

/**
 * User/Service/GuestService.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class GuestServiceTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_saas_user');

    private $service;

    private $userCacheLayer;

    public function setUp()
    {

        //初始化service
        $this->service = new \User\Service\GuestService(new User());

        //初始化用户缓存,为了测试一些服务正常删除缓存,使用用户id为3的用户测试缓存
        $this->userCacheLayer = new \User\Persistence\UserCache();

        parent::setUp();
    }

    public function tearDown()
    {
        //清空缓存数据
        Core::$_cacheDriver->flushAll();
        parent::tearDown();
    }

    /**
     * 测试游客身份注册功能 GuestService signUp() 错误的验证码,期望返回失败,用户数据库数据不变
     */
    public function testGuestServiceSignUpWithWrongVerifyCode()
    {

        //初始化数据
        $cellPhone = '15202939435';
        $password = '111111';
        $code = 'test';

        //初始化存储验证码
        //获取key前缀
        $service = new Common\Service\SignUpSaasSmsService();
        $keyPrefixParams = $this->getPrivateProperty('Common\Service\SignUpSaasSmsService', 'keyPrefix');
        $keyPrefix = $keyPrefixParams->getValue($service);
        $verifyCode = new Common\Model\VerifyCode();
        //构建验证码类
        $verifyCode->setKey($keyPrefix.'_'.$cellPhone);
        $verifyCode->setCode($code);
        //存储验证码
        $verifyCode->save();

        //旧的用户总数
        $oldCount = Core::$_dbDriver->query('SELECT COUNT(*) as count FROM pcore_saas_user');
        $oldCount = $oldCount[0]['count'];

        //调用服务
        $result = $this->service->signUp($cellPhone, $password, $code.'Wrong');
        //期望结果返回false
        $this->assertFalse($result);

        //查询数据库,确认数据没有插入成功
        //新的用户总数
        $newCount = Core::$_dbDriver->query('SELECT COUNT(*) as count FROM pcore_saas_user');
        $newCount = $newCount[0]['count'];

        //期望旧的用户总数和新的用户总数一致没有变化
        $this->assertEquals($oldCount, $newCount);
    }

    /**
     * 测试游客身份注册功能 GuestService signUp() 正确的验证码,期望返回正确,用户数据库数据插入新的数据
     */
    public function testGuestServiceSignUpWithCorrectVerifyCodeCorrectCellPhon()
    {

        //初始化数据
        $cellPhone = '15202939435';
        $password = '111111';
        $code = 'test';
        //获取key前缀
        $service = new Common\Service\SignUpSaasSmsService();
        $keyPrefixParams = $this->getPrivateProperty('Common\Service\SignUpSaasSmsService', 'keyPrefix');
        $keyPrefix = $keyPrefixParams->getValue($service);

        $verifyCode = new Common\Model\VerifyCode();
        //构建验证码类
        $verifyCode->setKey($keyPrefix.'_'.$cellPhone);
        $verifyCode->setCode($code);
        //存储验证码
        $verifyCode->save();

        //调用服务
        $result = $this->service->signUp($cellPhone, $password, $code);

        //期望注册成功
        $this->assertTrue($result);

        //查询数据库,确认数据插入成功
        $expectArray = Core::$_dbDriver->query('SELECT * FROM pcore_saas_user WHERE userId='.$this->service->getUser()->getId());
        $expectArray = $expectArray[0];

        $this->assertEquals($this->service->getUser()->getId(), $expectArray['userId']);
        $this->assertEquals($this->service->getUser()->getCellPhone(), $expectArray['cellPhone']);
        $this->assertEquals($this->service->getUser()->getSalt(), $expectArray['salt']);
        $this->assertNotEmpty($this->service->getUser()->getSignUpTime(), $expectArray['signUpTime']);
    }

    /**
     * 测试游客身份注册功能 GuestService signUp() 正确的验证码,重复的手机号,期望返回失败,用户数据库数据不变
     */
    public function testGuestServiceSignUpWithCorrectVerifyCodeDuplicateCellPhoneNumber()
    {

        //初始化数据
        $password = '111111';
        $code = 'test';

        //旧的用户总数
        $oldCount = Core::$_dbDriver->query('SELECT COUNT(*) as count FROM pcore_saas_user');
        $oldCount = $oldCount[0]['count'];

        //查询出一个已经使用过的手机号
        $existedCellPhoneNumber = Core::$_dbDriver->query('SELECT cellPhone FROM pcore_saas_user LIMIT 1');
        $existedCellPhoneNumber = $existedCellPhoneNumber[0]['cellPhone'];
        //重新赋值一个已经存在的手机号

        //获取key前缀
        $service = new Common\Service\SignUpSaasSmsService();
        $keyPrefixParams = $this->getPrivateProperty('Common\Service\SignUpSaasSmsService', 'keyPrefix');
        $keyPrefix = $keyPrefixParams->getValue($service);
        $verifyCode = new Common\Model\VerifyCode();
        //构建验证码类
        $verifyCode->setKey($keyPrefix.'_'.$existedCellPhoneNumber);
        $verifyCode->setCode($code);
        //存储验证码
        $verifyCode->save();

        //调用服务
        $result = $this->service->signUp($existedCellPhoneNumber, $password, $code);

        //期望结果返回false
        $this->assertFalse($result);

        //查询数据库,确认数据没有插入成功
        //新的用户总数
        $newCount = Core::$_dbDriver->query('SELECT COUNT(*) as count FROM pcore_saas_user');
        $newCount = $newCount[0]['count'];

        //期望旧的用户总数和新的用户总数一致没有变化
        $this->assertEquals($oldCount, $newCount);
    }

    /**
     * 测试游客身份登录功能 GuestService signIn() 正确的用户名和密码,期望返回成功
     */
    public function testGuestServiceSignInWithCorrectPassword()
    {
        //初始化数据
        $cellPhone = '13571779122';
        $password = '123456';

        //pcore_saas_user.xml 3号用户的用户名为 13571779122 密码为 123456
        //调用服务
        $result = $this->service->signIn($cellPhone, $password);

        $this->assertTrue($result);

        $dbResult = Core::$_dbDriver->query("SELECT userId FROM pcore_saas_user WHERE cellPhone = '13571779122'");
        //期望返回成功
        $this->assertEquals($this->service->getUser()->getId(), $dbResult[0]['userId']);
    }

    
    /**
     * 测试游客身份登录功能 GuestService signIn() 错误的用户名和密码,期望返回失败
     */
    public function testGuestServiceSignInWithWrongPassword()
    {
        //初始化数据
        $cellPhone = '13571779122';
        $password = '123456';
        
        //pcore_user.xml 3号用户的用户名为 13571779122 密码为 123456
        //所以设定一个错误的密码1234567
        //调用服务
        $result = $this->service->signIn('13571779122', '1234567');
        //期望返回成功
        $this->assertFalse($result);
    }

    /**
     * 测试游客身份重置密码 错误的验证码
     * 期望返回false
     */
    public function testGuestServiceRestPasswordWithWrongVerifyCode()
    {
        //初始化数据
        $cellPhone = '13571779176';
        $password = '111111';
        $code = 'test';
        //获取key前缀
        $service = new Common\Service\RestSaasPasswordSmsService();
        $keyPrefixParams = $this->getPrivateProperty('Common\Service\RestSaasPasswordSmsService', 'keyPrefix');
        $keyPrefix = $keyPrefixParams->getValue($service);

        $verifyCode = new Common\Model\VerifyCode();
        //构建验证码类
        $verifyCode->setKey($keyPrefix.'_'.$cellPhone);
        $verifyCode->setCode($code);
        //存储验证码
        $verifyCode->save();
        //3号用户的用户名为 13571779176 密码为 123456
        //赋值新的密码给该用户
        //调用服务
        $result = $this->service->restPassword($cellPhone, $password, $code.'Wrong');

        //期望服务返回成功
        $this->assertFalse($result);
    }

    /**
     * 测试游客身份重置密码 正确的验证码,但是不存在的手机号
     * 期望返回false
     */
    public function testGuestServiceRestPasswordWithCorrectVerifyCodeAndNotExistCellPhone()
    {

        //初始化数据
        $cellPhone = '13571779171';
        $password = '111111';
        $code = 'test';
        //获取key前缀
        $service = new Common\Service\RestSaasPasswordSmsService();
        $keyPrefixParams = $this->getPrivateProperty('Common\Service\RestSaasPasswordSmsService', 'keyPrefix');
        $keyPrefix = $keyPrefixParams->getValue($service);

        $verifyCode = new Common\Model\VerifyCode();
        //构建验证码类
        $verifyCode->setKey($keyPrefix.'_'.$cellPhone);
        $verifyCode->setCode($code);
        //存储验证码
        $verifyCode->save();
        //3号用户的用户名为 13571779176 密码为 123456
        //赋值新的密码给该用户
        //调用服务
        $result = $this->service->restPassword($cellPhone, $password, $code);

        //期望服务返回成功
        $this->assertFalse($result);
    }

    /**
     * 测试游客身份重置密码 正确的验证码和存在的手机号 GuestService restPassword()
     */
    public function testGuestServiceRestPasswordWithCorrectVerifyCodeAndExistCellPhone()
    {

        //初始化数据
        $cellPhone = '13571779122';
        $password = '111111';
        $code = 'test';
        //获取key前缀
        $service = new Common\Service\RestSaasPasswordSmsService();
        $keyPrefixParams = $this->getPrivateProperty('Common\Service\RestSaasPasswordSmsService', 'keyPrefix');
        $keyPrefix = $keyPrefixParams->getValue($service);

        $verifyCode = new Common\Model\VerifyCode();
        //构建验证码类
        $verifyCode->setKey($keyPrefix.'_'.$cellPhone);
        $verifyCode->setCode($code);
        //存储验证码
        $verifyCode->save();

        //查询旧用户的数据(密码 和 盐)
        $lastUserInfo = Core::$_dbDriver->query('SELECT password,salt FROM pcore_saas_user WHERE userId=3');

        //3号用户的用户名为 13571779122 密码为 123456
        //赋值新的密码给该用户
        //调用服务
        $result = $this->service->restPassword($cellPhone, $password, $code);

        //期望服务返回成功
        $this->assertTrue($result);

        //确认缓存删除成功
        $this->assertEmpty($this->userCacheLayer->get(3));

        //查询新用户的数据(密码 和 盐)
        $newUserInfo = Core::$_dbDriver->query('SELECT password,salt FROM pcore_saas_user WHERE userId=3');

        //确认密码和盐不为空
        $this->assertNotEmpty($newUserInfo[0]['password']);
        $this->assertNotEmpty($newUserInfo[0]['salt']);

        //确认和旧的用户 密码 盐 都不一致
        $this->assertNotEquals($lastUserInfo[0]['password'], $newUserInfo[0]['password']);
        $this->assertNotEquals($lastUserInfo[0]['salt'], $newUserInfo[0]['salt']);
    }
}
