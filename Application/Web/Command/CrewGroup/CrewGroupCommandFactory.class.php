<?php
namespace Web\Command\Crew;

use Core;

/**
 * 工厂解耦领域服务直接对命令的调用
 * @author chloroplast
 * @version 1.0: 20160225
 */

class CrewGroupCommandFactory
{

    /**
     * @var System\Interfaces\Pcommand $command 命令
     */
    private static $pcommand;

    /**
     * 工厂构造命令,根据不同的type构建不同的命令返回:
     *
     * 1. add : 添加员工组
     * 2. edit: 编辑员工组
     * 3. delete: 删除员工组
     *
     * @param string $type 命令类型
     * @param Crew\Model\CrewGroup $data 用户对象
     */
    public static function createCommand($type, $data)
    {
        switch ($type) {
            case 'add':
                self::$pcommand = Core::$_container->make('Web\Command\CrewGroup\AddCommand', ['crewGroup'=>$data]);
                break;
            case 'edit':
                self::$pcommand = Core::$_container->make('Web\Command\CrewGroup\EditCommand', ['crewGroup'=>$data]);
                break;
            case 'delete':
                self::$pcommand = Core::$_container->make('Web\Command\CrewGroup\DeleteCommand', ['crewGroup'=>$data]);
                break;
        }
        return self::$pcommand;
    }
}
