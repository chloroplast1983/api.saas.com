<?php
namespace Product\Persistence;

use GenericTestCase;

/**
 * Product\Model\Product.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */

class ProductTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Product\Model\Product();
    }

    /**
     * Product 商品领域对象,测试构造函数
     */
    public function testProductConstructor()
    {
        //测试初始化商品id
        $idParameter = $this->getPrivateProperty('Product\Model\Product', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化商品用户
        $userParameter = $this->getPrivateProperty('Product\Model\Product', 'user');
        $this->assertEmpty($userParameter->getValue($this->stub));

        //测试初始化商户名称
        $nameParameter = $this->getPrivateProperty('Product\Model\Product', 'name');
        $this->assertEmpty($nameParameter->getValue($this->stub));

        //测试初始化商品更新时间
        $updateTimeParameter = $this->getPrivateProperty('Product\Model\Product', 'updateTime');
        $this->assertGreaterThan(0, $updateTimeParameter->getValue($this->stub));

        //测试初始化商品添加时间
        $createTimeParameter = $this->getPrivateProperty('Product\Model\Product', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化商品状态变更时间
        $statusTimeParameter = $this->getPrivateProperty('Product\Model\Product', 'statusTime');
        $this->assertGreaterThan(0, $statusTimeParameter->getValue($this->stub));

        //测试初始化商品状态
        $statusParameter = $this->getPrivateProperty('Product\Model\Product', 'status');
        $this->assertEquals(PRODUCT_STATUS_IN_STOCK, $statusParameter->getValue($this->stub));

        //测试初始化商品类型
        $categoryParameter = $this->getPrivateProperty('Product\Model\Product', 'category');
        $this->assertEquals(PRODUCT_CATEGORY_COMMON, $categoryParameter->getValue($this->stub));

        //测试初始化商品特色
        $featureParameter = $this->getPrivateProperty('Product\Model\Product', 'feature');
        $this->assertEmpty($featureParameter->getValue($this->stub));

        //测试初始化商品描述
        $descriptionParameter = $this->getPrivateProperty('Product\Model\Product', 'description');
        $this->assertEmpty($descriptionParameter->getValue($this->stub));

    }


    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 Product setId() 正确的传参类型,期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 Product setId() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 Product setId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetIdWrongTypeButNumeric()
    {
        $this->stub->setId('1');
        $this->assertTrue(is_int($this->stub->getId()));
        $this->assertEquals(1, $this->stub->getId());
    }
    //id 测试 ----------------------------------------------------------   end

    //user 测试 -------------------------------------------------------- start
    /**
     * 设置 Product setUser() 正确的传参类型,期望传值正确
     */
    public function testSetUserCorrectType()
    {
        $object = new \User\Model\User();       //根据需求自己添加对象的设置,如果需要
        $this->stub->setUser($object);
        $this->assertSame($object, $this->stub->getUser());
    }

    /**
     * 设置 Product setUser() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUserWrongType()
    {
        $this->stub->setUser('string');
    }
    //user 测试 --------------------------------------------------------   end

    //name 测试 -------------------------------------------------------- start
    /**
     * 设置 Product setName() 正确的传参类型,期望传值正确
     */
    public function testSetNameCorrectType()
    {
        $this->stub->setName('string');
        $this->assertEquals('string', $this->stub->getName());
    }

    /**
     * 设置 Product setName() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetNameWrongType()
    {
        $this->stub->setName(array(1,2,3));
    }
    //name 测试 --------------------------------------------------------   end

    //updateTime 测试 -------------------------------------------------- start
    /**
     * 设置 Product setUpdateTime() 正确的传参类型,期望传值正确
     */
    public function testSetUpdateTimeCorrectType()
    {
        $this->stub->setUpdateTime(1460993856);
        $this->assertEquals(1460993856, $this->stub->getUpdateTime());
    }

    /**
     * 设置 Product setUpdateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUpdateTimeWrongType()
    {
        $this->stub->setUpdateTime('string');
    }

    /**
     * 设置 Product setUpdateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetUpdateTimeWrongTypeButNumeric()
    {
        $this->stub->setUpdateTime('1460993856');
        $this->assertTrue(is_int($this->stub->getUpdateTime()));
        $this->assertEquals(1460993856, $this->stub->getUpdateTime());
    }
    //updateTime 测试 --------------------------------------------------   end

    //createTime 测试 -------------------------------------------------- start
    /**
     * 设置 Product setCreateTime() 正确的传参类型,期望传值正确
     */
    public function testSetCreateTimeCorrectType()
    {
        $this->stub->setCreateTime(1460993856);
        $this->assertEquals(1460993856, $this->stub->getCreateTime());
    }

    /**
     * 设置 Product setCreateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCreateTimeWrongType()
    {
        $this->stub->setCreateTime('string');
    }

    /**
     * 设置 Product setCreateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetCreateTimeWrongTypeButNumeric()
    {
        $this->stub->setCreateTime('1460993856');
        $this->assertTrue(is_int($this->stub->getCreateTime()));
        $this->assertEquals(1460993856, $this->stub->getCreateTime());
    }
    //createTime 测试 --------------------------------------------------   end

    //statusTime 测试 -------------------------------------------------- start
    /**
     * 设置 Product setStatusTime() 正确的传参类型,期望传值正确
     */
    public function testSetStatusTimeCorrectType()
    {
        $this->stub->setStatusTime(1460993856);
        $this->assertEquals(1460993856, $this->stub->getStatusTime());
    }

    /**
     * 设置 Product setStatusTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusTimeWrongType()
    {
        $this->stub->setStatusTime('string');
    }

    /**
     * 设置 Product setStatusTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetStatusTimeWrongTypeButNumeric()
    {
        $this->stub->setStatusTime('1460993856');
        $this->assertTrue(is_int($this->stub->getStatusTime()));
        $this->assertEquals(1460993856, $this->stub->getStatusTime());
    }
    //statusTime 测试 --------------------------------------------------   end

    //status 测试 ------------------------------------------------------ start
    /**
     * 循环测试 Product setStatus() 是否符合预定范围
     *
     * @dataProvider statusProvider
     */
    public function testSetStatus($actual, $expected)
    {
        $this->stub->setStatus($actual);
        $this->assertEquals($expected, $this->stub->getStatus());
    }

    /**
     * 循环测试 Product setStatus() 数据构建器
     */
    public function statusProvider()
    {
        return array(
            array(PRODUCT_STATUS_IN_STOCK,PRODUCT_STATUS_IN_STOCK),
            array(PRODUCT_STATUS_ON_SALE,PRODUCT_STATUS_ON_SALE),
            array(PRODUCT_STATUS_DELETE,PRODUCT_STATUS_DELETE),
            array(PRODUCT_STATUS_PERMANENTLY_DELETE,PRODUCT_STATUS_PERMANENTLY_DELETE),
            array(9999,PRODUCT_STATUS_IN_STOCK),
        );
    }

    /**
     * 设置 Product setStatus() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusWrongType()
    {
        $this->stub->setStatus('string');
    }
    //status 测试 ------------------------------------------------------   end

    //category 测试 ---------------------------------------------------- start
    /**
     * 循环测试 Product setCategory() 是否符合预定范围
     *
     * @dataProvider categoryProvider
     */
    public function testSetCategory($actual, $expected)
    {
        $this->stub->setCategory($actual);
        $this->assertEquals($expected, $this->stub->getCategory());
    }

    /**
     * 循环测试 Product setCategory() 数据构建器
     */
    public function categoryProvider()
    {
        return array(
            array(PRODUCT_CATEGORY_TOURIST,PRODUCT_CATEGORY_TOURIST),
            array(PRODUCT_CATEGORY_TICKET,PRODUCT_CATEGORY_TICKET),
            array(PRODUCT_CATEGORY_COMMON,PRODUCT_CATEGORY_COMMON),
            array(9999,PRODUCT_CATEGORY_COMMON),
        );
    }

    /**
     * 设置 Product setCategory() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCategoryWrongType()
    {
        $this->stub->setCategory('string');
    }
    //category 测试 ----------------------------------------------------   end

    //feature 测试 ----------------------------------------------------- start
    /**
     * 设置 Product setFeature() 正确的传参类型,期望传值正确
     */
    public function testSetFeatureCorrectType()
    {
        $this->stub->setFeature('string');
        $this->assertEquals('string', $this->stub->getFeature());
    }

    /**
     * 设置 Product setFeature() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetFeatureWrongType()
    {
        $this->stub->setFeature(array(1,2,3));
    }
    //feature 测试 -----------------------------------------------------   end

    //description 测试 ------------------------------------------------- start
    /**
     * 设置 Product setDescription() 正确的传参类型,期望传值正确
     */
    public function testSetDescriptionCorrectType()
    {
        $this->stub->setDescription('string');
        $this->assertEquals('string', $this->stub->getDescription());
    }

    /**
     * 设置 Product setDescription() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetDescriptionWrongType()
    {
        $this->stub->setDescription(array(1,2,3));
    }
    //description 测试 -------------------------------------------------   end
}
