<?php
namespace Application\Translator;

use GenericTestsDatabaseTestCase;
use Core;

/**
 * Application\Translator\PersonalApplicationTranslator.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */
class PersonalApplicationTranslatorTest extends GenericTestsDatabaseTestCase
{

    private $stub;

    public $fixtures = array('pcore_saas_application_personal');

    public function setUp()
    {
        $this->stub = new \Application\Translator\PersonalApplicationTranslator();
        parent::setUp();
    }

    /**
     * 测试翻译
     */
    public function testTranslate()
    {

        $testUserId = 1;
        $expectedArray = Core::$_dbDriver->query('SELECT * FROM pcore_saas_application_personal WHERE userId='.$testUserId);
        $expectedArray = $expectedArray[0];
        
        $personalApplication = $this->stub->translate($expectedArray);

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
