<?php
namespace Application\Command\PersonalApplication;

use System\Interfaces\Pcommand;
use Application\Service\PersonalApplicationService;

/**
 * 申请表单命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class ApplyCommand implements Pcommand
{

    private $user;

    /**
     * @Inject("Application\Persistence\PersonalApplicationDb")
     */
    private $dbLayer;

    /**
     * @Inject("Application\Persistence\PersonalApplicationCache")
     */
    private $cacheLayer;

    public function __construct(PersonalApplicationService $personalApplicationService)
    {
        $this->personalApplicationService = $personalApplicationService;
    }

    public function execute()
    {
        //拼接数据库数组
        $mysqlDataArray = array('userId'=>$this->personalApplicationService->getApplication()->getId(),
                                'title'=>$this->personalApplicationService->getApplication()->getTitle(),
                                'contactPeople'=>$this->personalApplicationService->getApplication()->getContactPeople(),
                                'contactPeoplePhone'=>$this->personalApplicationService->getApplication()->getContactPeoplePhone(),
                                'contactPeopleQQ'=>$this->personalApplicationService->getApplication()->getContactPeopleQQ(),
                                'province'=>$this->personalApplicationService->getApplication()->getProvince()->getId(),
                                'city'=>$this->personalApplicationService->getApplication()->getCity()->getId(),
                                'address'=>$this->personalApplicationService->getApplication()->getAddress(),
                                'type'=>$this->personalApplicationService->getApplication()->getType(),
                                'identifyCardFrontPhoto'=>$this->personalApplicationService->getApplication()->getIdentifyCardFrontPhoto(),
                                'identifyCardBackPhoto'=>$this->personalApplicationService->getApplication()->getIdentifyCardBackPhoto(),
                                'bankCardHolderName'=>$this->personalApplicationService->getApplication()->getBankCardHolderName(),
                                'bankCardNumber'=>$this->personalApplicationService->getApplication()->getBankCardNumber(),
                                'bankCardCellphone'=>$this->personalApplicationService->getApplication()->getBankCardCellphone(),
                                'createTime'=>$this->personalApplicationService->getApplication()->getCreateTime(),
                                'updateTime'=>$this->personalApplicationService->getApplication()->getUpdateTime(),
                                'status'=>$this->personalApplicationService->getApplication()->getStatus(),
                                'statusTime'=>$this->personalApplicationService->getApplication()->getStatusTime(),
                                'tourGuide'=>$this->personalApplicationService->getTourGuidePic());

        ////写入数据库,如果成功,写入缓存
        $row = $this->dbLayer->insert($mysqlDataArray);
        if (!$row) {
            return false;
        }
        
        return true;
    }

    public function report()
    {

    }
}
