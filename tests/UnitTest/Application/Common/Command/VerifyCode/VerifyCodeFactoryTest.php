<?php
namespace Common\Command\VerifyCode;

use Core;
use GenericTestCase;

/**
 * Common/Command/VerifyCodeFactoryTest.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class VerifyCodeFactoryTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        //初始化工厂桩件
        $this->stub = new \Common\Command\VerifyCode\VerifyCodeCommandFactory();
    }

    /**
     * 测试add命令返回
     */
    public function testVerifyCodeCommandFactoryAdd()
    {

        $command = $this->stub->createCommand('add', new \Common\Model\VerifyCode());
        //测试返回类型是否正确
        $this->assertInstanceOf('Common\Command\VerifyCode\AddCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }

    /**
     * 测试delete命令返回
     */
    public function testVerifyCommandFactoryDelete()
    {

        $command = $this->stub->createCommand('delete', new \Common\Model\VerifyCode());
        //测试返回类型是否正确
        $this->assertInstanceOf('Common\Command\VerifyCode\DeleteCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }
}
