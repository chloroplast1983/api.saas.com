<?php
namespace Web\Persistence;

use System\Classes\Db;

/**
 * web_crew_group表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class CrewGroupRelationDb extends Db
{
    
    public function __construct()
    {
        parent::__construct('web_crew_group');
    }
}
