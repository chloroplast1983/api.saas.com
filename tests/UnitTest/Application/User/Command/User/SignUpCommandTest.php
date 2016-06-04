<?php
namespace User\Command\User;

use System\Interfaces\Pcommand;
use User\Model\User;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * User/Command/User/SignUpUserCommand.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */

class SignUpCommandTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_saas_user');

    private $user;

    public function setUp()
    {
        $this->user = new User();
        parent::setUp();
    }

    public function tearDown()
    {
        //删除user
        unset($this->user);
        parent::tearDown();
    }

    /**
     * 测试一个新的手机号注册,期望命令返回成功,且数据库已经成功插入数据
     */
    public function testSignUpWithNewCellPhoneNumber()
    {
        //初始化user
        $this->user->setCellPhone('15202939435');
        $this->user->encryptPassword('111111');
        //初始化命令
        $command = Core::$_container->make('User\Command\User\SignUpCommand', ['user'=>$this->user]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);

        $id = $this->user->getId();
        //期望uid已经赋值且大于0
        $this->assertGreaterThan(0, $id);

        //查询数据库,确认数据插入成功
        $result = Core::$_dbDriver->query('SELECT * FROM pcore_saas_user WHERE userId='.$id);

        $this->assertEquals($id, $result[0]['userId']);
        $this->assertEquals($this->user->getCellPhone(), $result[0]['cellPhone']);
        $this->assertNotEmpty($result[0]['salt']);
        $this->assertEquals($this->user->getPassword(), $result[0]['password']);
        $this->assertEquals($this->user->getSignUpTime(), $result[0]['signUpTime']);
        $this->assertEquals($this->user->getUpdateTime(), $result[0]['updateTime']);
        $this->assertEquals($this->user->getStatusTime(), $result[0]['statusTime']);
        $this->assertEquals($this->user->getStatus(), $result[0]['status']);
    }

    /**
     * 测试一个已经注册过的手机号,期望命令返回失败,数据库没有成功插入数据
     */
    public function testSignUpWithDuplicateCellPhoneNumber()
    {

        //旧的用户总数
        $oldCount = Core::$_dbDriver->query('SELECT COUNT(*) as count FROM pcore_saas_user');
        $oldCount = $oldCount[0]['count'];

        //查询出一个已经使用过的手机号
        $existedCellPhoneNumber = Core::$_dbDriver->query('SELECT cellPhone FROM pcore_saas_user LIMIT 1');
        $existedCellPhoneNumber = $existedCellPhoneNumber[0]['cellPhone'];
        //重新赋值一个已经存在的手机号
        $this->user->setCellPhone($existedCellPhoneNumber);

        //初始化命令
        $command = Core::$_container->make('User\Command\User\SignUpCommand', ['user'=>$this->user]);
        //执行命令
        $result = $command->execute();

        //期望命令返回失败
        $this->assertFalse($result);

        //期望uid没有赋值
        $this->assertEmpty($this->user->getId());

        //查询数据库,确认数据没有插入成功
        //新的用户总数
        $newCount = Core::$_dbDriver->query('SELECT COUNT(*) as count FROM pcore_saas_user');
        $newCount = $newCount[0]['count'];

        //期望旧的用户总数和新的用户总数一致没有变化
        $this->assertEquals($oldCount, $newCount);
    }
}
