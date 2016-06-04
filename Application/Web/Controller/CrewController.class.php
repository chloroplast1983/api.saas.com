<?php
namespace Web\Controller;

use System\Classes\Controller;
use Core;
use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Parameters;
use Tobscure\JsonApi\Resource;

/**
 * 员工应用层服务
 * @author chloroplast
 * @version 1.0.20160222
 */
class CrewController extends Controller
{

    /**
     * 对应路由 /crews[/{ids}]
     * GET方法传参
     * 根据用户id获取用户详情,该接口用于:
     * 1. 任何获取saas用户信息页面
     *
     * 示例: /crews?filter[source]=1 获取id(用户id)为xxx的员工
     *      /crews/1,2,3 获取id(用户id)为1,2,3的配送信息
     *
     * @param int $id 用户id
     * @return jsonApi
     */
    public function get(string $ids = '')
    {

        // $filter = $this->getRequest()->get('filter');

        // $source = isset($filter['source']) ? $filter['source'] : 0;
  //       $crews = array();

  //       if(!empty($ids)){
  //       	 $ids = explode(',',$ids);
  //       	foreach($ids as $id){
     //        	$crew = new \Web\Model\Crew();
     //        	$crew->setId($id);
        // 		$crew->setCellPhone('15202939435');
        // 		$crew->setNickName('nickName'.$id);
        // 		$crew->setUserName('crewName'.$id);
        // 		$crew->setRealName('realName'.$id);
        // 		$crew->setWeixinAccount('weixinAccount'.$id);
        // 		$crews[] = $crew;
  //       	}
  //       }elseif(!empty($source)){
  //       	$counts = array(1,2,3);
        // 	foreach($counts as $count){
     //        	$crew = new \Web\Model\Crew();
     //        	$crew->setId($count);
        // 		$crew->setCellPhone('15202939435');
        // 		$crew->setNickName('nickName'.$count);
        // 		$crew->setUserName('crewName'.$count);
        // 		$crew->setRealName('realName'.$count);
        // 		$crew->setWeixinAccount('weixinAccount'.$count);
        //      $crews[] = $crew;
        // 	}
  //       }

        // $collection = new Collection($crews, new \Web\View\CrewSerializer);
        // $document = new Document($collection);
        // $document->addLink('self', 'http://api.51chengxinyou.com/crews');
        // $this->render($document);
  //       return true;
    }

    /**
     * 对应路由 /crews
     * POST方法传参
     *
     * @param jsonApi array("data"=>array("type"=>"deliveredInformation",
     *                                    "attributes"=>array(
     *                                                      "cellPhone"=>"员工手机号",
     *                                                      "nickName"=>"昵称",
     *                                                      "realName"=>"员工真实姓名",
     *                                                      "weixinAccount"=>"微信账户",
     *                                                      "password"=>"员工密码",
     *                                                      "rePassword"=>"员工重复密码"),
     *                                    "relationships"=>array(
     *                                                      "source"=>array(
     *                                                                  "type"=>"shop",
     *                                                                  "id"=>"所属店铺id"
     *                                                               )
     *                                                          )
     *                                  )
     * @return jsonApi
     */
    public function add()
    {

  //       $data = $this->getRequest()->post('data');
  //       // echo json_encode($this->result);
  //       $this->getResponse()->setStatusCode(201);
  //   	$crew = new \Web\Model\Crew();
  //   	$crew->setId(22);
        // $crew->setCellPhone($data['attributes']['cellPhone']);
        // $crew->setNickName($data['attributes']['nickName']);
        // $crew->setRealName($data['attributes']['realName']);
        // $crew->setWeixinAccount($data['attributes']['weixinAccount']);
        // $crew->encryptPassword($data['attributes']['password']);
        // $shop = new \Web\Model\Shop();
        // $shop->setId($data['relationships']['source']['id']);
        // $crew->setSourceShop($shop);
        // $resource = new Resource($crew, new \Web\View\CrewSerializer);
        // // $resource->with(['shop']);
        // $document = new Document($resource);
        // $document->addLink('self', 'http://api.51chengxinyou.com/crews');
        // $this->render($document);
  //       return true;
    }

    /**
     * 对应路由 /crews/signIn
     * 员工登录功能,通过post传参
     * @param jsonApi array("data"=>array("type"=>"crew","attributes"=>array("cellPhone"=>"手机号","password"=>"密码")))
     * @return jsonApi
     */
    public function signIn()
    {
        // $data = $this->getRequest()->post('data');

  //       $crew = new \Web\Model\Crew();
  //       $crew->setId(2);
        // $crew->setCellPhone($data['attributes']['cellPhone']);
        // $resource = new Resource($crew, new \Web\View\CrewSerializer);
        // $document = new Document($resource);
        // $document->addLink('self', 'http://api.51chengxinyou.com/crews/signIn');
        // $this->render($document);
  //       return true;
    }

    /**
     * 对应路由 /crews/{id:\d+}
     * 更新员工信息,通过PUT传参,json
     * @param string id 员工id
     * @param jsonApi array("data"=>array(
     *                                  "type"=>"crew",
     *                                  "attributes"=>array(
     *                                              "nickName"=>"昵称",
     *                                              "realName"=>"员工真实姓名",
     *                                              "weixinAccount"=>"微信账户",
     *                                              "oldPassword"=>"旧密码",
     *                                              "password"=>"新密码",
     *                                              "rePassword"=>重复密码
     *                                              )
     *                                  )
     *                      )
     * @return jsonApi
     * @todo 更新员工信息是否和修改密码区分开
     */
    public function edit($id)
    {
        // $data = $this->getRequest()->put("data");
    
        // $crew = new \Web\Model\Crew();
  //   	$crew->setId(22);
        // $crew->setNickName($data['attributes']['nickName']);
        // $crew->setRealName($data['attributes']['realName']);
        // $crew->setWeixinAccount($data['attributes']['weixinAccount']);
        // $resource = new Resource($crew, new \Web\View\CrewSerializer);
        // $document = new Document($resource);
        // $this->render($document);
        // $document->addLink('self', 'http://api.51chengxinyou.com/crews/'.$id);
  //       return true;
    }
}
