<?php
namespace Web\Command\ShopSlide;

use GenericTestCase;
use Core;

/**
 * Web/Command/ShopSlide/ShopSlideCommandFactory.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class ShopSlideCommandFactoryTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        //初始化工厂桩件
        $this->stub = new \Web\Command\ShopSlide\ShopSlideCommandFactory();
    }

    /**
     * 测试add命令返回
     */
    public function testShopSlideCommandFactoryAdd()
    {

        $command = $this->stub->createCommand('add', new \Web\Model\ShopSlide(), new \Web\Model\Shop());
        //测试返回类型是否正确
        $this->assertInstanceOf('Web\Command\ShopSlide\AddCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试delete命令返回
     */
    public function testShopSlideCommandFactoryDelete()
    {

        $command = $this->stub->createCommand('delete', new \Web\Model\ShopSlide(), new \Web\Model\Shop());
        //测试返回类型是否正确
        $this->assertInstanceOf('Web\Command\ShopSlide\DeleteCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }
}
