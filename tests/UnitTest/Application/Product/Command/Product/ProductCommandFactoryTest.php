<?php
namespace User\Command\Product;

use GenericTestCase;
use Core;

/**
 * Product/Command/Product/ProductCommandFactoryTest.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class ProductCommandFactoryTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        //初始化工厂桩件
        $this->stub = new \Product\Command\Product\ProductCommandFactory();
    }

    /**
     * 测试add命令返回
     */
    public function testProductCommandFactoryAdd()
    {

        $command = $this->stub->createCommand('add', new \Product\Model\Product());
        //测试返回类型是否正确
        $this->assertInstanceOf('Product\Command\Product\AddCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试edit命令返回
     */
    public function testProductCommandFactoryEdit()
    {

        $command = $this->stub->createCommand('edit', new \Product\Model\Product());
        //测试返回类型是否正确
        $this->assertInstanceOf('Product\Command\Product\EditCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试delete命令返回
     */
    public function testProductCommandFactoryDelete()
    {

        $command = $this->stub->createCommand('delete', new \Product\Model\Product());
        //测试返回类型是否正确
        $this->assertInstanceOf('Product\Command\Product\DeleteCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试off命令返回
     */
    public function testProductCommandFactoryOff()
    {

        $command = $this->stub->createCommand('off', new \Product\Model\Product());
        //测试返回类型是否正确
        $this->assertInstanceOf('Product\Command\Product\OffCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试delete命令返回
     */
    public function testProductCommandFactoryOn()
    {

        $command = $this->stub->createCommand('on', new \Product\Model\Product());
        //测试返回类型是否正确
        $this->assertInstanceOf('Product\Command\Product\OnCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }
}
