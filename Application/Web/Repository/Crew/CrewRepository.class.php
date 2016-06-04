<?php
namespace Web\Repository\Crew;

use Web\Repository\Crew\Query;
use Web\Translator\CrewTranslator;

/**
 * 员工仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class CrewRepository
{

    /**
     * @var Query\CrewRowCacheQuery $crewRowCacheQuery 行缓存
     */
    private $crewRowCacheQuery;

    public function __construct(Query\CrewRowCacheQuery $crewRowCacheQuery)
    {
        $this->crewRowCacheQuery = $crewRowCacheQuery;
    }

    /**
     * 获取员工对象
     * @param integer $id 员工id
     */
    public function getOne(int $id)
    {
        $crewInfo = $this->crewRowCacheQuery->getOne($id);
        
        //翻译器 -- 开始
        $crewTranslator = new CrewTranslator();
        //翻译器 -- 结束
        return $crewTranslator->translate($crewInfo);
    }

    /**
     * 批量获取员工对象
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {

        $crewList = array();
        //获取用户数据
        $crewInfoList = $this->crewRowCacheQuery->getList($ids);
        
        foreach ($crewInfoList as $crewInfo) {
            //翻译器 -- 开始
            $crewTranslator = new crewTranslator();
            //翻译器 -- 结束
            $crewList[] = $crewTranslator->translate($crewInfo);
        }
        
        return $crewList;
    }
}
