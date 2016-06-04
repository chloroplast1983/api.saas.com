<?php
namespace Web\Repository\Guest\Query;

use System\Query\RowCacheQuery;
use Web\Persistence;

class GuestRowCacheQuery extends RowCacheQuery
{

    /**
     * @var string $primaryKey 查询数据的键
     */
    private $primaryKey = 'guestId';

    /**
     * @var Persistence\GuestCache $cacheLayer
     */
    private $cacheLayer;//缓存层

    /**
     * @var Persistence\GuestDb $dbLayer
     */
    private $dbLayer;//数据层

    public function __construct(Persistence\GuestCache $cacheLayer, Persistence\GuestDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
        $this->cacheLayer = $cacheLayer;
        parent::__construct($this->primaryKey, $this->cacheLayer, $this->dbLayer);
    }

    /**
     * 查询select
     *
     * @param string $sql 查询语句
     * @param string $select 查询内容
     * @param string $useIndex 额外使用索引
     *
     * @return [] 返回查询结果
     */
    public function select(string $sql, string $select = '*', string $useIndex = '')
    {
        return $this->dbLayer->select($sql, $select, $useIndex);
    }
}
