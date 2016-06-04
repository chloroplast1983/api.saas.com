<?php
namespace Common\Translator;

use System\Classes\Translator;
use Core;

class FileTranslator extends Translator
{

    public function translate(array $expression)
    {

        $file = Core::$_container->get('Common\Model\File');
        $file->setId($expression['fileId']);
        // var_dump($file->getId());exit();
        // $file = new \Common\Model\File($expression['fileId']);
        $file->setFileHash($expression['fileHash']);
        $file->setFileName($expression['fileName']);
        $file->setFileExt($expression['fileExt']);
        $file->setFilePath($expression['filePath']);
        $file->setFileSize($expression['fileSize']);
        $file->setFileTime($expression['fileTime']);
        $file->setFileUid($expression['fileUid']);
        return $file;
    }
}
