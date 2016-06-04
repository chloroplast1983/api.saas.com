<?php
namespace Application\Repository\PersonalApplication;

use GenericTestsDatabaseTestCase;
use Core;

/**
 * Application/Repository/PersonalApplication/PersonalApplicationRepository.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class PersonalApplicationRepositoryTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_saas_application_personal');

    private $stub;

    public function setUp()
    {
        $this->stub = Core::$_container->get('Application\Repository\PersonalApplication\PersonalApplicationRepository');

        parent::setUp();
    }

    /**
     * 测试仓库构建
     */
    public function testPersonalApplicationRepositoryConstructor()
    {

        //测试RowCacheQuery构造成功
        $personalApplicationRowCacheQuery = $this->getPrivateProperty('Application\Repository\PersonalApplication\PersonalApplicationRepository', 'personalApplicationRowCacheQuery');
        $this->assertInstanceOf('Application\Repository\PersonalApplication\Query\PersonalApplicationRowCacheQuery', $personalApplicationRowCacheQuery->getValue($this->stub));
    }

    /**
     * 测试仓库获取单独数据
     *
     */
    public function testPersonalApplicationRepositoryGetOne()
    {
        
        //测试用户id
        $testUserId = 1;

        $expectedArray = Core::$_dbDriver->query('SELECT * FROM pcore_saas_application_personal WHERE userId='.$testUserId);
        $expectedArray = $expectedArray[0];
        
        $personalApplication = $this->stub->getOne($testUserId);

        $this->assertInstanceOf('Application\Service\PersonalApplicationService', $personalApplication);

        $this->assertEquals($personalApplication->getApplication()->getId(), $expectedArray['userId']);
        $this->assertEquals($personalApplication->getApplication()->getUser()->getId(), $expectedArray['userId']);
        $this->assertEquals($personalApplication->getApplication()->getTitle(), $expectedArray['title']);
        $this->assertEquals($personalApplication->getApplication()->getContactPeople(), $expectedArray['contactPeople']);
        $this->assertEquals($personalApplication->getApplication()->getContactPeoplePhone(), $expectedArray['contactPeoplePhone']);
        $this->assertEquals($personalApplication->getApplication()->getContactPeopleQQ(), $expectedArray['contactPeopleQQ']);
        $this->assertEquals($personalApplication->getApplication()->getProvince()->getId(), $expectedArray['province']);
        $this->assertEquals($personalApplication->getApplication()->getCity()->getId(), $expectedArray['city']);
        $this->assertEquals($personalApplication->getApplication()->getAddress(), $expectedArray['address']);
        $this->assertEquals($personalApplication->getApplication()->getIdentifyCardFrontPhoto(), $expectedArray['identifyCardFrontPhoto']);
        $this->assertEquals($personalApplication->getApplication()->getIdentifyCardBackPhoto(), $expectedArray['identifyCardBackPhoto']);
        $this->assertEquals($personalApplication->getApplication()->getBankCardHolderName(), $expectedArray['bankCardHolderName']);
        $this->assertEquals($personalApplication->getApplication()->getBankCardNumber(), $expectedArray['bankCardNumber']);
        $this->assertEquals($personalApplication->getApplication()->getBankCardCellphone(), $expectedArray['bankCardCellphone']);
        $this->assertEquals($personalApplication->getApplication()->getUpdateTime(), $expectedArray['updateTime']);
        $this->assertEquals($personalApplication->getApplication()->getCreateTime(), $expectedArray['createTime']);
        $this->assertEquals($personalApplication->getApplication()->getStatus(), $expectedArray['status']);
        $this->assertEquals($personalApplication->getApplication()->getStatusTime(), $expectedArray['statusTime']);
        $this->assertEquals($personalApplication->getTourGuidePic(), $expectedArray['tourGuide']);
    }

    /**
     * 测试仓库获取批量数据
     */
    public function testPersonalApplicationRepositoryGetList()
    {
        
        //测试用户id
        $testUserIds = array(1,2);

        $expectedArrayList = Core::$_dbDriver->query('SELECT * FROM pcore_saas_application_personal WHERE userId IN ('.implode(',', $testUserIds).')');
        
        $personalApplicationList = $this->stub->getList($testUserIds);

        foreach ($expectedArrayList as $key => $expectedArray) {
            $personalApplication = $personalApplicationList[$key];

            $this->assertInstanceOf('Application\Service\PersonalApplicationService', $personalApplication);

            $this->assertEquals($personalApplication->getApplication()->getId(), $expectedArray['userId']);
            $this->assertEquals($personalApplication->getApplication()->getUser()->getId(), $expectedArray['userId']);
            $this->assertEquals($personalApplication->getApplication()->getTitle(), $expectedArray['title']);
            $this->assertEquals($personalApplication->getApplication()->getContactPeople(), $expectedArray['contactPeople']);
            $this->assertEquals($personalApplication->getApplication()->getContactPeoplePhone(), $expectedArray['contactPeoplePhone']);
            $this->assertEquals($personalApplication->getApplication()->getContactPeopleQQ(), $expectedArray['contactPeopleQQ']);
            $this->assertEquals($personalApplication->getApplication()->getProvince()->getId(), $expectedArray['province']);
            $this->assertEquals($personalApplication->getApplication()->getCity()->getId(), $expectedArray['city']);
            $this->assertEquals($personalApplication->getApplication()->getAddress(), $expectedArray['address']);
            $this->assertEquals($personalApplication->getApplication()->getIdentifyCardFrontPhoto(), $expectedArray['identifyCardFrontPhoto']);
            $this->assertEquals($personalApplication->getApplication()->getIdentifyCardBackPhoto(), $expectedArray['identifyCardBackPhoto']);
            $this->assertEquals($personalApplication->getApplication()->getBankCardHolderName(), $expectedArray['bankCardHolderName']);
            $this->assertEquals($personalApplication->getApplication()->getBankCardNumber(), $expectedArray['bankCardNumber']);
            $this->assertEquals($personalApplication->getApplication()->getBankCardCellphone(), $expectedArray['bankCardCellphone']);
            $this->assertEquals($personalApplication->getApplication()->getUpdateTime(), $expectedArray['updateTime']);
            $this->assertEquals($personalApplication->getApplication()->getCreateTime(), $expectedArray['createTime']);
            $this->assertEquals($personalApplication->getApplication()->getStatus(), $expectedArray['status']);
            $this->assertEquals($personalApplication->getApplication()->getStatusTime(), $expectedArray['statusTime']);
            $this->assertEquals($personalApplication->getTourGuidePic(), $expectedArray['tourGuide']);
        }
    }
}
