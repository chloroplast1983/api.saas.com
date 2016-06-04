<?php
namespace Product\Persistence;

use System\Classes\Db;

/**
 * product_description表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class ProductDescriptionDb extends Db
{
    
    /**
     * 构造函数初始化key和表名一致
     */
    public function __construct()
    {
        parent::__construct('product_description');
    }
}
