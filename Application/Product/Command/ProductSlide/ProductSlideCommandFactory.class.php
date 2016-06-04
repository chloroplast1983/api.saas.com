<?php
namespace Product\Command\ProductSlide;

use Core;

/**
 * 工厂解耦领域服务直接对命令的调用
 * @author chloroplast
 * @version 1.0: 20160225
 */

class ProductSlideCommandFactory
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
     * @param Product\Model\ProductSlide $data 用户对象
     * @param Product\Model\Product $target 商品
     */
    public static function createCommand($type, $data, $target)
    {
        switch ($type) {
            case 'add':
                self::$pcommand = Core::$_container->make('Product\Command\ProductSlide\AddCommand', ['productSlide'=>$data,'product'=>$target]);
                break;
            case 'delete':
                self::$pcommand = Core::$_container->make('Product\Command\ProductSlide\DeleteCommand', ['productSlide'=>$data,'product'=>$target]);
                break;
        }
        return self::$pcommand;
    }
}
