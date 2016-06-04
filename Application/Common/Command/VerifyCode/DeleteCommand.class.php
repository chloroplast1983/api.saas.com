<?php
namespace Common\Command\VerifyCode;

use System\Interfaces\Pcommand;
use Common\Model\VerifyCode;

/**
 * 添加注册短信验证码
 * @author chloroplast
 * @version 1.0.20160222
 */

class DeleteCommand implements Pcommand
{

    /**
     * @Inject("Common\Persistence\VerifyCodeCache")
     */
    private $cacheLayer;

    /**
     * @var Common\Model\VerifyCode 验证码
     */
    private $code;

    public function __construct(VerifyCode $verifyCode)
    {
        $this->verifyCode = $verifyCode;
    }

    /**
     * 删除验证码从缓存
     */
    public function execute()
    {

        return $this->cacheLayer->del($this->verifyCode->getKey());
    }

    public function report()
    {

    }
}
