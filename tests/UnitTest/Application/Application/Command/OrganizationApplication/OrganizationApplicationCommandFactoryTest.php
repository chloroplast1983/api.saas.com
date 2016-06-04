<?php
namespace Application\Command\OrganizationApplication;

use GenericTestCase;
use Core;
use Application\Service\OrganizationApplicationService;
use Application\Model\Application;

/**
 * Application/Command/OrganizationApplication/OrganizationApplicationCommandFactoryTest.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class OrganizationApplicationCommandFactoryTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        //初始化工厂桩件
        $this->stub = new OrganizationApplicationCommandFactory();
    }

    /**
     * 测试apply命令返回
     */
    public function testOrganizationApplicationCommandFactoryApply()
    {

        $command = $this->stub->createCommand('apply', new OrganizationApplicationService(new Application()));
        //测试返回类型是否正确
        $this->assertInstanceOf('Application\Command\OrganizationApplication\ApplyCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试approve命令返回
     */
    public function testOrganizationApplicationCommandFactoryApprove()
    {

        $command = $this->stub->createCommand('approve', new OrganizationApplicationService(new Application()));
        //测试返回类型是否正确
        $this->assertInstanceOf('Application\Command\OrganizationApplication\ApproveCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试decline命令返回
     */
    public function testOrganizationApplicationCommandFactoryDecline()
    {

        $command = $this->stub->createCommand('decline', new OrganizationApplicationService(new Application()));
        //测试返回类型是否正确
        $this->assertInstanceOf('Application\Command\OrganizationApplication\DeclineCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试edit命令返回
     */
    public function testOrganizationApplicationCommandFactoryEdit()
    {

        $command = $this->stub->createCommand('edit', new OrganizationApplicationService(new Application()));
        //测试返回类型是否正确
        $this->assertInstanceOf('Application\Command\OrganizationApplication\EditCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }
}
