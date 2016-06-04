<?php
namespace User\Controller;

use System\Classes\Controller;
use Core;
use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Parameters;
use Tobscure\JsonApi\Resource;

/**
 * 银行账户应用层服务
 * @author chloroplast
 * @version 1.0.20160222
 */
class BankAccountController extends Controller
{

    /**
     * 对应路由 /users/{id:\d+}/bankAccounts[/{bankAccountIds}]
     * GET方法传参
     * 根据用户id获取用户银行账户,该接口用于:
     * 1. 获取属于该用的的银行账户列表(可能用于多个银行)
     *
     * 示例: /users/1/bankAccounts 获取用户id为1的银行账户
     *
     * @param int $id 用户id
     * @param string $bankAccountIds 银行账户id列表
     * @return jsonApi
     */
    public function get(int $id, string $bankAccountIds = '')
    {

        // $bankAccounts = array();

        // if(!empty($bankAccountIds)){
        // 	$bankAccountIds = explode(',',$bankAccountIds);
        // }else{
        // 	$bankAccountIds = array(1,2,3);
        // }
        // $user = new \User\Model\User();
        // $user -> setId($id);
        // foreach($bankAccountIds as $bankAccountId){
        // 	$bankAccount = new \User\Model\BankAccount();
        // 	$bankAccount->setUser($user);
  //   		$bankAccount->setId($bankAccountId);
        // 	$bankAccount->setBankCardHolderName('bankCardHolderName'.$bankAccountId);
        // 	$bankAccount->setBankCardNumber('bankCardNumber'.$bankAccountId);
        // 	$bankAccount->setBankCardCellphone('bankCardCellphone'.$bankAccountId);
        //  $bankAccounts[] = $bankAccount;
        // }
        // $collection = new Collection($bankAccounts, new \User\View\BankAccountSerializer);
        // $document = new Document($collection);
        // $document->addLink('self', 'http://api.51chengxinyou.com/users/'.$id.'/bankAccounts');
        // $this->render($document);
  //       return true;
    }

    /**
     * 对应路由 /users/{id:\d+}/bankAccounts/{bankAccountId:\d+}
     * PUT方法传参
     * 根据用户id银行账户id更新银行账户信息,该接口用于:
     * 1. 判断bankAccountId是否属于用户id
     * 2. 根据bankAccountId更新银行账户信息
     *
     * 示例: /users/1/bankAccounts/1 获取id为1的用户的id为1的银行账户
     *
     * @param int $id 用户id
     * @param int $bankAccountId 银行账户id
     * @param jsonApi array("data"=>array("type"=>"bankAccounts","attributes"=>array("bankCardHolderName"=>"银行持卡人姓名","bankCardNumber"=>"卡号","bankCardCellphone"=>银行预留手机)))
     * @return jsonApi
     */
    public function edit(int $id, int $bankAccountId)
    {
        $data = $this->getRequest()->put("data");
    
        $user = new \User\Model\User();
        $user -> setId($id);

        $bankAccount = new \User\Model\BankAccount();
        $bankAccount->setId($bankAccountId);
        $bankAccount->setUser($user);
        $bankAccount->setBankCardHolderName($data['attributes']['bankCardHolderName']);
        $bankAccount->setBankCardNumber($data['attributes']['bankCardNumber']);
        $bankAccount->setBankCardCellphone($data['attributes']['bankCardCellphone']);

        $resource = new Resource($bankAccount, new \User\View\BankAccountSerializer);
        $document = new Document($resource);
        $document->addLink('self', 'http://api.51chengxinyou.com/users/'.$id.'/bankAccounts/'.$bankAccountId);
        $this->render($document);
        return true;
    }
}
