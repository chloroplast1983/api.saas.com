<?php
namespace Application\Translator;

use GenericTestsDatabaseTestCase;
use Core;

/**
 * Application\Translator\ApplicationTranslator.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */
class ApplicationTranslatorTest extends GenericTestsDatabaseTestCase
{

    private $stub;

    public $fixtures = array('pcore_saas_application_organization');

    public function setUp()
    {
        $this->stub = new \Application\Translator\ApplicationTranslator();
        parent::setUp();
    }

    /**
     * 测试翻译
     */
    public function testTranslate()
    {

        $testUserId = 1;
        $expectedArray = Core::$_dbDriver->query('SELECT * FROM pcore_saas_application_organization WHERE userId='.$testUserId);
        $expectedArray = $expectedArray[0];
        
        $application = $this->stub->translate($expectedArray);

        $this->assertInstanceof('Application\Model\Application', $application);

        $this->assertEquals($application->getId(), $expectedArray['userId']);
        $this->assertEquals($application->getUser()->getId(), $expectedArray['userId']);
        $this->assertEquals($application->getTitle(), $expectedArray['title']);
        $this->assertEquals($application->getContactPeople(), $expectedArray['contactPeople']);
        $this->assertEquals($application->getContactPeoplePhone(), $expectedArray['contactPeoplePhone']);
        $this->assertEquals($application->getContactPeopleQQ(), $expectedArray['contactPeopleQQ']);
        $this->assertEquals($application->getProvince()->getId(), $expectedArray['province']);
        $this->assertEquals($application->getCity()->getId(), $expectedArray['city']);
        $this->assertEquals($application->getAddress(), $expectedArray['address']);
        $this->assertEquals($application->getIdentifyCardFrontPhoto(), $expectedArray['identifyCardFrontPhoto']);
        $this->assertEquals($application->getIdentifyCardBackPhoto(), $expectedArray['identifyCardBackPhoto']);
        $this->assertEquals($application->getBankCardHolderName(), $expectedArray['bankCardHolderName']);
        $this->assertEquals($application->getBankCardNumber(), $expectedArray['bankCardNumber']);
        $this->assertEquals($application->getBankCardCellphone(), $expectedArray['bankCardCellphone']);
        $this->assertEquals($application->getUpdateTime(), $expectedArray['updateTime']);
        $this->assertEquals($application->getCreateTime(), $expectedArray['createTime']);
        $this->assertEquals($application->getStatus(), $expectedArray['status']);
        $this->assertEquals($application->getStatusTime(), $expectedArray['statusTime']);
    }
}
