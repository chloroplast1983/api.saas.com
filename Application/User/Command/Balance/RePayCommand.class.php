<?php
namespace User\Command\Balance;

use System\Interfaces\Pcommand;
use User\Model\BalanceLog;

/**
 * 收入命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class RePayCommand implements Pcommand
{

    private $balanceLog;

    /**
     * @Inject("User\Persistence\UserBalanceDb")
     */
    private $balanceDbLayer;

    /**
     * @Inject("User\Persistence\UserBalanceLogDb")
     */
    private $balanceLogDbLayer;

    public function __construct(BalanceLog $balanceLog)
    {
        $this->balanceLog = $balanceLog;
    }

    public function execute()
    {
        //用户支出,扣钱,例如提现等
        //插入balanceLog
        return true;
    }

    public function report()
    {

    }
}
