<?php
namespace Web\Command\Guest;

use System\Interfaces\Pcommand;
use Web\Model\Guest;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * Web/Command/Guest/UpdatePasswordCommand.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */

class UpdatePasswordCommandTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_web_guest');

    private $guest;

    private $guestCacheLayer;

    public function setUp()
    {
        //初始化guest
        $this->guest = new Guest();
        //初始化用户缓存
        $this->guestCacheLayer = new \Web\Persistence\GuestCache();

        parent::setUp();
    }

    public function tearDown()
    {
        unset($this->guest);
        unset($this->guestCacheLayer);
        //清空缓存数据
        Core::$_cacheDriver->flushAll();
        parent::tearDown();
    }

    /**
     * 测试用户修改密码,生成新的salt和加密的密码和原来的数据不一致
     */
    public function testUpdatePasswordWithNewPasswordCorrectSourceShop()
    {

        //赋值待测试用户
        $this->guest->setId(3);//3号id用户名为密码是 123456
        $this->guest->encryptPassword('111111');//赋值新的密码

        //查询旧用户的数据(密码 和 盐)
        $oldArray = Core::$_dbDriver->query('SELECT * FROM pcore_web_guest WHERE guestId='.$this->guest->getId());
        $oldArray = $oldArray[0];
        //给用户缓存层赋值,用于测试命令执行后是否删除缓存
        $this->guestCacheLayer->save($this->guest->getId(), $oldArray);

        //初始化命令
        $command = Core::$_container->make('Web\Command\Guest\UpdatePasswordCommand', ['guest'=>$this->guest]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);

        //确认缓存删除成功
        $this->assertEmpty($this->guestCacheLayer->get($this->guest->getId()));

        //查询新用户的数据(密码 和 盐)
        $expectArray = Core::$_dbDriver->query('SELECT password,salt FROM pcore_web_guest WHERE guestId='.$this->guest->getId());
        $expectArray = $expectArray[0];
        //确认密码和盐不为空
        $this->assertNotEmpty($expectArray['password']);
        $this->assertNotEmpty($expectArray['salt']);

        //确认和旧的用户 密码 盐 都不一致
        $this->assertNotEquals($oldArray['password'], $expectArray['password']);
        $this->assertNotEquals($oldArray['salt'], $expectArray['salt']);
    }
}
