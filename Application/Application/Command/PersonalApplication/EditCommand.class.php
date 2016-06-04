<?php
namespace Application\Command\PersonalApplication;

use System\Interfaces\Pcommand;
use Application\Service\PersonalApplicationService;

/**
 * 拒绝表单命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class EditCommand implements Pcommand
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
        $mysqlDataArray = array('title'=>$this->personalApplicationService->getApplication()->getTitle(),
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
                                'updateTime'=>$this->personalApplicationService->getApplication()->getUpdateTime(),
                                'tourGuide'=>$this->personalApplicationService->getTourGuidePic());

        //拼接更新条件数组
        $conditionArray = array('userId'=>$this->personalApplicationService->getId());

        $row = $this->dbLayer->update($mysqlDataArray, $conditionArray);

        //如果更新成功,删除缓存,这里暂时不重写缓存等后续有时间在更新
        $this->cacheLayer->del($this->personalApplicationService->getId());
        return true;
    }

    public function report()
    {

    }
}
