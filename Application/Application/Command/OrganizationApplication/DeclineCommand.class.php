<?php
namespace Application\Command\OrganizationApplication;

use System\Interfaces\Pcommand;
use Application\Service\OrganizationApplicationService;

/**
 * 审核表单命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class DeclineCommand implements Pcommand
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
        $mysqlDataArray = array('status'=>APPLICATION_DECLINE,
                                'statusTime'=>$this->organizationApplicationService->getApplication()->getStatusTime());
        //拼接更新条件数组
        $conditionArray = array('userId'=>$this->organizationApplicationService->getApplication()->getId());

        $row = $this->dbLayer->update($mysqlDataArray, $conditionArray);
        if (!$row) {
            return false;
        }
        $this->organizationApplicationService->getApplication()->setStatus(APPLICATION_DECLINE);
        //如果更新成功,删除缓存,这里暂时不重写缓存等后续有时间在更新
        $this->cacheLayer->del($this->organizationApplicationService->getApplication()->getId());
        return true;
    }

    public function report()
    {

    }
}
