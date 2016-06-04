<?php
namespace Common\Command;

use System\Interfaces\Pcommand;
use Common\Model\VerifyCode;
use Core;

/**
 * 添加注册短信验证码
 * @author chloroplast
 * @version 1.0.20160222
 */

class AddVerifyCodeCommand implements Pcommand
{

    /**
     * @Inject("Common\Persistence\VerifyCodeCache")
     */
    private $cacheLayer;

    /**
     * @var Common\Model\VerifyCode 验证码
     */
    private $verifyCode;

    public function __construct(VerifyCode $verifyCode)
    {
        $this->verifyCode = $verifyCode;
    }

    /**
     * 把验证码写入缓存层,这里暂不考虑写入数据层
     */
    public function execute()
    {
        $key = $this->verifyCode->getKey();
        $code = $this->verifyCode->getCode();
        return $this->cacheLayer->save($this->verifyCode->getKey(), $this->verifyCode->getCode(), $this->verifyCode->getTtl());
    }

    public function report()
    {

    }
}
