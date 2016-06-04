<?php
namespace Application\Service;

use Application\Model\Application;
use Core;
use System\Classes\Transaction;

/**
 * UnverifiedOrganizationApplicationService 未审核商户审核表角色
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */

class UnverifiedOrganizationApplicationService
{


    /**
     * ApplicationInterface 审核表角色 构造函数
     */
    public function __construct(ApplicationInterface $specificApplication)
    {
        $this->specificApplication = $specificApplication;
    }

    /**
     * OrganizationApplicationService 商户审核表角色 析构函数
     */
    public function __destruct()
    {
        unset($this->specificApplication);
    }
    
    /**
     * 审核通过
     */
    public function approve()
    {
        
        $application = $this->specificApplication->getApplication();
        $user = $application->getUser();
        //调用表单详细数据 -- 结束
        //调用审核通过命令
        Transaction::beginTransaction();
        if (!$this->specificApplication->approve()) {
            Transaction::rollBack();
            return false;
        }
        //审核用户状态 -- 开始
        $unverifiedMemberService = new \User\Service\UnverifiedMemberService($user);
        if (!$unverifiedMemberService->verify()) {
            Transaction::rollBack();
            return false;
        }
        //审核用户状态 -- 结束
        //开通银行账户 -- 开始
        $bankAccount = new \User\Model\BankAccount();
        $bankAccount->setBankCardHolderName($application->getBankCardHolderName());
        $bankAccount->setBankCardNumber($application->getBankCardNumber());
        $bankAccount->setBankCardCellphone($application->getBankCardCellphone());
        //赋值银行账户信息
        if (!$bankAccount->addToUser($user)) {
            Transaction::rollBack();
            return false;
        }
        //开通银行账户 -- 结束
        //开通店铺 -- 开始
        $shop = new \Web\Model\Shop();
        //赋值店铺信息
        $shop->setTitle($application->getTitle());
        $shop->setContactPeoplePhone($application->getContactPeoplePhone());
        $shop->setContactPeople($application->getContactPeople());
        $shop->setContactPeopleQQ($application->getContactPeopleQQ());
        $shop->setProvince($application->getProvince());
        $shop->setCity($application->getCity());
        $shop->setAddress($application->getAddress());
        $shop->setUser($user);
        if (!$shop->add()) {
            Transaction::rollBack();
            return false;
        }
        //开通店铺 -- 结束
        Transaction::Commit();
        return true;
    }
}
