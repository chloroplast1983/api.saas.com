<?php
namespace Common\Service;

use Common\Model\Message;
use Common\Model\VerifyCode;
use Core;

/**
 * saas注册验证码信息短信角色
 *
 * @author chloroplast
 * @version 1.0:20160223
 */
class SignUpSaasSmsService implements SmsInterface, VerifyCodeInterface
{

    /**
     * @var Message $message 发送手机短信
     */
    private $message;

    /**
     * @var Common\Model\VerifyCode $verifyCode 验证码
     */
    private $verifyCode;

    /**
     * @var string $keyPrefix key前缀
     */
    private $keyPrefix;

    /**
     * 构造函数
     * 初始化 Message类
     * 初始化 VerifyCode类
     * 初始化 前缀
     */
    public function __construct()
    {
        $this->message = new Message();
        $this->verifyCode = new VerifyCode();
        $this->keyPrefix = 'signUpSms';
    }

    /**
     * 生成验证码存到$_SESSION中
     */
    private function generate(string $cellPhone)
    {

        $len = 6;
        $chars = '0123456789';
        // characters to build the password from
        mt_srand((double)microtime() * 1000000 * getmypid());
        // seed the random number generater (must be done)
        $code = '';
        while (strlen($code) < $len) {
            $code .= substr($chars, (mt_rand() % strlen($chars)), 1);
        }
        //构建验证码类
        $this->verifyCode->setKey($this->keyPrefix.'_'.$cellPhone);
        $this->verifyCode->setCode($code);
        //存储验证码
        $command = Core::$_container->call(['Common\Command\VerifyCodeFactory','createCommand'], ['type'=>'add','data'=>$this->verifyCode]);
        return $command->execute();
    }
    
    /**
     * 发送验证码
     * @codeCoverageIgnore
     */
    public function send(string $cellPhone)
    {

        // //生成验证码
        $this->generate($cellPhone);

        //检测手机号重复
        // $repository = Core::$_container->get('User\Repository\UserRepository');
        // $existUserInfo = $repository->select('cellPhone=\''.$cellPhone.'\'','id');
        // if(!empty($existUserInfo)){
        // 	return false;
        // }

        //组合拼接最终message
        $this->message->setContent(sprintf(SMS_SAAS_SIGNUP_MESSAGE, $this->verifyCode->getCode()));
        $this->message->setTargets($cellPhone);

        $client = new \GuzzleHttp\Client();

        //调用POST接口发送
        // $response = $client->request('POST', 'xx', [
        //     'form_params' => [
        //     ]
        // ]);
        // $body = $response->getBody();
        // $result = json_decode($body->getContents(),true);
        // return $result['status'];
        return $this->message->getContent();
    }

    /**
     * 验证验证码
     */
    public function verify($cellPhone, $code)
    {

        $repository = Core::$_container->get('Common\Repository\VerifyCode\VerifyCodeRepository');
        //从仓库获取存储的验证码
        //给验证码添加前缀
        $this->verifyCode->setKey($this->keyPrefix.'_'.$cellPhone);
        $cacheCode = $repository->get($this->verifyCode->getKey());
        //如果验证成功这里删除验证码,因为可能设定一些验证码的有效时间过长
        
        if ($code == $cacheCode) {
            return $this->verifyCode->delete();
        }
        return false;
    }
}
