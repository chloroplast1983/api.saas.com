<?php
namespace User\Command\ProductType;

use GenericTestCase;
use Core;

/**
 * Web/Command/ProductType/ProductTypeCommandFactoryTest.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class ProductTypeCommandFactoryTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        //初始化工厂桩件
        $this->stub = new \Web\Command\ProductType\ProductTypeCommandFactory();
    }

    /**
     * 测试add命令返回
     */
    public function testProductTypeCommandFactoryAdd()
    {

        $command = $this->stub->createCommand('add', new \Web\Model\ProductType());
        //测试返回类型是否正确
        $this->assertInstanceOf('Web\Command\ProductType\AddCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试delete命令返回
     */
    public function testProductTypeCommandFactoryDelete()
    {

        $command = $this->stub->createCommand('delete', new \Web\Model\ProductType());
        //测试返回类型是否正确
        $this->assertInstanceOf('Web\Command\ProductType\DeleteCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试edit命令返回
     */
    public function testProductTypeCommandFactoryEdit()
    {

        $command = $this->stub->createCommand('edit', new \Web\Model\ProductType());
        //测试返回类型是否正确
        $this->assertInstanceOf('Web\Command\ProductType\EditCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }
}
