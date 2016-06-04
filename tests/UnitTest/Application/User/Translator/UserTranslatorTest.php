<?php
namespace User\Translator;

use GenericTestsDatabaseTestCase;
use Core;

/**
 * User\Translator\UserTranslator.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */
class UserTranslatorTest extends GenericTestsDatabaseTestCase
{

    private $stub;

    public $fixtures = array('pcore_saas_user');

    public function setUp()
    {
        $this->stub = new \User\Translator\UserTranslator();
        parent::setUp();
    }

    /**
     * 测试翻译
     */
    public function testTranslate()
    {

        $testUserId = 1;
        $expectedArray = Core::$_dbDriver->query('SELECT * FROM pcore_saas_user WHERE userId='.$testUserId);
        $expectedArray = $expectedArray[0];
        
        $user = $this->stub->translate($expectedArray);

        $this->assertInstanceof('User\Model\User', $user);

        //测试翻译器赋值正确
        $this->assertEquals($user->getId(), $expectedArray['userId']);
        $this->assertEquals($user->getCellPhone(), $expectedArray['cellPhone']);
        $this->assertEquals($user->getPassword(), $expectedArray['password']);
        $this->assertEquals($user->getSalt(), $expectedArray['salt']);
        $this->assertEquals($user->getType(), $expectedArray['type']);
        $this->assertEquals($user->getSignUpTime(), $expectedArray['signUpTime']);
        $this->assertEquals($user->getUpdateTime(), $expectedArray['updateTime']);
        $this->assertEquals($user->getNickName(), $expectedArray['nickName']);
        $this->assertEquals($user->getUserName(), $expectedArray['userName']);
        $this->assertEquals($user->getStatus(), $expectedArray['status']);
        $this->assertEquals($user->getStatusTime(), $expectedArray['statusTime']);
    }
}
