<?php
namespace Trade\Persistence;

use GenericTestCase;
use Core;

/**
 * Trade/Persistence/OrderCommonCache.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class OrderCommonCacheTest extends GenericTestCase
{

    private $stub;
    private $tablepre = 'pcore_';

    public function setUp()
    {
        $this->stub = new \Trade\Persistence\OrderCommonCache();
    }

    /**
     * 测试该文件是否正确的继承cache类
     */
    public function testOrderCommonCacheCorrectInstanceExtendsCache()
    {
        $this->assertInstanceof('System\Classes\Cache', $this->stub);
    }

    /**
     * 测试该文件是否正确的初始化key,且和表名一致
     */
    public function testOrderCommonCacheCorrectKey()
    {
        $key = $this->getPrivateProperty('Trade\Persistence\OrderCommonCache', 'key');
        $tableName = $key->getValue($this->stub);
        //判断key赋值设想一致
        $this->assertEquals('order_common', $tableName);
        //检查是否有相同的表名
        //查询出表名
        $results = Core::$_dbDriver->query('SHOW TABLES LIKE \''.$this->tablepre.$tableName.'\'');
        $this->assertNotEmpty($results);//期望检索出表名
    }
}
