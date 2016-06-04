<?php
namespace Application\Controller;

use System\Classes\Controller;
use Core;
use Application\Model\Application;
use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Parameters;
use Tobscure\JsonApi\Resource;
use Application\Service\OrganizationApplicationService;

/**
 * 商户审核表应用层服务
 * @author chloroplast
 * @version 1.0.20160222
 */
class OrganizationApplicationController extends Controller
{
    /**
     * 对应路由 /organizationApplications[/{ids}]
     * GET方法传参
     * 根据id获取用户商户审核表,该接口用于:
     * 1. 获取该用户商户审核表详细信息
     *
     * 示例: /organizationApplications/1,2 获取id为1,2的商户审核表
     * /organizationApplications?page[number]=5&page[size]=20 从第5页开始取数据,每页取20条 *
     *
     * @todo filter
     * @todo 分页
     * @param int $id 用户id
     * @return jsonApi
     */
    public function get(string $ids = '')
    {
       
        //仓库调用 -- 开始
        $repository = Core::$_container->get('Application\Repository\OrganizationApplication\OrganizationApplicationRepository');
        //仓库调用 -- 结束
        $collection = null;

        if (!empty($ids)) {
            if (is_numeric($ids)) {
                $organizationApplicationService = $repository -> getOne($ids);
                if ($organizationApplicationService instanceof OrganizationApplicationService) {
                    $organizationApplicationList = array($organizationApplicationService);
                    $collection = new collection($organizationApplicationList, new \Application\View\OrganizationApplicationSerializer);
                    $collection->with(['province','city']);
                }
            } else {
                $ids = explode(',', $ids);
                $organizationApplicationList = $repository->getList($ids);
                $collection = new collection($organizationApplicationList, new \Application\View\OrganizationApplicationSerializer);
            }
        } else {
            $parameters = new Parameters($this->getRequest()->get());
            $filter = array();
            $sort = array();
            // $filter = $this->getRequest()->get('filter');
            $limit = $parameters->getLimit(100); // 20
            $offset = $parameters->getOffset($limit); // 80
            $organizationApplicationList = $repository->filter($filter, $sort, $offset, $limit);
            $collection = new collection($organizationApplicationList, new \Application\View\OrganizationApplicationSerializer);
        }

        $document = new Document($collection);
        $document->addLink('self', 'http://api.51chengxinyou.com/organizationApplications');
        $this->render($document);
        return true;
    }

    /**
     * 对应路由 /organizationApplications/approve/{id:\d+}
     * PUT方法传参
     * 根据id审核通过用户商户审核表,开通店铺
     */
    public function approve($id)
    {

        //仓库调用 -- 开始
        $repository = Core::$_container->get('Application\Repository\OrganizationApplication\OrganizationApplicationRepository');
        $organizationApplicationService = $repository -> getOne($id);
        //仓库调用 -- 结束

        //调用领域服务 -- 开始
        $unverifiedOrganizationApplicationService = new \Application\Service\UnverifiedOrganizationApplicationService($organizationApplicationService);
        //调用领域服务 -- 结束

        $unverifiedOrganizationApplicationService->approve();

        $resource = new Resource($organizationApplicationService, new \Application\View\OrganizationApplicationSerializer);
        $resource->with(['user','province','city']);
        $document = new Document($resource);
        $document->addLink('self', 'http://api.51chengxinyou.com/organizationApplications/approve/'.$id);
        $this->render($document);
        return true;
    }

    /**
     * 对应路由 /organizationApplications/decline/{id:\d+}
     * PUT方法传参
     * 根据id拒绝用户商户审核表
     */
    public function decline($id)
    {

        //调用领域服务 -- 开始
        $organizationApplicationService = new \Application\Service\OrganizationApplicationService(new Application($id));
        //调用领域服务 -- 结束

        $organizationApplicationService->decline();

        $resource = new Resource($organizationApplicationService, new \Application\View\OrganizationApplicationSerializer);
        $resource->with(['user','province','city']);
        $document = new Document($resource);
        $document->addLink('self', 'http://api.51chengxinyou.com/organizationApplications/approve/'.$id);
        $this->render($document);
        return true;
    }

    /**
     * 对应路由 /organizationApplications
     * PUT方法传参
     * @param jsonApi array("data"=>array("type"=>"organizationApplications",
     *                                    "attributes"=>array("id"=>"用户id",
     *                                                        "title"=>"商户名称",
     *                                                        "contactPeople"=>"联系人",
     *                                                        "contactPeoplePhone"=>"联系人电话",
     *                                                        "contactPeopleQQ"=>"联系人QQ",
     *                                                        "address"=>"地址",
     *                                                        "identifyCardFrontPhoto"=>"身份证正面照片id",
     *                                                        "identifyCardBackPhoto"=>"身份证背面身照片id",
     *                                                        "bankCardHolderName"=>"银行持卡人姓名",
     *                                                        "bankCardNumber"=>"卡号",
     *                                                        "bankCardCellphone"=>"银行预留手机",
     *                                                 "businessLicenseCertificatePic"=>"店铺营业执照图片id",
     *                                                        "authorizationCertificatePic"=>"授权书图片id",
     *                                                        "recordRegistrationPic"=>"备案登记证明图片id",
     *                                                        "type"=>"商户类别"
     *                                                        ),
     *                                     "relationships"=>array(
     *                                                        "province"=>array("type"=>"area",
     *                                                              "id"=>"省id"),
     *                                                         "city"=>array("type"=>"area",
     *                                                                "id"=>"市id"),
     *                                                          )
     *                                   )
     *                      )
     * @return jsonApi
     */
    public function apply()
    {
        $data = $this->getRequest()->post('data');
        $relationships = $data['relationships'];
        $this->getResponse()->setStatusCode(201);

        $application = new Application($data['attributes']['id']);
        $application->setTitle($data['attributes']['title']);
        $application->setContactPeople($data['attributes']['contactPeople']);
        $application->setContactPeoplePhone($data['attributes']['contactPeoplePhone']);
        $application->setContactPeopleQQ($data['attributes']['contactPeopleQQ']);
        $application->setProvince(new \Area\Model\Area($relationships['province']['id'], 'province'));
        $application->setCity(new \Area\Model\Area($relationships['city']['id'], 'city'));
        $application->setAddress($data['attributes']['address']);
        $application->setIdentifyCardFrontPhoto($data['attributes']['identifyCardFrontPhoto']);
        $application->setIdentifyCardBackPhoto($data['attributes']['identifyCardBackPhoto']);
        $application->setBankCardHolderName($data['attributes']['bankCardHolderName']);
        $application->setBankCardNumber($data['attributes']['bankCardNumber']);
        $application->setBankCardCellphone($data['attributes']['bankCardCellphone']);

        //调用领域服务 -- 开始
        $organizationApplicationService = new \Application\Service\OrganizationApplicationService($application);
        //调用领域服务 -- 结束
        
        $organizationApplicationService->setBusinessLicenseCertificatePic($data['attributes']['businessLicenseCertificatePic']);
        $organizationApplicationService->setAuthorizationCertificatePic($data['attributes']['authorizationCertificatePic']);
        $organizationApplicationService->setRecordRegistrationPic($data['attributes']['recordRegistrationPic']);
        $organizationApplicationService->setType($data['attributes']['type']);

        //提交表单
        $organizationApplicationService->apply();

        $resource = new Resource($organizationApplicationService, new \Application\View\OrganizationApplicationSerializer);
        $resource->with(['province','city']);
        $document = new Document($resource);
        $document->addLink('self', 'http://api.51chengxinyou.com/organizationApplications/approve/'.$data['attributes']['id']);
        $this->render($document);
        return true;
    }

    /**
     * 对应路由 /users/organizationApplications/{id:\d+}
     * PUT方法传参
     * @param jsonApi array("data"=>array("type"=>"organizationApplications",
     *                                    "id"=>申请表单id,
     *                                    "attributes"=>array("title"=>"商户名称",
     *                                                        "contactPeople"=>"联系人",
     *                                                        "contactPeoplePhone"=>"联系人电话",
     *                                                        "contactPeopleQQ"=>"联系人QQ",
     *                                                        "address"=>"地址",
     *                                                        "identifyCardFrontPhoto"=>"身份证正面照片id",
     *                                                        "identifyCardBackPhoto"=>"身份证背面身照片id",
     *                                                        "bankCardHolderName"=>"银行持卡人姓名",
     *                                                        "bankCardNumber"=>"卡号",
     *                                                        "bankCardCellphone"=>"银行预留手机",
     *                                                 "businessLicenseCertificatePic"=>"店铺营业执照图片id",
     *                                                        "authorizationCertificatePic"=>"授权书图片id",
     *                                                        "recordRegistrationPic"=>"备案登记证明图片id",
     *                                                        "type"=>"商户类别"
     *                                                        ),
     *                                     "relationships"=>array(
     *                                                        "areas"=>array(
     *                                                                  array("type"=>"areas",
     *                                                                        "id"=>"省id"),
     *                                                                  array("type"=>"areas",
     *                                                                        "id"=>"市id"),
     *                                                               )
     *                                                          )
     *                                   )
     *                      )
     * @return jsonApi
     */
    public function edit($id)
    {
    
        $data = $this->getRequest()->put('data');
        $relationships = $data['relationships'];

        //调用领域服务 -- 开始
        $organizationApplicationService = new \Application\Service\OrganizationApplicationService(new Application($id));
        //调用领域服务 -- 结束
        //赋值 -- 开始
        $organizationApplicationService->getApplication()->setTitle($data['attributes']['title']);
        $organizationApplicationService->getApplication()->setContactPeople($data['attributes']['contactPeople']);
        $organizationApplicationService->getApplication()->setContactPeoplePhone($data['attributes']['contactPeoplePhone']);
        $organizationApplicationService->getApplication()->setContactPeopleQQ($data['attributes']['contactPeopleQQ']);
        $organizationApplicationService->getApplication()->setProvince(new \Area\Model\Area($relationships['province']['id'], 'province'));
        $organizationApplicationService->getApplication()->setCity(new \Area\Model\Area($relationships['city']['id'], 'city'));
        $organizationApplicationService->getApplication()->setAddress($data['attributes']['address']);
        $organizationApplicationService->getApplication()->setIdentifyCardFrontPhoto($data['attributes']['identifyCardFrontPhoto']);
        $organizationApplicationService->getApplication()->setIdentifyCardBackPhoto($data['attributes']['identifyCardBackPhoto']);
        $organizationApplicationService->getApplication()->setBankCardHolderName($data['attributes']['bankCardHolderName']);
        $organizationApplicationService->getApplication()->setBankCardNumber($data['attributes']['bankCardNumber']);
        $organizationApplicationService->getApplication()->setBankCardCellphone($data['attributes']['bankCardCellphone']);
        $organizationApplicationService->setBusinessLicenseCertificatePic($data['attributes']['businessLicenseCertificatePic']);
        $organizationApplicationService->setAuthorizationCertificatePic($data['attributes']['authorizationCertificatePic']);
        $organizationApplicationService->setRecordRegistrationPic($data['attributes']['recordRegistrationPic']);
        $organizationApplicationService->setType($data['attributes']['type']);
        //赋值 -- 结束

        //编辑
        $organizationApplicationService->edit();

        $resource = new Resource($organizationApplicationService, new \Application\View\OrganizationApplicationSerializer);
        $resource->with(['province','city']);
        $document = new Document($resource);
        $document->addLink('self', 'http://api.51chengxinyou.com/organizationApplications/approve/'.$id);
        $this->render($document);
        return true;
    }
}
