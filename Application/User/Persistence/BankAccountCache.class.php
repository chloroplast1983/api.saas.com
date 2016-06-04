<?php
namespace User\Persistence;

use System\Classes\Cache;

/**
 * saas_vendor_bank_account表缓存文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class BankAccountCache extends Cache
{

    /**
     * 构造函数初始化key和表名一致
     */
    public function __construct()
    {
        parent::__construct('saas_user_bank_account');
    }
}
