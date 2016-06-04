<?php
namespace Application\Translator;

use GenericTestsDatabaseTestCase;
use Core;

/**
 * Application\Translator\OrganizationApplicationTranslator.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */
class OrganizationApplicationTranslatorTest extends GenericTestsDatabaseTestCase
{

    private $stub;

    public $fixtures = array('pcore_saas_application_organization');

    public function setUp()
    {
        $this->stub = new \Application\Translator\OrganizationApplicationTranslator();
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
        
        $organizationApplication = $this->stub->translate($expectedArray);

        $this->assertInstanceOf('Application\Service\OrganizationApplicationService', $organizationApplication);

        $this->assertEquals($organizationApplication->getApplication()->getId(), $expectedArray['userId']);
        $this->assertEquals($organizationApplication->getApplication()->getUser()->getId(), $expectedArray['userId']);
        $this->assertEquals($organizationApplication->getApplication()->getTitle(), $expectedArray['title']);
        $this->assertEquals($organizationApplication->getApplication()->getContactPeople(), $expectedArray['contactPeople']);
        $this->assertEquals($organizationApplication->getApplication()->getContactPeoplePhone(), $expectedArray['contactPeoplePhone']);
        $this->assertEquals($organizationApplication->getApplication()->getContactPeopleQQ(), $expectedArray['contactPeopleQQ']);
        $this->assertEquals($organizationApplication->getApplication()->getProvince()->getId(), $expectedArray['province']);
        $this->assertEquals($organizationApplication->getApplication()->getCity()->getId(), $expectedArray['city']);
        $this->assertEquals($organizationApplication->getApplication()->getAddress(), $expectedArray['address']);
        $this->assertEquals($organizationApplication->getApplication()->getIdentifyCardFrontPhoto(), $expectedArray['identifyCardFrontPhoto']);
        $this->assertEquals($organizationApplication->getApplication()->getIdentifyCardBackPhoto(), $expectedArray['identifyCardBackPhoto']);
        $this->assertEquals($organizationApplication->getApplication()->getBankCardHolderName(), $expectedArray['bankCardHolderName']);
        $this->assertEquals($organizationApplication->getApplication()->getBankCardNumber(), $expectedArray['bankCardNumber']);
        $this->assertEquals($organizationApplication->getApplication()->getBankCardCellphone(), $expectedArray['bankCardCellphone']);
        $this->assertEquals($organizationApplication->getApplication()->getUpdateTime(), $expectedArray['updateTime']);
        $this->assertEquals($organizationApplication->getApplication()->getCreateTime(), $expectedArray['createTime']);
        $this->assertEquals($organizationApplication->getApplication()->getStatus(), $expectedArray['status']);
        $this->assertEquals($organizationApplication->getApplication()->getStatusTime(), $expectedArray['statusTime']);
        $this->assertEquals($organizationApplication->getBusinessLicenseCertificatePic(), $expectedArray['businessLicenseCertificate']);
        $this->assertEquals($organizationApplication->getAuthorizationCertificatePic(), $expectedArray['authorizationCertificate']);
        $this->assertEquals($organizationApplication->getRecordRegistrationPic(), $expectedArray['recordRegistration']);
        $this->assertEquals($organizationApplication->getType(), $expectedArray['type']);
    }
}
