<?php
namespace Web\Command\DeliveredInformation;

use GenericTestCase;
use Core;

/**
 * Web/Command/DeliveredInformation/DeliveredInformationCommandFactory.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class DeliveredInformationCommandFactoryTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        //初始化工厂桩件
        $this->stub = new \Web\Command\DeliveredInformation\DeliveredInformationCommandFactory();
    }

    /**
     * 测试add命令返回
     */
    public function testDeliveredInformationCommandFactoryAdd()
    {

        $command = $this->stub->createCommand('add', new \Web\Model\DeliveredInformation());
        //测试返回类型是否正确
        $this->assertInstanceOf('Web\Command\DeliveredInformation\AddCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试edit命令返回
     */
    public function testDeliveredInformationCommandFactoryEdit()
    {

        $command = $this->stub->createCommand('edit', new \Web\Model\DeliveredInformation());
        //测试返回类型是否正确
        $this->assertInstanceOf('Web\Command\DeliveredInformation\EditCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试delete命令返回
     */
    public function testDeliveredInformationCommandFactoryDelete()
    {

        $command = $this->stub->createCommand('delete', new \Web\Model\DeliveredInformation());
        //测试返回类型是否正确
        $this->assertInstanceOf('Web\Command\DeliveredInformation\DeleteCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }
}
