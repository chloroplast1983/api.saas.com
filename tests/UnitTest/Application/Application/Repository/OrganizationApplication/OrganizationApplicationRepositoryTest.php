<?php
namespace Application\Repository\OrganizationApplication;

use GenericTestsDatabaseTestCase;
use Core;

/**
 * Application/Repository/OrganizationApplication/OrganizationApplicationRepository.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class OrganizationApplicationRepositoryTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_saas_application_organization');

    private $stub;

    public function setUp()
    {
        $this->stub = Core::$_container->get('Application\Repository\OrganizationApplication\OrganizationApplicationRepository');

        parent::setUp();
    }

    /**
     * 测试仓库构建
     */
    public function testOrganizationApplicationRepositoryConstructor()
    {

        //测试RowCacheQuery构造成功
        $organizationApplicationRowCacheQuery = $this->getPrivateProperty('Application\Repository\OrganizationApplication\OrganizationApplicationRepository', 'organizationApplicationRowCacheQuery');
        $this->assertInstanceOf('Application\Repository\OrganizationApplication\Query\OrganizationApplicationRowCacheQuery', $organizationApplicationRowCacheQuery->getValue($this->stub));
    }

    /**
     * 测试仓库获取单独数据
     *
     */
    public function testOrganizationApplicationRepositoryGetOne()
    {
        
        //测试用户id
        $testUserId = 1;

        //期待数组
        $expectedArray = Core::$_dbDriver->query('SELECT * FROM pcore_saas_application_organization WHERE userId='.$testUserId);
        $expectedArray = $expectedArray[0];

        $organizationApplication = $this->stub->getOne($testUserId);

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

    /**
     * 测试仓库获取批量数据
     */
    public function testOrganizationApplicationRepositoryGetList()
    {
        
        //测试用户id
        $testUserIds = array(1,2);

        $expectedArrayList = Core::$_dbDriver->query('SELECT * FROM pcore_saas_application_organization WHERE userId IN ('.implode(',', $testUserIds).')');
        
        $organizationApplicationList = $this->stub->getList($testUserIds);

        foreach ($expectedArrayList as $key => $expectedArray) {
            $organizationApplication = $organizationApplicationList[$key];

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
}
