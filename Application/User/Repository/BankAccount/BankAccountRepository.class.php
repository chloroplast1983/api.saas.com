<?php
namespace User\Repository\BankAccount;

use User\Repository\BankAccount\Query;
use User\Translator\BankAccountTranslator;

/**
 * 银行账户仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class BankAccountRepository
{

    /**
     * @var Query\BankAccountRowCacheQuery $bankAccountRowCacheQuery 行缓存
     */
    private $bankAccountRowCacheQuery;

    public function __construct(Query\BankAccountRowCacheQuery $bankAccountRowCacheQuery)
    {
        $this->bankAccountRowCacheQuery = $bankAccountRowCacheQuery;
    }

    /**
     * 获取银行账户信息
     * @param integer $id 银行账户id
     */
    public function getOne(int $id)
    {
        //获取用户数据
        $bankAccountInfo = $this->bankAccountRowCacheQuery->getOne($id);
        
        //翻译器 -- 开始
        $bankAccountTranslator = new BankAccountTranslator();
        //翻译器 -- 结束
        return $bankAccountTranslator->translate($organizationApplicationInfo);
    }
}
