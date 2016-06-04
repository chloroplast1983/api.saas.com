<?php
namespace Application\Command\OrganizationApplication;

use System\Interfaces\Pcommand;
use Application\Model\Application;
use Application\Service\OrganizationApplicationService;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * Application\Command\OrganizationApplication/ApplyCommand.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */

class ApplyCommandTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_saas_application_organization');

    /**
     * 测试添加商户申请表单命令
     */
    public function testApplyCommand()
    {
        $testUserId = 99;
        //初始化Application
        $application = new Application($testUserId);
        $application->setTitle('title');
        $application->setContactPeople('contactPeople');
        $application->setContactPeoplePhone('15202939435');
        $application->setContactPeopleQQ('41893204');
        $application->setProvince(new \Area\Model\Area(1));
        $application->setCity(new \Area\Model\Area(2));
        $application->setAddress('address');
        $application->setIdentifyCardFrontPhoto(1);
        $application->setIdentifyCardBackPhoto(2);
        $application->setBankCardHolderName('bankCardHolderName');
        $application->setBankCardNumber('222222222');
        $application->setBankCardCellphone('15202939435');

        //调用领域服务
        $organizationApplicationService = new OrganizationApplicationService($application);

        $organizationApplicationService->setBusinessLicenseCertificatePic(3);
        $organizationApplicationService->setAuthorizationCertificatePic(4);
        $organizationApplicationService->setRecordRegistrationPic(5);
        $organizationApplicationService->setType(TRAVEL_WHOLESALER);

        //初始化命令
        $command = Core::$_container->make('Application\Command\OrganizationApplication\ApplyCommand', ['organizationApplicationService'=>$organizationApplicationService]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);
        
        //查询商品数据库,确认数据插入成功
        $expectArray = Core::$_dbDriver->query('SELECT * FROM pcore_saas_application_organization WHERE userId='.$testUserId);
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
        $this->assertEquals($application->getCreateTime(), $expectArray['createTime']);
        $this->assertEquals($application->getUpdateTime(), $expectArray['updateTime']);
        $this->assertEquals($application->getStatusTime(), $expectArray['statusTime']);
        $this->assertEquals($application->getStatus(), $expectArray['status']);
        //测试oraganizationApplication
        $this->assertEquals($organizationApplicationService->getBusinessLicenseCertificatePic(), $expectArray['businessLicenseCertificate']);
        $this->assertEquals($organizationApplicationService->getAuthorizationCertificatePic(), $expectArray['authorizationCertificate']);
        $this->assertEquals($organizationApplicationService->getRecordRegistrationPic(), $expectArray['recordRegistration']);
        $this->assertEquals($organizationApplicationService->getType(), $expectArray['type']);
    }
}
