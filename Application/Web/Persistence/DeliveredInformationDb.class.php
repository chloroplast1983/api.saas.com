<?php
namespace Web\Persistence;

use System\Classes\Db;

/**
 * delivered_information表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class DeliveredInformationDb extends Db
{
    
    public function __construct()
    {
        parent::__construct('delivered_information');
    }
}
