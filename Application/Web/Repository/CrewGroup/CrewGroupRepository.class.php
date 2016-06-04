<?php
namespace Web\Repository\CrewGroup;

use Web\Repository\CrewGroup\Query;
use Web\Translator\CrewGroupTranslator;

/**
 * 员工仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class CrewGroupRepository
{

    /**
     * @var Query\CrewGroupRowCacheQuery $crewGroupRowCacheQuery 行缓存
     */
    private $crewGroupRowCacheQuery;

    public function __construct(Query\CrewGroupRowCacheQuery $crewGroupRowCacheQuery)
    {
        $this->crewGroupRowCacheQuery = $crewGroupRowCacheQuery;
    }

    /**
     * 获取员工组对象
     * @param integer $id 员工id
     */
    public function getOne(int $id)
    {
        $crewGroupInfo = $this->crewGroupRowCacheQuery->getOne($id);
        
        //翻译器 -- 开始
        $crewGroupTranslator = new CrewGroupTranslator();
        //翻译器 -- 结束
        return $crewGroupTranslator->translate($crewGroupInfo);
    }

    /**
     * 批量获取员工组对象
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {

        $crewGroupList = array();
        //获取用户数据
        $crewGroupInfoList = $this->crewGroupRowCacheQuery->getList($ids);
        
        foreach ($crewGroupInfoList as $crewGroupInfo) {
            //翻译器 -- 开始
            $crewGroupTranslator = new CrewGroupTranslator();
            //翻译器 -- 结束
            $crewGroupList[] = $crewGroupTranslator->translate($crewGroupInfo);
        }
        
        return $crewGroupList;
    }
}
