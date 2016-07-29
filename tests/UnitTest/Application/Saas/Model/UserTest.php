<?php
namespace Saas\Model;

use Marmot\Core;
use tests;

/**
 * User\Model\User.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class UserTest extends tests\GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new User();
    }

    /**
     * User 网店用户领域对象,测试构造函数
     */
    public function testUserConstructor()
    {
        //测试初始化用户状态
        $this->assertEquals(USER_STATUS_NORMAL, $this->stub->getStatus());

        //测试初始化用户类型
        $this->assertEquals(TRAVEL_UNDEFINED, $this->stub->getType());
    }

    //status 测试 ------------------------------------------------------ start
    /**
     * 循环测试 User setStatus() 是否符合预定范围
     *
     * @dataProvider statusProvider
     */
    public function testSetStatus($actual, $expected)
    {
        $this->stub->setStatus($actual);
        $this->assertEquals($expected, $this->stub->getStatus());
    }

    /**
     * 循环测试 User setStatus() 数据构建器
     */
    public function statusProvider()
    {
        return array(
            array(USER_STATUS_NORMAL,USER_STATUS_NORMAL),
            array(USER_STATUS_VERIFIED,USER_STATUS_VERIFIED),
            array(USER_STATUS_VERIFIED+1,USER_STATUS_NORMAL),
        );
    }

    /**
     * 设置 User setStatus() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusWrongType()
    {
        $this->stub->setStatus('string');
    }
    //status 测试 ------------------------------------------------------   end

    //type 测试 -------------------------------------------------------- start
    /**
     * 循环测试 User setType() 是否符合预定范围
     *
     * @dataProvider typeProvider
     */
    public function testSetType($actual, $expected)
    {
        $this->stub->setType($actual);
        $this->assertEquals($expected, $this->stub->getType());
    }

    /**
     * 循环测试 User setType() 数据构建器
     */
    public function typeProvider()
    {
        return array(
            array(TRAVEL_UNDEFINED,TRAVEL_UNDEFINED),
            array(TRAVEL_AGENCY,TRAVEL_AGENCY),
            array(TRAVEL_WHOLESALER,TRAVEL_WHOLESALER),
            array(TRAVEL_OPERATOR,TRAVEL_OPERATOR),
            array(TRAVEL_PERSONAL,TRAVEL_PERSONAL),
            array(9999,TRAVEL_UNDEFINED),
        );
    }

    /**
     * 设置 User setType() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetTypeWrongType()
    {
        $this->stub->setType('string');
    }
    //type 测试 --------------------------------------------------------   end
}
