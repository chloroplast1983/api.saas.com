<?php
namespace Web\Persistence;

use System\Classes\Cache;

/**
 * delivered_information表缓存文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class DeliveredInformationCache extends Cache
{

    /**
     * 构造函数初始化key和表名一致
     */
    public function __construct()
    {
        parent::__construct('delivered_information');
    }
}
