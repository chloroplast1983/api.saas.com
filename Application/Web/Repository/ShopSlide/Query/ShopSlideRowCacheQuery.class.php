<?php
namespace Web\Repository\ShopSlide\Query;

use System\Query\RowCacheQuery;
use Web\Persistence;

class ShopSlideRowCacheQuery extends RowCacheQuery
{

    /**
     * @var string $primaryKey 查询数据的键
     */
    private $primaryKey = 'ShopSlideId';

    /**
     * @var Persistence\ShopSlideCache $cacheLayer
     */
    private $cacheLayer;//缓存层

    /**
     * @var Persistence\ShopSlideDb $dbLayer
     */
    private $dbLayer;//数据层

    public function __construct(Persistence\ShopSlideCache $cacheLayer, Persistence\ShopSlideDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
        $this->cacheLayer = $cacheLayer;
        parent::__construct($this->primaryKey, $this->cacheLayer, $this->dbLayer);
    }
}
