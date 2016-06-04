<?php
namespace Common\Command\VerifyCode;

use Core;
use GenericTestsDatabaseTestCase;

/**
 * Common/Command/DelVerifyCodeCommand.class.php 测试文件,测试命令执行正确
 * @author chloroplast
 * @version 1.0.0:20160309
 */
class DeleteCommandTest extends GenericTestsDatabaseTestCase
{

    private $stub;
    private $cacheLayer;
    private $verifyCode;

    public function setUp()
    {

        $this->verifyCode = new \Common\Model\VerifyCode();
        $this->verifyCode->setKey('key');
        $this->verifyCode->setCode('code');
        $this->stub = Core::$_container->make('Common\Command\VerifyCode\DeleteCommand', ['verifyCode'=>$this->verifyCode]);
        $this->cacheLayer = $this->getPrivateProperty('Common\Command\VerifyCode\DeleteCommand', 'cacheLayer')->getValue($this->stub);
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
     * 测试DelVerifyCode构建
     */
    public function testDelVerifyCodeCommandConstruct()
    {
        $this->assertInstanceof('Common\Persistence\VerifyCodeCache', $this->cacheLayer);
    }
    /**
     * 测试命令执行execute()执行正确,需要验证:
     * 2. 缓存删除
     */
    public function testDelVerifyCodeCommandExecute()
    {
        //缓存放入数据
        $this->cacheLayer->save($this->verifyCode->getKey(), $this->verifyCode->getCode());
        //确认缓存数据
        $this->assertEquals($this->verifyCode->getCode(), $this->cacheLayer->get($this->verifyCode->getKey()));
        //执行命令
        $result = $this->stub->execute();
        //期望返回true
        $this->assertTrue($result);
        //期望缓存存储正确
        $this->assertEmpty($this->cacheLayer->get($this->verifyCode->getKey()));
    }
}
