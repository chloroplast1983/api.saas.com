<?php
namespace Product\Command\Product;

use System\Interfaces\Pcommand;
use Product\Model\Product;

/**
 * 添加商品命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class EditCommand implements Pcommand
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
                                'updateTime'=>$this->product->getUpdateTime(),
                                'feature'=>$this->product->getFeature());

        $conditionArray = array('productId'=>$this->product->getId());
        $row = $this->dbLayer->update($mysqlDataArray, $conditionArray);
        if (!$row) {
            return false;
        }
        $this->cacheLayer->del($this->product->getId());

        //写入内容数据
        $mysqlDataArray = array('description'=>$this->product->getDescription());
        $row = $this->descriptionDbLayer->update($mysqlDataArray, $conditionArray);
        if (!$row) {
            return false;
        }
        $this->descriptionCacheLayer->del($this->product->getId());
        return true;
    }

    public function report()
    {

    }
}
