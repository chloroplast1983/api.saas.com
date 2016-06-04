<?php
namespace Web\Command\Shop;

use System\Interfaces\Pcommand;
use Web\Model\Shop;

/**
 * 添加初始化店铺命令
 * @author chloroplast
 * @version 1.0.20160222
 */

class AddCommand implements Pcommand
{

    private $Shop;

    /**
     * @Inject("Web\Persistence\ShopDb")
     */
    private $dbLayer;

    /**
     * @Inject("Web\Persistence\ShopCache")
     */
    private $cacheLayer;

    public function __construct(Shop $shop)
    {
        $this->shop = $shop;
    }

    public function execute()
    {
        //拼接数据库数组
        $mysqlDataArray = array('userId'=>$this->shop->getId(),
                                'title'=>$this->shop->getTitle(),
                                'contactPeople'=>$this->shop->getContactPeople(),
                                'contactPeopleQQ'=>$this->shop->getContactPeopleQQ(),
                                'contactPeoplePhone'=>$this->shop->getContactPeoplePhone(),
                                'province'=>$this->shop->getProvince()->getId(),
                                'city'=>$this->shop->getCity()->getId(),
                                'address'=>$this->shop->getAddress(),
                                'createTime'=>$this->shop->getCreateTime(),
                                'statusTime'=>$this->shop->getStatusTime(),
                                'status'=>$this->shop->getStatus(),
                                'updateTime'=>$this->shop->getUpdateTime());
        //写入数据库,如果成功,写入缓存
        $row = $this->dbLayer->insert($mysqlDataArray, false);
        if (!$row) {
            return false;
        }
        
        return true;
    }

    public function report()
    {

    }
}
