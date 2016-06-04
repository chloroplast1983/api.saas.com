<?php
namespace Common\Command\File;

use System\Interfaces\Pcommand;
use Common\Model\File;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * Common/Command/File/AddCommand.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */

class AddCommandTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_file');

    public function tearDown()
    {
        //删除Product
        Core::$_cacheDriver->flushAll();
        parent::tearDown();
    }

    /**
     * 测试添加文件命令
     */
    public function testAddCommand()
    {
        //初始化file
        $file = Core::$_container->get('Common\Model\File');
        $file->setFileHash('fileHash1');
        $file->setFileName('fileName1');
        $file->setFileExt('ext1');
        $file->setFilePath('filePath1');
        $file->setFileSize('11k');
        $file->setFileUid(1);

        $fileCache = new \Common\Persistence\FileCache();

        //初始化命令
        $command = Core::$_container->make('Common\Command\File\AddCommand', ['file'=>$file]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);
        //期望id已经赋值且大于0
        $this->assertGreaterThan(0, $file->getId());

        //查询数据库,确认数据插入成功
        $expectArray = Core::$_dbDriver->query('SELECT * FROM pcore_file WHERE fileId='.$file->getId());
        $expectArray = $expectArray[0];

        $this->assertEquals($file->getId(), $expectArray['fileId']);
        $this->assertEquals($file->getFileHash(), $expectArray['fileHash']);
        $this->assertEquals($file->getFileName(), $expectArray['fileName']);
        $this->assertEquals($file->getFileExt(), $expectArray['fileExt']);
        $this->assertEquals($file->getFilePath(), $expectArray['filePath']);
        $this->assertEquals($file->getFileSize(), $expectArray['fileSize']);
        $this->assertEquals($file->getFileTime(), $expectArray['fileTime']);
        $this->assertEquals($file->getFileUid(), $expectArray['fileUid']);

        //查询缓存,确认缓存更新成功
        //确认缓存不为空
        $this->assertNotEmpty($fileCache->get($file->getId()));

        $expectArray = $fileCache->get($file->getId());
        $this->assertEquals($file->getId(), $expectArray['fileId']);
        $this->assertEquals($file->getFileHash(), $expectArray['fileHash']);
        $this->assertEquals($file->getFileName(), $expectArray['fileName']);
        $this->assertEquals($file->getFileExt(), $expectArray['fileExt']);
        $this->assertEquals($file->getFilePath(), $expectArray['filePath']);
        $this->assertEquals($file->getFileSize(), $expectArray['fileSize']);
        $this->assertEquals($file->getFileTime(), $expectArray['fileTime']);
        $this->assertEquals($file->getFileUid(), $expectArray['fileUid']);
    }
}
