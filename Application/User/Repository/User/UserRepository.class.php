<?php
namespace User\Repository\User;

use User\Repository\User\Query;
use User\Translator\UserTranslator;

/**
 * saas用户仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class UserRepository
{

    /**
     * @var Query\UserRowCacheQuery $userRowCacheQuery 行缓存
     */
    private $userRowCacheQuery;

    public function __construct(Query\UserRowCacheQuery $userRowCacheQuery)
    {
        $this->userRowCacheQuery = $userRowCacheQuery;
    }

    /**
     * 获取用户
     * @param integer $id 用户id
     */
    public function getOne($id)
    {
        //获取用户数据
        $userInfo = $this->userRowCacheQuery->getOne($id);
        if (empty($userInfo)) {
            return false;
        }
        //翻译器 -- 开始
        $userTranslator = new UserTranslator();
        //翻译器 -- 结束
        return $userTranslator->translate($userInfo);
    }

    /**
     * 批量获取用户
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {

        $userList = array();
        //获取用户数据
        $userInfoList = $this->userRowCacheQuery->getList($ids);
        
        foreach ($userInfoList as $userInfo) {
            //翻译器 -- 开始
            $userTranslator = new UserTranslator();
            //翻译器 -- 结束
            $userList[] = $userTranslator->translate($userInfo);
        }
        
        return $userList;
    }

    /**
     * 根据手机号码获取用户
     */
    public function getOneByCellPhone(string $cellPhone)
    {

        $userInfo = $this->userRowCacheQuery->select('cellPhone=\''.$cellPhone.'\'', 'userId');
        if (empty($userInfo)) {
            return false;
        }
        return $this->getOne($userInfo[0]['userId']);
    }

    /**
     * 根据条件查询用户
     */
    public function filter(array $filter = array(), array $sort = array(), int $offset = 0, int $size = 20)
    {

        //filter 转换为条件
        $condition = '1';

        $userInfoList = $this->userRowCacheQuery->select($condition.' LIMIT '.$offset.','.$size, 'userId');

        if (empty($userInfoList)) {
            return false;
        }
        $ids = array();
        foreach ($userInfoList as $userInfo) {
            $ids[] = $userInfo['userId'];
        }
        return $this->getList($ids);
    }
}
