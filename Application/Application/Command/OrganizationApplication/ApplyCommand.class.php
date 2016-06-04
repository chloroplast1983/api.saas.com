<?php
namespace Application\Command\OrganizationApplication;

use System\Interfaces\Pcommand;
use Application\Service\OrganizationApplicationService;

/**
 * 申请表单命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class ApplyCommand implements Pcommand
{

    private $user;

    /**
     * @Inject("Application\Persistence\OrganizationApplicationDb")
     */
    private $dbLayer;

    /**
     * @Inject("Application\Persistence\OrganizationApplicationCache")
     */
    private $cacheLayer;

    public function __construct(OrganizationApplicationService $organizationApplicationService)
    {
        $this->organizationApplicationService = $organizationApplicationService;
    }

    public function execute()
    {
        //拼接数据库数组
        $mysqlDataArray = array('userId'=>$this->organizationApplicationService->getApplication()->getId(),
                                'title'=>$this->organizationApplicationService->getApplication()->getTitle(),
                                'contactPeople'=>$this->organizationApplicationService->getApplication()->getContactPeople(),
                                'contactPeoplePhone'=>$this->organizationApplicationService->getApplication()->getContactPeoplePhone(),
                                'contactPeopleQQ'=>$this->organizationApplicationService->getApplication()->getContactPeopleQQ(),
                                'province'=>$this->organizationApplicationService->getApplication()->getProvince()->getId(),
                                'city'=>$this->organizationApplicationService->getApplication()->getCity()->getId(),
                                'address'=>$this->organizationApplicationService->getApplication()->getAddress(),
                                'identifyCardFrontPhoto'=>$this->organizationApplicationService->getApplication()->getIdentifyCardFrontPhoto(),
                                'identifyCardBackPhoto'=>$this->organizationApplicationService->getApplication()->getIdentifyCardBackPhoto(),
                                'bankCardHolderName'=>$this->organizationApplicationService->getApplication()->getBankCardHolderName(),
                                'bankCardNumber'=>$this->organizationApplicationService->getApplication()->getBankCardNumber(),
                                'bankCardCellphone'=>$this->organizationApplicationService->getApplication()->getBankCardCellphone(),
                                'createTime'=>$this->organizationApplicationService->getApplication()->getCreateTime(),
                                'updateTime'=>$this->organizationApplicationService->getApplication()->getUpdateTime(),
                                'status'=>$this->organizationApplicationService->getApplication()->getStatus(),
                                'statusTime'=>$this->organizationApplicationService->getApplication()->getStatusTime(),
                                'type'=>$this->organizationApplicationService->getType(),
                                'businessLicenseCertificate'=>$this->organizationApplicationService->getBusinessLicenseCertificatePic(),
                                'authorizationCertificate'=>$this->organizationApplicationService->getAuthorizationCertificatePic(),
                                'recordRegistration'=>$this->organizationApplicationService->getRecordRegistrationPic(),
                                'type'=>$this->organizationApplicationService->getType());

        ////写入数据库,如果成功,写入缓存
        $row = $this->dbLayer->insert($mysqlDataArray, false);
        if (!$row) {
            return false;
        }
        
        return true;
    }

    public function report()
    {

    }
}
