<?php
namespace User\Command\Bank;

use GenericTestCase;
use Core;

/**
 * User/Command/Bank/BankCommandFactoryTest.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class BankCommandFactoryTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        //初始化工厂桩件
        $this->stub = new \User\Command\Bank\BankCommandFactory();
    }

    /**
     * 测试add命令返回
     */
    public function testBankCommandFactoryAdd()
    {

        $command = $this->stub->createCommand('add', new \User\Model\BankAccount(), new \User\Model\User());
        //测试返回类型是否正确
        $this->assertInstanceOf('User\Command\Bank\AddCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试edit命令返回
     */
    public function testBankCommandFactoryEdit()
    {

        $command = $this->stub->createCommand('edit', new \User\Model\BankAccount(), new \User\Model\User());
        //测试返回类型是否正确
        $this->assertInstanceOf('User\Command\Bank\EditCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }
}
