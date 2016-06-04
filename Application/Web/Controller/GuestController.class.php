<?php
namespace Web\Controller;

use System\Classes\Controller;
use Core;
use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Parameters;
use Tobscure\JsonApi\Resource;
use Web\Model\Guest;

/**
 * 客户应用层服务
 * @author chloroplast
 * @version 1.0.20160222
 */
class GuestController extends Controller
{

    /**
     * 对应路由 /guests[/{ids}]
     * GET方法传参
     * 根据用户id获取用户详情,该接口用于:
     * 1. 任何获取saas用户信息页面
     *
     * 示例: /guests/1,2,3 获取用户id为1的信息
     *      /guests?filter[source]=xxx 获取id(店铺id)为xxx的顾客
     *
     * @param int $id 用户id
     * @return jsonApi
     */
    public function get(string $ids = '')
    {

        //仓库调用 -- 开始
        $repository = Core::$_container->get('Web\Repository\Guest\GuestRepository');
        //仓库调用 -- 结束
        if (!empty($ids)) {
            if (is_numeric($ids)) {
                $guest = $repository -> getOne($ids);
                if ($guest instanceof Guest) {
                    $guestList = array($guest);
                }
            } else {
                $ids = explode(',', $ids);
                $guestList = $repository->getList($ids);
            }
        } else {
            $parameters = new Parameters($this->getRequest()->get());
            // $filter = $this->getRequest()->get('filter');
            $filter = array();
            $sort = array();
            $limit = $parameters->getLimit(100); // 20
            $offset = $parameters->getOffset($limit); // 80
            $guestList = $repository->filter($filter, $sort, $offset, $limit);
        }

        if (!empty($guestList)) {
            $collection = new collection($guestList, new \Web\View\GuestSerializer);
        }
        $document = new Document($collection);
        $document->addLink('self', 'http://api.51chengxinyou.com/guests');
        $this->render($document);
        return true;
    }

    /**
     * 对应路由 /guests
     * 用户注册功能,通过post传参
     * @param jsonApi array("data"=>array("type"=>"guest",
     *                                    "attributes"=>array("cellPhone"=>"手机号",
     *                                                        "password"=>"密码",
     *                                                        "rePassword"=>"重复密码",
     *                                                        "code"=>"验证码")))
     * @return jsonApi
     */
    public function signUp()
    {

        $data = $this->getRequest()->post('data');
        // var_dump($data);
        //领域服务构建 -- 开始
        $unregisteredGuestService = new \Web\Service\UnregisteredGuestService(new Guest());
        //领域服务构建 -- 结束
        //临时设置
        $data['attributes']['code'] = '';

        $unregisteredGuestService->signUp($data['attributes']['cellPhone'], $data['attributes']['password'], $data['attributes']['code']);

        $resource = new Resource($unregisteredGuestService->getGuest(), new \Web\View\GuestSerializer);
        $document = new Document($resource);
        $document->addLink('self', 'http://api.51chengxinyou.com/guests');
        $this->render($document);
        return true;
    }

    /**
     * /guests/signIn
     * 用户登录功能,通过post传参
     * @param jsonApi array("data"=>array("type"=>"guest",
     *                                    "attributes"=>array("cellPhone"=>"手机号",
     *                                                        "password"=>"密码")))
     * @return jsonApi
     */
    public function signIn()
    {
        $data = $this->getRequest()->post('data');

        //领域服务构建 -- 开始
        $unregisteredGuestService = new \Web\Service\UnregisteredGuestService(new Guest());
        //领域服务构建 -- 结束

        if ($unregisteredGuestService->signIn($data['attributes']['cellPhone'], $data['attributes']['password'])) {
            $resource = new Resource($unregisteredGuestService->getGuest(), new \Web\View\GuestSerializer);
            $document = new Document($resource);
        } else {
            $this->getResponse()->setStatusCode(401);

            $document = new Document();
        }
        $document->addLink('self', 'http://api.51chengxinyou.com/guests/signIn');
        $this->render($document);
        return true;
    }

    /**
     * 对应路由 /guests/{id:\d+}/updatePassword
     * 更新用户密码,通过PUT传参,json
     * @param string id 用户id
     * @param jsonApi array("data"=>array("type"=>"guest","attributes"=>array("oldPassword"=>"旧密码","password"=>"新密码","rePassword"=>重复密码)))
     * @return jsonApi
     */
    public function updatePassword($id)
    {
        $data = $this->getRequest()->put("data");
    
        // $guest = new \Web\Model\Guest();
  //       $guest->setId($id);
        // $guest->setCellPhone('15202939435');
        // $resource = new Resource($guest, new \Web\View\GuestSerializer);
        // $document = new Document($resource);
        // $this->render($document);
        // $document->addLink('self', 'http://api.51chengxinyou.com/guests/'.$id.'/updatePassword');
  //       return true;
    }

    /**
     * 对应路由,/guests/restPassword/
     * 找回密码,得到验证码后,重置密码功能,通过PUT传参
     *
     * @param jsonApi array("data"=>array("type"=>"guest",
     *                                    "attributes"=>array("cellPhone"=>"手机号",
     *                                    "password"=>"新密码",
     *                                    "rePassword"=>重复密码,
     *                                    "code"=>"手机短信验证码")))
     * @return jsonApi
     *
     */
    public function restPassword()
    {
        $data = $this->getRequest()->put("data");
        //领域服务构建 -- 开始
        $unregisteredGuestService = new \Web\Service\UnregisteredGuestService(new Guest());
        //领域服务构建 -- 结束

        //临时设置
        $data['attributes']['code'] = '';
        $unregisteredGuestService->restPassword($data['attributes']['cellPhone'], $data['attributes']['password'], $data['attributes']['code']);

        $resource = new Resource($unregisteredGuestService->getGuest(), new \Web\View\GuestSerializer);
        $document = new Document($resource);
        $document->addLink('self', 'http://api.51chengxinyou.com/guests/restPassword');
        $this->render($document);
        return true;
    }
}
