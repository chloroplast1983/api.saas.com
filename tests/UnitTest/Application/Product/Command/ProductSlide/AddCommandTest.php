<?php
namespace Product\Command\ProductSlide;

use System\Interfaces\Pcommand;
use Product\Model\Product;
use Product\Model\ProductSlide;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * Product/Command/ProductSlide/AddCommand.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */

class AddCommandTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_product_slide');

    private $productSlide;
    private $product;

    public function setUp()
    {
        $this->product = new Product(1);
        $this->productSlide = new ProductSlide();
        parent::setUp();
    }

    public function tearDown()
    {
        //删除Product
        unset($this->product);
        unset($this->productSlide);
        parent::tearDown();
    }

    /**
     * 测试添加产品命令
     */
    public function testAddCommand()
    {
        //初始化Product
        $this->productSlide->setSlide(1);
        //初始化命令
        $command = Core::$_container->make('Product\Command\ProductSlide\AddCommand', ['productSlide'=>$this->productSlide,'product'=>$this->product]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);
        //期望id已经赋值且大于0
        $this->assertGreaterThan(0, $this->productSlide->getId());

        //查询商品数据库,确认数据插入成功
        $expectArray = Core::$_dbDriver->query('SELECT * FROM pcore_product_slide WHERE productSlideId='.$this->productSlide->getId());
        $expectArray = $expectArray[0];

        $this->assertEquals($this->productSlide->getId(), $expectArray['productSlideId']);
        $this->assertEquals($this->productSlide->getSlide(), $expectArray['fileId']);
        $this->assertEquals($this->productSlide->getCreateTime(), $expectArray['createTime']);
        $this->assertEquals($this->productSlide->getStatusTime(), $expectArray['statusTime']);
        $this->assertEquals($this->productSlide->getStatus(), $expectArray['status']);
    }
}
