<?php
namespace Web\Controller;

use System\Classes\Controller;
use Core;
use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Parameters;
use Tobscure\JsonApi\Resource;

/**
 * 配送地址应用层服务
 * @author chloroplast
 * @version 1.0.20160222
 */
class ShopController extends Controller
{

    /**
     * 对应路由 /shops/{id:\d+}
     *
     * /shops/1?include=productType 开发
     *
     * GET方法传参
     * 根据用户id获取店铺信息,该接口用于:
     *
     * 示例:
     *
     * @todo 这里暂时只处理单一店铺,后续处理获取店铺列表情况
     * @param string $ids 配送信息id列表
     * @return jsonApi
     */
    public function get(int $id)
    {

         //仓库调用 -- 开始
        $repository = Core::$_container->get('Web\Repository\Shop\ShopRepository');
        //仓库调用 -- 结束
        $shop = $repository->getOne($id);
       
        $shop = new Resource($shop, new \Web\View\ShopSerializer);
        $shop->with(['province','city','productTypes']);
        $document = new Document($shop);
        $document->addLink('self', 'http://api.51chengxinyou.com/shops/'.$id);
        $this->render($document);
        return true;
    }
}
