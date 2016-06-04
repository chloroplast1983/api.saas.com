<?php
namespace Product\Command\ProductSlide;

use System\Interfaces\Pcommand;
use Product\Model\Product;
use Product\Model\ProductSlide;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * Product/Command/Product/DeleteCommand.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */

class DeleteCommandTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_product_slide');

    private $product;
    private $productSlide;

    public function setUp()
    {
        $this->product = new Product(1);
        $this->productSlide = new ProductSlide();
        $this->productSlideCache = new \Product\Persistence\ProductSlideCache();
        parent::setUp();
    }

    public function tearDown()
    {
        //删除Product
        unset($this->product);
        unset($this->productSlide);
        Core::$_cacheDriver->flushAll();
        parent::tearDown();
    }

    /**
     * 测试添加产品命令
     */
    public function testDeleteCommand()
    {

        $testProductSlideId = 1;

        //查询状态为 !STATUS_DELETE 的旧数据,确认修改前状态
        $oldArray = Core::$_dbDriver->query('SELECT * FROM pcore_product_slide WHERE productSlideId ='.$testProductSlideId);
        $this->assertNotEmpty($oldArray);//确认我们已经构建数据
        $oldArray = $oldArray[0];

        $testProductSlideId= $oldArray['productSlideId'];
        $this->productSlide->setId($testProductSlideId);

        //确认旧数据不是删除状态
        $this->assertNotEquals(STATUS_DELETE, $oldArray['status']);

        //这里初始化缓存,我们确认缓存有数据存在
        $this->productSlideCache->save($testProductSlideId, $oldArray);

        //初始化命令
        $command = Core::$_container->make('Product\Command\ProductSlide\DeleteCommand', ['productSlide'=>$this->productSlide,'product'=>$this->product]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);
        //期望对象状态已经修改
        $this->assertEquals(STATUS_DELETE, $this->productSlide->getStatus());

        //确认产品基本信息缓存已经删除
        $this->assertEmpty($this->productSlideCache->get($testProductSlideId));

        //查询商品数据库,确认数据修改成功
        $expectArray = Core::$_dbDriver->query('SELECT * FROM pcore_product_slide WHERE productSlideId='.$this->productSlide->getId());
        $expectArray = $expectArray[0];

        $this->assertEquals($oldArray['productId'], $expectArray['productId']);
        $this->assertEquals($oldArray['productSlideId'], $expectArray['productSlideId']);
        $this->assertEquals($oldArray['fileId'], $expectArray['fileId']);
        $this->assertEquals($oldArray['createTime'], $expectArray['createTime']);
        $this->assertNotEquals($oldArray['statusTime'], $expectArray['statusTime']);
        $this->assertNotEquals($oldArray['status'], $expectArray['status']);
        $this->assertEquals($this->productSlide->getStatus(), $expectArray['status']);
        $this->assertEquals($this->productSlide->getStatusTime(), $expectArray['statusTime']);
    }
}
