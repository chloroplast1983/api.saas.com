<?php
namespace Application\Model;

use tests\GenericTestCase;
use Marmot\Core;
use Common;

/**
 * Application\Model\Application.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */

class ApplicationTest extends GenericTestCase
{

    use Common\Model\ObjectTest;
    
    private $stub;

    public function setUp()
    {
        $this->stub = $this->getMockBuilder('Application\Model\Application')
                      ->getMockForAbstractClass();
    }

    /**
     * Application 用户申请表单,测试构造函数
     */
    public function testApplicationConstructor()
    {

        //测试初始化saas用户
        $userParameter = $this->getPrivateProperty('Application\Model\Application', 'user');
        $this->assertInstanceof('Saas\Model\User', $userParameter->getValue($this->stub));

        //测试初始化身份证正面照片
        $identifyCardFrontPhotoParameter = $this->getPrivateProperty(
            'Application\Model\Application',
            'identifyCardFrontPhoto'
        );
        $this->assertEquals(0, $identifyCardFrontPhotoParameter->getValue($this->stub));

        //测试初始化身份证背面身照片
        $identifyCardBackPhotoParameter = $this->getPrivateProperty(
            'Application\Model\Application',
            'identifyCardBackPhoto'
        );
        $this->assertEquals(0, $identifyCardBackPhotoParameter->getValue($this->stub));

        //测试初始化表单更新时间
        $updateTimeParameter = $this->getPrivateProperty('Application\Model\Application', 'updateTime');
        $this->assertGreaterThan(0, $updateTimeParameter->getValue($this->stub));

        //测试初始化表单添加时间
        $createTimeParameter = $this->getPrivateProperty('Application\Model\Application', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化表单申请状态
        $statusParameter = $this->getPrivateProperty('Application\Model\Application', 'status');
        $this->assertEquals(APPLICATION_PENDING, $statusParameter->getValue($this->stub));

    }

    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 Application setId() 正确的传参类型,期望user对象正确赋值
     */
    public function testSetIdCheckUserGetId()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getUser()->getId());
    }
    //id 测试 ----------------------------------------------------------   end

    //user 测试 -------------------------------------------------------- start
    /**
     * 设置 Application setUser() 正确的传参类型,期望传值正确
     */
    public function testSetUserCorrectType()
    {
        $object = new \Saas\Model\User();       //根据需求自己添加对象的设置,如果需要
        $this->stub->setUser($object);
        $this->assertSame($object, $this->stub->getUser());
    }

    /**
     * 设置 Application setUser() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUserWrongType()
    {
        $this->stub->setUser('string');
    }
    //user 测试 --------------------------------------------------------   end

    //identifyCardFrontPhoto 测试 -------------------------------------- start
    /**
     * 设置 Application setIdentifyCardFrontPhoto() 正确的传参类型,期望传值正确
     */
    public function testSetIdentifyCardFrontPhotoCorrectType()
    {
        $this->stub->setIdentifyCardFrontPhoto(1);
        $this->assertEquals(1, $this->stub->getIdentifyCardFrontPhoto());
    }

    /**
     * 设置 Application setIdentifyCardFrontPhoto() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdentifyCardFrontPhotoWrongType()
    {
        $this->stub->setIdentifyCardFrontPhoto('string');
    }

    /**
     * 设置 Application setIdentifyCardFrontPhoto() 错误的传参类型.
     * 但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetIdentifyCardFrontPhotoWrongTypeButNumeric()
    {
        $this->stub->setIdentifyCardFrontPhoto('1');
        $this->assertTrue(is_int($this->stub->getIdentifyCardFrontPhoto()));
        $this->assertEquals(1, $this->stub->getIdentifyCardFrontPhoto());
    }
    //identifyCardFrontPhoto 测试 --------------------------------------   end

    //identifyCardBackPhoto 测试 --------------------------------------- start
    /**
     * 设置 Application setIdentifyCardBackPhoto() 正确的传参类型,期望传值正确
     */
    public function testSetIdentifyCardBackPhotoCorrectType()
    {
        $this->stub->setIdentifyCardBackPhoto(1);
        $this->assertEquals(1, $this->stub->getIdentifyCardBackPhoto());
    }

    /**
     * 设置 Application setIdentifyCardBackPhoto() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdentifyCardBackPhotoWrongType()
    {
        $this->stub->setIdentifyCardBackPhoto('string');
    }

    /**
     * 设置 Application setIdentifyCardBackPhoto() 错误的传参类型.
     * 但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetIdentifyCardBackPhotoWrongTypeButNumeric()
    {
        $this->stub->setIdentifyCardBackPhoto('1');
        $this->assertTrue(is_int($this->stub->getIdentifyCardBackPhoto()));
        $this->assertEquals(1, $this->stub->getIdentifyCardBackPhoto());
    }
    //identifyCardBackPhoto 测试 ---------------------------------------   end

    //status 测试 ------------------------------------------------------ start
    /**
     * 循环测试 Application setStatus() 是否符合预定范围
     *
     * @dataProvider statusProvider
     */
    public function testSetStatus($actual, $expected)
    {
        $this->stub->setStatus($actual);
        $this->assertEquals($expected, $this->stub->getStatus());
    }

    /**
     * 循环测试 Application setStatus() 数据构建器
     */
    public function statusProvider()
    {
        return array(
            array(APPLICATION_PENDING,APPLICATION_PENDING),
            array(APPLICATION_VERIFIED,APPLICATION_VERIFIED),
            array(APPLICATION_DECLINE,APPLICATION_DECLINE),
            array(9999,APPLICATION_PENDING),
        );
    }

    /**
     * 设置 Application setStatus() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusWrongType()
    {
        $this->stub->setStatus('string');
    }
    //status 测试 ------------------------------------------------------   end
}
