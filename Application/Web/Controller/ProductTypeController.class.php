<?php
namespace Web\Controller;

use System\Classes\Controller;
use Core;
use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Parameters;
use Tobscure\JsonApi\Resource;

/**
 * 商品分类应用层服务
 * @author chloroplast
 * @version 1.0.20160222
 */
class ProductTypeController extends Controller
{

    /**
     * 对应路由 /productTypes?filter[userId]=xxx
     * GET方法传参
     * 根据用户id获取店铺分裂列表,该接口用于:
     * 1. 用于获取店铺分裂
     *
     * 示例: /productTypes?filter[userId]=1 获取id(用户id)为1店铺的分类
     *
     * @return jsonApi
     */
    public function get()
    {
        $filter = $this->getRequest()->get('filter');
        $parameters = new Parameters($this->getRequest()->get());
        $include = $parameters->getInclude(['user']);

        // var_dump($filter);
        // echo '<br />';
        // var_dump($include);exit();
        $counts = array(1,2,3);
        $productTypes = array();

        foreach ($counts as $count) {
            $productType = new \Web\Model\ProductType();
            $productType->setId($count);
            $user = new \User\Model\User();
            $user->setId($filter['userId']);
            $productType->setUser($user);
            $productType->setName('name'.$count);
            $productTypes[] = $productType;
        }
 
        $collection = new Collection($productTypes, new \Web\View\ProductTypeSerializer);

        $collection->with($include);
        // $collection->fields(['productTypes'=>['statusTime']]);
        $document = new Document($collection);
        $document->addLink('self', 'http://api.51chengxinyou.com/productTypes');
        $this->render($document);
        return true;
    }

    /**
     * 对应路由 /productTypes/{id:\d+}
     * PUT方法传参
     * 根据店铺分类id,修改店铺分类
     * 1. 修改店铺分类名称
     * 2. 更新updateTime
     *
     * 示例: /productTypes/1 更新店铺分类1
     *
     * @param int $id 店铺分类id
     * @param jsonApi array("data"=>array("type"=>"productTypes","attributes"=>array("name"=>"店铺分类名称")))
     * @return jsonApi
     */
    public function edit($id)
    {
        $data = $this->getRequest()->put("data");

        $productType = new \Web\Model\ProductType();
        $productType->setId($id);
        $productType->setName($data['attributes']['name']);

        $resource = new Resource($productType, new \Web\View\ProductTypeSerializer);
        $document = new Document($resource);
        $document->addLink('self', 'http://api.51chengxinyou.com/productTypes');
        $this->render($document);
        return true;
    }

    /**
     * 对应路由 /productTypes
     * POST方法传参
     * 根据店铺分类id,添加店铺分类
     * 1. 添加店铺分类
     *
     * 示例: /productTypes 添加店铺分类
     *
     * @param jsonApi array("data"=>array(
     *                                    "type"=>"productTypes",
     *                                    "attributes"=>array(
     *                                                      "name"=>"店铺分类名称"
     *                                                      ),
     *                                    "relationships"=>array(
     *                                                      "user"=>array(
     *                                                          "type"=>"user",
     *                                                          "id"=>"用户id"
     *                                                          )
     *                                                      )
     *                                      )
     * @return jsonApi
     */
    public function add()
    {
        $this->getResponse()->setStatusCode(201);
        $data = $this->getRequest()->post("data");
        $productType = new \Web\Model\ProductType();
        $user = new \User\Model\User();
        $user->setId($data['relationships']['user']['id']);
        $productType->setUser($user);
        $productType->setId(2);
        $productType->setName($data['attributes']['name']);

        $resource = new Resource($productType, new \Web\View\ProductTypeSerializer);
        $resource->with(array("user"));
        $document = new Document($resource);
        $document->addLink('self', 'http://api.51chengxinyou.com/productTypes');
        $this->render($document);
        return true;
    }

    /**
     * 对应路由 /productTypes/{id:\d+}
     * DELETE方法传参
     * 根据店铺分类id,删除店铺分类
     * 1. 删除店铺分类
     *
     * 示例: /productTypes/1 删除店铺分类
     *
     * @return jsonApi
     */
    public function delete($id)
    {
        $document = new Document();
        $document->setMeta(['key' => 'value']);
        $document->setJsonapi('v1.0');
        $this->render($document);
        return true;
    }
}
