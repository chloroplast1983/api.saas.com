<?php
namespace Application\Repository\OrganizationApplication\Query;

use GenericTestCase;
use Core;

/**
 * Application\Repository\OrganizationApplication\Query\OrganizationApplicationRowCacheQuery.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class OrganizationApplicationRowCacheQueryTest extends GenericTestCase
{

    private $stub;
    private $tablepre = 'pcore_';

    public function setUp()
    {
        $this->stub = Core::$_container->get('Application\Repository\OrganizationApplication\Query\OrganizationApplicationRowCacheQuery');
    }

    /**
     * 测试该文件是否正确的继承RowCacheQuery类
     */
    public function testOrganizationApplicationRowCacheQueryCorrectInstanceExtendsRowCacheQuery()
    {
        $this->assertInstanceof('System\Query\RowCacheQuery', $this->stub);
    }

    /**
     * 测试该文件是否正确的初始化primaryKey,并且数据库存在该字段
     */
    public function testOrganizationApplicationRowCacheQueryCorrectPrimaryKey()
    {
        $key = $this->getPrivateProperty('Application\Repository\OrganizationApplication\Query\OrganizationApplicationRowCacheQuery', 'primaryKey');

        //判断primaryKey赋值设想一致
        $this->assertEquals('userId', $key->getValue($this->stub));
        //检查表是否有该字段
        $results = Core::$_dbDriver->query('SHOW COLUMNS FROM `'.$this->tablepre.'saas_application_organization` LIKE \''.$key->getValue($this->stub).'\'');
        $this->assertNotEmpty($results);//期望检索出表名
    }

    /**
     * 测试是否cache层赋值正确
     */
    public function testOrganizationApplicationRowCacheQueryCorrectCacheLayer()
    {
        $cacheLayer = $this->getPrivateProperty('Application\Repository\OrganizationApplication\Query\OrganizationApplicationRowCacheQuery', 'cacheLayer');

        $this->assertInstanceof('Application\Persistence\OrganizationApplicationCache', $cacheLayer->getValue($this->stub));
    }

    /**
     * 测试是否db层赋值正确
     */
    public function testOrganizationApplicationDbQueryCorrectDbLayer()
    {
        $dbLayer = $this->getPrivateProperty('Application\Repository\OrganizationApplication\Query\OrganizationApplicationRowCacheQuery', 'dbLayer');

        $this->assertInstanceof('Application\Persistence\OrganizationApplicationDb', $dbLayer->getValue($this->stub));
    }
}
