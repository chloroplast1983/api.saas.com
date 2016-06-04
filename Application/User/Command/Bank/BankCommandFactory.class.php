<?php
namespace User\Command\Bank;

use Core;

/**
 * 工厂解耦领域服务直接对命令的调用
 * @author chloroplast
 * @version 1.0: 20160225
 */

class BankCommandFactory
{

    /**
     * @var System\Interfaces\Pcommand $command 命令
     */
    private static $pcommand;

    /**
     * 工厂构造命令,根据不同的type构建不同的命令返回:
     *
     * 1. add : 添加银行账户
     * 2. edit: 编辑银行账户
     *
     * @param string $type 命令类型
     * @param User\Model\BankAccount $data
     * @param User\Model\User $target 用户对象
     */
    public static function createCommand($type, $data, $target)
    {
        switch ($type) {
            case 'add':
                self::$pcommand = Core::$_container->make('User\Command\Bank\AddCommand', ['bankAccount'=>$data,'user'=>$target]);
                break;
            case 'edit':
                self::$pcommand = Core::$_container->make('User\Command\Bank\EditCommand', ['bankAccount'=>$data,'user'=>$target]);
                break;
        }
        return self::$pcommand;
    }
}
