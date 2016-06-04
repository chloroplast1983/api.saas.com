<?php
namespace User\Command\Bank;

use System\Interfaces\Pcommand;
use User\Model\BankAccount;
use User\Model\User;

/**
 * 添加银行账户命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class AddCommand implements Pcommand
{

    private $bankAccount;

    private $user;

    /**
     * @Inject("User\Persistence\BankAccountDb")
     */
    private $dbLayer;

    /**
     * @Inject("User\Persistence\BankAccountCache")
     */
    private $cacheLayer;

    public function __construct(BankAccount $bankAccount, User $user)
    {
        $this->bankAccount = $bankAccount;
        $this->user = $user;
    }

    public function execute()
    {
        //拼接数据库数组
        $mysqlDataArray = array('userId'=>$this->user->getId(),
                                'bankCardHolderName'=>$this->bankAccount->getBankCardHolderName(),
                                'bankCardNumber'=>$this->bankAccount->getBankCardNumber(),
                                'bankCardCellphone'=>$this->bankAccount->getBankCardCellphone(),
                                'createTime'=>$this->bankAccount->getCreateTime(),
                                'updateTime'=>$this->bankAccount->getUpdateTime());

        ////写入数据库,如果成功,写入缓存
        $id = $this->dbLayer->insert($mysqlDataArray, true);
        if (!$id) {
            return false;
        }

        //返回用户主键id,写会$user对象,为领域服务间互相调用服务
        $this->bankAccount->setId($id);
        return true;
    }

    public function report()
    {

    }
}
