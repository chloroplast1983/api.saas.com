<?php
namespace Product\Command\Product;

use System\Interfaces\Pcommand;
use Product\Model\Product;

/**
 * 添加商品命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class OnCommand implements Pcommand
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

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function execute()
    {
        //拼接数据库数组
        $mysqlDataArray = array('status'=>PRODUCT_STATUS_ON_SALE,
                                'statusTime'=>$this->product->getStatusTime());
        //拼接更新条件数组
        $conditionArray = array('productId'=>$this->product->getId());

        $row = $this->dbLayer->update($mysqlDataArray, $conditionArray);
        if (!$row) {
            return false;
        }
        $this->product->setStatus(PRODUCT_STATUS_ON_SALE);
        //如果更新成功,删除缓存,这里暂时不重写缓存等后续有时间在更新
        $this->cacheLayer->del($this->product->getId());
        return true;
    }

    public function report()
    {

    }
}
