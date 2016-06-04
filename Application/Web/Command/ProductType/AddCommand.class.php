<?php
namespace Web\Command\ProductType;

use System\Interfaces\Pcommand;
use Web\Model\ProductType;

/**
 * 添加商品分类命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class AddCommand implements Pcommand
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
        $mysqlDataArray = array('name'=>$this->productType->getName(),
                                'userId'=>$this->productType->getUser()->getId(),
                                'createTime'=>$this->productType->getCreateTime(),
                                'updateTime'=>$this->productType->getUpdateTime(),
                                'status'=>$this->productType->getStatus(),
                                'statusTime'=>$this->productType->getStatusTime());

        //写入数据库,如果成功,写入缓存
        $id = $this->dbLayer->insert($mysqlDataArray, true);
        if (!$id) {
            return false;
        }

        //返回用户主键id,写会$user对象,为领域服务间互相调用服务
        $this->productType->setId($id);
        return true;
    }

    public function report()
    {

    }
}
