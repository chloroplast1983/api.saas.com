<?php
namespace Web\Command\ShopSlide;

use Core;

/**
 * 工厂解耦领域服务直接对命令的调用
 * @author chloroplast
 * @version 1.0: 20160225
 */

class ShopSlideCommandFactory
{

    /**
     * @var System\Interfaces\Pcommand $command 命令
     */
    private static $pcommand;

    /**
     * 工厂构造命令,根据不同的type构建不同的命令返回:
     *
     * 1. add: 添加店铺幻灯片
     * 2. delete: 删除店铺幻灯片
     *
     * @param string $type 命令类型
     * @param Web\Model\ShopSlide $data 店铺幻灯片对象
     * @param Web\Model\Shop $target 店铺对象
     */
    public static function createCommand($type, $data, $target)
    {
        switch ($type) {
            case 'add':
                self::$pcommand = Core::$_container->make('Web\Command\ShopSlide\AddCommand', ['shopSlide'=>$data,'shop'=>$target]);
                break;
            case 'delete':
                self::$pcommand = Core::$_container->make('Web\Command\ShopSlide\DeleteCommand', ['shopSlide'=>$data,'shop'=>$target]);
                break;
        }
        return self::$pcommand;
    }
}
