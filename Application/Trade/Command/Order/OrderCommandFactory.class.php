<?php
namespace Trade\Command\Order;

use Core;

/**
 * 工厂解耦领域服务直接对命令的调用
 * @author chloroplast
 * @version 1.0: 20160225
 */

class OrderCommandFactory
{

    /**
     * @var System\Interfaces\Pcommand $command 命令
     */
    private static $pcommand;

    /**
     * 工厂构造命令,根据不同的type构建不同的命令返回:
     *
     * 1. add: 添加订单
     * 2. guestCancel: 买家取消订单
     * 3. vendorCacel: 卖家取消订单
     * 4. pay: 支付订单
     * 5. confirm: 确认支付订单
     *
     * @param string $type 命令类型
     * @param Trade\Model\Order $data 订单对象
     */
    public static function createCommand($type, $data)
    {
        switch ($type) {
            case 'add':
                self::$pcommand = Core::$_container->make('Trade\Command\Order\AddCommand', ['order'=>$data]);
                break;
            case 'guestCancel':
                self::$pcommand = Core::$_container->make('Trade\Command\Order\GuestCancelCommand', ['order'=>$data]);
                break;
            case 'vendorCacel':
                self::$pcommand = Core::$_container->make('Trade\Command\Order\VendorCancelCommand', ['order'=>$data]);
                break;
            case 'pay':
                self::$pcommand = Core::$_container->make('Trade\Command\Order\PayCommand', ['order'=>$data]);
                break;
            case 'confirmPay':
                self::$pcommand = Core::$_container->make('Trade\Command\Order\ConfirmPayCommand', ['order'=>$data]);
                break;
        }
        return self::$pcommand;
    }
}
