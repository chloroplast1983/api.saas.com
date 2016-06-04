<?php
namespace Common\Model;

use Core;

/**
 * 验证码领域对象
 *
 * @author chloroplast
 * @version 1.0.0:20160309
 */
class VerifyCode
{

    /**
     * @var string $key 验证码key
     */
    private $key;

    /**
     * @var mix $code 验证码
     */
    private $code;

    /**
     * @var int $ttl 验证码存储时间
     */
    private $ttl;

    /**
     * 构造函数
     * 因为key和code不用初始化任何数值,所以这里暂时都初始化为空
     * 初始化验证码存储时间为3mins
     */
    public function __construct()
    {
        $this->key = '';
        $this->code = '';
        $this->ttl = 3*60;
    }

    /**
     * 析构函数
     */
    public function __destruct()
    {
        unset($this->key);
        unset($this->code);
        unset($this->ttl);
    }

    /**
     * 设置验证码key
     * @param string $key
     */
    public function setKey(string $key)
    {
        $this->key = $key;
    }

    /**
     * 设置验证码
     * @param mix $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Gets the value of key.
     *
     * @return string $key 验证码key
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Gets the value of code.
     *
     * @return mix $code 验证码
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * 设定过期时间
     * @param int $ttl
     */
    public function setTtl(int $ttl)
    {
        $this->ttl = $ttl;
    }

    /**
     * Gets the value of ttl.
     *
     * @return int $ttl 验证码存储时间
     */
    public function getTtl()
    {
        return $this->ttl;
    }

    /**
     * 保存验证码
     */
    public function save()
    {
        //调用命令
        $command = Core::$_container->call(['Common\Command\VerifyCode\VerifyCodeCommandFactory','createCommand'], ['type'=>'add','data'=>$this]);
        return $command->execute();
    }

    /**
     * 删除验证码
     */
    public function delete()
    {
        //调用命令
        $command = Core::$_container->call(['Common\Command\VerifyCode\VerifyCodeCommandFactory','createCommand'], ['type'=>'delete','data'=>$this]);
        return $command->execute();
    }
}
