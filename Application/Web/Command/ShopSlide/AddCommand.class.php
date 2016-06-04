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

class AddCommand implements Pcommand
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
        $mysqlDataArray = array('userId'=>$this->shop->getId(),
                                'fileId'=>$this->shopSlide->getSlide(),
                                'createTime'=>$this->shopSlide->getCreateTime(),
                                'status'=>$this->shopSlide->getStatus(),
                                'statusTime'=>$this->shopSlide->getStatusTime());

        ////写入数据库,如果成功,写入缓存
        $id = $this->dbLayer->insert($mysqlDataArray, true);
        if (!$id) {
            return false;
        }

        //返回用户主键id,写会$user对象,为领域服务间互相调用服务
        $this->shopSlide->setId($id);
        return true;
    }

    public function report()
    {

    }
}
