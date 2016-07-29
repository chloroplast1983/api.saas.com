<?php
namespace Common\Model;

use tests\GenericTestCase;
use Marmot\Core;

/**
 * Common\Model\ObjectStatus.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */
 
trait ObjectStatusTest
{
    //statusTime 测试 -------------------------------------------------- start
    /**
     * 设置 User setStatusTime() 正确的传参类型,期望传值正确
     */
    public function testSetStatusTimeCorrectType()
    {
        $this->stub->setStatusTime(1461676779);
        $this->assertEquals(1461676779, $this->stub->getStatusTime());
    }

    /**
     * 设置 User setStatusTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusTimeWrongType()
    {
        $this->stub->setStatusTime('string');
    }

    /**
     * 设置 User setStatusTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetStatusTimeWrongTypeButNumeric()
    {
        $this->stub->setStatusTime('1461676779');
        $this->assertTrue(is_int($this->stub->getStatusTime()));
        $this->assertEquals(1461676779, $this->stub->getStatusTime());
    }
    //statusTime 测试 --------------------------------------------------   end
}
