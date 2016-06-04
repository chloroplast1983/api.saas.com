<?php
namespace Trade\Persistence;

use System\Classes\Cache;

/**
 * order_product表缓存文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class OrderProductCache extends Cache
{

    /**
     * 构造函数初始化key和表名一致
     */
    public function __construct()
    {
        parent::__construct('order_product');
    }
}
