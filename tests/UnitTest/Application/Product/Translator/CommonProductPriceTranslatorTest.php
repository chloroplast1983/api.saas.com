<?php
namespace Product\Translator;

use Product\Service\CommonProductPriceService;
use Product\Model\Product;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * Product\Translator\CommonProductPriceTranslator.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */
class CommonProductPriceTranslatorTest extends GenericTestsDatabaseTestCase
{

    private $stub;

    public $fixtures = array('pcore_product_price_common');

    public function setUp()
    {
        $this->stub = new \Product\Translator\CommonProductPriceTranslator();
        parent::setUp();
    }

    /**
     * 测试翻译
     */
    public function testTranslate()
    {

        $testProductId = 1;
        $expectedArray = Core::$_dbDriver->query('SELECT * FROM pcore_product_price_common WHERE productId='.$testProductId);
        $expectedArray = $expectedArray[0];
        
        $commonProductPriceService = $this->stub->translate($expectedArray);

        $this->assertInstanceof('Product\Service\CommonProductPriceService', $commonProductPriceService);

        //测试翻译器赋值正确
        $this->assertEquals($commonProductPriceService->getProductPrice()->getId(), $expectedArray['commonProductPriceId']);
        $this->assertEquals($commonProductPriceService->getProductPrice()->getCreateTime(), $expectedArray['createTime']);
        $this->assertEquals($commonProductPriceService->getProductPrice()->getStatus(), $expectedArray['status']);
        $this->assertEquals($commonProductPriceService->getProductPrice()->getStatusTime(), $expectedArray['statusTime']);
        $this->assertEquals($commonProductPriceService->getProductPrice()->getPrice(), $expectedArray['price']);
        $this->assertEquals($commonProductPriceService->getSpecification(), $expectedArray['specification']);
    }
}
