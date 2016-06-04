<?php
namespace Application\Repository\PersonalApplication\Query;

use GenericTestCase;
use Core;

/**
 * Application\Repository\PersonalApplication\Query\PersonalApplicationRowCacheQuery.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class PersonalApplicationRowCacheQueryTest extends GenericTestCase
{

    private $stub;
    private $tablepre = 'pcore_';

    public function setUp()
    {
        $this->stub = Core::$_container->get('Application\Repository\PersonalApplication\Query\PersonalApplicationRowCacheQuery');
    }

    /**
     * 测试该文件是否正确的继承RowCacheQuery类
     */
    public function testPersonalApplicationRowCacheQueryCorrectInstanceExtendsRowCacheQuery()
    {
        $this->assertInstanceof('System\Query\RowCacheQuery', $this->stub);
    }

    /**
     * 测试该文件是否正确的初始化primaryKey,并且数据库存在该字段
     */
    public function testPersonalApplicationRowCacheQueryCorrectPrimaryKey()
    {
        $key = $this->getPrivateProperty('Application\Repository\PersonalApplication\Query\PersonalApplicationRowCacheQuery', 'primaryKey');

        //判断primaryKey赋值设想一致
        $this->assertEquals('userId', $key->getValue($this->stub));
        //检查表是否有该字段
        $results = Core::$_dbDriver->query('SHOW COLUMNS FROM `'.$this->tablepre.'saas_application_personal` LIKE \''.$key->getValue($this->stub).'\'');
        $this->assertNotEmpty($results);//期望检索出表名
    }

    /**
     * 测试是否cache层赋值正确
     */
    public function testPersonalApplicationRowCacheQueryCorrectCacheLayer()
    {
        $cacheLayer = $this->getPrivateProperty('Application\Repository\PersonalApplication\Query\PersonalApplicationRowCacheQuery', 'cacheLayer');

        $this->assertInstanceof('Application\Persistence\PersonalApplicationCache', $cacheLayer->getValue($this->stub));
    }

    /**
     * 测试是否db层赋值正确
     */
    public function testPersonalApplicationDbQueryCorrectDbLayer()
    {
        $dbLayer = $this->getPrivateProperty('Application\Repository\PersonalApplication\Query\PersonalApplicationRowCacheQuery', 'dbLayer');

        $this->assertInstanceof('Application\Persistence\PersonalApplicationDb', $dbLayer->getValue($this->stub));
    }
}
