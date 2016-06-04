<?php
namespace Common\Controller;

use System\Classes\Controller;
use Common\Service;
//这段需要封装 -- 开始
use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Parameters;
use Tobscure\JsonApi\Resource;
//这段需要封装 -- 开始
use Core;

/**
 * 通用应用层服务
 * @author chloroplast
 * @version 1.0.20160222
 */
class IndexController extends Controller
{


    /**
     * 对应路由 /common/signUpSms/web/{cellPhone:\d+}
     * POST方法传参
     *
     * 发送注册短信
     * @codeCoverageIgnore
     * @param string $cellPhone 手机号
     * @return 204 发送短信成功
     */
    public function sendWebSignUpSms($cellPhone)
    {
        //数据传参校验 -- 开始
        //数据传参校验 -- 结束
        //领域服务调用 -- 开始
        $this->getResponse()->setStatusCode(204);
        // $service = new Service\SignUpSmsService();
        // $service->send($cellPhone);
        //领域服务调用 -- 结束
        return true;
    }

    /**
     * 对应路由 /common/restPasswordSms/web/{cellPhone:\d+}
     * POST方法传参
     *
     * 发送注册短信
     * @codeCoverageIgnore
     * @param string $cellPhone 手机号
     * @return 204 发送短信成功
     */
    public function sendWebRestPasswordSms($cellPhone)
    {
        //数据传参校验 -- 开始
        //数据传参校验 -- 结束
        //领域服务调用 -- 开始
        $this->getResponse()->setStatusCode(204);
        // $service = new Service\SignUpSmsService();
        // $service->send($cellPhone);
        //领域服务调用 -- 结束
        return true;
    }

    /**
     * 对应路由 /common/signUpSms/saas/{cellPhone:\d+}
     * POST方法传参
     *
     * 发送注册短信
     * @codeCoverageIgnore
     * @param string $cellPhone 手机号
     * @return 204 发送短信成功
     */
    public function sendSaasSignUpSms($cellPhone)
    {
        //数据传参校验 -- 开始
        //数据传参校验 -- 结束
        //领域服务调用 -- 开始
        $this->getResponse()->setStatusCode(204);
        // $service = new Service\SignUpSmsService();
        // $service->send($cellPhone);
        //领域服务调用 -- 结束
        return true;
    }

    /**
     * 对应路由 /common/restPasswordSms/{cellPhone:\d+}
     * POST方法传参
     *
     * 发送注册短信
     * @codeCoverageIgnore
     * @param string $cellPhone 手机号
     * @return 204 发送短信成功
     */
    public function sendSaasRestPasswordSms($cellPhone)
    {
        //数据传参校验 -- 开始
        //校验手机号是否为11位,数字
        //数据传参校验 -- 结束
        $this->getResponse()->setStatusCode(204);
        //领域服务调用 -- 开始
        // $service = new Service\RestPasswordSmsService();
        // $this->result['result'] = $service->send($cellPhone);
        //领域服务调用 -- 结束
        return true;
    }

    /**
     * 临时写
     */
    public function getFiles(string $ids)
    {

        $fileArray = Core::$_dbDriver->query('SELECT * FROM pcore_file WHERE fileId IN ('.$ids.')');

        $result = array();
        foreach ($fileArray as $fileInfo) {
            $fileInfo['url'] = 'http://'.$_SERVER['HTTP_HOST']. '/'.'Global/Attachment/'.$fileInfo['filePath'];
            $result[] = $fileInfo;
        }

        echo json_encode($result);
        return true;
    }
    /**
     * 对应路由 /common/certificate
     * POST方法传参
     *
     * 上传证件照
     * @codeCoverageIgnore
     * @param $_FILES $_FILES['certificate'] 头像文件流
     */
    public function certificate()
    {
        // var_dump($_FILES);exit();
        if (empty($_FILES['certificate'])) {
            return false;
        }
        $file = Core::$_container->get('Common\Model\File');

        $certificateFileService = new Service\CertificateFileService($file);
        $certificateFileService->upload($_FILES['certificate']);

        $representation = new Resource($certificateFileService, new \Common\View\CertificateFileSerializer);
        $document = new Document($representation);
        $this->render($document);
        return true;
    }
}
