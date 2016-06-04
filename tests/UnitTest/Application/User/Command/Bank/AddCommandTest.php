<?php
namespace User\Command\Bank;

use System\Interfaces\Pcommand;
use User\Model\BankAccount;
use User\Model\User;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * User/Command/Bank/AddCommand.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */

class AddCommandTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_saas_user_bank_account');

    /**
     * 测试添加银行命令
     */
    public function testAddCommand()
    {
        //初始化BankAccount
        $bankAccount = new BankAccount();
        $bankAccount->setBankCardHolderName('bankCardHolderName');
        $bankAccount->setBankCardNumber('111111111');
        $bankAccount->setBankCardCellphone('11111111111');
        $user = new User(1);
        //初始化命令
        $command = Core::$_container->make('User\Command\Bank\AddCommand', ['bankAccount'=>$bankAccount,'user'=>$user]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);
        //期望id已经赋值且大于0
        $this->assertGreaterThan(0, $bankAccount->getId());

        //查询商品数据库,确认数据插入成功
        $expectArray = Core::$_dbDriver->query('SELECT * FROM pcore_saas_user_bank_account WHERE userBankAccountId='.$bankAccount->getId());
        $expectArray = $expectArray[0];

        $this->assertEquals($user->getId(), $expectArray['userId']);
        $this->assertEquals($bankAccount->getBankCardHolderName(), $expectArray['bankCardHolderName']);
        $this->assertEquals($bankAccount->getBankCardNumber(), $expectArray['bankCardNumber']);
        $this->assertEquals($bankAccount->getBankCardCellphone(), $expectArray['bankCardCellphone']);
        $this->assertEquals($bankAccount->getCreateTime(), $expectArray['createTime']);
        $this->assertEquals($bankAccount->getUpdateTime(), $expectArray['updateTime']);
    }
}
