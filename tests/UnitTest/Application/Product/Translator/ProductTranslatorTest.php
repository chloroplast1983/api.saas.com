<?php
namespace Product\Translator;

use Product\Model\Product;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * Product\Translator\ProductTranslator.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */
class ProductTranslatorTest extends GenericTestsDatabaseTestCase
{

    private $stub;

    public $fixtures = array('pcore_product','pcore_product_description');

    public function setUp()
    {
        $this->stub = new \Product\Translator\ProductTranslator();
        parent::setUp();
    }

    /**
     * 测试翻译
     */
    public function testTranslate()
    {

        $testProductId = 1;
        $expectedProductArray = Core::$_dbDriver->query('SELECT * FROM pcore_product WHERE productId='.$testProductId);
        $expectedProductArray = $expectedProductArray[0];

        $expectedProductDescriptionArray = Core::$_dbDriver->query('SELECT * FROM pcore_product_description WHERE productId='.$testProductId);
        $expectedProductDescriptionArray = $expectedProductDescriptionArray[0];
        
        $expectedArray = array_merge($expectedProductArray, $expectedProductDescriptionArray);

        $product = $this->stub->translate($expectedArray);

        $this->assertInstanceof('Product\Model\Product', $product);

        //测试翻译器赋值正确
        $this->assertEquals($product->getName(), $expectedArray['name']);
        $this->assertEquals($product->getStatus(), $expectedArray['status']);
        $this->assertEquals($product->getCategory(), $expectedArray['category']);
        $this->assertEquals($product->getDescription(), $expectedArray['description']);
        $this->assertEquals($product->getUpdateTime(), $expectedArray['updateTime']);
        $this->assertEquals($product->getCreateTime(), $expectedArray['createTime']);
        $this->assertEquals($product->getStatus(), $expectedArray['status']);
        $this->assertEquals($product->getStatusTime(), $expectedArray['statusTime']);
    }
}
