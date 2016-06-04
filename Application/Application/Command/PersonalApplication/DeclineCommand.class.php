<?php
namespace Application\Command\PersonalApplication;

use System\Interfaces\Pcommand;
use Application\Service\PersonalApplicationService;

/**
 * 拒绝表单命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class DeclineCommand implements Pcommand
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
        $mysqlDataArray = array('status'=>APPLICATION_DECLINE,
                                'statusTime'=>$personalApplicationService->getApplication()->getStatusTime());
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
