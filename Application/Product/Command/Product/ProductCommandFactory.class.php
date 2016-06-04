<?php
namespace Product\Command\Product;

use Core;

/**
 * 工厂解耦领域服务直接对命令的调用
 * @author chloroplast
 * @version 1.0: 20160225
 */

class ProductCommandFactory
{

    /**
     * @var System\Interfaces\Pcommand $command 命令
     */
    private static $pcommand;

    /**
     * 工厂构造命令,根据不同的type构建不同的命令返回:
     *
     * 1. add: 添加商品
     * 2. delete: 删除商品
     * 3. edit: 编辑商品
     * 4. off: 下架商品
     * 5. on: 上架商品
     *
     * @param string $type 命令类型
     * @param Product\Model\Product $data 用户对象
     */
    public static function createCommand($type, $data)
    {
        switch ($type) {
            case 'add':
                self::$pcommand = Core::$_container->make('Product\Command\Product\AddCommand', ['product'=>$data]);
                break;
            case 'delete':
                self::$pcommand = Core::$_container->make('Product\Command\Product\DeleteCommand', ['product'=>$data]);
                break;
            case 'edit':
                self::$pcommand = Core::$_container->make('Product\Command\Product\EditCommand', ['product'=>$data]);
                break;
            case 'off':
                self::$pcommand = Core::$_container->make('Product\Command\Product\OffCommand', ['product'=>$data]);
                break;
            case 'on':
                self::$pcommand = Core::$_container->make('Product\Command\Product\OnCommand', ['product'=>$data]);
                break;
        }
        return self::$pcommand;
    }
}
