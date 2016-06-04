<?php
namespace Product\Command\Product;

use System\Interfaces\Pcommand;
use Product\Model\Product;

/**
 * 添加商品命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class AddCommand implements Pcommand
{

    private $product;

    /**
     * @Inject("Product\Persistence\ProductDb")
     */
    private $dbLayer;

    /**
     * @Inject("Product\Persistence\ProductCache")
     */
    private $cacheLayer;

    /**
     * @Inject("Product\Persistence\ProductDescriptionDb")
     */
    private $descriptionDbLayer;

    /**
     * @Inject("Product\Persistence\ProductDescriptionCache")
     */
    private $descriptionCacheLayer;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function execute()
    {
        //拼接数据库数组
        $mysqlDataArray = array('name'=>$this->product->getName(),
                                'category'=>$this->product->getCategory(),
                                'updateTime'=>$this->product->getUpdateTime(),
                                'createTime'=>$this->product->getCreateTime(),
                                'statusTime'=>$this->product->getStatusTime(),
                                'status'=>$this->product->getStatus(),
                                'feature'=>$this->product->getFeature(),
                                'userId'=>$this->product->getUser()->getId());

        //写入数据库,如果成功,写入缓存
        $id = $this->dbLayer->insert($mysqlDataArray);
        if (!$id) {
            return false;
        }
        //返回用户主键id,写会$user对象,为领域服务间互相调用服务
        $this->product->setId($id);
        
        //写入内容数据
        $mysqlDataArray = array('productId'=>$id,
                                'description'=>$this->product->getDescription());
        $row = $this->descriptionDbLayer->insert($mysqlDataArray, false);
        if (!$row) {
            return false;
        }
        return true;
    }

    public function report()
    {

    }
}
