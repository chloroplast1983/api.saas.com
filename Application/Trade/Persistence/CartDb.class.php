<?php
namespace Trade\Persistence;

use System\Classes\Db;

/**
 * cart表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class CartDb extends Db
{
    
    public function __construct()
    {
        parent::__construct('cart');
    }
}
