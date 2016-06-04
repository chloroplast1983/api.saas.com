<?php
namespace Application\Persistence;

use GenericTestCase;

/**
 * Application\Model\Application.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */

class ApplicationTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Application\Model\Application();
    }

    /**
     * Application 用户申请表单,测试构造函数
     */
    public function testApplicationConstructor()
    {

        //测试初始化saas用户
        $userParameter = $this->getPrivateProperty('Application\Model\Application', 'user');
        $this->assertInstanceof('User\Model\User', $userParameter->getValue($this->stub));

        //测试初始化商户名称
        $titleParameter = $this->getPrivateProperty('Application\Model\Application', 'title');
        $this->assertEmpty($titleParameter->getValue($this->stub));

        //测试初始化联系人
        $contactPeopleParameter = $this->getPrivateProperty('Application\Model\Application', 'contactPeople');
        $this->assertEmpty($contactPeopleParameter->getValue($this->stub));

        //测试初始化联系人电话
        $contactPeoplePhoneParameter = $this->getPrivateProperty('Application\Model\Application', 'contactPeoplePhone');
        $this->assertEmpty($contactPeoplePhoneParameter->getValue($this->stub));

        //测试初始化联系人QQ
        $contactPeopleQQParameter = $this->getPrivateProperty('Application\Model\Application', 'contactPeopleQQ');
        $this->assertEmpty($contactPeopleQQParameter->getValue($this->stub));

        //测试初始化用户住址省
        $provinceParameter = $this->getPrivateProperty('Application\Model\Application', 'province');
        $this->assertEmpty($provinceParameter->getValue($this->stub));

        //测试初始化用户住址市
        $cityParameter = $this->getPrivateProperty('Application\Model\Application', 'city');
        $this->assertEmpty($cityParameter->getValue($this->stub));

        //测试初始化地址
        $addressParameter = $this->getPrivateProperty('Application\Model\Application', 'address');
        $this->assertEmpty($addressParameter->getValue($this->stub));

        //测试初始化身份证正面照片
        $identifyCardFrontPhotoParameter = $this->getPrivateProperty('Application\Model\Application', 'identifyCardFrontPhoto');
        $this->assertEquals(0, $identifyCardFrontPhotoParameter->getValue($this->stub));

        //测试初始化身份证背面身照片
        $identifyCardBackPhotoParameter = $this->getPrivateProperty('Application\Model\Application', 'identifyCardBackPhoto');
        $this->assertEquals(0, $identifyCardBackPhotoParameter->getValue($this->stub));

        //测试初始化银行持卡人姓名
        $bankCardHolderNameParameter = $this->getPrivateProperty('Application\Model\Application', 'bankCardHolderName');
        $this->assertEmpty($bankCardHolderNameParameter->getValue($this->stub));

        //测试初始化卡号
        $bankCardNumberParameter = $this->getPrivateProperty('Application\Model\Application', 'bankCardNumber');
        $this->assertEmpty($bankCardNumberParameter->getValue($this->stub));

        //测试初始化银行预留手机
        $bankCardCellphoneParameter = $this->getPrivateProperty('Application\Model\Application', 'bankCardCellphone');
        $this->assertEmpty($bankCardCellphoneParameter->getValue($this->stub));

        //测试初始化表单更新时间
        $updateTimeParameter = $this->getPrivateProperty('Application\Model\Application', 'updateTime');
        $this->assertGreaterThan(0, $updateTimeParameter->getValue($this->stub));

        //测试初始化表单添加时间
        $createTimeParameter = $this->getPrivateProperty('Application\Model\Application', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化表单申请状态
        $statusParameter = $this->getPrivateProperty('Application\Model\Application', 'status');
        $this->assertEquals(APPLICATION_PENDING, $statusParameter->getValue($this->stub));

    }

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

    /**
     * 设置 Application setId() 正确的传参类型,期望user对象正确赋值
     */
    public function testSetIdCheckUserGetId()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getUser()->getId());
    }
    //id 测试 ----------------------------------------------------------   end

    //user 测试 -------------------------------------------------------- start
    /**
     * 设置 Application setUser() 正确的传参类型,期望传值正确
     */
    public function testSetUserCorrectType()
    {
        $object = new \User\Model\User();       //根据需求自己添加对象的设置,如果需要
        $this->stub->setUser($object);
        $this->assertSame($object, $this->stub->getUser());
    }

    /**
     * 设置 Application setUser() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUserWrongType()
    {
        $this->stub->setUser('string');
    }
    //user 测试 --------------------------------------------------------   end

    //title 测试 ------------------------------------------------------- start
    /**
     * 设置 Application setTitle() 正确的传参类型,期望传值正确
     */
    public function testSetTitleCorrectType()
    {
        $this->stub->setTitle('string');
        $this->assertEquals('string', $this->stub->getTitle());
    }

    /**
     * 设置 Application setTitle() 错误的传参类型,期望期望抛出TypeError exception
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
     * 设置 Application setContactPeople() 正确的传参类型,期望传值正确
     */
    public function testSetContactPeopleCorrectType()
    {
        $this->stub->setContactPeople('string');
        $this->assertEquals('string', $this->stub->getContactPeople());
    }

    /**
     * 设置 Application setContactPeople() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetContactPeopleWrongType()
    {
        $this->stub->setContactPeople(array(1,2,3));
    }
    //contactPeople 测试 -----------------------------------------------   end

    //contactPeoplePhone 测试 ------------------------------------------ start
    /**
     * 设置 Application setContactPeoplePhone() 正确的传参类型,期望传值正确
     */
    public function testSetContactPeoplePhoneCorrectType()
    {
        $this->stub->setContactPeoplePhone('15202939435');
        $this->assertEquals('15202939435', $this->stub->getContactPeoplePhone());
    }

    /**
     * 设置 Application setContactPeoplePhone() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetContactPeoplePhoneWrongType()
    {
        $this->stub->setContactPeoplePhone(array(1,2,3));
    }

    /**
     * 设置 Application setContactPeoplePhone() 正确的传参类型,但是不属于手机格式,期望返回空.
     */
    public function testSetContactPeoplePhoneCorrectTypeButNotEmail()
    {
        $this->stub->setContactPeoplePhone('15202939435'.'a');
        $this->assertEquals('', $this->stub->getContactPeoplePhone());
    }
    //contactPeoplePhone 测试 ------------------------------------------   end

    //contactPeopleQQ 测试 --------------------------------------------- start
    /**
     * 设置 Application setContactPeopleQQ() 正确的传参类型,期望传值正确
     */
    public function testSetContactPeopleQQCorrectType()
    {
        $this->stub->setContactPeopleQQ('41893204');
        $this->assertEquals('41893204', $this->stub->getContactPeopleQQ());
    }

    /**
     * 设置 Application setContactPeopleQQ() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetContactPeopleQQWrongType()
    {
        $this->stub->setContactPeopleQQ(array(1,2,3));
    }

    /**
     * 设置 Application setContactPeopleQQ() 正确的传参类型,但是不属于QQ格式,期望返回空.
     */
    public function testSetContactPeopleQQCorrectTypeButNotEmail()
    {
        $this->stub->setContactPeopleQQ('string');
        $this->assertEquals('', $this->stub->getContactPeopleQQ());
    }
    //contactPeopleQQ 测试 ---------------------------------------------   end

    //province 测试 ---------------------------------------------------- start
    /**
     * 设置 Application setProvince() 正确的传参类型,期望传值正确
     */
    public function testSetProvinceCorrectType()
    {
        $object = new \Area\Model\Area();       //根据需求自己添加对象的设置,如果需要
        $this->stub->setProvince($object);
        $this->assertSame($object, $this->stub->getProvince());
    }

    /**
     * 设置 Application setProvince() 错误的传参类型,期望期望抛出TypeError exception
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
     * 设置 Application setCity() 正确的传参类型,期望传值正确
     */
    public function testSetCityCorrectType()
    {
        $object = new \Area\Model\Area();       //根据需求自己添加对象的设置,如果需要
        $this->stub->setCity($object);
        $this->assertSame($object, $this->stub->getCity());
    }

    /**
     * 设置 Application setCity() 错误的传参类型,期望期望抛出TypeError exception
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
     * 设置 Application setAddress() 正确的传参类型,期望传值正确
     */
    public function testSetAddressCorrectType()
    {
        $this->stub->setAddress('string');
        $this->assertEquals('string', $this->stub->getAddress());
    }

    /**
     * 设置 Application setAddress() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetAddressWrongType()
    {
        $this->stub->setAddress(array(1,2,3));
    }
    //address 测试 -----------------------------------------------------   end

    //identifyCardFrontPhoto 测试 -------------------------------------- start
    /**
     * 设置 Application setIdentifyCardFrontPhoto() 正确的传参类型,期望传值正确
     */
    public function testSetIdentifyCardFrontPhotoCorrectType()
    {
        $this->stub->setIdentifyCardFrontPhoto(1);
        $this->assertEquals(1, $this->stub->getIdentifyCardFrontPhoto());
    }

    /**
     * 设置 Application setIdentifyCardFrontPhoto() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdentifyCardFrontPhotoWrongType()
    {
        $this->stub->setIdentifyCardFrontPhoto('string');
    }

    /**
     * 设置 Application setIdentifyCardFrontPhoto() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetIdentifyCardFrontPhotoWrongTypeButNumeric()
    {
        $this->stub->setIdentifyCardFrontPhoto('1');
        $this->assertTrue(is_int($this->stub->getIdentifyCardFrontPhoto()));
        $this->assertEquals(1, $this->stub->getIdentifyCardFrontPhoto());
    }
    //identifyCardFrontPhoto 测试 --------------------------------------   end

    //identifyCardBackPhoto 测试 --------------------------------------- start
    /**
     * 设置 Application setIdentifyCardBackPhoto() 正确的传参类型,期望传值正确
     */
    public function testSetIdentifyCardBackPhotoCorrectType()
    {
        $this->stub->setIdentifyCardBackPhoto(1);
        $this->assertEquals(1, $this->stub->getIdentifyCardBackPhoto());
    }

    /**
     * 设置 Application setIdentifyCardBackPhoto() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdentifyCardBackPhotoWrongType()
    {
        $this->stub->setIdentifyCardBackPhoto('string');
    }

    /**
     * 设置 Application setIdentifyCardBackPhoto() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetIdentifyCardBackPhotoWrongTypeButNumeric()
    {
        $this->stub->setIdentifyCardBackPhoto('1');
        $this->assertTrue(is_int($this->stub->getIdentifyCardBackPhoto()));
        $this->assertEquals(1, $this->stub->getIdentifyCardBackPhoto());
    }
    //identifyCardBackPhoto 测试 ---------------------------------------   end

    //bankCardHolderName 测试 ------------------------------------------ start
    /**
     * 设置 Application setBankCardHolderName() 正确的传参类型,期望传值正确
     */
    public function testSetBankCardHolderNameCorrectType()
    {
        $this->stub->setBankCardHolderName('string');
        $this->assertEquals('string', $this->stub->getBankCardHolderName());
    }

    /**
     * 设置 Application setBankCardHolderName() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetBankCardHolderNameWrongType()
    {
        $this->stub->setBankCardHolderName(array(1,2,3));
    }
    //bankCardHolderName 测试 ------------------------------------------   end

    //bankCardNumber 测试 ---------------------------------------------- start
    /**
     * 设置 Application setBankCardNumber() 正确的传参类型,期望传值正确
     */
    public function testSetBankCardNumberCorrectType()
    {
        $this->stub->setBankCardNumber('string');
        $this->assertEquals('string', $this->stub->getBankCardNumber());
    }

    /**
     * 设置 Application setBankCardNumber() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetBankCardNumberWrongType()
    {
        $this->stub->setBankCardNumber(array(1,2,3));
    }
    //bankCardNumber 测试 ----------------------------------------------   end

    //bankCardCellphone 测试 ------------------------------------------- start
    /**
     * 设置 Application setBankCardCellphone() 正确的传参类型,期望传值正确
     */
    public function testSetBankCardCellphoneCorrectType()
    {
        $this->stub->setBankCardCellphone('15202939435');
        $this->assertEquals('15202939435', $this->stub->getBankCardCellphone());
    }

    /**
     * 设置 Application setBankCardCellphone() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetBankCardCellphoneWrongType()
    {
        $this->stub->setBankCardCellphone(array(1,2,3));
    }

    /**
     * 设置 Application setBankCardCellphone() 正确的传参类型,但是不属于手机格式,期望返回空.
     */
    public function testSetBankCardCellphoneCorrectTypeButNotEmail()
    {
        $this->stub->setBankCardCellphone('15202939435'.'a');
        $this->assertEquals('', $this->stub->getBankCardCellphone());
    }
    //bankCardCellphone 测试 -------------------------------------------   end

    //updateTime 测试 -------------------------------------------------- start
    /**
     * 设置 Application setUpdateTime() 正确的传参类型,期望传值正确
     */
    public function testSetUpdateTimeCorrectType()
    {
        $this->stub->setUpdateTime(1460991577);
        $this->assertEquals(1460991577, $this->stub->getUpdateTime());
    }

    /**
     * 设置 Application setUpdateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUpdateTimeWrongType()
    {
        $this->stub->setUpdateTime('string');
    }

    /**
     * 设置 Application setUpdateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetUpdateTimeWrongTypeButNumeric()
    {
        $this->stub->setUpdateTime('1460991577');
        $this->assertTrue(is_int($this->stub->getUpdateTime()));
        $this->assertEquals(1460991577, $this->stub->getUpdateTime());
    }
    //updateTime 测试 --------------------------------------------------   end

    //createTime 测试 -------------------------------------------------- start
    /**
     * 设置 Application setCreateTime() 正确的传参类型,期望传值正确
     */
    public function testSetCreateTimeCorrectType()
    {
        $this->stub->setCreateTime(1460991577);
        $this->assertEquals(1460991577, $this->stub->getCreateTime());
    }

    /**
     * 设置 Application setCreateTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCreateTimeWrongType()
    {
        $this->stub->setCreateTime('string');
    }

    /**
     * 设置 Application setCreateTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetCreateTimeWrongTypeButNumeric()
    {
        $this->stub->setCreateTime('1460991577');
        $this->assertTrue(is_int($this->stub->getCreateTime()));
        $this->assertEquals(1460991577, $this->stub->getCreateTime());
    }
    //createTime 测试 --------------------------------------------------   end

    //status 测试 ------------------------------------------------------ start
    /**
     * 循环测试 Application setStatus() 是否符合预定范围
     *
     * @dataProvider statusProvider
     */
    public function testSetStatus($actual, $expected)
    {
        $this->stub->setStatus($actual);
        $this->assertEquals($expected, $this->stub->getStatus());
    }

    /**
     * 循环测试 Application setStatus() 数据构建器
     */
    public function statusProvider()
    {
        return array(
            array(APPLICATION_PENDING,APPLICATION_PENDING),
            array(APPLICATION_VERIFIED,APPLICATION_VERIFIED),
            array(APPLICATION_DECLINE,APPLICATION_DECLINE),
            array(9999,APPLICATION_PENDING),
        );
    }

    /**
     * 设置 Application setStatus() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusWrongType()
    {
        $this->stub->setStatus('string');
    }
    //status 测试 ------------------------------------------------------   end

    //statusTime 测试 -------------------------------------------------- start
    /**
     * 设置 Application setStatusTime() 正确的传参类型,期望传值正确
     */
    public function testSetStatusTimeCorrectType()
    {
        $this->stub->setStatusTime(1460993856);
        $this->assertEquals(1460993856, $this->stub->getStatusTime());
    }

    /**
     * 设置 Application setStatusTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusTimeWrongType()
    {
        $this->stub->setStatusTime('string');
    }

    /**
     * 设置 Application setStatusTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetStatusTimeWrongTypeButNumeric()
    {
        $this->stub->setStatusTime('1460993856');
        $this->assertTrue(is_int($this->stub->getStatusTime()));
        $this->assertEquals(1460993856, $this->stub->getStatusTime());
    }
    //statusTime 测试 --------------------------------------------------   end
}
