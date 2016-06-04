<?php
namespace Trade\Persistence;

use System\Classes\Db;

/**
 * order_product表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class OrderProductDb extends Db
{
    
    public function __construct()
    {
        parent::__construct('order_product');
    }
}
