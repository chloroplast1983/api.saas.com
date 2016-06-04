<?php
namespace Product\Command\CommonProductPrice;

use GenericTestCase;
use Core;
use Product\Model\ProductPrice;
use Product\Service\CommonProductPriceService;
use Product\Model\Product;

/**
 * Product/Command/CommonProductPrice/CommonProductPriceCommandFactoryTest.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class CommonProductPriceCommandFactoryTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        //初始化工厂桩件
        $this->stub = new \Product\Command\CommonProductPrice\CommonProductPriceCommandFactory();
    }

    /**
     * 测试add命令返回
     */
    public function testCommonProductPriceCommandFactoryAdd()
    {

        $command = $this->stub->createCommand('add', new CommonProductPriceService(new ProductPrice()), new Product());
        //测试返回类型是否正确
        $this->assertInstanceOf('Product\Command\CommonProductPrice\AddCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试edit命令返回
     */
    public function testCommonProductPriceCommandFactoryEdit()
    {

        $command = $this->stub->createCommand('edit', new CommonProductPriceService(new ProductPrice()), new Product());
        //测试返回类型是否正确
        $this->assertInstanceOf('Product\Command\CommonProductPrice\EditCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试delete命令返回
     */
    public function testCommonProductPriceCommandFactoryDelete()
    {

        $command = $this->stub->createCommand('delete', new CommonProductPriceService(new ProductPrice()), new Product());
        //测试返回类型是否正确
        $this->assertInstanceOf('Product\Command\CommonProductPrice\DeleteCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }
}
