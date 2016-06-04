<?php
namespace Web\Command\ProductType;

use System\Interfaces\Pcommand;
use Web\Model\ProductType;

/**
 * 删除商品分类命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class DeleteCommand implements Pcommand
{

    private $ProductType;

    /**
     * @Inject("Web\Persistence\ProductTypeDb")
     */
    private $dbLayer;

    /**
     * @Inject("Web\Persistence\ProductTypeCache")
     */
    private $cacheLayer;

    public function __construct(ProductType $productType)
    {
        $this->productType = $productType;
    }

    public function execute()
    {
        //拼接数据库数组
        $mysqlDataArray = array('status'=>STATUS_DELETE,
                                'statusTime'=>$this->productType->getStatusTime());
        //拼接更新条件数组
        $conditionArray = array('productTypeId'=>$this->productType->getId());

        $row = $this->dbLayer->update($mysqlDataArray, $conditionArray);
        if (!$row) {
            return false;
        }
        $this->productType->setStatus(STATUS_DELETE);
        //如果更新成功,删除缓存,这里暂时不重写缓存等后续有时间在更新
        $this->cacheLayer->del($this->productType->getId());
        return true;
    }

    public function report()
    {

    }
}
