<?php
namespace User\Repository\User;

use User\Repository\User\Query;
use GenericTestsDatabaseTestCase;
use Core;

/**
 * User/Repository/UserRepository.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class UserRepositoryTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_saas_user');

    private $stub;

    public function setUp()
    {
        $this->stub = Core::$_container->get('User\Repository\User\UserRepository');

        parent::setUp();
    }

    /**
     * 测试用户仓库构建
     */
    public function testUserRepositoryConstructor()
    {

        //测试RowCacheQuery构造成功
        $userRowCacheQuery = $this->getPrivateProperty('User\Repository\User\UserRepository', 'userRowCacheQuery');
        $this->assertInstanceof('User\Repository\User\Query\UserRowCacheQuery', $userRowCacheQuery->getValue($this->stub));
    }

    /**
     * 测试用户仓库获取单独数据
     * @todo 需要测试头像图片路径
     */
    public function testUserRepositoryGetOne()
    {
        
        //测试用户id
        $testUserId = 1;

        //期待数组
        $expectedArray = Core::$_dbDriver->query('SELECT * FROM pcore_saas_user WHERE userId='.$testUserId);
        $expectedArray = $expectedArray[0];

        $user = $this->stub->getOne($expectedArray['userId']);

        $this->assertInstanceOf('User\Model\User', $user);
        //期待返回相同
        $this->assertEquals($user->getId(), $expectedArray['userId']);
        $this->assertEquals($user->getCellPhone(), $expectedArray['cellPhone']);
        $this->assertEquals($user->getPassword(), $expectedArray['password']);
        $this->assertEquals($user->getSalt(), $expectedArray['salt']);
        $this->assertEquals($user->getSignUpTime(), $expectedArray['signUpTime']);
        $this->assertEquals($user->getUpdateTime(), $expectedArray['updateTime']);
        $this->assertEquals($user->getNickName(), $expectedArray['nickName']);
        $this->assertEquals($user->getUserName(), $expectedArray['userName']);
        $this->assertEquals($user->getStatus(), $expectedArray['status']);
        $this->assertEquals($user->getStatusTime(), $expectedArray['statusTime']);
    }

    /**
     * 测试仓库获取批量数据
     */
    public function testUserRepositoryGetList()
    {
        
        //测试用户id
        $testUserIds = array(1,2);

        $expectedArrayList = Core::$_dbDriver->query('SELECT * FROM pcore_saas_user WHERE userId IN ('.implode(',', $testUserIds).')');
        
        $userList = $this->stub->getList($testUserIds);

        foreach ($expectedArrayList as $key => $expectedArray) {
            $user = $userList[$key];

            $this->assertInstanceOf('User\Model\User', $user);
            $this->assertEquals($user->getId(), $expectedArray['userId']);
            $this->assertEquals($user->getCellPhone(), $expectedArray['cellPhone']);
            $this->assertEquals($user->getPassword(), $expectedArray['password']);
            $this->assertEquals($user->getSalt(), $expectedArray['salt']);
            $this->assertEquals($user->getSignUpTime(), $expectedArray['signUpTime']);
            $this->assertEquals($user->getUpdateTime(), $expectedArray['updateTime']);
            $this->assertEquals($user->getNickName(), $expectedArray['nickName']);
            $this->assertEquals($user->getUserName(), $expectedArray['userName']);
            $this->assertEquals($user->getStatus(), $expectedArray['status']);
            $this->assertEquals($user->getStatusTime(), $expectedArray['statusTime']);
        }
    }
}
