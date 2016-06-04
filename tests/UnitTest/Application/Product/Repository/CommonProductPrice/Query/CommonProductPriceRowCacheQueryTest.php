<?php
namespace Product\Repository\CommonProductPrice\Query;

use GenericTestCase;
use Core;

/**
 * Product\Repository\CommonProductPrice\Query\CommonProductPriceRowCacheQuery.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class CommonProductPriceRowCacheQueryTest extends GenericTestCase
{

    private $stub;
    private $tablepre = 'pcore_';

    public function setUp()
    {
        $this->stub = Core::$_container->get('Product\Repository\CommonProductPrice\Query\CommonProductPriceRowCacheQuery');
    }

    /**
     * 测试该文件是否正确的继承RowCacheQuery类
     */
    public function testCommonProductPriceRowCacheQueryCorrectInstanceExtendsRowCacheQuery()
    {
        $this->assertInstanceof('System\Query\RowCacheQuery', $this->stub);
    }

    /**
     * 测试该文件是否正确的初始化primaryKey,并且数据库存在该字段
     */
    public function testCommonProductPriceRowCacheQueryCorrectPrimaryKey()
    {
        $key = $this->getPrivateProperty('Product\Repository\CommonProductPrice\Query\CommonProductPriceRowCacheQuery', 'primaryKey');

        //判断primaryKey赋值设想一致
        $this->assertEquals('commonProductPriceId', $key->getValue($this->stub));
        //检查表是否有该字段
        $results = Core::$_dbDriver->query('SHOW COLUMNS FROM `'.$this->tablepre.'product_price_common` LIKE \''.$key->getValue($this->stub).'\'');
        $this->assertNotEmpty($results);//期望检索出表名
    }

    /**
     * 测试是否cache层赋值正确
     */
    public function testCommonProductPriceRowCacheQueryCorrectCacheLayer()
    {
        $cacheLayer = $this->getPrivateProperty('Product\Repository\CommonProductPrice\Query\CommonProductPriceRowCacheQuery', 'cacheLayer');

        $this->assertInstanceof('Product\Persistence\ProductPriceCommonCache', $cacheLayer->getValue($this->stub));
    }

    /**
     * 测试是否db层赋值正确
     */
    public function testCommonProductPriceDbQueryCorrectDbLayer()
    {
        $dbLayer = $this->getPrivateProperty('Product\Repository\CommonProductPrice\Query\CommonProductPriceRowCacheQuery', 'dbLayer');

        $this->assertInstanceof('Product\Persistence\ProductPriceCommonDb', $dbLayer->getValue($this->stub));
    }
}
