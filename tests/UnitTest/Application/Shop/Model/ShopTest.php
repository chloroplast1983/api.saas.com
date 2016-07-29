<?php
namespace Shop\Model;

use tests\GenericTestCase;
use Common;

/**
 * Shop\Model\Shop.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class ShopTest extends GenericTestCase
{

    use Common\Model\ObjectTest;
    
    private $stub;

    public function setUp()
    {
        $this->stub = new Shop();
    }

    /**
     * Shop 网店领域对象,测试构造函数
     */
    public function testShopConstructor()
    {
        //测试初始化网店属主,saas用户对象
        $userParameter = $this->getPrivateProperty('Shop\Model\Shop', 'saasUser');
        $this->assertInstanceof('Saas\Model\User', $userParameter->getValue($this->stub));

        //测试初始化联系人电话
        $contactPeoplePhoneParameter = $this->getPrivateProperty('Shop\Model\Shop', 'contactPeoplePhone');
        $this->assertEmpty($contactPeoplePhoneParameter->getValue($this->stub));

        //测试初始化商户名称
        $titleParameter = $this->getPrivateProperty('Shop\Model\Shop', 'title');
        $this->assertEmpty($titleParameter->getValue($this->stub));

        //测试初始化联系人
        $contactPeopleParameter = $this->getPrivateProperty('Shop\Model\Shop', 'contactPeople');
        $this->assertEmpty($contactPeopleParameter->getValue($this->stub));

        //测试初始化联系人qq
        $contactPeopleQQParameter = $this->getPrivateProperty('Shop\Model\Shop', 'contactPeopleQQ');
        $this->assertEmpty($contactPeopleQQParameter->getValue($this->stub));

        //测试初始化店铺所在省
        $provinceParameter = $this->getPrivateProperty('Shop\Model\Shop', 'province');
        $this->assertEmpty($provinceParameter->getValue($this->stub));

        //测试初始化店铺所在市
        $cityParameter = $this->getPrivateProperty('Shop\Model\Shop', 'city');
        $this->assertEmpty($cityParameter->getValue($this->stub));

        //测试初始化店铺地址
        $addressParameter = $this->getPrivateProperty('Shop\Model\Shop', 'address');
        $this->assertEmpty($addressParameter->getValue($this->stub));

        //测试初始化添加时间
        $createTimeParameter = $this->getPrivateProperty('Shop\Model\Shop', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化状态变更时间
        $statusTimeParameter = $this->getPrivateProperty('Shop\Model\Shop', 'statusTime');
        $this->assertGreaterThan(0, $statusTimeParameter->getValue($this->stub));

        //测试初始化状态
        $statusParameter = $this->getPrivateProperty('Shop\Model\Shop', 'status');
        $this->assertEquals(SHOP_STATUS_NORMAL, $statusParameter->getValue($this->stub));

        //测试初始化商品分类
        $productTypeListParameter = $this->getPrivateProperty('Shop\Model\Shop', 'productTypeList');
        $this->assertEquals(array(), $productTypeListParameter->getValue($this->stub));

        //测试初始化商品分类
        $shopSlideListParameter = $this->getPrivateProperty('Shop\Model\Shop', 'shopSlideList');
        $this->assertEquals(array(), $shopSlideListParameter->getValue($this->stub));

    }

    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 Shop setId() 正确的传参类型,期望user对象正确赋值
     */
    public function testSetIdCheckUserGetId()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getUser()->getId());
    }
    //id 测试 ----------------------------------------------------------   end
    
    //user 测试 --------------------------------------------------------- start
    /**
     * 设置 Shop setUser() 正确的传参类型,期望传值正确
     */
    public function testSetUserCorrectType()
    {
        $object = new \Saas\Model\User();
        $this->stub->setUser($object);
        $this->assertSame($object, $this->stub->getUser());
    }

    /**
     * 设置 Shop setUser() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUserWrongType()
    {
        $this->stub->setUser('string');
    }
    //user 测试 ---------------------------------------------------------  end

    //contactPeoplePhone 测试 ------------------------------------------ start
    /**
     * 设置 Shop setContactPeoplePhone() 正确的传参类型,期望传值正确
     */
    public function testSetContactPeoplePhoneCorrectType()
    {
        $this->stub->setContactPeoplePhone('15202939435');
        $this->assertEquals('15202939435', $this->stub->getContactPeoplePhone());
    }

    /**
     * 设置 Shop setContactPeoplePhone() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetContactPeoplePhoneWrongType()
    {
        $this->stub->setContactPeoplePhone(array(1,2,3));
    }

    /**
     * 设置 Shop setContactPeoplePhone() 正确的传参类型,但是不属于手机格式,期望返回空.
     */
    public function testSetContactPeoplePhoneCorrectTypeButNotEmail()
    {
        $this->stub->setContactPeoplePhone('15202939435'.'a');
        $this->assertEquals('', $this->stub->getContactPeoplePhone());
    }
    //contactPeoplePhone 测试 ------------------------------------------   end

    //title 测试 ------------------------------------------------------- start
    /**
     * 设置 Shop setTitle() 正确的传参类型,期望传值正确
     */
    public function testSetTitleCorrectType()
    {
        $this->stub->setTitle('string');
        $this->assertEquals('string', $this->stub->getTitle());
    }

    /**
     * 设置 Shop setTitle() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetTitleWrongType()
    {
        $this->stub->setTitle(array(1,2,3));
    }
    //title 测试 -------------------------------------------------------   end

    //contactPeople 测试 ----------------------------------------------- start
    /**
     * 设置 Shop setContactPeople() 正确的传参类型,期望传值正确
     */
    public function testSetContactPeopleCorrectType()
    {
        $this->stub->setContactPeople('string');
        $this->assertEquals('string', $this->stub->getContactPeople());
    }

    /**
     * 设置 Shop setContactPeople() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetContactPeopleWrongType()
    {
        $this->stub->setContactPeople(array(1,2,3));
    }
    //contactPeople 测试 -----------------------------------------------   end

    //contactPeopleQQ 测试 --------------------------------------------- start
    /**
     * 设置 Shop setContactPeopleQQ() 正确的传参类型,期望传值正确
     */
    public function testSetContactPeopleQQCorrectType()
    {
        $this->stub->setContactPeopleQQ('41893204');
        $this->assertEquals('41893204', $this->stub->getContactPeopleQQ());
    }

    /**
     * 设置 Shop setContactPeopleQQ() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetContactPeopleQQWrongType()
    {
        $this->stub->setContactPeopleQQ(array(1,2,3));
    }

    /**
     * 设置 Shop setContactPeopleQQ() 正确的传参类型,但是不属于QQ格式,期望返回空.
     */
    public function testSetContactPeopleQQCorrectTypeButNotEmail()
    {
        $this->stub->setContactPeopleQQ('string');
        $this->assertEquals('', $this->stub->getContactPeopleQQ());
    }
    //contactPeopleQQ 测试 ---------------------------------------------   end

    //province 测试 ---------------------------------------------------- start
    /**
     * 设置 Shop setProvince() 正确的传参类型,期望传值正确
     */
    public function testSetProvinceCorrectType()
    {
        $object = new \Area\Model\Area();       //根据需求自己添加对象的设置,如果需要
        $this->stub->setProvince($object);
        $this->assertSame($object, $this->stub->getProvince());
    }

    /**
     * 设置 Shop setProvince() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetProvinceWrongType()
    {
        $this->stub->setProvince('string');
    }
    //province 测试 ----------------------------------------------------   end

    //city 测试 -------------------------------------------------------- start
    /**
     * 设置 Shop setCity() 正确的传参类型,期望传值正确
     */
    public function testSetCityCorrectType()
    {
        $object = new \Area\Model\Area();       //根据需求自己添加对象的设置,如果需要
        $this->stub->setCity($object);
        $this->assertSame($object, $this->stub->getCity());
    }

    /**
     * 设置 Shop setCity() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCityWrongType()
    {
        $this->stub->setCity('string');
    }
    //city 测试 --------------------------------------------------------   end

    //address 测试 ----------------------------------------------------- start
    /**
     * 设置 Shop setAddress() 正确的传参类型,期望传值正确
     */
    public function testSetAddressCorrectType()
    {
        $this->stub->setAddress('string');
        $this->assertEquals('string', $this->stub->getAddress());
    }

    /**
     * 设置 Shop setAddress() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetAddressWrongType()
    {
        $this->stub->setAddress(array(1,2,3));
    }
    //address 测试 -----------------------------------------------------   end

    //status 测试 ------------------------------------------------------ start
    /**
     * 循环测试 Shop setStatus() 是否符合预定范围
     *
     * @dataProvider statusProvider
     */
    public function testSetStatus($actual, $expected)
    {
        $this->stub->setStatus($actual);
        $this->assertEquals($expected, $this->stub->getStatus());
    }

    /**
     * 循环测试 Shop setStatus() 数据构建器
     */
    public function statusProvider()
    {
        return array(
            array(SHOP_STATUS_NORMAL,SHOP_STATUS_NORMAL),
            array(SHOP_STATUS_BLOCKED,SHOP_STATUS_BLOCKED),
            array(9999,SHOP_STATUS_NORMAL),
        );
    }

    /**
     * 设置 Shop setStatus() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusWrongType()
    {
        $this->stub->setStatus('string');
    }
    //status 测试 ------------------------------------------------------   end
}
