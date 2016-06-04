<?php
namespace Product\Command\CommonProductPrice;

use System\Interfaces\Pcommand;
use Product\Service\CommonProductPriceService;
use Product\Model\Product;

/**
 * 删除通用商品价格命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class DeleteCommand implements Pcommand
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
        $mysqlDataArray = array('status'=>STATUS_DELETE,
                                'statusTime'=>$this->commonProductPriceService->getProductPrice()->getStatusTime());
        //拼接更新条件数组
        $conditionArray = array('commonProductPriceId'=>$this->commonProductPriceService->getProductPrice()->getId(),'productId'=>$this->product->getId());

        $row = $this->dbLayer->update($mysqlDataArray, $conditionArray);
        if (!$row) {
            return false;
        }
        $this->commonProductPriceService->getProductPrice()->setStatus(STATUS_DELETE);
        //如果更新成功,删除缓存,这里暂时不重写缓存等后续有时间在更新
        $this->cacheLayer->del($this->commonProductPriceService->getProductPrice()->getId());
        return true;
    }

    public function report()
    {

    }
}
