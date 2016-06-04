<?php
namespace Application\Repository\PersonalApplication;

use Application\Repository\PersonalApplication\Query;
use Application\Translator\PersonalApplicationTranslator;

/**
 * 个人申请表单仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class PersonalApplicationRepository
{

    /**
     * @var Query\PersonalApplicationRowCacheQuery $personalApplicationRowCacheQuery 行缓存
     */
    private $personalApplicationRowCacheQuery;

    public function __construct(Query\PersonalApplicationRowCacheQuery $personalApplicationRowCacheQuery)
    {
        $this->personalApplicationRowCacheQuery = $personalApplicationRowCacheQuery;
    }

    /**
     * 获取个人申请表信息
     * @param integer $id 用户id
     */
    public function getOne($id)
    {
        //获取用户数据
        $personalApplicationInfo = $this->personalApplicationRowCacheQuery->getOne($id);
        
        //翻译器 -- 开始
        $personalApplicationTranslator = new PersonalApplicationTranslator();
        //翻译器 -- 结束
        return $personalApplicationTranslator->translate($personalApplicationInfo);
        ;
    }

    /**
     * 批量获取个人申请表信息
     * @param array $ids 个人申请表id数组
     */
    public function getList(array $ids)
    {

        $personalApplicationList = array();
        //获取用户数据
        $personalApplicationInfoList = $this->personalApplicationRowCacheQuery->getList($ids);
        
        foreach ($personalApplicationInfoList as $personalApplicationInfo) {
            //翻译器 -- 开始
            $personalApplicationTranslator = new PersonalApplicationTranslator();
            //翻译器 -- 结束
            $personalApplicationList[] = $personalApplicationTranslator->translate($personalApplicationInfo);
        }
        
        return $personalApplicationList;
    }
}
