<?php
namespace User\Command\Balance;

use System\Interfaces\Pcommand;
use User\Model\BalanceLog;

/**
 * 支出命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class PayCommand implements Pcommand
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
        //用户收入,加钱,例如订单交易收入等
        //插入balanceLog
        return true;
    }

    public function report()
    {

    }
}
