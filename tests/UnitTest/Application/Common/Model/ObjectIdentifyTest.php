<?php
namespace Common\Model;

use tests\GenericTestCase;
use Marmot\Core;

/**
 * Common\Model\ObjectIdentify.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */
 
trait ObjectIdentifyTest
{
	//id 测试 ---------------------------------------------------------- start
    /**
     * 设置 Application setId() 正确的传参类型,期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 Application setId() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 Application setId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetIdWrongTypeButNumeric()
    {
        $this->stub->setId('1');
        $this->assertTrue(is_int($this->stub->getId()));
        $this->assertEquals(1, $this->stub->getId());
    }
    //id 测试 ----------------------------------------------------------   end
}