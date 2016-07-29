<?php
namespace Area\Model;

use tests\GenericTestCase;

/**
 * Area\Model\Area.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.07.29
 */

class AreaTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new Area();
    }

    /**
     * Area 地区领域对象,测试构造函数
     */
    public function testAreaConstructor()
    {
        //测试初始化品牌id
        $idParameter = $this->getPrivateProperty('Area\Model\Area', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化品牌名称
        $nameParameter = $this->getPrivateProperty('Area\Model\Area', 'name');
        $this->assertEmpty($nameParameter->getValue($this->stub));

        //测试初始化地区父id
        $parentIdParameter = $this->getPrivateProperty('Area\Model\Area', 'parentId');
        $this->assertEquals(0, $parentIdParameter->getValue($this->stub));

    }


    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 Area setId() 正确的传参类型,期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 Area setId() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 Area setId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetIdWrongTypeButNumeric()
    {
        $this->stub->setId('1');
        $this->assertTrue(is_int($this->stub->getId()));
        $this->assertEquals(1, $this->stub->getId());
    }
    //id 测试 ----------------------------------------------------------   end

    //name 测试 -------------------------------------------------------- start
    /**
     * 设置 Area setName() 正确的传参类型,期望传值正确
     */
    public function testSetNameCorrectType()
    {
        $this->stub->setName('string');
        $this->assertEquals('string', $this->stub->getName());
    }

    /**
     * 设置 Area setName() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetNameWrongType()
    {
        $this->stub->setName(array(1,2,3));
    }
    //name 测试 --------------------------------------------------------   end

    //parentId 测试 ---------------------------------------------------- start
    /**
     * 设置 Area setParentId() 正确的传参类型,期望传值正确
     */
    public function testSetParentIdCorrectType()
    {
        $this->stub->setParentId(1);
        $this->assertEquals(1, $this->stub->getParentId());
    }

    /**
     * 设置 Area setParentId() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetParentIdWrongType()
    {
        $this->stub->setParentId('string');
    }

    /**
     * 设置 Area setParentId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetParentIdWrongTypeButNumeric()
    {
        $this->stub->setParentId('1');
        $this->assertTrue(is_int($this->stub->getParentId()));
        $this->assertEquals(1, $this->stub->getParentId());
    }
    //parentId 测试 ----------------------------------------------------   end
}
