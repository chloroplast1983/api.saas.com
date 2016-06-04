<?php
namespace Application\Service;

use GenericTestsDatabaseTestCase;
use Application\Model\Application;

/**
 * Application\Service\PersonalApplicationService.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */

class PersonalApplicationServiceTest extends GenericTestsDatabaseTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Application\Service\PersonalApplicationService(new Application());
    }

    /**
     * PersonalApplicationService 个人审核表角色,测试构造函数
     */
    public function testPersonalApplicationServiceConstructor()
    {
        //测试初始化用户申请表单
        $applicationParameter = $this->getPrivateProperty('Application\Service\PersonalApplicationService', 'application');
        $this->assertInstanceOf('Application\Model\Application', $applicationParameter->getValue($this->stub));

        //测试初始化导游证图片
        $tourGuidePicParameter = $this->getPrivateProperty('Application\Service\PersonalApplicationService', 'tourGuidePic');
        $this->assertEquals(0, $tourGuidePicParameter->getValue($this->stub));

    }


    //application 测试 ------------------------------------------------- start
    /**
     * 设置 PersonalApplicationService setApplication() 正确的传参类型,期望传值正确
     */
    public function testSetApplicationCorrectType()
    {
        $object = new \Application\Model\Application();         //根据需求自己添加对象的设置,如果需要
        $this->stub->setApplication($object);
        $this->assertSame($object, $this->stub->getApplication());
    }

    /**
     * 设置 PersonalApplicationService setApplication() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetApplicationWrongType()
    {
        $this->stub->setApplication('string');
    }
    //application 测试 -------------------------------------------------   end

    //tourGuidePic 测试 ------------------------------------------------ start
    /**
     * 设置 PersonalApplicationService setTourGuidePic() 正确的传参类型,期望传值正确
     */
    public function testSetTourGuidePicCorrectType()
    {
        $this->stub->setTourGuidePic(1);
        $this->assertEquals(1, $this->stub->getTourGuidePic());
    }

    /**
     * 设置 PersonalApplicationService setTourGuidePic() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetTourGuidePicWrongType()
    {
        $this->stub->setTourGuidePic('string');
    }

    /**
     * 设置 PersonalApplicationService setTourGuidePic() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetTourGuidePicWrongTypeButNumeric()
    {
        $this->stub->setTourGuidePic('1');
        $this->assertTrue(is_int($this->stub->getTourGuidePic()));
        $this->assertEquals(1, $this->stub->getTourGuidePic());
    }
    //tourGuidePic 测试 ------------------------------------------------   end
}
