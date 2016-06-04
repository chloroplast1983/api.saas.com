<?php
namespace Application\Command\OrganizationApplication;

use System\Interfaces\Pcommand;
use Application\Model\Application;
use Application\Service\OrganizationApplicationService;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * Application\Command\OrganizationApplication/DeclineCommand.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */

class DeclineCommandTest extends GenericTestsDatabaseTestCase
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
        //查询状态为 !APPLICATION_DECLINE 的旧数据,确认修改前状态
        $oldArray = Core::$_dbDriver->query('SELECT * FROM pcore_saas_application_organization WHERE status !='.APPLICATION_DECLINE);
        $this->assertNotEmpty($oldArray);//确认我们已经构建数据
        $oldArray = $oldArray[0];

        $testUserId = $oldArray['userId'];

        $application = new Application($testUserId);
        $organizationApplicationService = new OrganizationApplicationService($application);

        //确认旧数据不是删除状态
        $this->assertNotEquals(APPLICATION_DECLINE, $oldArray['status']);

        //这里初始化缓存,我们确认缓存有数据存在
        $organizationApplicationCache = new \Application\Persistence\OrganizationApplicationCache();
        $organizationApplicationCache->save($testUserId, $oldArray);

        //初始化命令
        $command = Core::$_container->make('Application\Command\OrganizationApplication\DeclineCommand', ['organizationApplicationService'=>$organizationApplicationService]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);
        //期望对象状态已经修改
        $this->assertEquals(APPLICATION_DECLINE, $organizationApplicationService->getApplication()->getStatus());

        //确认缓存已经删除
        $this->assertEmpty($organizationApplicationCache->get($testUserId));

        //查询数据库,确认数据修改成功
        $expectArray = Core::$_dbDriver->query('SELECT * FROM pcore_saas_application_organization WHERE userId='.$organizationApplicationService->getApplication()->getId());
        $expectArray = $expectArray[0];


        //测试application
        $this->assertEquals($oldArray['userId'], $expectArray['userId']);
        $this->assertEquals($oldArray['title'], $expectArray['title']);
        $this->assertEquals($oldArray['contactPeople'], $expectArray['contactPeople']);
        $this->assertEquals($oldArray['contactPeopleQQ'], $expectArray['contactPeopleQQ']);
        $this->assertEquals($oldArray['contactPeopleQQ'], $expectArray['contactPeopleQQ']);
        $this->assertEquals($oldArray['contactPeoplePhone'], $expectArray['contactPeoplePhone']);
        $this->assertEquals($oldArray['province'], $expectArray['province']);
        $this->assertEquals($oldArray['city'], $expectArray['city']);
        $this->assertEquals($oldArray['address'], $expectArray['address']);
        $this->assertEquals($oldArray['identifyCardFrontPhoto'], $expectArray['identifyCardFrontPhoto']);
        $this->assertEquals($oldArray['identifyCardBackPhoto'], $expectArray['identifyCardBackPhoto']);
        $this->assertEquals($oldArray['bankCardHolderName'], $expectArray['bankCardHolderName']);
        $this->assertEquals($oldArray['bankCardNumber'], $expectArray['bankCardNumber']);
        $this->assertEquals($oldArray['businessLicenseCertificate'], $expectArray['businessLicenseCertificate']);
        $this->assertEquals($oldArray['authorizationCertificate'], $expectArray['authorizationCertificate']);
        $this->assertEquals($oldArray['recordRegistration'], $expectArray['recordRegistration']);
        $this->assertEquals($oldArray['createTime'], $expectArray['createTime']);
        $this->assertNotEquals($oldArray['statusTime'], $expectArray['statusTime']);
        $this->assertNotEquals($oldArray['status'], $expectArray['status']);
        $this->assertEquals($organizationApplicationService->getApplication()->getStatus(), $expectArray['status']);
        $this->assertEquals($organizationApplicationService->getApplication()->getStatusTime(), $expectArray['statusTime']);
    }
}
