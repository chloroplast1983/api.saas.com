<?php
namespace Application\View;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Resource;
use Tobscure\JsonApi\Collection;
use Core;

class OrganizationApplicationSerializer extends AbstractSerializer
{

    protected $type = 'organizationApplication';

    public function getAttributes($organizationApplication, array $fields = null)
    {

        return [
            'id' => $organizationApplication->getApplication()->getId(),
            'title'  => $organizationApplication->getApplication()->getTitle(),
            'contactPeople'  => $organizationApplication->getApplication()->getContactPeople(),
            'contactPeoplePhone' => $organizationApplication->getApplication()->getContactPeoplePhone(),
            'contactPeopleQQ' => $organizationApplication->getApplication()->getContactPeopleQQ(),
            'address' => $organizationApplication->getApplication()->getAddress(),
            'identifyCardFrontPhoto' => $organizationApplication->getApplication()->getIdentifyCardFrontPhoto(),
            'identifyCardBackPhoto' => $organizationApplication->getApplication()->getIdentifyCardBackPhoto(),
            'businessLicenseCertificatePic' => $organizationApplication->getBusinessLicenseCertificatePic(),
            'authorizationCertificatePic' => $organizationApplication->getAuthorizationCertificatePic(),
            'recordRegistrationPic'=> $organizationApplication->getRecordRegistrationPic(),
            'bankCardHolderName' => $organizationApplication->getApplication()->getBankCardHolderName(),
            'bankCardNumber' => $organizationApplication->getApplication()->getBankCardNumber(),
            'bankCardCellphone' => $organizationApplication->getApplication()->getBankCardCellphone(),
            'updateTime' => $organizationApplication->getApplication()->getUpdateTime(),
            'createTime' => $organizationApplication->getApplication()->getCreateTime(),
            'status' => $organizationApplication->getApplication()->getStatus(),
            'type' => $organizationApplication->getType(),
        ];
    }

    public function getId($organizationApplication)
    {
        
        return $organizationApplication->getApplication()->getId();
    }

    // public function getLinks($bankAccount) {
    //     return ['self' => '/users/' . $bankAccount->getUser()->getId().'/bankAccounts/'.$bankAccount->getId()];
    // }

    public function user($organizationApplication)
    {
        $user = new Resource($organizationApplication->getApplication()->getUser(), new \User\View\UserSerializer);
        return new Relationship($user);
    }

    public function province($organizationApplication)
    {
        $province = new Resource($organizationApplication->getApplication()->getProvince(), new \Area\View\AreaSerializer);
        return new Relationship($province);
    }

    public function city($organizationApplication)
    {
        $city = new Resource($organizationApplication->getApplication()->getCity(), new \Area\View\AreaSerializer);
        return new Relationship($city);
    }

    // public function identifyCardFrontPhoto($organizationApplication){
    //     //这里是临时从仓库获取,后续需要改成批量获取
    //     //仓库调用 -- 开始
    //     $repository = Core::$_container->get('Common\Repository\File\FileRepository');
    //     //仓库调用 -- 结束
    //     $file = $repository->getOne($organizationApplication->getApplication()->getIdentifyCardFrontPhoto());
    //     $certificateFileService = new \Common\Service\CertificateFileService($file);
    //     $identifyCardFrontPhoto = new Resource($certificateFileService, new \Common\View\CertificateFileSerializer);
    //     return new Relationship($identifyCardFrontPhoto);
    // }

    // public function identifyCardBackPhoto($organizationApplication){
    //     //这里是临时从仓库获取,后续需要改成批量获取
    //     //仓库调用 -- 开始
    //     $repository = Core::$_container->get('Common\Repository\File\FileRepository');
    //     //仓库调用 -- 结束
    //     $file = $repository->getOne($organizationApplication->getApplication()->getIdentifyCardBackPhoto());
    //     $certificateFileService = new \Common\Service\CertificateFileService($file);
    //     $identifyCardBackPhoto = new Resource($certificateFileService, new \Common\View\CertificateFileSerializer);
    //     return new Relationship($identifyCardBackPhoto);
    // }

    // public function businessLicenseCertificatePic($organizationApplication){
    //     //这里是临时从仓库获取,后续需要改成批量获取
    //     //仓库调用 -- 开始
    //     $repository = Core::$_container->get('Common\Repository\File\FileRepository');
    //     //仓库调用 -- 结束
    //     $file = $repository->getOne($organizationApplication->getBusinessLicenseCertificatePic());
    //     $certificateFileService = new \Common\Service\CertificateFileService($file);
    //     $businessLicenseCertificatePic = new Resource($certificateFileService, new \Common\View\CertificateFileSerializer);
    //     return new Relationship($businessLicenseCertificatePic);
    // }

    // public function authorizationCertificatePic($organizationApplication){
    //     //这里是临时从仓库获取,后续需要改成批量获取
    //     //仓库调用 -- 开始
    //     $repository = Core::$_container->get('Common\Repository\File\FileRepository');
    //     //仓库调用 -- 结束
    //     $file = $repository->getOne($organizationApplication->getAuthorizationCertificatePic());
    //     $certificateFileService = new \Common\Service\CertificateFileService($file);
    //     $authorizationCertificatePic = new Resource($certificateFileService, new \Common\View\CertificateFileSerializer);
    //     return new Relationship($authorizationCertificatePic);
    // }

    // public function recordRegistrationPic($organizationApplication){
    //     //这里是临时从仓库获取,后续需要改成批量获取
    //     //仓库调用 -- 开始
    //     $repository = Core::$_container->get('Common\Repository\File\FileRepository');
    //     //仓库调用 -- 结束
    //     $file = $repository->getOne($organizationApplication->getRecordRegistrationPic());
    //     $certificateFileService = new \Common\Service\CertificateFileService($file);
    //     $recordRegistrationPic = new Resource($certificateFileService, new \Common\View\CertificateFileSerializer);
    //     return new Relationship($recordRegistrationPic);
    // }
}
