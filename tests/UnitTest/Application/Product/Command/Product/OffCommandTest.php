<?php
namespace Product\Command\Product;

use System\Interfaces\Pcommand;
use Product\Model\Product;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * Product/Command/Product/OffCommand.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */

class OffCommandTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_product','pcore_product_description');

    private $product;

    public function setUp()
    {
        $this->product = new Product();
        //初始化缓存,用于缓存是否正常更新
        $this->productCache = new \Product\Persistence\ProductCache();
        $this->productDescriptionCache = new \Product\Persistence\ProductDescriptionCache();
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
    public function testOffCommand()
    {

        //查询状态为 !PRODUCT_STATUS_IN_STOCK 的旧数据,确认修改前状态
        $oldProductArray = Core::$_dbDriver->query('SELECT * FROM pcore_product WHERE status !='.PRODUCT_STATUS_IN_STOCK.' LIMIT 1');
        $this->assertNotEmpty($oldProductArray);//确认我们已经构建数据
        
        $oldProductArray = $oldProductArray[0];

        $testProductId= $oldProductArray['productId'];
        $this->product->setId($testProductId);

        $oldProductDescriptionArray = Core::$_dbDriver->query('SELECT * FROM pcore_product_description WHERE productId='.$this->product->getId());
        $oldProductDescriptionArray = $oldProductDescriptionArray[0];

        //确认旧数据不是删除状态
        $this->assertNotEquals(PRODUCT_STATUS_IN_STOCK, $oldProductArray['status']);
        //这里初始化缓存,我们确认缓存有数据存在
        $this->productCache->save($testProductId, $oldProductArray);
        $this->productDescriptionCache->save($testProductId, $oldProductDescriptionArray);

        //初始化命令
        $command = Core::$_container->make('Product\Command\Product\OffCommand', ['product'=>$this->product]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);
        //期望对象状态已经修改
        $this->assertEquals(PRODUCT_STATUS_IN_STOCK, $this->product->getStatus());

        //确认产品基本信息缓存已经删除
        $this->assertEmpty($this->productCache->get($testProductId));
        //确认产品内容信息缓存没有删除
        $this->assertEquals($this->productDescriptionCache->get($testProductId), $oldProductDescriptionArray);
        
        //查询商品数据库,确认数据修改成功
        $expectProductArray = Core::$_dbDriver->query('SELECT * FROM pcore_product WHERE productId='.$this->product->getId());
        $expectProductArray = $expectProductArray[0];

        $this->assertEquals($oldProductArray['name'], $expectProductArray['name']);
        $this->assertEquals($oldProductArray['category'], $expectProductArray['category']);
        $this->assertEquals($oldProductArray['feature'], $expectProductArray['feature']);
        $this->assertEquals($oldProductArray['createTime'], $expectProductArray['createTime']);
        $this->assertEquals($oldProductArray['updateTime'], $expectProductArray['updateTime']);
        $this->assertNotEquals($oldProductArray['statusTime'], $expectProductArray['statusTime']);
        $this->assertEquals($this->product->getStatusTime(), $expectProductArray['statusTime']);
        $this->assertNotEquals($oldProductArray['status'], $expectProductArray['status']);
        $this->assertEquals($this->product->getStatus(), $expectProductArray['status']);
        $this->assertEquals($oldProductArray['userId'], $expectProductArray['userId']);
        //查询商品详情数据库,确认数据没有修改
        $expectProductDescriptionArray = Core::$_dbDriver->query('SELECT * FROM pcore_product_description WHERE productId='.$this->product->getId());
        $expectProductDescriptionArray = $expectProductDescriptionArray[0];
        $this->assertEquals($oldProductDescriptionArray['description'], $expectProductDescriptionArray['description']);
    }
}
