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

class UpdatePasswordCommandTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_saas_user');

    private $user;

    private $userCacheLayer;

    public function setUp()
    {
        //初始化user
        $this->user = new User();
        //初始化用户缓存
        $this->userCacheLayer = new \User\Persistence\UserCache();

        parent::setUp();
    }

    public function tearDown()
    {
        unset($this->user);
        unset($this->userCacheLayer);
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
        $this->user->setId(3);//3号id用户名为密码是 123456
        $this->user->encryptPassword('111111');//赋值新的密码

        //查询旧用户的数据(密码 和 盐)
        $oldArray = Core::$_dbDriver->query('SELECT * FROM pcore_saas_user WHERE userId='.$this->user->getId());
        $oldArray = $oldArray[0];
        //给用户缓存层赋值,用于测试命令执行后是否删除缓存
        $this->userCacheLayer->save($this->user->getId(), $oldArray);

        //初始化命令
        $command = Core::$_container->make('User\Command\User\UpdatePasswordCommand', ['user'=>$this->user]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);

        //确认缓存删除成功
        $this->assertEmpty($this->userCacheLayer->get($this->user->getId()));

        //查询新用户的数据(密码 和 盐)
        $expectArray = Core::$_dbDriver->query('SELECT password,salt FROM pcore_saas_user WHERE userId='.$this->user->getId());
        $expectArray = $expectArray[0];
        //确认密码和盐不为空
        $this->assertNotEmpty($expectArray['password']);
        $this->assertNotEmpty($expectArray['salt']);

        //确认和旧的用户 密码 盐 都不一致
        $this->assertNotEquals($oldArray['password'], $expectArray['password']);
        $this->assertNotEquals($oldArray['salt'], $expectArray['salt']);
    }
}
