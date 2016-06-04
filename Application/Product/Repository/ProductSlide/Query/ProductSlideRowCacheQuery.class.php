<?php
namespace Product\Repository\ProductSlide\Query;

use System\Query\RowCacheQuery;
use Product\Persistence;

class ProductSlideRowCacheQuery extends RowCacheQuery
{

    /**
     * @var string $parimartKey 查询数据的键
     */
    private $primaryKey = 'productSlideId';

    /**
     * @var Persistence\ProductSlideCache $cacheLayer
     */
    private $cacheLayer;//缓存层

    /**
     * @var Persistence\ProductSlideDb $dbLayer
     */
    private $dbLayer;//数据层

    public function __construct(Persistence\ProductSlideCache $cacheLayer, Persistence\ProductSlideDb $dbLayer)
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
