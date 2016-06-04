<?php
namespace User\Command\ProductSlide;

use GenericTestCase;
use Core;

/**
 * Product/Command/Product/ProductSlideCommandFactoryTest.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class ProductSlideCommandFactoryTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        //初始化工厂桩件
        $this->stub = new \Product\Command\ProductSlide\ProductSlideCommandFactory();
    }

    /**
     * 测试add命令返回
     */
    public function testProductSlideCommandFactoryAdd()
    {

        $command = $this->stub->createCommand('add', new \Product\Model\ProductSlide(), new \Product\Model\Product());
        //测试返回类型是否正确
        $this->assertInstanceOf('Product\Command\ProductSlide\AddCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试delete命令返回
     */
    public function testProductSlideCommandFactoryDelete()
    {

        $command = $this->stub->createCommand('delete', new \Product\Model\ProductSlide(), new \Product\Model\Product());
        //测试返回类型是否正确
        $this->assertInstanceOf('Product\Command\ProductSlide\DeleteCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }
}
