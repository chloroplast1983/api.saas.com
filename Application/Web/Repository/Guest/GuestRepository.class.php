<?php
namespace Web\Repository\Guest;

use Web\Repository\Guest\Query;
use Web\Translator\GuestTranslator;

/**
 * 买家仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class GuestRepository
{

    /**
     * @var Query\GuestRowCacheQuery $guestRowCacheQuery 行缓存
     */
    private $guestRowCacheQuery;

    public function __construct(Query\GuestRowCacheQuery $guestRowCacheQuery)
    {
        $this->guestRowCacheQuery = $guestRowCacheQuery;
    }

    /**
     * 获取店铺商品分类对象
     * @param integer $id 员工id
     */
    public function getOne(int $id)
    {
        $guestInfo = $this->guestRowCacheQuery->getOne($id);
        //翻译器 -- 开始
        $guestTranslator = new GuestTranslator();
        //翻译器 -- 结束
        return $guestTranslator->translate($guestInfo);
    }

    /**
     * 批量获取店铺商品分类对象
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {

        $guestList = array();
        $guestInfoList = $this->guestRowCacheQuery->getList($ids);
        
        foreach ($guestInfoList as $guestInfo) {
            //翻译器 -- 开始
            $guestTranslator = new GuestTranslator();
            //翻译器 -- 结束
            $guestList[] = $guestTranslator->translate($guestInfo);
        }
        
        return $guestList;
    }

    /**
     * 根据条件查询买家
     */
    public function filter(array $filter = array(), array $sort = array(), int $offset = 0, int $size = 20)
    {
        //filter 转换为条件
        if (isset($filter['source'])) {
            $condition = 'source = '.$filter['source'];
        }
        //sort 排序
        
        $condition = empty($condition) ? '1' : $condition;

        $guestInfoList = $this->guestRowCacheQuery->select($condition.' LIMIT '.$offset.','.$size, 'guestId');

        if (empty($guestInfoList)) {
            return false;
        }
        $ids = array();
        foreach ($guestInfoList as $guestInfo) {
            $ids[] = $guestInfo['guestId'];
        }
        return $this->getList($ids);
    }

    /**
     * 根据手机号码获取用户
     */
    public function getOneByCellPhone(string $cellPhone)
    {

        $guestInfo = $this->guestRowCacheQuery->select('cellPhone=\''.$cellPhone.'\'', 'guestId');
        if (empty($guestInfo)) {
            return false;
        }

        return $this->getOne($guestInfo[0]['guestId']);
    }
}
