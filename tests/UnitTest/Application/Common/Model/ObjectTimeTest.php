<?php
namespace Common\Model;

use tests\GenericTestCase;
use Marmot\Core;

/**
 * Common\Model\ObjectTime.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */
 
trait ObjectTimeTest
{
    //createTime 测试 -------------------------------------------------- start
    /**
     * 设置 User setCreateTime() 正确的传参类型,期望传值正确
     */
    public function testSetCreateTimeCorrectType()
    {
        $this->stub->setcreateTime(1461048262);
        $this->assertEquals(1461048262, $this->stub->getcreateTime());
    }

    /**
     * 设置 User setCreateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCreateTimeWrongType()
    {
        $this->stub->setcreateTime('string');
    }

    /**
     * 设置 User setCreateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetCreateTimeWrongTypeButNumeric()
    {
        $this->stub->setcreateTime('1461048262');
        $this->assertTrue(is_int($this->stub->getcreateTime()));
        $this->assertEquals(1461048262, $this->stub->getcreateTime());
    }
    //createTime 测试 --------------------------------------------------   end

    //updateTime 测试 -------------------------------------------------- start
    /**
     * 设置 User setUpdateTime() 正确的传参类型,期望传值正确
     */
    public function testSetUpdateTimeCorrectType()
    {
        $this->stub->setUpdateTime(1461048262);
        $this->assertEquals(1461048262, $this->stub->getUpdateTime());
    }

    /**
     * 设置 User setUpdateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUpdateTimeWrongType()
    {
        $this->stub->setUpdateTime('string');
    }

    /**
     * 设置 User setUpdateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetUpdateTimeWrongTypeButNumeric()
    {
        $this->stub->setUpdateTime('1461048262');
        $this->assertTrue(is_int($this->stub->getUpdateTime()));
        $this->assertEquals(1461048262, $this->stub->getUpdateTime());
    }
    //updateTime 测试 --------------------------------------------------   end
}