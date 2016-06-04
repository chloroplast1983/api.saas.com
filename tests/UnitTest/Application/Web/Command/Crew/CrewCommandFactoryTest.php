<?php
namespace Web\Command\Crew;

use GenericTestCase;
use Core;

/**
 * Web/Command/Crew/CrewCommandFactory.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class CrewCommandFactoryTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        //初始化工厂桩件
        $this->stub = new \Web\Command\Crew\CrewCommandFactory();
    }

    /**
     * 测试add命令返回
     */
    public function testCrewCommandFactoryAdd()
    {

        $command = $this->stub->createCommand('add', new \Web\Model\Crew());
        //测试返回类型是否正确
        $this->assertInstanceOf('Web\Command\Crew\AddCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试edit命令返回
     */
    public function testCrewCommandFactoryEdit()
    {

        $command = $this->stub->createCommand('edit', new \Web\Model\Crew());
        //测试返回类型是否正确
        $this->assertInstanceOf('Web\Command\Crew\EditCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }
}
