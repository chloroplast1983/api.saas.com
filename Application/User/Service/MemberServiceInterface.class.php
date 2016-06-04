<?php
namespace User\Service;

/**
 * 审核用户角色
 *
 * @codeCoverageIgnore
 *
 * @author chloroplast
 * @version 1.0:20160227
 */

interface MemberServiceInterface
{

    /**
     * 更新用户密码
     * @param int $id 用户id
     * @param string $password 用户密码
     */
    function updatePassword(string $password, string $oldPassword, string $rePassword);
}
