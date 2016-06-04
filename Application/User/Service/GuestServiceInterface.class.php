<?php
namespace User\Service;

/**
 * 用户游客身份,包含登录和注册功能,重置密码
 *
 * @codeCoverageIgnore
 *
 * @author chloroplast
 * @version 1.0.0:20160223
 */

interface GuestServiceInterface
{

    /**
     * 注册
     */
    function signUp(string $cellPhone, string $password, string $code);
    /**
     * 登陆
     */
    function signIn(string $cellPhone, string $password);
    /**
     * 重置密码
     */
    function restPassword(string $cellPhone, string $password, string $code);
}
