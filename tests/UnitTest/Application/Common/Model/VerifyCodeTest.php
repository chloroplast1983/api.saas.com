<?php
namespace Common\Command\Model;

use Core;
use GenericTestCase;

/**
 * Common\Model\VerifyCode.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class VerifyCodeTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Common\Model\VerifyCode();
    }

    /**
     * VerifyCode 验证码领域对象,测试构造函数
     */
    public function testVerifyCodeConstructor()
    {
        //测试初始化验证码键值
        $keyParameter = $this->getPrivateProperty('Common\Model\VerifyCode', 'key');
        $this->assertEmpty($keyParameter->getValue($this->stub));

        //测试初始化验证码内容
        $codeParameter = $this->getPrivateProperty('Common\Model\VerifyCode', 'code');
        $this->assertEmpty($codeParameter->getValue($this->stub));

        //测试初始化验证码存储时间
        $ttlParameter = $this->getPrivateProperty('Common\Model\VerifyCode', 'ttl');
        $this->assertEquals(3*60, $ttlParameter->getValue($this->stub));

    }


    //key 测试 --------------------------------------------------------- start
    /**
     * 设置 VerifyCode setKey() 正确的传参类型,期望传值正确
     */
    public function testSetKeyCorrectType()
    {
        $this->stub->setKey('string');
        $this->assertEquals('string', $this->stub->getKey());
    }

    /**
     * 设置 VerifyCode setKey() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetKeyWrongType()
    {
        $this->stub->setKey(array(1,2,3));
    }
    //key 测试 ---------------------------------------------------------   end

    //code 测试 -------------------------------------------------------- start
    /**
     * 设置 VerifyCode setCode() 正确的传参类型,期望传值正确
     */
    public function testSetCodeCorrectType()
    {
        $this->stub->setCode('string');
        $this->assertEquals('string', $this->stub->getCode());
    }
    //code 测试 --------------------------------------------------------   end

    //ttl 测试 --------------------------------------------------------- start
    /**
     * 设置 VerifyCode setTtl() 正确的传参类型,期望传值正确
     */
    public function testSetTtlCorrectType()
    {
        $this->stub->setTtl(1);
        $this->assertEquals(1, $this->stub->getTtl());
    }

    /**
     * 设置 VerifyCode setTtl() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetTtlWrongType()
    {
        $this->stub->setTtl('string');
    }

    /**
     * 设置 VerifyCode setTtl() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetTtlWrongTypeButNumeric()
    {
        $this->stub->setTtl('1');
        $this->assertTrue(is_int($this->stub->getTtl()));
        $this->assertEquals(1, $this->stub->getTtl());
    }
    //ttl 测试 ---------------------------------------------------------   end
}
