<?php
namespace Product\Command\ProductSlide;

use System\Interfaces\Pcommand;
use Product\Model\ProductSlide;
use Product\Model\Product;

/**
 * 删除商品幻灯片命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class DeleteCommand implements Pcommand
{

    /**
     * @var \Product\Model\ProductSlide 商品幻灯片
     */
    private $productSlide;
    /**
     * @var \Product\Model\Product 商品
     */
    private $product;

    /**
     * @Inject("Product\Persistence\ProductSlideDb")
     */
    private $dbLayer;

    /**
     * @Inject("Product\Persistence\ProductSlideCache")
     */
    private $cacheLayer;

    public function __construct(ProductSlide $productSlide, Product $product)
    {
        $this->productSlide = $productSlide;
        $this->product = $product;
    }

    public function execute()
    {
        //拼接数据库数组
        $mysqlDataArray = array('status'=>STATUS_DELETE,
                                'statusTime'=>$this->productSlide->getStatusTime());
        //拼接更新条件数组
        $conditionArray = array('productSlideId'=>$this->productSlide->getId(),'productId'=>$this->product->getId());

        $row = $this->dbLayer->update($mysqlDataArray, $conditionArray);
        if (!$row) {
            return false;
        }
        $this->productSlide->setStatus(STATUS_DELETE);
        //如果更新成功,删除缓存,这里暂时不重写缓存等后续有时间在更新
        $this->cacheLayer->del($this->productSlide->getId());
        return true;
    }

    public function report()
    {

    }
}
