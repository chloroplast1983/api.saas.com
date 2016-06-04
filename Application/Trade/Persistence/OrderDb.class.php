<?php
namespace Trade\Persistence;

use System\Classes\Db;

/**
 * order表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class OrderDb extends Db
{
    
    public function __construct()
    {
        parent::__construct('order');
    }
}
