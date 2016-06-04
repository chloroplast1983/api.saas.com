<?php
namespace User\Repository\BankAccount\Query;

use System\Query\RowCacheQuery;
use User\Persistence;

class BankAccountRowCacheQuery extends RowCacheQuery
{

    /**
     * @var string $parimartKey 查询数据的键
     */
    private $primaryKey = 'vendorBankAccountId';

    /**
     * @var Persistence\BankAccountCache $cacheLayer
     */
    private $cacheLayer;//缓存层

    /**
     * @var Persistence\BankAccountDb $dbLayer
     */
    private $dbLayer;//数据层

    public function __construct(Persistence\BankAccountCache $cacheLayer, Persistence\BankAccountDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
        $this->cacheLayer = $cacheLayer;
        parent::__construct($this->primaryKey, $this->cacheLayer, $this->dbLayer);
    }
}
