<?php
namespace Product\Command\CommonProductPrice;

use System\Interfaces\Pcommand;
use Product\Model\Product;
use Product\Model\ProductPrice;
use Product\Service\CommonProductPriceService;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * Product/Command/Product/EditCommand.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */

class EditCommandTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_product_price_common');

    private $product;

    public function setUp()
    {
        $this->product = new Product(1);
        $this->commonProductPriceService = new CommonProductPriceService(new ProductPrice());
        //初始化缓存,用于缓存是否正常更新
        $this->productPriceCommonCache = new \Product\Persistence\ProductPriceCommonCache();
        parent::setUp();
    }

    public function tearDown()
    {
        //删除Product
        unset($this->product);
        Core::$_cacheDriver->flushAll();
        parent::tearDown();
    }

    /**
     * 测试添加产品命令
     */
    public function testEditCommand()
    {

        $testProductPriceId = 1;
        //查询状态为 !STATUS_DELETE 的旧数据,确认修改前状态
        $oldProductPriceArray = Core::$_dbDriver->query('SELECT * FROM pcore_product_price_common WHERE commonProductPriceId ='.$testProductPriceId);
        $this->assertNotEmpty($oldProductPriceArray);//确认我们已经构建数据
        $oldProductPriceArray = $oldProductPriceArray[0];

        $testProductPriceId= $oldProductPriceArray['commonProductPriceId'];
        $this->commonProductPriceService->getProductPrice()->setId($testProductPriceId);

        $this->commonProductPriceService->setSpecification($oldProductPriceArray['specification'].'Modified');
        $this->commonProductPriceService->getProductPrice()->setPrice($oldProductPriceArray['price']*2);
        //这里初始化缓存,我们确认缓存有数据存在
        $this->productPriceCommonCache->save($testProductPriceId, $oldProductPriceArray);

        //初始化命令
        $command = Core::$_container->make('Product\Command\CommonProductPrice\EditCommand', ['commonProductPriceService'=>$this->commonProductPriceService,'product'=>$this->product]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);

        //确认产品基本信息缓存已经删除
        $this->assertEmpty($this->productPriceCommonCache->get($testProductPriceId));

        //查询商品数据库,确认数据修改成功
        $expectProductPriceArray = Core::$_dbDriver->query('SELECT * FROM pcore_product_price_common WHERE commonProductPriceId='.$this->commonProductPriceService->getProductPrice()->getId());
        $expectProductPriceArray = $expectProductPriceArray[0];

        $this->assertEquals($oldProductPriceArray['productId'], $expectProductPriceArray['productId']);

        $this->assertNotEquals($oldProductPriceArray['specification'], $expectProductPriceArray['specification']);
        $this->assertEquals($this->commonProductPriceService->getSpecification(), $expectProductPriceArray['specification']);

        $this->assertNotEquals($oldProductPriceArray['price'], $expectProductPriceArray['price']);
        $this->assertEquals($this->commonProductPriceService->getProductPrice()->getPrice(), $expectProductPriceArray['price']);
    
        $this->assertEquals($oldProductPriceArray['createTime'], $expectProductPriceArray['createTime']);
        $this->assertEquals($oldProductPriceArray['statusTime'], $expectProductPriceArray['statusTime']);
        $this->assertEquals($oldProductPriceArray['status'], $expectProductPriceArray['status']);
    }
}
