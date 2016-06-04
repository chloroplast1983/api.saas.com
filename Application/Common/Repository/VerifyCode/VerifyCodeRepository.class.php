<?php
namespace Common\Repository\VerifyCode;

use Common\Repository\VerifyCode\Query;

/**
 * 验证码仓库
 *
 * @author chloroplast
 * @version 1.0:20160225
 */
class VerifyCodeRepository
{

    /**
     * @var Query\VerifyCodeDataCacheQuery $verifyCodeDataCacheQuery 验证码内容缓存
     */
    private $verifyCodeDataCacheQuery;

    /**
     * 构造函数
     * @param Query\VerifyCodeDataCacheQuery $verifyCodeDataCacheQuery 验证码内容缓存
     */
    public function __construct(Query\VerifyCodeDataCacheQuery $verifyCodeDataCacheQuery)
    {
        $this->verifyCodeDataCacheQuery = $verifyCodeDataCacheQuery;
    }

    /**
     * 获取验证码短信内容
     * @param string $key 验证码key
     */
    public function get($key)
    {
        $code = $this->verifyCodeDataCacheQuery->get($key);
        return $code;
    }
}
