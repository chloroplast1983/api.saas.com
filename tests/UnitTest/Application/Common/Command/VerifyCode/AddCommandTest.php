<?php
namespace Common\Command\VerifyCode;

use Core;
use GenericTestsDatabaseTestCase;

/**
 * Common/Command/VerifyCode/AddCommand.class.php 测试文件,测试命令执行正确
 * @author chloroplast
 * @version 1.0.0:20160309
 */
class AddCommandTest extends GenericTestsDatabaseTestCase
{

    private $stub;
    private $cacheLayer;
    private $verifyCode;

    public function setUp()
    {

        $this->verifyCode = new \Common\Model\VerifyCode();
        $this->verifyCode->setKey('key');
        $this->verifyCode->setCode('code');
        $this->stub = Core::$_container->make('Common\Command\VerifyCode\AddCommand', ['verifyCode'=>$this->verifyCode]);
        $this->cacheLayer = $this->getPrivateProperty('Common\Command\VerifyCode\AddCommand', 'cacheLayer')->getValue($this->stub);

        parent::setUp();
    }

    public function tearDown()
    {
        //清空对象
        unset($this->verifyCode);
        unset($this->stub);
        //清空缓存数据
        Core::$_cacheDriver->flushAll();

        parent::tearDown();
    }
    /**
     * 测试AddVerifyCode构建
     */
    public function testAddVerifyCodeCommandConstruct()
    {
        $this->assertInstanceof('Common\Persistence\VerifyCodeCache', $this->cacheLayer);
    }
    /**
     * 测试命令执行execute()执行正确,需要验证:
     * 2. 缓存插入正确
     */
    public function testAddVerifyCodeCommandExecute()
    {

        //执行命令
        $result = $this->stub->execute();
        //期望返回true
        $this->assertTrue($result);
        //期望缓存存储正确
        $this->assertEquals($this->verifyCode->getCode(), $this->cacheLayer->get($this->verifyCode->getKey()));
    }
}
