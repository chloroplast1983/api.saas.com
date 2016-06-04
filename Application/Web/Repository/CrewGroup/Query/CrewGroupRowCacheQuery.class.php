<?php
namespace Web\Repository\CrewGroup\Query;

use System\Query\RowCacheQuery;
use Web\Persistence;

class CrewGroupRowCacheQuery extends RowCacheQuery
{

    /**
     * @var string $primaryKey 查询数据的键
     */
    private $primaryKey = 'webCrewGroupId';

    /**
     * @var Persistence\CrewGroupCache $cacheLayer
     */
    private $cacheLayer;//缓存层

    /**
     * @var Persistence\CrewGroupDb $dbLayer
     */
    private $dbLayer;//数据层

    public function __construct(Persistence\CrewGroupCache $cacheLayer, Persistence\CrewGroupDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
        $this->cacheLayer = $cacheLayer;
        parent::__construct($this->primaryKey, $this->cacheLayer, $this->dbLayer);
    }
}
