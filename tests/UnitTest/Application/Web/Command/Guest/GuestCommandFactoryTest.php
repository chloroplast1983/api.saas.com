<?php
namespace Web\Command\Guest;

use GenericTestCase;
use Core;

/**
 * Web/Command/Guest/UserCommandFactoryTest.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class UserCommandFactoryTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        //初始化工厂桩件
        $this->stub = new \Web\Command\Guest\GuestCommandFactory();
    }

    /**
     * 测试SignUp命令返回
     */
    public function testUserCommandFactorySignUp()
    {

        $command = $this->stub->createCommand('signUp', new \Web\Model\Guest());
        //测试返回类型是否正确
        $this->assertInstanceOf('Web\Command\Guest\SignUpCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试updatePassword命令返回
     */
    public function testUserCommandFactoryUpdatePassword()
    {

        $command = $this->stub->createCommand('updatePassword', new \Web\Model\Guest());
        //测试返回类型是否正确
        $this->assertInstanceOf('Web\Command\Guest\UpdatePasswordCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }
}
