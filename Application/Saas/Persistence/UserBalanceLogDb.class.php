<?php
namespace Saas\Persistence;

use System\Classes\Db;

/**
 * saas_user_balance_log表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class UserBalanceLogDb extends Db
{
    
    public function __construct()
    {
        parent::__construct('saas_user_balance_log');
    }
}
