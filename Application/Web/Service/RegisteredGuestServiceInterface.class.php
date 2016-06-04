<?php
namespace Web\Service;

/**
 * 网店注册买家身份,包含更新密码功能
 *
 * @codeCoverageIgnore
 *
 * @author chloroplast
 * @version 1.0:20160227
 */

interface RegisteredGuestServiceInterface
{

    /**
     * 更新注册买家密码
     * @param int $id 用户id
     * @param string $password 用户密码
     */
    function updatePassword(string $password, string $oldPassword, string $rePassword);
}
