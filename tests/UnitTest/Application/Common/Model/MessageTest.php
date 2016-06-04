<?php
namespace Common\Command\Model;

use Core;
use GenericTestCase;

/**
 * Common\Model\Message.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class MessageTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Common\Model\Message();
    }

    /**
     * Message 消息领域对象,测试构造函数
     */
    public function testMessageConstructor()
    {
        //测试初始化消息标题
        $titleParameter = $this->getPrivateProperty('Common\Model\Message', 'title');
        $this->assertEmpty($titleParameter->getValue($this->stub));

        //测试初始化消息内容
        $contentParameter = $this->getPrivateProperty('Common\Model\Message', 'content');
        $this->assertEmpty($contentParameter->getValue($this->stub));

        //测试初始化消息目标
        $targetsParameter = $this->getPrivateProperty('Common\Model\Message', 'targets');
        $this->assertEmpty($targetsParameter->getValue($this->stub));

        //测试初始化消息添加时间
        $createTimeParameter = $this->getPrivateProperty('Common\Model\Message', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

    }


    //title 测试 ------------------------------------------------------- start
    /**
     * 设置 Message setTitle() 正确的传参类型,期望传值正确
     */
    public function testSetTitleCorrectType()
    {
        $this->stub->setTitle('string');
        $this->assertEquals('string', $this->stub->getTitle());
    }

    /**
     * 设置 Message setTitle() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetTitleWrongType()
    {
        $this->stub->setTitle(array(1,2,3));
    }
    //title 测试 -------------------------------------------------------   end

    //content 测试 ----------------------------------------------------- start
    /**
     * 设置 Message setContent() 正确的传参类型,期望传值正确
     */
    public function testSetContentCorrectType()
    {
        $this->stub->setContent('string');
        $this->assertEquals('string', $this->stub->getContent());
    }

    /**
     * 设置 Message setContent() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetContentWrongType()
    {
        $this->stub->setContent(array(1,2,3));
    }
    //content 测试 -----------------------------------------------------   end

    //targets 测试 ----------------------------------------------------- start
    /**
     * 设置 Message setTargets() 正确的传参类型,期望传值正确
     */
    public function testSetTargetsCorrectType()
    {
        $this->stub->setTargets('string');
        $this->assertEquals('string', $this->stub->getTargets());
    }

    /**
     * 设置 Message setTargets() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetTargetsWrongType()
    {
        $this->stub->setTargets(array(1,2,3));
    }
    //targets 测试 -----------------------------------------------------   end

    //createTime 测试 -------------------------------------------------- start
    /**
     * 设置 Message setCreateTime() 正确的传参类型,期望传值正确
     */
    public function testSetCreateTimeCorrectType()
    {
        $this->stub->setCreateTime(1461060708);
        $this->assertEquals(1461060708, $this->stub->getCreateTime());
    }

    /**
     * 设置 Message setCreateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCreateTimeWrongType()
    {
        $this->stub->setCreateTime('string');
    }

    /**
     * 设置 Message setCreateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetCreateTimeWrongTypeButNumeric()
    {
        $this->stub->setCreateTime('1461060708');
        $this->assertTrue(is_int($this->stub->getCreateTime()));
        $this->assertEquals(1461060708, $this->stub->getCreateTime());
    }
    //createTime 测试 --------------------------------------------------   end
}
