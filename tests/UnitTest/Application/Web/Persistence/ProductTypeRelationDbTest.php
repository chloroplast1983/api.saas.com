<?php
namespace Web\Persistence;

use GenericTestCase;
use Core;

/**
 * Web/Persistence/ProductTypeRelationDb.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class ProductTypeRelationDbTest extends GenericTestCase
{

    private $stub;
    private $tablepre = 'pcore_';

    public function setUp()
    {
        $this->stub = new \Web\Persistence\ProductTypeRelationDb();
    }

    /**
     * 测试该文件是否正确的继承cache类
     */
    public function testProductTypeRelationDbCorrectInstanceExtendsCache()
    {
        $this->assertInstanceof('System\Classes\Db', $this->stub);
    }

    /**
     * 测试该文件是否正确的初始化key,且和表名一致
     */
    public function testProductTypeRelationDbCorrectKey()
    {
        $key = $this->getPrivateProperty('Web\Persistence\ProductTypeRelationDb', 'table');
        $tableName = $key->getValue($this->stub);
        //判断key赋值设想一致
        $this->assertEquals('web_product_type_relation', $tableName);
        //检查是否有相同的表名
        //查询出表名
        $results = Core::$_dbDriver->query('SHOW TABLES LIKE \''.$this->tablepre.$tableName.'\'');
        $this->assertNotEmpty($results);//期望检索出表名
    }
}
