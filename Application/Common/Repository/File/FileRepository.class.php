<?php
namespace Common\Repository\File;

use Common\Repository\File\Query;
use Common\Translator\FileTranslator;

/**
 * File仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class FileRepository
{

    /**
     * @var Query\FileRowCacheQuery $fileRowCacheQuery 行缓存
     */
    private $fileRowCacheQuery;

    public function __construct(Query\FileRowCacheQuery $fileRowCacheQuery)
    {
        $this->fileRowCacheQuery = $fileRowCacheQuery;
    }

    /**
     * 获取文件
     * @param integer $id 文件id
     */
    public function getOne($id)
    {
        //获取用户数据
        $fileInfo = $this->fileRowCacheQuery->getOne($id);
        if (empty($fileInfo)) {
            return false;
        }
        // var_dump($fileInfo);exit();
        //翻译器 -- 开始
        $fileTranslator = new FileTranslator();
        //翻译器 -- 结束
        return $fileTranslator->translate($fileInfo);
    }

    /**
     * 批量获取文件
     * @param array $ids 文件id数组
     */
    public function getList(array $ids)
    {

        $fileList = array();
        //获取用户数据
        $fileInfoList = $this->fileRowCacheQuery->getList($ids);
        
        foreach ($fileInfoList as $fileInfo) {
            //翻译器 -- 开始
            $fileTranslator = new FileTranslator();
            //翻译器 -- 结束
            $fileList[] = $fileTranslator->translate($fileInfo);
        }
        
        return $fileList;
    }
}
