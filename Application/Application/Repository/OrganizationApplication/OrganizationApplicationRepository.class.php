<?php
namespace Application\Repository\OrganizationApplication;

use Application\Repository\OrganizationApplication\Query;
use Application\Translator\OrganizationApplicationTranslator;

/**
 * 商户申请表单仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class OrganizationApplicationRepository
{

    /**
     * @var Query\OrganizationApplicationRowCacheQuery $organizationApplicationRowCacheQuery 行缓存
     */
    private $organizationApplicationRowCacheQuery;

    public function __construct(Query\OrganizationApplicationRowCacheQuery $organizationApplicationRowCacheQuery)
    {
        $this->organizationApplicationRowCacheQuery = $organizationApplicationRowCacheQuery;
    }

    /**
     * 获取商户申请表信息
     * @param integer $id 商户申请表id
     */
    public function getOne(int $id)
    {
        //获取用户数据
        $organizationApplicationInfo = $this->organizationApplicationRowCacheQuery->getOne($id);
        
        //翻译器 -- 开始
        $organizationApplicationTranslator = new OrganizationApplicationTranslator();
        //翻译器 -- 结束
        return $organizationApplicationTranslator->translate($organizationApplicationInfo);
    }

    /**
     * 批量获取商户申请表信息
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {

        $organizationApplicationList = array();
        //获取用户数据
        $organizationApplicationInfoList = $this->organizationApplicationRowCacheQuery->getList($ids);
        
        foreach ($organizationApplicationInfoList as $organizationApplicationInfo) {
            //翻译器 -- 开始
            $organizationApplicationTranslator = new OrganizationApplicationTranslator();
            //翻译器 -- 结束
            $organizationApplicationList[] = $organizationApplicationTranslator->translate($organizationApplicationInfo);
        }
        
        return $organizationApplicationList;
    }

    /**
     * 根据条件查询商户申请表单
     */
    public function filter(array $filter = array(), array $sort = array(), int $offset = 0, int $size = 20)
    {

        //filter 转换为条件
        $condition = empty($filter) ? '1' : $filter;

        $organizationApplicationInfoList = $this->organizationApplicationRowCacheQuery->select($condition.' LIMIT '.$offset.','.$size, 'userId');

        if (empty($organizationApplicationInfoList)) {
            return false;
        }
        $ids = array();
        foreach ($organizationApplicationInfoList as $organizationApplicationInfo) {
            $ids[] = $organizationApplicationInfo['userId'];
        }
        return $this->getList($ids);
    }
}
