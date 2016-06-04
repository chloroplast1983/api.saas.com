<?php
namespace Trade\Command\CartProduct;

use Core;

/**
 * 工厂解耦领域服务直接对命令的调用
 * @author chloroplast
 * @version 1.0: 20160225
 */

class CartProductCommandFactory
{

    /**
     * @var System\Interfaces\Pcommand $command 命令
     */
    private static $pcommand;

    /**
     * 工厂构造命令,根据不同的type构建不同的命令返回:
     *
     * 1. add: 购物车添加商品
     * 2. edit: 编辑购物车商品
     * 3. delete: 从购物车中删除商品
     *
     * @param string $type 命令类型
     * @param Trade\Model\CartProduct $data 购物车商品对象
     * @param Trade\Model\Cart $target 目标购物车
     */
    public static function createCommand($type, $data, $target)
    {
        switch ($type) {
            case 'add':
                self::$pcommand = Core::$_container->make('Trade\Command\CartProduct\AddCommand', ['cartProduct'=>$data,'cart'=>$target]);
                break;
            case 'edit':
                self::$pcommand = Core::$_container->make('Trade\Command\CartProduct\EditCommand', ['cartProduct'=>$data,'cart'=>$target]);
                break;
            case 'delete':
                self::$pcommand = Core::$_container->make('Trade\Command\CartProduct\DeleteCommand', ['cartProduct'=>$data,'cart'=>$target]);
                break;
        }
        return self::$pcommand;
    }
}
