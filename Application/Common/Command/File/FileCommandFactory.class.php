<?php
namespace Common\Command\File;

use Core;

/**
 * 工厂解耦领域服务直接对命令的调用
 * @author chloroplast
 * @version 1.0: 20160225
 */

class FileCommandFactory
{

    /**
     * @var System\Interfaces\Pcommand $command 命令
     */
    private static $pcommand;

    /**
     * 工厂构造命令,根据不同的type构建不同的命令返回:
     *
     * 1. add : 添加注册短信验证码命令
     * 2. delete : 重置密码短信验证码命令
     *
     * @param string $type 命令类型
     * @param Common\Model\File $file 文件对象
     */
    public static function createCommand($type, $data)
    {
        switch ($type) {
            case 'add':
                self::$pcommand = Core::$_container->make('Common\Command\File\AddCommand', ['file'=>$data]);
                break;
        }
        return self::$pcommand;
    }
}
