<?php
namespace Product\Command\Product;

use System\Interfaces\Pcommand;
use Product\Model\Product;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * Product/Command/Product/AddCommand.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */

class AddCommandTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_product','pcore_product_description');

    private $product;

    public function setUp()
    {
        $this->product = new Product();
        parent::setUp();
    }

    public function tearDown()
    {
        //删除Product
        unset($this->product);
        parent::tearDown();
    }

    /**
     * 测试添加产品命令
     */
    public function testAddCommand()
    {
        //初始化Product
        $this->product->setUser(new \User\Model\User(1));
        $this->product->setName('name');
        $this->product->setCategory(PRODUCT_CATEGORY_COMMON);
        $this->product->setFeature('feature');
        $this->product->setDescription('description');

        //初始化命令
        $command = Core::$_container->make('Product\Command\Product\AddCommand', ['product'=>$this->product]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);
        //期望id已经赋值且大于0
        $this->assertGreaterThan(0, $this->product->getId());

        //查询商品数据库,确认数据插入成功
        $expectArray = Core::$_dbDriver->query('SELECT * FROM pcore_product WHERE productId='.$this->product->getId());
        $expectArray = $expectArray[0];

        $this->assertEquals($this->product->getId(), $expectArray['productId']);
        $this->assertEquals($this->product->getName(), $expectArray['name']);
        $this->assertEquals($this->product->getCategory(), $expectArray['category']);
        $this->assertEquals($this->product->getFeature(), $expectArray['feature']);
        $this->assertEquals($this->product->getCreateTime(), $expectArray['createTime']);
        $this->assertEquals($this->product->getUpdateTime(), $expectArray['updateTime']);
        $this->assertEquals($this->product->getStatusTime(), $expectArray['statusTime']);
        $this->assertEquals($this->product->getStatus(), $expectArray['status']);
        $this->assertEquals($this->product->getUser()->getId(), $expectArray['userId']);

        //查询商品详情数据库,确认数据插入成功
        $expectArray = Core::$_dbDriver->query('SELECT * FROM pcore_product_description WHERE productId='.$this->product->getId());
        $expectArray = $expectArray[0];
        $this->assertEquals($this->product->getDescription(), $expectArray['description']);
    }
}
