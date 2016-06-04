<?php
namespace Web\Command\Guest;

use System\Interfaces\Pcommand;
use Web\Model\Guest;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * User/Command/User/SignUpUserCommand.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */

class SignUpCommandTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_web_guest');

    private $guest;

    public function setUp()
    {
        $this->guest = new Guest();
        parent::setUp();
    }

    public function tearDown()
    {
        //删除user
        unset($this->guest);
        parent::tearDown();
    }

    /**
     * 测试一个新的手机号注册,期望命令返回成功,且数据库已经成功插入数据
     */
    public function testSignUpWithNewCellPhoneNumber()
    {
        //初始化user
        $this->guest->setCellPhone('15202939435');
        $this->guest->encryptPassword('111111');
        $this->guest->setSourceShop(new \Web\Model\Shop(1));

        //初始化命令
        $command = Core::$_container->make('Web\Command\Guest\SignUpCommand', ['guest'=>$this->guest]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);

        $id = $this->guest->getId();
        //期望uid已经赋值且大于0
        $this->assertGreaterThan(0, $id);

        //查询数据库,确认数据插入成功
        $expectArray = Core::$_dbDriver->query('SELECT * FROM pcore_web_guest WHERE guestId='.$id);
        $expectArray = $expectArray[0];

        $this->assertEquals($id, $expectArray['guestId']);
        $this->assertEquals($this->guest->getCellPhone(), $expectArray['cellPhone']);
        $this->assertNotEmpty($expectArray['salt']);
        $this->assertEquals($this->guest->getPassword(), $expectArray['password']);
        $this->assertEquals($this->guest->getSignUpTime(), $expectArray['signUpTime']);
        $this->assertEquals($this->guest->getUpdateTime(), $expectArray['updateTime']);
        $this->assertEquals($this->guest->getSourceShop()->getId(), $expectArray['source']);
    }

    /**
     * 测试一个已经注册过的手机号,期望命令返回失败,数据库没有成功插入数据
     */
    public function testSignUpWithDuplicateCellPhoneNumber()
    {

        //旧的用户总数
        $oldCount = Core::$_dbDriver->query('SELECT COUNT(*) as count FROM pcore_web_guest');
        $oldCount = $oldCount[0]['count'];

        //查询出一个已经使用过的手机号
        $existedCellPhoneNumber = Core::$_dbDriver->query('SELECT cellPhone FROM pcore_web_guest LIMIT 1');
        $existedCellPhoneNumber = $existedCellPhoneNumber[0]['cellPhone'];
        //重新赋值一个已经存在的手机号
        $this->guest->setCellPhone($existedCellPhoneNumber);
        $this->guest->setSourceShop(new \Web\Model\Shop(1));
        //初始化命令
        $command = Core::$_container->make('Web\Command\Guest\SignUpCommand', ['guest'=>$this->guest]);
        //执行命令
        $result = $command->execute();

        //期望命令返回失败
        $this->assertFalse($result);

        //期望uid没有赋值
        $this->assertEmpty($this->guest->getId());

        //查询数据库,确认数据没有插入成功
        //新的用户总数
        $newCount = Core::$_dbDriver->query('SELECT COUNT(*) as count FROM pcore_web_guest');
        $newCount = $newCount[0]['count'];

        //期望旧的用户总数和新的用户总数一致没有变化
        $this->assertEquals($oldCount, $newCount);
    }
}
