<?php
namespace Application\Repository\PersonalApplication\Query;

use System\Query\RowCacheQuery;
use Application\Persistence;

class PersonalApplicationRowCacheQuery extends RowCacheQuery
{

    /**
     * @var string $parimartKey 查询数据的键
     */
    private $primaryKey = 'userId';

    /**
     * @var Persistence\PersonalApplicationCache $cacheLayer
     */
    private $cacheLayer;//缓存层

    /**
     * @var Persistence\PersonalApplicationDb $dbLayer
     */
    private $dbLayer;//数据层

    public function __construct(Persistence\PersonalApplicationCache $cacheLayer, Persistence\PersonalApplicationDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
        $this->cacheLayer = $cacheLayer;
        parent::__construct($this->primaryKey, $this->cacheLayer, $this->dbLayer);
    }
}
