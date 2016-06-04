<?php
namespace User\Command\Balance;

use Core;

/**
 * 工厂解耦领域服务直接对命令的调用
 * @author chloroplast
 * @version 1.0: 20160225
 */

class BalanceCommandFactory
{

    /**
     * @var System\Interfaces\Pcommand $command 命令
     */
    private static $pcommand;

    /**
     * 工厂构造命令,根据不同的type构建不同的命令返回:
     *
     * 1. pay : 收入
     * 2. rePay: 支出
     *
     * @param string $type 命令类型
     * @param User\Model\BalanceLog $balanceLog 用户对象
     */
    public static function createCommand($type, $data)
    {
        switch ($type) {
            case 'pay':
                self::$pcommand = Core::$_container->make('User\Command\Balance\PayCommand', ['balanceLog'=>$data]);
                break;
            case 'rePay':
                self::$pcommand = Core::$_container->make('User\Command\Balance\RePayCommand', ['balanceLog'=>$data]);
                break;
        }
        return self::$pcommand;
    }
}
