<?php
namespace Trade\Command\OrderProduct;

use Core;

/**
 * 工厂解耦领域服务直接对命令的调用
 * @author chloroplast
 * @version 1.0: 20160225
 */

class OrderProductCommandFactory
{

    /**
     * @var System\Interfaces\Pcommand $command 命令
     */
    private static $pcommand;

    /**
     * 工厂构造命令,根据不同的type构建不同的命令返回:
     *
     * 1. add: 添加订单商品
     *
     * @param string $type 命令类型
     * @param Trade\Model\OrderProduct $data 订单商品对象
     * @param Trade\Model\Order $target 目标订单
     */
    public static function createCommand($type, $data, $target)
    {
        switch ($type) {
            case 'add':
                self::$pcommand = Core::$_container->make('Trade\Command\OrderProduct\AddCommand', ['orderProduct'=>$data,'order'=>$target]);
                break;
        }
        return self::$pcommand;
    }
}
