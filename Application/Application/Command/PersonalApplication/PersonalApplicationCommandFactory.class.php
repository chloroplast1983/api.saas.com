<?php
namespace Application\Command\PersonalApplication;

use Core;

/**
 * 工厂解耦领域服务直接对命令的调用
 * @author chloroplast
 * @version 1.0: 20160225
 */

class PersonalApplicationCommandFactory
{

    /**
     * @var System\Interfaces\Pcommand $command 命令
     */
    private static $pcommand;

    /**
     * 工厂构造命令,根据不同的type构建不同的命令返回:
     *
     * 1. apply : 申请
     * 2. approve: 审批通过
     * 3. decline: 拒绝
     * 4. edit: 编辑
     *
     * @param string $type 命令类型
     * @param Application\Service\PersonalApplication $personalApplicationService 个人申请表单对象
     */
    public static function createCommand($type, $data)
    {
        switch ($type) {
            case 'apply':
                self::$pcommand = Core::$_container->make('Application\Command\PersonalApplication\ApplyCommand', ['personalApplicationService'=>$data]);
                break;
            case 'approve':
                self::$pcommand = Core::$_container->make('Application\Command\PersonalApplication\ApproveCommand', ['personalApplicationService'=>$data]);
                break;
            case 'decline':
                self::$pcommand = Core::$_container->make('Application\Command\PersonalApplication\DeclineCommand', ['personalApplicationService'=>$data]);
                break;
            case 'edit':
                self::$pcommand = Core::$_container->make('Application\Command\PersonalApplication\EditCommand', ['personalApplicationService'=>$data]);
                break;
        }
        return self::$pcommand;
    }
}
