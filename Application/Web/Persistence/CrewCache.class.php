<?php
namespace Web\Persistence;

use System\Classes\Cache;

/**
 * web_crew表缓存文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class CrewCache extends Cache
{

    /**
     * 构造函数初始化key和表名一致
     */
    public function __construct()
    {
        parent::__construct('web_crew');
    }
}
