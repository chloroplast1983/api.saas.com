<?php
namespace Web\Model;

use GenericTestCase;

/**
 * Web\Model\DeliveredInformation.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class DeliveredInformationTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Web\Model\DeliveredInformation();
    }

    /**
     * DeliveredInformation 网店用户配送信息领域对象,测试构造函数
     */
    public function testDeliveredInformationConstructor()
    {
        //测试初始化配送信息id
        $idParameter = $this->getPrivateProperty('Web\Model\DeliveredInformation', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化网店用户
        $guestParameter = $this->getPrivateProperty('Web\Model\DeliveredInformation', 'guest');
        $this->assertEmpty($guestParameter->getValue($this->stub));

        //测试初始化收货人
        $consigneeParameter = $this->getPrivateProperty('Web\Model\DeliveredInformation', 'consignee');
        $this->assertEmpty($consigneeParameter->getValue($this->stub));

        //测试初始化收货地址
        $consigneeAddressParameter = $this->getPrivateProperty('Web\Model\DeliveredInformation', 'consigneeAddress');
        $this->assertEmpty($consigneeAddressParameter->getValue($this->stub));

        //测试初始化收货地址所在省
        $provinceParameter = $this->getPrivateProperty('Web\Model\DeliveredInformation', 'province');
        $this->assertEmpty($provinceParameter->getValue($this->stub));

        //测试初始化收货地址所在市
        $cityParameter = $this->getPrivateProperty('Web\Model\DeliveredInformation', 'city');
        $this->assertEmpty($cityParameter->getValue($this->stub));

        //测试初始化收货地址所在区
        $districtParameter = $this->getPrivateProperty('Web\Model\DeliveredInformation', 'district');
        $this->assertEmpty($districtParameter->getValue($this->stub));

        //测试初始化收货人联系电话
        $consigneePhoneParameter = $this->getPrivateProperty('Web\Model\DeliveredInformation', 'consigneePhone');
        $this->assertEmpty($consigneePhoneParameter->getValue($this->stub));

        //测试初始化收货人地址邮政编码
        $consigneePostalCodeParameter = $this->getPrivateProperty('Web\Model\DeliveredInformation', 'consigneePostalCode');
        $this->assertEmpty($consigneePostalCodeParameter->getValue($this->stub));

        //测试初始化添加时间
        $createTimeParameter = $this->getPrivateProperty('Web\Model\DeliveredInformation', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化更新时间
        $updateTimeParameter = $this->getPrivateProperty('Web\Model\DeliveredInformation', 'updateTime');
        $this->assertGreaterThan(0, $updateTimeParameter->getValue($this->stub));

        //测试初始化快照版本
        $versionParameter = $this->getPrivateProperty('Web\Model\DeliveredInformation', 'version');
        $this->assertEmpty($versionParameter->getValue($this->stub));

        //测试初始化状态
        $statusParameter = $this->getPrivateProperty('Web\Model\DeliveredInformation', 'status');
        $this->assertEquals(STATUS_NORMAL, $statusParameter->getValue($this->stub));

    }


    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 DeliveredInformation setId() 正确的传参类型,期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 DeliveredInformation setId() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 DeliveredInformation setId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetIdWrongTypeButNumeric()
    {
        $this->stub->setId('1');
        $this->assertTrue(is_int($this->stub->getId()));
        $this->assertEquals(1, $this->stub->getId());
    }
    //id 测试 ----------------------------------------------------------   end

    //guest 测试 -------------------------------------------------------- start
    /**
     * 设置 DeliveredInformation setGuest() 正确的传参类型,期望传值正确
     */
    public function testSetGuestCorrectType()
    {
        $object = new \Web\Model\Guest();       //根据需求自己添加对象的设置,如果需要
        $this->stub->setGuest($object);
        $this->assertSame($object, $this->stub->getGuest());
    }

    /**
     * 设置 DeliveredInformation setGuest() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetGuestWrongType()
    {
        $this->stub->setGuest('string');
    }
    //guest 测试 -------------------------------------------------------   end

    //consignee 测试 --------------------------------------------------- start
    /**
     * 设置 DeliveredInformation setConsignee() 正确的传参类型,期望传值正确
     */
    public function testSetConsigneeCorrectType()
    {
        $this->stub->setConsignee('string');
        $this->assertEquals('string', $this->stub->getConsignee());
    }

    /**
     * 设置 DeliveredInformation setConsignee() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetConsigneeWrongType()
    {
        $this->stub->setConsignee(array(1,2,3));
    }
    //consignee 测试 ---------------------------------------------------   end

    //consigneeAddress 测试 -------------------------------------------- start
    /**
     * 设置 DeliveredInformation setConsigneeAddress() 正确的传参类型,期望传值正确
     */
    public function testSetConsigneeAddressCorrectType()
    {
        $this->stub->setConsigneeAddress('string');
        $this->assertEquals('string', $this->stub->getConsigneeAddress());
    }

    /**
     * 设置 DeliveredInformation setConsigneeAddress() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetConsigneeAddressWrongType()
    {
        $this->stub->setConsigneeAddress(array(1,2,3));
    }
    //consigneeAddress 测试 --------------------------------------------   end

    //province 测试 ---------------------------------------------------- start
    /**
     * 设置 DeliveredInformation setProvince() 正确的传参类型,期望传值正确
     */
    public function testSetProvinceCorrectType()
    {
        $object = new \Area\Model\Area();       //根据需求自己添加对象的设置,如果需要
        $this->stub->setProvince($object);
        $this->assertSame($object, $this->stub->getProvince());
    }

    /**
     * 设置 DeliveredInformation setProvince() 错误的传参类型,期望期望抛出TypeError exception
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
     * 设置 DeliveredInformation setCity() 正确的传参类型,期望传值正确
     */
    public function testSetCityCorrectType()
    {
        $object = new \Area\Model\Area();       //根据需求自己添加对象的设置,如果需要
        $this->stub->setCity($object);
        $this->assertSame($object, $this->stub->getCity());
    }

    /**
     * 设置 DeliveredInformation setCity() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCityWrongType()
    {
        $this->stub->setCity('string');
    }
    //city 测试 --------------------------------------------------------   end

    //district 测试 ---------------------------------------------------- start
    /**
     * 设置 DeliveredInformation setDistrict() 正确的传参类型,期望传值正确
     */
    public function testSetDistrictCorrectType()
    {
        $object = new \Area\Model\Area();       //根据需求自己添加对象的设置,如果需要
        $this->stub->setDistrict($object);
        $this->assertSame($object, $this->stub->getDistrict());
    }

    /**
     * 设置 DeliveredInformation setDistrict() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetDistrictWrongType()
    {
        $this->stub->setDistrict('string');
    }
    //district 测试 ----------------------------------------------------   end

    //consigneePhone 测试 ---------------------------------------------- start
    /**
     * 设置 DeliveredInformation setConsigneePhone() 正确的传参类型,期望传值正确
     */
    public function testSetConsigneePhoneCorrectType()
    {
        $this->stub->setConsigneePhone('string');
        $this->assertEquals('string', $this->stub->getConsigneePhone());
    }

    /**
     * 设置 DeliveredInformation setConsigneePhone() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetConsigneePhoneWrongType()
    {
        $this->stub->setConsigneePhone(array(1,2,3));
    }
    //consigneePhone 测试 ----------------------------------------------   end

    //consigneePostalCode 测试 ----------------------------------------- start
    /**
     * 设置 DeliveredInformation setConsigneePostalCode() 正确的传参类型,期望传值正确
     */
    public function testSetConsigneePostalCodeCorrectType()
    {
        $this->stub->setConsigneePostalCode('string');
        $this->assertEquals('string', $this->stub->getConsigneePostalCode());
    }

    /**
     * 设置 DeliveredInformation setConsigneePostalCode() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetConsigneePostalCodeWrongType()
    {
        $this->stub->setConsigneePostalCode(array(1,2,3));
    }
    //consigneePostalCode 测试 -----------------------------------------   end

    //createTime 测试 -------------------------------------------------- start
    /**
     * 设置 DeliveredInformation setCreateTime() 正确的传参类型,期望传值正确
     */
    public function testSetCreateTimeCorrectType()
    {
        $this->stub->setCreateTime(1461049847);
        $this->assertEquals(1461049847, $this->stub->getCreateTime());
    }

    /**
     * 设置 DeliveredInformation setCreateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCreateTimeWrongType()
    {
        $this->stub->setCreateTime('string');
    }

    /**
     * 设置 DeliveredInformation setCreateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetCreateTimeWrongTypeButNumeric()
    {
        $this->stub->setCreateTime('1461049847');
        $this->assertTrue(is_int($this->stub->getCreateTime()));
        $this->assertEquals(1461049847, $this->stub->getCreateTime());
    }
    //createTime 测试 --------------------------------------------------   end

    //updateTime 测试 -------------------------------------------------- start
    /**
     * 设置 DeliveredInformation setUpdateTime() 正确的传参类型,期望传值正确
     */
    public function testSetUpdateTimeCorrectType()
    {
        $this->stub->setUpdateTime(1461049847);
        $this->assertEquals(1461049847, $this->stub->getUpdateTime());
    }

    /**
     * 设置 DeliveredInformation setUpdateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUpdateTimeWrongType()
    {
        $this->stub->setUpdateTime('string');
    }

    /**
     * 设置 DeliveredInformation setUpdateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetUpdateTimeWrongTypeButNumeric()
    {
        $this->stub->setUpdateTime('1461049847');
        $this->assertTrue(is_int($this->stub->getUpdateTime()));
        $this->assertEquals(1461049847, $this->stub->getUpdateTime());
    }
    //updateTime 测试 --------------------------------------------------   end

    //version 测试 ----------------------------------------------------- start
    /**
     * 设置 DeliveredInformation setVersion() 正确的传参类型,期望传值正确
     */
    public function testSetVersionCorrectType()
    {
        $this->stub->setVersion('string');
        $this->assertEquals('string', $this->stub->getVersion());
    }

    /**
     * 设置 DeliveredInformation setVersion() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetVersionWrongType()
    {
        $this->stub->setVersion(array(1,2,3));
    }
    //version 测试 -----------------------------------------------------   end

    //status 测试 ------------------------------------------------------ start
    /**
     * 循环测试 DeliveredInformation setStatus() 是否符合预定范围
     *
     * @dataProvider statusProvider
     */
    public function testSetStatus($actual, $expected)
    {
        $this->stub->setStatus($actual);
        $this->assertEquals($expected, $this->stub->getStatus());
    }

    /**
     * 循环测试 DeliveredInformation setStatus() 数据构建器
     */
    public function statusProvider()
    {
        return array(
            array(STATUS_NORMAL,STATUS_NORMAL),
            array(STATUS_DELETE,STATUS_DELETE),
            array(9999,STATUS_NORMAL),
        );
    }

    /**
     * 设置 DeliveredInformation setStatus() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusWrongType()
    {
        $this->stub->setStatus('string');
    }
    //status 测试 ------------------------------------------------------   end
}
