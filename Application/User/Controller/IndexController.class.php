<?php
namespace User\Controller;

use System\Classes\Controller;
use Core;
use User\Model\User;
use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Parameters;
use Tobscure\JsonApi\Resource;
use Tobscure\JsonApi\ErrorHandler;

/**
 * 用户应用层服务
 * @author chloroplast
 * @version 1.0.20160222
 */
class IndexController extends Controller
{

    /**
     * 对应路由 /users[/{ids}]
     * GET方法传参
     * 根据用户id获取用户详情,该接口用于:
     * 1. 任何获取saas用户信息页面
     *
     * 示例: /users/1,2,3 获取用户id为1的信息
     * /users?page[number]=5&page[size]=20 从第5页开始取数据,每页取20条
     *
     * @param int $id 用户id
     * @return jsonApi
     */
    public function get(string $ids = '')
    {

        //仓库调用 -- 开始
        $repository = Core::$_container->get('User\Repository\User\UserRepository');
        //仓库调用 -- 结束
        $collection = new collection(array(), new \User\View\UserSerializer);
        
        if (!empty($ids)) {
            if (is_numeric($ids)) {
                $user = $repository -> getOne($ids);
                if ($user instanceof User) {
                    $userList = array($user);
                }
            } else {
                $ids = explode(',', $ids);
                $userList = $repository->getList($ids);
            }
        } else {
            $parameters = new Parameters($this->getRequest()->get());
            // $filter = $this->getRequest()->get('filter');
            $filter = array();
            $sort = array();
            $limit = $parameters->getLimit(100); // 20
            $offset = $parameters->getOffset($limit); // 80
            $userList = $repository->filter($filter, $sort, $offset, $limit);
        }

        if (!empty($userList)) {
            $collection = new collection($userList, new \User\View\UserSerializer);
        }
        $document = new Document($collection);
        $document->addLink('self', 'http://api.51chengxinyou.com/users');
        $this->render($document);
        return true;
    }

    /**
     * 对应路由 /users
     * 用户注册功能,通过post传参
     * @param jsonApi array("data"=>array("type"=>"users",
     *                                    "attributes"=>array("cellPhone"=>"手机号",
     *                                                        "password"=>"密码",
     *                                                        "rePassword"=>"重复密码",
     *                                                        "code"=>"验证码")))
     * @return jsonApi
     */
    public function signUp()
    {

        //获取数据
        $data = $this->getRequest()->post('data');
        // var_dump($data);exit();
        //领域服务构建 -- 开始
        $guestService = new \User\Service\GuestService(new User());
        //领域服务构建 -- 结束
        //临时设置
        $data['attributes']['code'] = '';

        $guestService->signUp($data['attributes']['cellPhone'], $data['attributes']['password'], $data['attributes']['code']);
        
        $this->getResponse()->setStatusCode(201);
        $resource = new Resource($guestService->getUser(), new \User\View\UserSerializer);
        $document = new Document($resource);
        $document->addLink('self', 'http://api.51chengxinyou.com/users');
        $this->render($document);
        return true;
    }

    /**
     * /users/signIn
     * 用户登录功能,通过POST传参
     * @param jsonApi array("data"=>array("type"=>"users",
     *                                    "attributes"=>array("cellPhone"=>"手机号",
     *                                                        "password"=>"密码")))
     * @return jsonApi
     */
    public function signIn()
    {
        $data = $this->getRequest()->post('data');
        //功能构建 -- 开始
        //领域服务构建 -- 开始
        $guestService = new \User\Service\GuestService(new User());
        //领域服务构建 -- 结束

        if ($guestService->signIn($data['attributes']['cellPhone'], $data['attributes']['password'])) {
            $resource = new Resource($guestService->getUser(), new \User\View\UserSerializer);
            $document = new Document($resource);
        } else {
            $this->getResponse()->setStatusCode(401);

            $document = new Document();
        }
        
        $document->addLink('self', 'http://api.51chengxinyou.com/users/signIn');
        $this->render($document);
        return true;
    }

    /**
     * 对应路由 /users/{id:\d+}/updatePassword
     * 更新用户密码,通过PUT传参,json
     * @param string id 用户id
     * @param jsonApi array("data"=>array("type"=>"users",
     *                                    "attributes"=>array("oldPassword"=>"旧密码",
     *                                                        "password"=>"新密码",
     *                                                        "rePassword"=>重复密码)))
     * @return jsonApi
     */
    public function updatePassword($id)
    {
        // $data = $this->getRequest()->put("data");
    
  //       //领域服务构建 -- 开始
  //      	$vendorService = new \User\Service\MemberService(new User());
  //      	//领域服务构建 -- 结束
  //      	$vendorService->updatePassword($data['attributes']['cellPhone'],$data['attributes']['password'],$data['attributes']['rePassword']);
        // $resource = new Resource($vendorService->getUser(), new \User\View\UserSerializer);
        // $document = new Document($resource);
        // $this->render($document);
        // $document->addLink('self', 'http://api.51chengxinyou.com/users/'.$id.'/updatePassword');
  //       return true;
    }

    /**
     * 对应路由,/users/restPassword/
     * 找回密码,得到验证码后,重置密码功能,通过PUT传参
     *
     * @param jsonApi array("data"=>array("type"=>"users",
     *                                    "attributes"=>array("cellPhone"=>"手机号",
     *                                                        "password"=>"新密码",
     *                                                        "rePassword"=>重复密码,
     *                                                        "code"=>"手机短信验证码")))
     * @return jsonApi
     *
     */
    public function restPassword()
    {
        $data = $this->getRequest()->put("data");
        //领域服务构建 -- 开始
        $guestService = new \User\Service\GuestService(new User());
        //领域服务构建 -- 结束
        //临时设置
        $data['attributes']['code'] = '';

        $guestService->restPassword($data['attributes']['cellPhone'], $data['attributes']['password'], $data['attributes']['code']);
        $resource = new Resource($guestService->getUser(), new \User\View\UserSerializer);
        $document = new Document($resource);
        $document->addLink('self', 'http://api.51chengxinyou.com/users/restPassword');
        $this->render($document);
        return true;
    }
}
