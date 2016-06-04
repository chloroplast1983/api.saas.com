<?php
namespace Web\Repository\Shop\Query;

use System\Query\RowCacheQuery;
use Web\Persistence;

class ShopRowCacheQuery extends RowCacheQuery
{

    /**
     * @var string $primaryKey 查询数据的键
     */
    private $primaryKey = 'userId';

    /**
     * @var Persistence\ShopCache $cacheLayer
     */
    private $cacheLayer;//缓存层

    /**
     * @var Persistence\ShopDb $dbLayer
     */
    private $dbLayer;//数据层

    public function __construct(Persistence\ShopCache $cacheLayer, Persistence\ShopDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
        $this->cacheLayer = $cacheLayer;
        parent::__construct($this->primaryKey, $this->cacheLayer, $this->dbLayer);
    }
}
