<?php
namespace Web\Command\ProductType;

use Core;

/**
 * 工厂解耦领域服务直接对命令的调用
 * @author chloroplast
 * @version 1.0: 20160225
 */

class ProductTypeCommandFactory
{

    /**
     * @var System\Interfaces\Pcommand $command 命令
     */
    private static $pcommand;

    /**
     * 工厂构造命令,根据不同的type构建不同的命令返回:
     *
     * 1. add: 添加商品分类
     * 2. delete: 删除商品分类
     * 3. edit: 编辑商品分类
     *
     * @param string $type 命令类型
     * @param Web\Model\ProductType $data 用户对象
     */
    public static function createCommand($type, $data)
    {
        switch ($type) {
            case 'add':
                self::$pcommand = Core::$_container->make('Web\Command\ProductType\AddCommand', ['product'=>$data]);
                break;
            case 'delete':
                self::$pcommand = Core::$_container->make('Web\Command\ProductType\DeleteCommand', ['product'=>$data]);
                break;
            case 'edit':
                self::$pcommand = Core::$_container->make('Web\Command\ProductType\EditCommand', ['product'=>$data]);
                break;
        }
        return self::$pcommand;
    }
}
