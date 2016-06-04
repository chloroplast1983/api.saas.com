<?php
namespace Common\Service;

/**
 * 通用信息短信角色接口
 *
 * @codeCoverageIgnore
 *
 * @author chloroplast
 * @version 1.0.20160223
 */
interface VerifyCodeInterface
{

    /**
     * 验证接口
     * @param string $key 验证的key
     * @param string $code 验证码
     */
    function verify($key, $code);
}
