<?php
namespace Product\Command\ProductSlide;

use System\Interfaces\Pcommand;
use Product\Model\ProductSlide;
use Product\Model\Product;

/**
 * 添加商品幻灯片命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class AddCommand implements Pcommand
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
        $mysqlDataArray = array('productId'=>$this->product->getId(),
                                'fileId'=>$this->productSlide->getSlide(),
                                'createTime'=>$this->productSlide->getCreateTime(),
                                'status'=>$this->productSlide->getStatus(),
                                'statusTime'=>$this->productSlide->getStatusTime());

        //写入数据库,如果成功,写入缓存
        $id = $this->dbLayer->insert($mysqlDataArray, true);
        if (!$id) {
            return false;
        }

        //返回用户主键id,写会$user对象,为领域服务间互相调用服务
        $this->productSlide->setId($id);
        return true;
    }

    public function report()
    {

    }
}
