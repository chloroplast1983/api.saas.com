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

class EditCommandTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_saas_user_bank_account');

    public function tearDown()
    {
        Core::$_cacheDriver->flushAll();
        parent::tearDown();
    }

    /**
     * 测试编辑产品命令
     */
    public function testEditCommand()
    {

        $testUserBankAccountId = 1;
        $user = new User(1);
        //查询旧数据,确认修改前状态
        $oldArray = Core::$_dbDriver->query('SELECT * FROM pcore_saas_user_bank_account WHERE userBankAccountId ='.$testUserBankAccountId);
        $this->assertNotEmpty($oldArray);//确认我们已经构建数据
        $oldArray = $oldArray[0];

        //初始化BankAccount
        $bankAccount = new BankAccount($testUserBankAccountId);
        $bankAccount->setBankCardHolderName($oldArray['bankCardHolderName'].'Modified');
        $bankAccount->setBankCardNumber('2222222222');
        $bankAccount->setBankCardCellphone('22222222222');

        $bankAccountCache = new \User\Persistence\BankAccountCache();
        //这里初始化缓存,我们确认缓存有数据存在
        $bankAccountCache->save($testUserBankAccountId, $oldArray);

        //初始化命令
        $command = Core::$_container->make('User\Command\Bank\EditCommand', ['bankAccount'=>$bankAccount,'user'=>$user]);
        //执行命令
        $result = $command->execute();

        //期望命令返回成功
        $this->assertTrue($result);

        //确认缓存已经删除
        $this->assertEmpty($bankAccountCache->get($testUserBankAccountId));
        
        //查询商品数据库,确认数据更新成功
        $expectArray = Core::$_dbDriver->query('SELECT * FROM pcore_saas_user_bank_account WHERE userBankAccountId='.$testUserBankAccountId);
        $expectArray = $expectArray[0];

        $this->assertEquals($bankAccount->getBankCardHolderName(), $expectArray['bankCardHolderName']);
        $this->assertEquals($bankAccount->getBankCardNumber(), $expectArray['bankCardNumber']);
        $this->assertEquals($bankAccount->getBankCardCellphone(), $expectArray['bankCardCellphone']);
        
        $this->assertEquals($oldArray['createTime'], $expectArray['createTime']);
        $this->assertEquals($bankAccount->getUpdateTime(), $expectArray['updateTime']);
        $this->assertNotEquals($oldArray['updateTime'], $expectArray['updateTime']);//数据已经更改
        $this->assertEquals($oldArray['userId'], $expectArray['userId']);

    }
}
