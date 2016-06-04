<?php
namespace Application\Service;

use GenericTestsDatabaseTestCase;
use Application\Model\Application;

/**
 * Application\Service\OrganizationApplicationService.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */

class OrganizationApplicationServiceTest extends GenericTestsDatabaseTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Application\Service\OrganizationApplicationService(new Application());
    }

    /**
     * OrganizationApplicationService 商户审核表角色,测试构造函数
     */
    public function testOrganizationApplicationServiceConstructor()
    {
        //测试初始化用户申请表单
        $applicationParameter = $this->getPrivateProperty('Application\Service\OrganizationApplicationService', 'application');
        $this->assertInstanceOf('Application\Model\Application', $applicationParameter->getValue($this->stub));

        //测试初始化店铺营业执照
        $businessLicenseCertificatePicParameter = $this->getPrivateProperty('Application\Service\OrganizationApplicationService', 'businessLicenseCertificatePic');
        $this->assertEquals(0, $businessLicenseCertificatePicParameter->getValue($this->stub));

        //测试初始化授权书
        $authorizationCertificatePicParameter = $this->getPrivateProperty('Application\Service\OrganizationApplicationService', 'authorizationCertificatePic');
        $this->assertEquals(0, $authorizationCertificatePicParameter->getValue($this->stub));

        //测试初始化备案登记证明图片
        $recordRegistrationPicParameter = $this->getPrivateProperty('Application\Service\OrganizationApplicationService', 'recordRegistrationPic');
        $this->assertEquals(0, $recordRegistrationPicParameter->getValue($this->stub));

        //测试初始化商户类别
        $typeParameter = $this->getPrivateProperty('Application\Service\OrganizationApplicationService', 'type');
        $this->assertEquals(TRAVEL_AGENCY, $typeParameter->getValue($this->stub));

    }


    //application 测试 ------------------------------------------------- start
    /**
     * 设置 OrganizationApplicationService setApplication() 正确的传参类型,期望传值正确
     */
    public function testSetApplicationCorrectType()
    {
        $object = new \Application\Model\Application();         //根据需求自己添加对象的设置,如果需要
        $this->stub->setApplication($object);
        $this->assertSame($object, $this->stub->getApplication());
    }

    /**
     * 设置 OrganizationApplicationService setApplication() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetApplicationWrongType()
    {
        $this->stub->setApplication('string');
    }
    //application 测试 -------------------------------------------------   end

    //businessLicenseCertificatePic 测试 ------------------------------- start
    /**
     * 设置 OrganizationApplicationService setBusinessLicenseCertificatePic() 正确的传参类型,期望传值正确
     */
    public function testSetBusinessLicenseCertificatePicCorrectType()
    {
        $this->stub->setBusinessLicenseCertificatePic(1);
        $this->assertEquals(1, $this->stub->getBusinessLicenseCertificatePic());
    }

    /**
     * 设置 OrganizationApplicationService setBusinessLicenseCertificatePic() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetBusinessLicenseCertificatePicWrongType()
    {
        $this->stub->setBusinessLicenseCertificatePic('string');
    }

    /**
     * 设置 OrganizationApplicationService setBusinessLicenseCertificatePic() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetBusinessLicenseCertificatePicWrongTypeButNumeric()
    {
        $this->stub->setBusinessLicenseCertificatePic('1');
        $this->assertTrue(is_int($this->stub->getBusinessLicenseCertificatePic()));
        $this->assertEquals(1, $this->stub->getBusinessLicenseCertificatePic());
    }
    //businessLicenseCertificatePic 测试 -------------------------------   end

    //authorizationCertificatePic 测试 --------------------------------- start
    /**
     * 设置 OrganizationApplicationService setAuthorizationCertificatePic() 正确的传参类型,期望传值正确
     */
    public function testSetAuthorizationCertificatePicCorrectType()
    {
        $this->stub->setAuthorizationCertificatePic(1);
        $this->assertEquals(1, $this->stub->getAuthorizationCertificatePic());
    }

    /**
     * 设置 OrganizationApplicationService setAuthorizationCertificatePic() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetAuthorizationCertificatePicWrongType()
    {
        $this->stub->setAuthorizationCertificatePic('string');
    }

    /**
     * 设置 OrganizationApplicationService setAuthorizationCertificatePic() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetAuthorizationCertificatePicWrongTypeButNumeric()
    {
        $this->stub->setAuthorizationCertificatePic('1');
        $this->assertTrue(is_int($this->stub->getAuthorizationCertificatePic()));
        $this->assertEquals(1, $this->stub->getAuthorizationCertificatePic());
    }
    //authorizationCertificatePic 测试 ---------------------------------   end

    //recordRegistrationPic 测试 --------------------------------------- start
    /**
     * 设置 OrganizationApplicationService setRecordRegistrationPic() 正确的传参类型,期望传值正确
     */
    public function testSetRecordRegistrationPicCorrectType()
    {
        $this->stub->setRecordRegistrationPic(1);
        $this->assertEquals(1, $this->stub->getRecordRegistrationPic());
    }

    /**
     * 设置 OrganizationApplicationService setRecordRegistrationPic() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetRecordRegistrationPicWrongType()
    {
        $this->stub->setRecordRegistrationPic('string');
    }

    /**
     * 设置 OrganizationApplicationService setRecordRegistrationPic() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetRecordRegistrationPicWrongTypeButNumeric()
    {
        $this->stub->setRecordRegistrationPic('1');
        $this->assertTrue(is_int($this->stub->getRecordRegistrationPic()));
        $this->assertEquals(1, $this->stub->getRecordRegistrationPic());
    }
    //recordRegistrationPic 测试 ---------------------------------------   end

    //type 测试 -------------------------------------------------------- start
    /**
     * 循环测试 OrganizationApplicationService setType() 是否符合预定范围
     *
     * @dataProvider typeProvider
     */
    public function testSetType($actual, $expected)
    {
        $this->stub->setType($actual);
        $this->assertEquals($expected, $this->stub->getType());
    }

    /**
     * 循环测试 OrganizationApplicationService setType() 数据构建器
     */
    public function typeProvider()
    {
        return array(
            array(TRAVEL_AGENCY,TRAVEL_AGENCY),
            array(TRAVEL_WHOLESALER,TRAVEL_WHOLESALER),
            array(TRAVEL_OPERATOR,TRAVEL_OPERATOR),
            array(9999,TRAVEL_AGENCY),
        );
    }

    /**
     * 设置 OrganizationApplicationService setType() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetTypeWrongType()
    {
        $this->stub->setType('string');
    }
    //type 测试 --------------------------------------------------------   end
}
