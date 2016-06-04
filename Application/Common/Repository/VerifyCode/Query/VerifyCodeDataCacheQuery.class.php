<?php
namespace Common\Repository\VerifyCode\Query;

use System\Query\DataCacheQuery;
use Common\Persistence;

/**
 * 注册短信缓存
 * @author chloroplast
 * @version 1.0.0:20160222
 */
class VerifyCodeDataCacheQuery extends DataCacheQuery
{

    /**
     * @var Persistence\VerifyCodeCache $cacheLayer 找回密码短信内容缓存层
     */
    private $cacheLayer;//缓存层

    /**
     * 构造函数
     * @param Persistence\VerifyCodeCache $cacheLayer 找回密码短信内容缓存层
     */
    public function __construct(Persistence\VerifyCodeCache $cacheLayer)
    {
        $this->cacheLayer = $cacheLayer;
        parent::__construct($this->cacheLayer);
    }
}
