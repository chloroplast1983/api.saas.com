<?php
namespace Application\Persistence;

use System\Classes\Cache;

/**
 * saas_application_organization表缓存文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class OrganizationApplicationCache extends Cache
{

    /**
     * 构造函数初始化key和表名一致
     */
    public function __construct()
    {
        parent::__construct('saas_application_organization');
    }
}
