<?php
namespace Product\Command\CommonProductPrice;

use Core;

/**
 * 工厂解耦领域服务直接对命令的调用
 * @author chloroplast
 * @version 1.0: 20160225
 */

class CommonProductPriceCommandFactory
{

    /**
     * @var System\Interfaces\Pcommand $command 命令
     */
    private static $pcommand;

    /**
     * 工厂构造命令,根据不同的type构建不同的命令返回:
     *
     * 1. add: 添加通用商品价格
     * 2. delete: 删除通用商品价格
     * 3. edit: 编辑通用商品价格
     *
     * @param string $type 命令类型
     * @param Product\Service\CommonProductPriceSerivice $data
     * @param Product\Model\Product $target 商品对象
     */
    public static function createCommand($type, $data, $target)
    {
        switch ($type) {
            case 'add':
                self::$pcommand = Core::$_container->make('Product\Command\CommonProductPrice\AddCommand', ['commonProductPriceService'=>$data,'product'=>$target]);
                break;
            case 'delete':
                self::$pcommand = Core::$_container->make('Product\Command\CommonProductPrice\DeleteCommand', ['commonProductPriceService'=>$data,'product'=>$target]);
                break;
            case 'edit':
                self::$pcommand = Core::$_container->make('Product\Command\CommonProductPrice\EditCommand', ['commonProductPriceService'=>$data,'product'=>$target]);
                break;
        }
        return self::$pcommand;
    }
}
