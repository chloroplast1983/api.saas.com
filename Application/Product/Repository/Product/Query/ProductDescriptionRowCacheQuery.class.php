<?php
namespace Product\Repository\Product\Query;

use System\Query\RowCacheQuery;
use Product\Persistence;

class ProductDescriptionRowCacheQuery extends RowCacheQuery
{

    /**
     * @var string $parimartKey 查询数据的键
     */
    private $primaryKey = 'productId';

    /**
     * @var Persistence\ProductDescriptionCache $cacheLayer
     */
    private $cacheLayer;//缓存层

    /**
     * @var Persistence\ProductDescriptionDb $dbLayer
     */
    private $dbLayer;//数据层

    public function __construct(Persistence\ProductDescriptionCache $cacheLayer, Persistence\ProductDescriptionDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
        $this->cacheLayer = $cacheLayer;
        parent::__construct($this->primaryKey, $this->cacheLayer, $this->dbLayer);
    }
}
