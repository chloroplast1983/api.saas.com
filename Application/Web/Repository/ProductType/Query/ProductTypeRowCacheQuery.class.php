<?php
namespace Web\Repository\ProductType\Query;

use System\Query\RowCacheQuery;
use Web\Persistence;

class ProductTypeRowCacheQuery extends RowCacheQuery
{

    /**
     * @var string $primaryKey 查询数据的键
     */
    private $primaryKey = 'ProductTypeId';

    /**
     * @var Persistence\ProductTypeCache $cacheLayer
     */
    private $cacheLayer;//缓存层

    /**
     * @var Persistence\ProductTypeDb $dbLayer
     */
    private $dbLayer;//数据层

    public function __construct(Persistence\ProductTypeCache $cacheLayer, Persistence\ProductTypeDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
        $this->cacheLayer = $cacheLayer;
        parent::__construct($this->primaryKey, $this->cacheLayer, $this->dbLayer);
    }
}
