<?php
namespace Application\Persistence;

use tests\GenericTestCase;
use Marmot\Core;

/**
 * Application/Persistence/PersonalApplicationDb.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class PersonalApplicationDbTest extends GenericTestCase
{

    private $stub;
    private $tablepre = 'pcore_';

    public function setUp()
    {
        $this->stub = new \Application\Persistence\PersonalApplicationDb();
    }

    /**
     * 测试该文件是否正确的继承db类
     */
    public function testPersonalApplicationDbCorrectInstanceExtendsCache()
    {
        $this->assertInstanceof('System\Classes\Db', $this->stub);
    }

    /**
     * 测试该文件是否正确的初始化key,且和表名一致
     */
    public function testPersonalApplicationDbCorrectKey()
    {
        $key = $this->getPrivateProperty('Application\Persistence\PersonalApplicationDb', 'table');
        $tableName = $key->getValue($this->stub);
        //判断key赋值设想一致
        $this->assertEquals('saas_application_personal', $tableName);
        //检查是否有相同的表名
        //查询出表名
        $results = Core::$dbDriver->query('SHOW TABLES LIKE \''.$this->tablepre.$tableName.'\'');
        $this->assertNotEmpty($results);//期望检索出表名
    }
}
