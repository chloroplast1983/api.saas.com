<?php
namespace Product\Persistence;

use System\Classes\Cache;

/**
 * product_price_normal表缓存文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class ProductPriceCommonCache extends Cache
{

    /**
     * 构造函数初始化key和表名一致
     */
    public function __construct()
    {
        parent::__construct('product_price_common');
    }
}
