<?php
namespace Application\Controller;

use System\Classes\Controller;
use Core;
use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Parameters;
use Tobscure\JsonApi\Resource;

/**
 * 个人审核表应用层服务
 * @author chloroplast
 * @version 1.0.20160222
 */
class PersonalApplicationController extends Controller
{
    /**
     * 对应路由 /personalApplications[/{ids}]
     * GET方法传参
     * 根据id获取用户个人审核表,该接口用于:
     * 1. 获取该用户个人审核表详细信息
     *
     * 示例: /personalApplications/1,2 获取id为1,2的个人审核表
     *
     * @todo filter
     * @todo 分页
     * @param int $id 用户id
     * @return jsonApi
     */
    public function get(string $ids = '')
    {
    
        // $personalApplications = array();

  //       $ids = explode(',',$ids);

  //       foreach($ids as $id){
  //       	$personalApplicationService = new \Application\Service\PersonalApplicationService();
  //       	$application = new \Application\Model\Application();
  //       	$application->setId($id);
  //       	$user = new \User\Model\User();
  //       	$user->setId($id);
  //       	$application->setUser($user);
  //       	$application->setTitle('title');
  //       	$application->setContactPeople('contactPeople');
  //       	$application->setContactPeoplePhone('111');
  //       	$application->setContactPeopleQQ('111');
  //       	$area = new \Area\Model\Area();
  //       	$area->setId($id);
  //       	$area->setName('province');
  //       	$application->setProvince($area);
  //       	$area = new \Area\Model\Area();
  //       	$area->setId($id);
  //       	$area->setName('city');
  //       	$application->setCity($area);
  //       	$application->setAddress('address');
  //       	$application->setIdentifyCardFrontPhoto(1);
  //       	$application->setIdentifyCardBackPhoto(2);
  //       	$application->setBankCardHolderName('bankCardHolderName');
  //       	$application->setBankCardNumber('bankCardNumber');
  //       	$application->setBankCardCellphone('222');
  //       	$personalApplicationService->setApplication($application);
  //       	$personalApplicationService->setTourGuidePic(1);
  //       	$personalApplications[] = $personalApplicationService;
  //       }

  //       $collection = new Collection($personalApplications, new \Application\View\PersonalApplicationSerializer);
  //       $collection->with(['user','areas']);
       
        // $document = new Document($collection);
        // $document->addLink('self', 'http://api.51chengxinyou.com/personalApplications');
        // $this->render($document);
  //       return true;
    }

    /**
     * 对应路由 /personalApplications/approve/{id:\d+}
     * PUT方法传参
     * 根据id审核通过用户个人审核表,开通店铺
     */
    public function approve($id)
    {

        // $personalApplicationService = new \Application\Service\PersonalApplicationService();
  //   	$application = new \Application\Model\Application();
  //   	$application->setId($id);
  //   	$user = new \User\Model\User();
  //   	$user->setId($id);
  //   	$application->setUser($user);
  //   	$application->setTitle('title');
  //   	$application->setContactPeople('contactPeople');
  //   	$application->setContactPeoplePhone('111');
  //   	$application->setContactPeopleQQ('111');
  //   	$area = new \Area\Model\Area();
  //   	$area->setId($id);
  //   	$area->setName('province');
  //   	$application->setProvince($area);
  //   	$area = new \Area\Model\Area();
  //   	$area->setId($id);
  //   	$area->setName('city');
  //   	$application->setCity($area);
  //   	$application->setAddress('address');
  //   	$application->setIdentifyCardFrontPhoto(1);
  //   	$application->setIdentifyCardBackPhoto(2);
  //   	$application->setBankCardHolderName('bankCardHolderName');
  //   	$application->setBankCardNumber('bankCardNumber');
  //   	$application->setBankCardCellphone('222');
  //   	$application->setStatus(APPLICATION_VERIFIED);
  //   	$personalApplicationService->setApplication($application);
  //   	$personalApplicationService->setTourGuidePic(1);

  //   	$resource = new Resource($personalApplicationService, new \Application\View\PersonalApplicationSerializer);
  //       $resource->with(['user','areas']);
        // $document = new Document($resource);
        // $document->addLink('self', 'http://api.51chengxinyou.com/personalApplications/approve/'.$id);
        // $this->render($document);
  //       return true;
    }

    /**
     * 对应路由 /personalApplications/decline/{id:\d+}
     * PUT方法传参
     * 根据id拒绝用户个人审核表
     */
    public function decline($id)
    {

        // $personalApplicationService = new \Application\Service\PersonalApplicationService();
  //   	$application = new \Application\Model\Application();
  //   	$application->setId($id);
  //   	$user = new \User\Model\User();
  //   	$user->setId($id);
  //   	$application->setUser($user);
  //   	$application->setTitle('title');
  //   	$application->setContactPeople('contactPeople');
  //   	$application->setContactPeoplePhone('111');
  //   	$application->setContactPeopleQQ('111');
  //   	$area = new \Area\Model\Area();
  //   	$area->setId($id);
  //   	$area->setName('province');
  //   	$application->setProvince($area);
  //   	$area = new \Area\Model\Area();
  //   	$area->setId($id);
  //   	$area->setName('city');
  //   	$application->setCity($area);
  //   	$application->setAddress('address');
  //   	$application->setIdentifyCardFrontPhoto(1);
  //   	$application->setIdentifyCardBackPhoto(2);
  //   	$application->setBankCardHolderName('bankCardHolderName');
  //   	$application->setBankCardNumber('bankCardNumber');
  //   	$application->setBankCardCellphone('222');
  //   	$application->setStatus(APPLICATION_DECLINE);
  //   	$personalApplicationService->setApplication($application);
  //   	$personalApplicationService->setTourGuidePic(1);

  //     	$resource = new Resource($personalApplicationService, new \Application\View\PersonalApplicationSerializer);
  //       $resource->with(['user','areas']);
        // $document = new Document($resource);
        // $document->addLink('self', 'http://api.51chengxinyou.com/personalApplications/approve/'.$id);
        // $this->render($document);
  //       return true;
    }

    /**
     * 对应路由 personalApplications
     * POST方法传参
     * @param jsonApi array("data"=>array("type"=>"personalApplications","attributes"=>array("id"=>"用户id","title"=>"商户名称","contactPeople"=>"联系人","contactPeoplePhone"=>"联系人电话","contactPeopleQQ"=>"联系人QQ","province"=>"省id","city"=>"市id","address"=>"地址","identifyCardFrontPhoto"=>"身份证正面照片id","identifyCardBackPhoto"=>"身份证背面身照片id","bankCardHolderName"=>"银行持卡人姓名","bankCardNumber"=>"卡号","bankCardCellphone"=>"银行预留手机","tourGuide"=>"导游证图片id")))
     * @return jsonApi
     */
    public function apply($id)
    {
    
        // $data = $this->getRequest()->post('data');
        // $this->getResponse()->setStatusCode(201);

        // $personalApplicationService = new \Application\Service\PersonalApplicationService();
  //   	$application = new \Application\Model\Application();
  //   	$application->setId($id);
  //   	$user = new \User\Model\User();
  //   	$user->setId($id);
  //   	$application->setUser($user);
  //   	$application->setTitle($data['attributes']['title']);
  //   	$application->setContactPeople($data['attributes']['contactPeople']);
  //   	$application->setContactPeoplePhone($data['attributes']['contactPeoplePhone']);
  //   	$application->setContactPeopleQQ($data['attributes']['contactPeopleQQ']);
  //   	$area = new \Area\Model\Area();
  //   	$area->setId($data['attributes']['province']);
  //   	$area->setName('province');
  //   	$application->setProvince($area);
  //   	$area = new \Area\Model\Area();
  //   	$area->setId($data['attributes']['city']);
  //   	$area->setName('city');
  //   	$application->setCity($area);
  //   	$application->setAddress($data['attributes']['address']);
  //   	$application->setIdentifyCardFrontPhoto($data['attributes']['identifyCardFrontPhoto']);
  //   	$application->setIdentifyCardBackPhoto($data['attributes']['identifyCardBackPhoto']);
  //   	$application->setBankCardHolderName($data['attributes']['bankCardHolderName']);
  //   	$application->setBankCardNumber($data['attributes']['bankCardNumber']);
  //   	$application->setBankCardCellphone($data['attributes']['bankCardCellphone']);
  //   	$personalApplicationService->setApplication($application);
  //   	$personalApplicationService->setTourGuidePic($data['attributes']['tourGuide']);

  //     	$resource = new Resource($personalApplicationService, new \Application\View\PersonalApplicationSerializer);
  //       $resource->with(['user','areas']);
        // $document = new Document($resource);
        // $document->addLink('self', 'http://api.51chengxinyou.com/personalApplications/approve/'.$id);
        // $this->render($document);
  //       return true;
    }
}
