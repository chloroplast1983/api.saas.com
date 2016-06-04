<?php
namespace Trade\Persistence;

use System\Classes\Db;

/**
 * order_common表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class OrderCommonDb extends Db
{
    
    public function __construct()
    {
        parent::__construct('order_common');
    }
}
