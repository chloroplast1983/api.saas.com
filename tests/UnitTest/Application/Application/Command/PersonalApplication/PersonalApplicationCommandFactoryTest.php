<?php
namespace Application\Command\PersonalApplication;

use GenericTestCase;
use Core;
use Application\Service\PersonalApplicationService;
use Application\Model\Application;

/**
 * Application/Command/PersonalApplication/PersonalApplicationCommandFactoryTest.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class PersonalApplicationCommandFactoryTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        //初始化工厂桩件
        $this->stub = new PersonalApplicationCommandFactory();
    }

    /**
     * 测试apply命令返回
     */
    public function testPersonalApplicationCommandFactoryApply()
    {

        $command = $this->stub->createCommand('apply', new PersonalApplicationService(new Application()));
        //测试返回类型是否正确
        $this->assertInstanceOf('Application\Command\PersonalApplication\ApplyCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试approve命令返回
     */
    public function testPersonalApplicationCommandFactoryApprove()
    {

        $command = $this->stub->createCommand('approve', new PersonalApplicationService(new Application()));
        //测试返回类型是否正确
        $this->assertInstanceOf('Application\Command\PersonalApplication\ApproveCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试decline命令返回
     */
    public function testPersonalApplicationCommandFactoryDecline()
    {

        $command = $this->stub->createCommand('decline', new PersonalApplicationService(new Application()));
        //测试返回类型是否正确
        $this->assertInstanceOf('Application\Command\PersonalApplication\DeclineCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试edit命令返回
     */
    public function testPersonalApplicationCommandFactoryEdit()
    {

        $command = $this->stub->createCommand('edit', new PersonalApplicationService(new Application()));
        //测试返回类型是否正确
        $this->assertInstanceOf('Application\Command\PersonalApplication\EditCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }
}
