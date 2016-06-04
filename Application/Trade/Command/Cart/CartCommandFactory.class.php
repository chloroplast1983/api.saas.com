<?php
namespace Trade\Command\Cart;

use Core;

/**
 * 工厂解耦领域服务直接对命令的调用
 * @author chloroplast
 * @version 1.0: 20160225
 */

class CartCommandCommandFactory
{

    /**
     * @var System\Interfaces\Pcommand $command 命令
     */
    private static $pcommand;

    /**
     * 工厂构造命令,根据不同的type构建不同的命令返回:
     *
     * 1. truncate: 清空购物车
     *
     * @param string $type 命令类型
     * @param Trade\Model\Cart $data 购物车对象
     */
    public static function createCommand($type, $data)
    {
        switch ($type) {
            case 'truncate':
                self::$pcommand = Core::$_container->make('Trade\Command\Cart\TruncateCommand', ['cart'=>$data]);
                break;
        }
        return self::$pcommand;
    }
}
