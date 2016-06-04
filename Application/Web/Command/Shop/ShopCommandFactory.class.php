<?php
namespace Web\Command\Shop;

use Core;

/**
 * 工厂解耦领域服务直接对命令的调用
 * @author chloroplast
 * @version 1.0: 20160225
 */

class ShopCommandFactory
{

    /**
     * @var System\Interfaces\Pcommand $command 命令
     */
    private static $pcommand;

    /**
     * 工厂构造命令,根据不同的type构建不同的命令返回:
     *
     * 1. add: 添加网店
     *
     * @param string $type 命令类型
     * @param Web\Model\Shop $data 配送地址对象
     */
    public static function createCommand($type, $data)
    {
        switch ($type) {
            case 'add':
                self::$pcommand = Core::$_container->make('Web\Command\Shop\AddCommand', ['shop'=>$data]);
                break;
        }
        return self::$pcommand;
    }
}
