<?php
namespace Application\Service;

use Application\Model\Application;
use Core;

/**
 * PersonalApplicationService 个人审核表角色
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */

class PersonalApplicationService implements ApplicationInterface
{

    /**
     * @var Application\Model\Application $application 用户申请表单
     */
    private $application;
    /**
     * @var int $tourGuidePic 导游证图片
     */
    private $tourGuidePic;

    /**
     * PersonalApplicationService 个人审核表角色 构造函数
     */
    public function __construct(Application $application)
    {
        global $_FWGLOBAL;
        $this->application = $application;
        $this->tourGuidePic = 0;
    }

    /**
     * PersonalApplicationService 个人审核表角色 析构函数
     */
    public function __destruct()
    {
        unset($this->application);
        unset($this->tourGuidePic);
    }

    /**
     * 设置用户申请表单
     * @param \Application\Model\Application $application 用户申请表单
     */
    public function setApplication(Application $application)
    {
        $this->application = $application;
    }

    /**
     * 获取用户申请表单
     * @return Application\Model\Application $application 用户申请表单
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * 设置导游证图片
     * @param int $tourGuidePic 导游证图片
     */
    public function setTourGuidePic(int $tourGuidePic)
    {
        $this->tourGuidePic = $tourGuidePic;
    }

    /**
     * 获取导游证图片
     * @return int $tourGuidePic 导游证图片
     */
    public function getTourGuidePic()
    {
        return $this->tourGuidePic;
    }

    /**
     * 拒绝
     */
    public function decline()
    {
        //调用拒绝命令
        $command = Core::$_container->call(['Application\Command\PersonalApplication\PersonalApplicationCommandFactory','createCommand'], ['type'=>'decline','data'=>$this]);
        return $command->execute();
    }

    /**
     * 审核通过
     */
    public function approve()
    {
        //调用审核通过命令
        $command = Core::$_container->call(['Application\Command\PersonalApplication\PersonalApplicationCommandFactory','createCommand'], ['type'=>'approve','data'=>$this]);
        return $command->execute();
    }

    /**
     * 提交
     */
    public function apply()
    {
        //调用提交命令
        $command = Core::$_container->call(['Application\Command\PersonalApplication\PersonalApplicationCommandFactory','createCommand'], ['type'=>'apply','data'=>$this]);
        return $command->execute();
    }

    /**
     * 编辑
     */
    public function edit()
    {
        //调用编辑命令
        $command = Core::$_container->call(['Application\Command\PersonalApplication\PersonalApplicationCommandFactory','createCommand'], ['type'=>'edit','data'=>$this]);
        return $command->execute();
    }
}
