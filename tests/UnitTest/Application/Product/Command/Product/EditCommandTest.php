<?php
namespace Product\Command\Product;

use System\Interfaces\Pcommand;
use Product\Model\Product;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * Product/Command/Product/EditCommand.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */

class EditCommandTest extends GenericTestsDatabaseTestCase
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
     * 测试编辑产品命令
     */
    public function testEditCommand()
    {

        $testProductId = 1;
        //查询旧数据,确认修改前状态
        $oldProductArray = Core::$_dbDriver->query('SELECT * FROM pcore_product WHERE productId ='.$testProductId);
        $this->assertNotEmpty($oldProductArray);//确认我们已经构建数据
        $oldProductArray = $oldProductArray[0];

        $oldProductDescriptionArray = Core::$_dbDriver->query('SELECT * FROM pcore_product_description WHERE productId='.$testProductId);
        $oldProductDescriptionArray = $oldProductDescriptionArray[0];

        //初始化Product
        $this->product->setId($testProductId);
        $this->product->setName($oldProductArray['name'].'Modified');
        $this->product->setFeature($oldProductArray['feature'].'Modified');
        $this->product->setDescription($oldProductDescriptionArray['description'].'Modified');

        //这里初始化缓存,我们确认缓存有数据存在
        $this->productCache->save($testProductId, $oldProductArray);
        $this->productDescriptionCache->save($testProductId, $oldProductDescriptionArray);

        //初始化命令
        $command = Core::$_container->make('Product\Command\Product\EditCommand', ['product'=>$this->product]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);

        //确认产品基本信息缓存已经删除
        $this->assertEmpty($this->productCache->get($testProductId));
        //确认产品内容信息缓存没有删除
        $this->assertEmpty($this->productDescriptionCache->get($testProductId));

        //查询商品数据库,确认数据更新成功
        $expectArray = Core::$_dbDriver->query('SELECT * FROM pcore_product WHERE productId='.$this->product->getId());
        $expectArray = $expectArray[0];

        $this->assertEquals($this->product->getId(), $expectArray['productId']);
        $this->assertEquals($this->product->getName(), $expectArray['name']);
        $this->assertNotEquals($oldProductArray['name'], $expectArray['name']);//数据已经更改
        $this->assertEquals($oldProductArray['category'], $expectArray['category']);
        $this->assertNotEquals($oldProductArray['feature'], $expectArray['feature']);//数据已经更改
        $this->assertEquals($oldProductArray['createTime'], $expectArray['createTime']);
        $this->assertEquals($this->product->getUpdateTime(), $expectArray['updateTime']);
        $this->assertNotEquals($oldProductArray['updateTime'], $expectArray['updateTime']);//数据已经更改
        $this->assertEquals($oldProductArray['statusTime'], $expectArray['statusTime']);
        $this->assertEquals($oldProductArray['status'], $expectArray['status']);
        $this->assertEquals($oldProductArray['userId'], $expectArray['userId']);

        //查询商品详情数据库,确认数据更新成功
        $expectArray = Core::$_dbDriver->query('SELECT * FROM pcore_product_description WHERE productId='.$this->product->getId());
        $expectArray = $expectArray[0];
        $this->assertEquals($this->product->getDescription(), $expectArray['description']);
        $this->assertNotEquals($oldProductDescriptionArray['description'], $expectArray['description']);//数据已经更改
    }
}
