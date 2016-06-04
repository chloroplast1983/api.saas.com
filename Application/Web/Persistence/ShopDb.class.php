<?php
namespace Web\Persistence;

use System\Classes\Db;

/**
 * shop表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class ShopDb extends Db
{
    
    public function __construct()
    {
        parent::__construct('shop');
    }
}
