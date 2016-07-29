<?php
namespace Saas\Persistence;

use System\Classes\Db;

/**
 * saas_vendor_bank_account表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class BankAccountDb extends Db
{
    
    public function __construct()
    {
        parent::__construct('saas_user_bank_account');
    }
}
