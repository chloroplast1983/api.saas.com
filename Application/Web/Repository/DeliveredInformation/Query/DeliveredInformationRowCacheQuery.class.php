<?php
namespace Web\Repository\DeliveredInformation\Query;

use System\Query\RowCacheQuery;
use Web\Persistence;

class DeliveredInformationRowCacheQuery extends RowCacheQuery
{

    /**
     * @var string $primaryKey 查询数据的键
     */
    private $primaryKey = 'deliveredInformationId';

    /**
     * @var Persistence\DeliveredInformationCache $cacheLayer
     */
    private $cacheLayer;//缓存层

    /**
     * @var Persistence\DeliveredInformationDb $dbLayer
     */
    private $dbLayer;//数据层

    public function __construct(Persistence\DeliveredInformationCache $cacheLayer, Persistence\DeliveredInformationDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
        $this->cacheLayer = $cacheLayer;
        parent::__construct($this->primaryKey, $this->cacheLayer, $this->dbLayer);
    }
}
