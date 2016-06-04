<?php
namespace User\Command\User;

use System\Interfaces\Pcommand;
use User\Model\User;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * User/Command/User/UpdatePasswordCommand.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */

class VerifyCommandTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_saas_user');


    public function tearDown()
    {
        //清空缓存数据
        Core::$_cacheDriver->flushAll();
        parent::tearDown();
    }

    /**
     * 测试用户修改密码,生成新的salt和加密的密码和原来的数据不一致
     */
    public function testUpdatePasswordWithNewPassword()
    {

        //赋值待测试用户
        $user = new User(1);

        //查询旧用户的数据(密码 和 盐)
        $oldArray = Core::$_dbDriver->query('SELECT * FROM pcore_saas_user WHERE userId='.$user->getId());
        $oldArray = $oldArray[0];
        //给用户缓存层赋值,用于测试命令执行后是否删除缓存
        $userCache = new \User\Persistence\UserCache();
        $userCache->save($user->getId(), $oldArray);

        //初始化命令
        $command = Core::$_container->make('User\Command\User\VerifyCommand', ['user'=>$user]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);

        //期待状态修改成功
        $this->assertEquals(USER_STATUS_VERIFIED, $user->getStatus());
        //确认缓存删除成功
        $this->assertEmpty($userCache->get($user->getId()));

        //查询新用户的数据(密码 和 盐)
        $expectArray = Core::$_dbDriver->query('SELECT * FROM pcore_saas_user WHERE userId='.$user->getId());
        $expectArray = $expectArray[0];
        //确认和旧的用户 密码 盐 都不一致
        $this->assertEquals($user->getStatus(), $expectArray['status']);
        $this->assertEquals($user->getStatusTime(), $expectArray['statusTime']);
    }
}
