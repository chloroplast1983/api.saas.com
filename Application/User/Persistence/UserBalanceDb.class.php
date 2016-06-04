<?php
namespace User\Persistence;

use System\Classes\Db;

/**
 * saas_user_balance表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class UserBalanceDb extends Db
{
    
    public function __construct()
    {
        parent::__construct('saas_user_balance');
    }
}
