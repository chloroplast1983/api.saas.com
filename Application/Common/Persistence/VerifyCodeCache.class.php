<?php
//powered by kevin
namespace Common\Persistence;

use System\Classes\Cache;

/**
 * 验证码memcache缓存类
 */
class VerifyCodeCache extends Cache
{

    public function __construct()
    {
        parent::__construct('verifyCode');
    }
}
