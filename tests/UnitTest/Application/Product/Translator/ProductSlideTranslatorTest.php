<?php
namespace Product\Translator;

use Product\Model\ProductSlide;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * Product\Translator\ProductSlideTranslator.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */
class ProductSlideTranslatorTest extends GenericTestsDatabaseTestCase
{

    private $stub;

    public $fixtures = array('pcore_product_slide');

    public function setUp()
    {
        $this->stub = new \Product\Translator\ProductSlideTranslator();
        parent::setUp();
    }

    /**
     * 测试翻译
     */
    public function testTranslate()
    {

        $testProductId = 1;
        $expectedArray = Core::$_dbDriver->query('SELECT * FROM pcore_product_slide WHERE productSlideId='.$testProductId);
        $expectedArray = $expectedArray[0];
        
        $productSlide = $this->stub->translate($expectedArray);

        $this->assertInstanceof('Product\Model\ProductSlide', $productSlide);

        //测试翻译器赋值正确
        $this->assertEquals($productSlide->getSlide(), $expectedArray['fileId']);
        $this->assertEquals($productSlide->getCreateTime(), $expectedArray['createTime']);
        $this->assertEquals($productSlide->getStatus(), $expectedArray['status']);
        $this->assertEquals($productSlide->getStatusTime(), $expectedArray['statusTime']);
    }
}
