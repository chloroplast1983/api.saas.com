<?php
namespace Web\Command\Shop;

use System\Interfaces\Pcommand;
use Web\Model\Shop;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * Web/Command/Shop/AddCommand.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */

class AddCommandTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_shop');

    /**
     * 测试添加银行命令
     */
    public function testAddCommand()
    {

        $testUserId = 99;
        //初始化BankAccount
        $shop = new Shop($testUserId);
        $shop->setContactPeoplePhone('1111111111');
        $shop->setTitle('title');
        $shop->setContactPeople('contactPeople');
        $shop->setContactPeopleQQ('111111');
        $shop->setProvince(new \Area\Model\Area(1));
        $shop->setCity(new \Area\Model\Area(2));
        $shop->setAddress('address');
        //初始化命令
        $command = Core::$_container->make('Web\Command\Shop\AddCommand', ['shop'=>$shop]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);
        //期望id已经赋值且大于0
        $this->assertGreaterThan(0, $shop->getId());

        //查询商品数据库,确认数据插入成功
        $expectArray = Core::$_dbDriver->query('SELECT * FROM pcore_shop WHERE userId='.$shop->getId());
        $expectArray = $expectArray[0];

        $this->assertEquals($shop->getId(), $expectArray['userId']);
        $this->assertEquals($shop->getContactPeoplePhone(), $expectArray['contactPeoplePhone']);
        $this->assertEquals($shop->getTitle(), $expectArray['title']);
        $this->assertEquals($shop->getContactPeople(), $expectArray['contactPeople']);
        $this->assertEquals($shop->getContactPeopleQQ(), $expectArray['contactPeopleQQ']);
        $this->assertEquals($shop->getProvince()->getId(), $expectArray['province']);
        $this->assertEquals($shop->getCity()->getId(), $expectArray['city']);
        $this->assertEquals($shop->getAddress(), $expectArray['address']);
        $this->assertEquals($shop->getCreateTime(), $expectArray['createTime']);
        $this->assertEquals($shop->getStatusTime(), $expectArray['statusTime']);
        $this->assertEquals($shop->getStatus(), $expectArray['status']);
        $this->assertEquals($shop->getUpdateTime(), $expectArray['updateTime']);
    }
}
