<?php
namespace Product\Command\CommonProductPrice;

use System\Interfaces\Pcommand;
use Product\Model\Product;
use Product\Model\ProductPrice;
use Product\Service\CommonProductPriceService;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * Product/Command/Product/AddCommand.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */

class AddCommandTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_product_price_common');

    private $commonProductPriceService;
    private $product;

    public function setUp()
    {
        $this->product = new Product(1);
        $this->commonProductPriceService = new CommonProductPriceService(new ProductPrice());
        parent::setUp();
    }

    public function tearDown()
    {
        //删除Product
        unset($this->product);
        unset($this->commonProductPriceService);
        parent::tearDown();
    }

    /**
     * 测试添加产品命令
     */
    public function testAddCommand()
    {
        //初始化Product
        $this->commonProductPriceService->setSpecification('specification');
        $this->commonProductPriceService->getProductPrice()->setPrice(100);

        //初始化命令
        $command = Core::$_container->make('Product\Command\CommonProductPrice\AddCommand', ['commonProductPriceService'=>$this->commonProductPriceService,'product'=>$this->product]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);
        //期望id已经赋值且大于0
        $this->assertGreaterThan(0, $this->commonProductPriceService->getProductPrice()->getId());

        //查询商品数据库,确认数据插入成功
        $expectArray = Core::$_dbDriver->query('SELECT * FROM pcore_product_price_common WHERE commonProductPriceId='.$this->commonProductPriceService->getProductPrice()->getId());
        $expectArray = $expectArray[0];

        $this->assertEquals($this->product->getId(), $expectArray['productId']);
        $this->assertEquals($this->commonProductPriceService->getSpecification(), $expectArray['specification']);
        $this->assertEquals($this->commonProductPriceService->getProductPrice()->getPrice(), $expectArray['price']);
        $this->assertEquals($this->commonProductPriceService->getProductPrice()->getStatus(), $expectArray['status']);
        $this->assertEquals($this->commonProductPriceService->getProductPrice()->getCreateTime(), $expectArray['createTime']);
        $this->assertEquals($this->commonProductPriceService->getProductPrice()->getStatusTime(), $expectArray['statusTime']);
        $this->assertEquals($this->commonProductPriceService->getProductPrice()->getStatus(), $expectArray['status']);
    }
}
