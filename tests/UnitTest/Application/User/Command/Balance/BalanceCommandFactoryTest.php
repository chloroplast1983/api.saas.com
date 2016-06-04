<?php
namespace User\Command\Balance;

use GenericTestCase;
use Core;

/**
 * User/Command/Balance/BalanceCommandFactoryTest.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class BalanceCommandFactoryTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        //初始化工厂桩件
        $this->stub = new \User\Command\Balance\BalanceCommandFactory();
    }

    /**
     * 测试add命令返回
     */
    public function testBalanceCommandFactoryPay()
    {

        $command = $this->stub->createCommand('pay', new \User\Model\BalanceLog());
        //测试返回类型是否正确
        $this->assertInstanceOf('User\Command\Balance\PayCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试edit命令返回
     */
    public function testBalanceCommandFactoryRePay()
    {

        $command = $this->stub->createCommand('rePay', new \User\Model\BalanceLog());
        //测试返回类型是否正确
        $this->assertInstanceOf('User\Command\Balance\RePayCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }
}
