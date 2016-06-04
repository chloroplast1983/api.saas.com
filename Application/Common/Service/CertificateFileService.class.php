<?php
namespace Common\Service;

use Common\Model\File;
use Intervention\Image\ImageManagerStatic as ImageThumb;
use Core;

/**
 * 证件图片文件角色
 * @codeCoverageIgnore
 * @author chloroplast
 * @version 1.0:20160227
 */

class CertificateFileService
{

    /**
     * @var Common\Model\File $file 文件对象
     */
    protected $file;
    /**
     * @var integer $width 宽度
     */
    protected $width = '100';
    /**
     * @var integer $height 高度
     */
    protected $height = '100';

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    /**
     * 获取文件对象
     */
    public function getFile()
    {
        return $this->file;
    }
    /**
     * 上传图片
     *
     * @param $_FILE $FILE
     * @return [] array('fileId'=>文件id,'filePath'=>文件路径)
     */
    public function upload($FILE)
    {

        //判断文件后缀确定权限
        $fileTypes = array('jpg','jpeg','gif','png');
        $fileParts = pathinfo($FILE['name']);
        if (!in_array(strtolower($fileParts['extension']), $fileTypes)) {
            return false;
        }
        //判断文件后缀确定权限
        //初始化构造函数
        $result = array('fileId'=>0,'filePath'=>'');

        $this->file->upload($FILE);

        // $imgPath = $this->file->getAttachDir().$this->file->getFilePath();

        //根据fileInfo进行缩略图设置
        // $thumbImg = ImageThumb::make($imgPath);
        // $thumbImg->resize($this->width,$this->height);

        // $filePathInfo = pathinfo($imgPath);

        // $thumbImg->save($filePathInfo['dirname'].DIRECTORY_SEPARATOR.$filePathInfo['filename'].'.'.$this->width.'_'.$this->height.'.'.$filePathInfo['extension']);

        //拼接返回数组
        // $result['fileId'] = $fileInfo['fileId'];
        // $result['filePath'] = $this->file->getFileURL($imgPath);
        return true;
    }
}
