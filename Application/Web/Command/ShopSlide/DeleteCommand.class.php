<?php
namespace Web\Command\ShopSlide;

use System\Interfaces\Pcommand;
use Web\Model\ShopSlide;
use Web\Model\Shop;

/**
 * 添加配送地址命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class DeleteCommand implements Pcommand
{

    private $shopSlide;
    private $shop;
    /**
     * @Inject("Web\Persistence\ShopSlideDb")
     */
    private $dbLayer;

    /**
     * @Inject("Web\Persistence\ShopSlideCache")
     */
    private $cacheLayer;

    public function __construct(ShopSlide $shopSlide, Shop $shop)
    {
        $this->shopSlide = $shopSlide;
        $this->shop = $shop;
    }

    public function execute()
    {
        //拼接数据库数组
        $mysqlDataArray = array('status'=>STATUS_DELETE,
                                'statusTime'=>$this->shopSlide->getStatusTime());
        //拼接更新条件数组
        $conditionArray = array('shopSlidesId'=>$this->shopSlide->getId(),'userId'=>$this->shop->getId());

        $row = $this->dbLayer->update($mysqlDataArray, $conditionArray);
        if (!$row) {
            return false;
        }
        $this->shopSlide->setStatus(STATUS_DELETE);
        //如果更新成功,删除缓存,这里暂时不重写缓存等后续有时间在更新
        $this->cacheLayer->del($this->shopSlide->getId());
        return true;
    }

    public function report()
    {

    }
}
