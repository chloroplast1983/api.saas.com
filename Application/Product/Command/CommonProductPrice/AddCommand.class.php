<?php
namespace Product\Command\CommonProductPrice;

use System\Interfaces\Pcommand;
use Product\Service\CommonProductPriceService;
use Product\Model\Product;

/**
 * 添加通用商品价格命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class AddCommand implements Pcommand
{

    /**
     * @var \Product\Service\CommonProductPriceService 通用商品价格
     */
    private $commonProductPriceService;
    /**
     * @var \Product\Model\Product 商品
     */
    private $product;

    /**
     * @Inject("Product\Persistence\ProductPriceCommonDb")
     */
    private $dbLayer;

    /**
     * @Inject("Product\Persistence\ProductPriceCommonCache")
     */
    private $cacheLayer;

    public function __construct(CommonProductPriceService $commonProductPriceService, Product $product)
    {
        $this->commonProductPriceService = $commonProductPriceService;
        $this->product = $product;
    }

    public function execute()
    {
        //拼接数据库数组
        $mysqlDataArray = array('productId'=>$this->product->getId(),
                                'specification'=>$this->commonProductPriceService->getSpecification(),
                                'status'=>$this->commonProductPriceService->getProductPrice()->getStatus(),
                                'statusTime'=>$this->commonProductPriceService->getProductPrice()->getStatusTime(),
                                'price'=>$this->commonProductPriceService->getProductPrice()->getPrice(),
                                'createTime'=>$this->commonProductPriceService->getProductPrice()->getCreateTime());

        //写入数据库,如果成功,写入缓存
        $id = $this->dbLayer->insert($mysqlDataArray, true);
        if (!$id) {
            return false;
        }

        //返回用户主键id,写会$user对象,为领域服务间互相调用服务
        $this->commonProductPriceService->getProductPrice()->setId($id);
        return true;
    }

    public function report()
    {

    }
}
