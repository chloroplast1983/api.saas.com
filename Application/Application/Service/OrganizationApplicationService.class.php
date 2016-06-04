<?php
namespace Application\Service;

use Application\Model\Application;
use Core;
use System\Classes\Transaction;

/**
 * OrganizationApplicationService 商户审核表角色
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */

class OrganizationApplicationService implements ApplicationInterface
{

    /**
     * @var Application\Model\Application $application 用户申请表单
     */
    private $application;
    /**
     * @var int $businessLicenseCertificatePic 店铺营业执照
     */
    private $businessLicenseCertificatePic;
    /**
     * @var int $authorizationCertificatePic 授权书
     */
    private $authorizationCertificatePic;
    /**
     * @var int $recordRegistrationPic 备案登记证明图片
     */
    private $recordRegistrationPic;
    /**
     * @var int $type 商户类别
     */
    private $type;

    /**
     * OrganizationApplicationService 商户审核表角色 构造函数
     */
    public function __construct(Application $application)
    {
        global $_FWGLOBAL;
        $this->application = $application;
        $this->businessLicenseCertificatePic = 0;
        $this->authorizationCertificatePic = 0;
        $this->recordRegistrationPic = 0;
        $this->type = TRAVEL_AGENCY;
    }

    /**
     * OrganizationApplicationService 商户审核表角色 析构函数
     */
    public function __destruct()
    {
        unset($this->application);
        unset($this->businessLicenseCertificatePic);
        unset($this->authorizationCertificatePic);
        unset($this->recordRegistrationPic);
        unset($this->type);
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
     * 设置店铺营业执照
     * @param int $businessLicenseCertificatePic 店铺营业执照
     */
    public function setBusinessLicenseCertificatePic(int $businessLicenseCertificatePic)
    {
        $this->businessLicenseCertificatePic = $businessLicenseCertificatePic;
    }

    /**
     * 获取店铺营业执照
     * @return int $businessLicenseCertificatePic 店铺营业执照
     */
    public function getBusinessLicenseCertificatePic()
    {
        return $this->businessLicenseCertificatePic;
    }

    /**
     * 设置授权书
     * @param int $authorizationCertificatePic 授权书
     */
    public function setAuthorizationCertificatePic(int $authorizationCertificatePic)
    {
        $this->authorizationCertificatePic = $authorizationCertificatePic;
    }

    /**
     * 获取授权书
     * @return int $authorizationCertificatePic 授权书
     */
    public function getAuthorizationCertificatePic()
    {
        return $this->authorizationCertificatePic;
    }

    /**
     * 设置备案登记证明图片
     * @param int $recordRegistrationPic 备案登记证明图片
     */
    public function setRecordRegistrationPic(int $recordRegistrationPic)
    {
        $this->recordRegistrationPic = $recordRegistrationPic;
    }

    /**
     * 获取备案登记证明图片
     * @return int $recordRegistrationPic 备案登记证明图片
     */
    public function getRecordRegistrationPic()
    {
        return $this->recordRegistrationPic;
    }

    /**
     * 设置商户类别
     * @param int $type 商户类别
     */
    public function setType(int $type)
    {
        $this->type= in_array($type, array(TRAVEL_AGENCY,TRAVEL_WHOLESALER,TRAVEL_OPERATOR)) ? $type : TRAVEL_AGENCY;
    }

    /**
     * 获取商户类别
     * @return int $type 商户类别
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * 拒绝
     */
    public function decline()
    {
        //调用拒绝命令
        $command = Core::$_container->call(['Application\Command\OrganizationApplication\OrganizationApplicationCommandFactory','createCommand'], ['type'=>'decline','data'=>$this]);
        return $command->execute();
    }

    /**
     * 审核通过表单
     */
    public function approve()
    {
        $command = Core::$_container->call(['Application\Command\OrganizationApplication\OrganizationApplicationCommandFactory','createCommand'], ['type'=>'approve','data'=>$this]);
        return $command->execute();
    }

    /**
     * 提交
     */
    public function apply()
    {
        //调用提交命令
        $command = Core::$_container->call(['Application\Command\OrganizationApplication\OrganizationApplicationCommandFactory','createCommand'], ['type'=>'apply','data'=>$this]);
        return $command->execute();
    }

    /**
     * 编辑
     */
    public function edit()
    {
        //调用编辑命令
        $command = Core::$_container->call(['Application\Command\OrganizationApplication\OrganizationApplicationCommandFactory','createCommand'], ['type'=>'edit','data'=>$this]);
        return $command->execute();
    }
}
