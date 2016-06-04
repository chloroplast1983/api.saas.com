<?php
namespace Common\Command\File;

use Core;
use GenericTestCase;

/**
 * Common/Command/File/FileFactoryTest.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class FileFactoryTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        //初始化工厂桩件
        $this->stub = new \Common\Command\File\FileCommandFactory();
    }

    /**
     * 测试add命令返回
     */
    public function testFileCommandFactoryAdd()
    {

        $command = $this->stub->createCommand('add', new \Common\Model\File());
        //测试返回类型是否正确
        $this->assertInstanceOf('Common\Command\File\AddCommand', $command);
        $this->assertInstanceOf('System\Interfaces\Pcommand', $command);
    }
}
