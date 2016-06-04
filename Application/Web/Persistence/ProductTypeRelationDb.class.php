<?php
namespace Web\Persistence;

use System\Classes\Db;

/**
 * product_type_relation表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class ProductTypeRelationDb extends Db
{
    
    /**
     * 构造函数初始化key和表名一致
     */
    public function __construct()
    {
        parent::__construct('web_product_type_relation');
    }
}
