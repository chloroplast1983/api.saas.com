<?php
namespace Common\Command\File;

use System\Interfaces\Pcommand;
use Common\Model\File;
use Core;

/**
 * 添加文件命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class AddCommand implements Pcommand
{

    /**
     * @Inject("Common\Persistence\FileCache")
     */
    private $cacheLayer;

    /**
     * @Inject("Common\Persistence\FileDb")
     */
    private $dbLayer;

    /**
     * @var File $file 文件对象
     */
    private $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function execute()
    {

        $mysqlDataArray = array('fileHash'  => $this->file->getFileHash(),
                                'fileName'  => addslashes($this->file->getFileName()),
                                'fileExt'   => $this->file->getFileExt(),
                                'filePath'  => $this->file->getFilePath(),
                                'fileSize'  => $this->file->getFileSize(),
                                'fileTime'  => $this->file->getFileTime(),
                                'fileUid'   => $this->file->getFileUid(),
                                );
        //写入数据库,如果成功,写入缓存
        $id = $this->dbLayer->insert($mysqlDataArray, true);
        if (!$id) {
            return false;
        }
        $mysqlDataArray['fileId'] = $id;
        $this->cacheLayer->save($id, $mysqlDataArray);
        //返回用户主键id,写会$user对象,为领域服务间互相调用服务
        $this->file->setId($id);
        return true;
    }

    public function report()
    {
    }
}
