<?php
namespace Trade\Persistence;

use GenericTestCase;
use Core;

/**
 * Trade/Persistence/CartDb.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class CartDbTest extends GenericTestCase
{

    private $stub;
    private $tablepre = 'pcore_';

    public function setUp()
    {
        $this->stub = new \Trade\Persistence\CartDb();
    }

    /**
     * 测试该文件是否正确的继承db类
     */
    public function testCartDbCorrectInstanceExtendsCache()
    {
        $this->assertInstanceof('System\Classes\Db', $this->stub);
    }

    /**
     * 测试该文件是否正确的初始化key,且和表名一致
     */
    public function testCartDbCorrectKey()
    {
        $key = $this->getPrivateProperty('Trade\Persistence\CartDb', 'table');
        $tableName = $key->getValue($this->stub);
        //判断key赋值设想一致
        $this->assertEquals('cart', $tableName);
        //检查是否有相同的表名
        //查询出表名
        $results = Core::$_dbDriver->query('SHOW TABLES LIKE \''.$this->tablepre.$tableName.'\'');
        $this->assertNotEmpty($results);//期望检索出表名
    }
}
