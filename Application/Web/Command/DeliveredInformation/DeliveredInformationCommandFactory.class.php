<?php
namespace Web\Command\DeliveredInformation;

use Core;

/**
 * 工厂解耦领域服务直接对命令的调用
 * @author chloroplast
 * @version 1.0: 20160225
 */

class DeliveredInformationCommandFactory
{

    /**
     * @var System\Interfaces\Pcommand $command 命令
     */
    private static $pcommand;

    /**
     * 工厂构造命令,根据不同的type构建不同的命令返回:
     *
     * 1. add: 添加商品幻灯片
     * 2. delete: 删除商品幻灯片
     *
     * @param string $type 命令类型
     * @param Web\Model\DeliveredInformation $data 配送地址对象
     */
    public static function createCommand($type, $data)
    {
        switch ($type) {
            case 'add':
                self::$pcommand = Core::$_container->make('Web\Command\DeliveredInformation\AddCommand', ['deliveredInformation'=>$data]);
                break;
            case 'delete':
                self::$pcommand = Core::$_container->make('Web\Command\DeliveredInformation\DeleteCommand', ['deliveredInformation'=>$data]);
                break;
            case 'edit':
                self::$pcommand = Core::$_container->make('Web\Command\DeliveredInformation\EditCommand', ['deliveredInformation'=>$data]);
                break;
        }
        return self::$pcommand;
    }
}
