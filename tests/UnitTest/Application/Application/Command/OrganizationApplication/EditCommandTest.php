<?php
namespace Application\Command\OrganizationApplication;

use System\Interfaces\Pcommand;
use Application\Model\Application;
use Application\Service\OrganizationApplicationService;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * Application\Command\OrganizationApplication/EditCommand.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */

class EditCommandTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_saas_application_organization');

    public function tearDown()
    {
        Core::$_cacheDriver->flushAll();
        parent::tearDown();
    }

    /**
     * 测试拒绝申请表单命令
     */
    public function testDeclineCommand()
    {

        $testUserId = 1;
        //查询状态为 !APPLICATION_DECLINE 的旧数据,确认修改前状态
        $oldArray = Core::$_dbDriver->query('SELECT * FROM pcore_saas_application_organization WHERE userId ='.$testUserId);
        $this->assertNotEmpty($oldArray);//确认我们已经构建数据
        $oldArray = $oldArray[0];

        $testUserId = $oldArray['userId'];

        $application = new Application($testUserId);
        $application->setTitle($oldArray['title'].'Modified');
        $application->setContactPeople($oldArray['contactPeople'].'Modified');
        $application->setContactPeoplePhone('11111111111');
        $application->setContactPeopleQQ('11111111');
        $application->setProvince(new \Area\Model\Area(3));
        $application->setCity(new \Area\Model\Area(4));
        $application->setAddress($oldArray['address'].'Modified');
        $application->setIdentifyCardFrontPhoto(5);
        $application->setIdentifyCardBackPhoto(6);
        $application->setBankCardHolderName($oldArray['bankCardHolderName'].'Modified');
        $application->setBankCardNumber('222222222');
        $application->setBankCardCellphone('11111111111');

        $organizationApplicationService = new OrganizationApplicationService($application);
        $organizationApplicationService->setBusinessLicenseCertificatePic(7);
        $organizationApplicationService->setAuthorizationCertificatePic(8);
        $organizationApplicationService->setRecordRegistrationPic(9);
        $organizationApplicationService->setType(TRAVEL_AGENCY);

        //这里初始化缓存,我们确认缓存有数据存在
        $organizationApplicationCache = new \Application\Persistence\OrganizationApplicationCache();
        $organizationApplicationCache->save($testUserId, $oldArray);

        //初始化命令
        $command = Core::$_container->make('Application\Command\OrganizationApplication\EditCommand', ['organizationApplicationService'=>$organizationApplicationService]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);

        //确认缓存已经删除
        $this->assertEmpty($organizationApplicationCache->get($testUserId));

        //查询数据库,确认数据修改成功
        $expectArray = Core::$_dbDriver->query('SELECT * FROM pcore_saas_application_organization WHERE userId='.$organizationApplicationService->getApplication()->getId());
        $expectArray = $expectArray[0];

        //测试application
        $this->assertEquals($application->getId(), $expectArray['userId']);
        $this->assertEquals($application->getTitle(), $expectArray['title']);
        $this->assertEquals($application->getContactPeople(), $expectArray['contactPeople']);
        $this->assertEquals($application->getContactPeopleQQ(), $expectArray['contactPeopleQQ']);
        $this->assertEquals($application->getContactPeoplePhone(), $expectArray['contactPeoplePhone']);
        $this->assertEquals($application->getProvince()->getId(), $expectArray['province']);
        $this->assertEquals($application->getCity()->getId(), $expectArray['city']);
        $this->assertEquals($application->getAddress(), $expectArray['address']);
        $this->assertEquals($application->getIdentifyCardFrontPhoto(), $expectArray['identifyCardFrontPhoto']);
        $this->assertEquals($application->getIdentifyCardBackPhoto(), $expectArray['identifyCardBackPhoto']);
        $this->assertEquals($application->getBankCardHolderName(), $expectArray['bankCardHolderName']);
        $this->assertEquals($application->getBankCardNumber(), $expectArray['bankCardNumber']);
        $this->assertEquals($application->getBankCardCellphone(), $expectArray['bankCardCellphone']);
        $this->assertEquals($oldArray['createTime'], $expectArray['createTime']);
        $this->assertEquals($application->getUpdateTime(), $expectArray['updateTime']);
        $this->assertEquals($oldArray['statusTime'], $expectArray['statusTime']);
        $this->assertEquals($oldArray['status'], $expectArray['status']);
        //测试oraganizationApplication
        $this->assertEquals($organizationApplicationService->getBusinessLicenseCertificatePic(), $expectArray['businessLicenseCertificate']);
        $this->assertEquals($organizationApplicationService->getAuthorizationCertificatePic(), $expectArray['authorizationCertificate']);
        $this->assertEquals($organizationApplicationService->getRecordRegistrationPic(), $expectArray['recordRegistration']);
        $this->assertEquals($organizationApplicationService->getType(), $expectArray['type']);
    }
}
