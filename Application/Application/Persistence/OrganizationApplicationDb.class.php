<?php
namespace Application\Persistence;

use System\Classes\Db;

/**
 * saas_application_organization表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class OrganizationApplicationDb extends Db
{
    
    public function __construct()
    {
        parent::__construct('saas_application_organization');
    }
}
