<?php
namespace User\Command\Bank;

use System\Interfaces\Pcommand;
use User\Model\BankAccount;
use User\Model\User;

/**
 * 修改银行账户命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class EditCommand implements Pcommand
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
        $mysqlDataArray = array('bankCardHolderName'=>$this->bankAccount->getBankCardHolderName(),
                                'bankCardNumber'=>$this->bankAccount->getBankCardNumber(),
                                'bankCardCellphone'=>$this->bankAccount->getBankCardCellphone(),
                                'updateTime'=>$this->bankAccount->getUpdateTime());
        //拼接更新条件数组
        $conditionArray = array('userBankAccountId'=>$this->bankAccount->getId(),'userId'=>$this->user->getId());
        
        $row = $this->dbLayer->update($mysqlDataArray, $conditionArray);
        if (!$row) {
            return false;
        }
        //如果更新成功,删除缓存,这里暂时不重写缓存等后续有时间在更新
        $this->cacheLayer->del($this->bankAccount->getId());
        return true;
    }

    public function report()
    {

    }
}
