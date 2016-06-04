<?php
namespace Web\Repository\Crew\Query;

use System\Query\RowCacheQuery;
use Web\Persistence;

class CrewRowCacheQuery extends RowCacheQuery
{

    /**
     * @var string $primaryKey 查询数据的键
     */
    private $primaryKey = 'webCrewId';

    /**
     * @var Persistence\CrewCache $cacheLayer
     */
    private $cacheLayer;//缓存层

    /**
     * @var Persistence\CrewDb $dbLayer
     */
    private $dbLayer;//数据层

    public function __construct(Persistence\CrewCache $cacheLayer, Persistence\CrewDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
        $this->cacheLayer = $cacheLayer;
        parent::__construct($this->primaryKey, $this->cacheLayer, $this->dbLayer);
    }
}
