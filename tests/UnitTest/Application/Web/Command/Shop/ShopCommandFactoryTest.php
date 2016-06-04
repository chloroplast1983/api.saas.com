<?php
namespace Web\Command\Shop;

use GenericTestCase;
use Core;

/**
 * Web/Command/Shop/ShopCommandFactory.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class ShopCommandFactoryTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        //初始化工厂桩件
        $this->stub = new \Web\Command\Shop\ShopCommandFactory();
    }

    /**
     * 测试initial命令返回
     */
    public function testShopCommandFactoryAdd()
    {

        $command = $this->stub->createCommand('add', new \Web\Model\Shop());
        //测试返回类型是否正确
        $this->assertInstanceOf('Web\Command\Shop\AddCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }
}
