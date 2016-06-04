<?php
namespace Product\Controller;

use System\Classes\Controller;
//这段需要封装 -- 开始
use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Parameters;
use Tobscure\JsonApi\Resource;
//这段需要封装 -- 开始
use Product\Model\Product;
use Product\Model\ProductPrice;
use Core;

/**
 * 商品应用层服务
 * @author chloroplast
 * @version 1.0.20160222
 */
class IndexController extends Controller
{

    /**
     * 对应路由 /products?filter[userId]=xxx
     * GET方法传参
     * 根据用户id获取店铺分裂列表,该接口用于:
     * 1. 用于获取店铺分裂
     *
     * 示例: /products?filter[userId]=1 获取id(用户id)为1店铺的分类
     *
     * @return jsonApi
     */
    public function get(string $ids = '')
    {

        // $filter = $this->getRequest()->get('filter');
        // $parameters = new Parameters($this->getRequest()->get());
        // $include = $parameters->getInclude(['user','productPrices']);

        // $uid = isset($filter['userId']) ? $filter['userId'] : 0;
        //仓库调用 -- 开始
        $repository = Core::$_container->get('Product\Repository\Product\ProductRepository');
        //仓库调用 -- 结束
        $productList = array();

        $representation = null;

        if (!empty($ids)) {
            if (is_numeric($ids)) {
                $product = $repository->getOne($ids);
                if ($product instanceof Product) {
                    $commonProductService = new \Product\Service\CommonProductService($product);
                    $representation = new Resource($commonProductService, new \Product\View\CommonProductServiceSerializer);
                    $representation->with(['produtSlides']);
                }
                // $productType = new \Web\Model\ProductType();
                // $productType->setId(1);
                // $productType->setName('name');
                // $commonProductService->setProductType($productType);
                // $resource->with($include);
            } else {
                $ids = explode(',', $ids);
                $productList = $repository->getList($ids);
                if (!empty($productList)) {
                    $representation = new Collection($productList, new \Product\View\ProductSerializer);
                    $representation->with(['produtSlides']);
                }
            }
        } else {
            $parameters = new Parameters($this->getRequest()->get());
            $filter = $this->getRequest()->get('filter');
            $sort = array();
            $limit = $parameters->getLimit(100); // 20
            $offset = $parameters->getOffset($limit); // 80
            
            $productList = $repository->filter($filter, $sort, $offset, $limit);
            if (!empty($productList)) {
                $representation = new Collection($productList, new \Product\View\ProductSerializer);
                $representation->with(['produtSlides']);
            }
        }
        
        $document = new Document($representation);
        // $collection->with($include);
        // $collection->fields(['productTypes'=>['statusTime']]);
        
        $document->addLink('self', 'http://api.51chengxinyou.com/products');
        $this->render($document);
        return true;
    }

    /**
     * 对应路由 /products
     * POST方法传参
     * 添加商品
     *
     * 示例: /products 添加商品
     *
     * @param jsonApi array("data"=>array(
     *                                    "type"=>"commonProduct",
     *                                    "attributes"=>array(
     *                                                      "name"=>"商户名称",
     *                                                      "feature"=>"商品特色",
     *                                                      "description"=>"商品描述",
     *                                                      ),
     *                                    "relationships"=>array(
     *                                                      "user"=>array(
     *                                                          "type"=>"user",
     *                                                          "id"=>"用户id"
     *                                                          ),
     *                                                      "productType"=>array(
     *                                                          "type"=>"productType",
     *                                                          "id"=>"商品分类id"
     *                                                           )
     *                                                      )
     *                                      )
     * @return jsonApi
     */
    public function add()
    {

        $data = $this->getRequest()->post("data");

        $this->getResponse()->setStatusCode(201);

        if ($data['type'] == 'commonProduct') {
            $product = new Product($data['relationships']['user']['id']);
            $product->setName($data['attributes']['name']);
            $product->setFeature($data['attributes']['feature']);
            $product->setDescription($data['attributes']['description']);
            $product->setUser(new \User\Model\User($data['relationships']['user']['id']));

            $productSlideInfoList = $data['relationships']['productSlides'];
            foreach ($productSlideInfoList as $productSlideInfo) {
                $productSlide = new \Product\Model\ProductSlide();
                $productSlide->setSlide($productSlideInfo['id']);
                $product->attachProductSlideList($productSlide);
            }
            $commonProductService = new \Product\Service\CommonProductService($product);
            $commonProductService->addProduct();
            // $productType = new \Web\Model\ProductType();
            // $productType->setId($data['relationships']['productType']['id']);
            // $productType->setName('productTypeName'.$data['relationships']['productType']['id']);
            // $commonProductService->setProductType($productType);

            $resource = new Resource($commonProductService, new \Product\View\CommonProductServiceSerializer);
            $resource->with(['user']);
        }
        $document = new Document($resource);
        $document->addLink('self', 'http://api.51chengxinyou.com/products');
        $this->render($document);
        return true;
    }

    /**
     * 对应路由 /products/{id:\d+}
     * PUT方法传参
     * 根据店铺分类id,修改商品
     * 1. 修改商品
     * 2. 更新updateTime
     *
     * 示例: /products/1 更新商品1
     *
     * @param int $id 商品id1
     * @param jsonApi array("data"=>array("type"=>"commonProduct",
     *                                    "attributes"=>array(
     *                                                      "name"=>"商品名称",
     *                                                      "feature"=>"商品特色",
     *                                                      "description"=>"商品描述"),
     *                                    "relationships"=>array(
     *                                                      "productType"=>array(
     *                                                                  "type"=>"productType",
     *                                                                  "id"=>"商品分类id"
     *                                                               )
     *                                                          )
     *                                  )
     * @return jsonApi
     */
    public function edit($id)
    {
        $data = $this->getRequest()->put("data");

        if ($data['type'] == 'commonProduct') {
            $product = new Product($id);
            $product->setName($data['attributes']['name']);
            $product->setFeature($data['attributes']['feature']);
            $product->setDescription($data['attributes']['description']);

            $commonProductService = new \Product\Service\CommonProductService($product);
            $commonProductService->editProduct();

            // $productType = new \Web\Model\ProductType();
            // $productType->setId($data['relationships']['productType']['id']);
            // $productType->setName('productTypeName'.$data['relationships']['productType']['id']);
            // $commonProductService->setProductType($productType);

            $resource = new Resource($commonProductService, new \Product\View\CommonProductServiceSerializer);
        }
        $document = new Document($resource);
        $document->addLink('self', 'http://api.51chengxinyou.com/products/'.$id);
        $this->render($document);
        return true;
    }

    /**
     * 对应路由 /products/{id:\d+}
     * DELETE方法传参
     * 根据店铺分类id,删除店铺分类
     * 1. 删除店铺分类
     *
     * 示例: /products/1 删除店铺分类
     *
     * @return jsonApi
     */
    public function delete($id)
    {

        $product = new Product($id);
        //调用仓库获取商品数据
        //判断商品类别,如果是通用商品则进行如下操作,这里临时这样开发
        $commonProductService = new \Product\Service\CommonProductService($product);
        $commonProductService->deleteProduct();

        $document = new Document();
        $document->setMeta(['key' => 'value']);
        $document->setJsonapi('v1.0');
        $this->render($document);
        return true;
    }

    /**
     * 上架
     * 对应路由 /products/{id:\d+}/on
     * PUT
     * 更新状态,更新statusTime
     * @return jsonApi
     */
    public function on($id)
    {

        $product = new Product($id);
        //调用仓库获取商品数据
        //判断商品类别,如果是通用商品则进行如下操作,这里临时这样开发
        $commonProductService = new \Product\Service\CommonProductService($product);
        $commonProductService->on();

        $resource = new Resource($commonProductService, new \Product\View\CommonProductServiceSerializer);
        $document = new Document($resource);
        $this->render($document);
        return true;
    }

    /**
     * 下架
     * 对应路由 /products/{id:\d+}/off
     * PUT
     * 更新状态,更新statusTime
     */
    public function off($id)
    {

        $product = new Product($id);
        //调用仓库获取商品数据
        //判断商品类别,如果是通用商品则进行如下操作,这里临时这样开发
        $commonProductService = new \Product\Service\CommonProductService($product);
        $commonProductService->off();

        $resource = new Resource($commonProductService, new \Product\View\CommonProductServiceSerializer);
        $document = new Document($resource);
        $this->render($document);
        return true;
    }

    /**
     * 获取商品的价格
     * /products/{productId:\d+}/prices
     * GET
     */
    public function getPrices($productId)
    {

        $collection = null;

        $parameters = new Parameters($this->getRequest()->get());
        //仓库调用 -- 开始
        $repository = Core::$_container->get('Product\Repository\CommonProductPrice\CommonProductPriceRepository');
        //仓库调用 -- 结束
        $limit = $parameters->getLimit(100); // 20
        $offset = $parameters->getOffset($limit); // 80

        $commonProductPriceList = $repository->getListByProduct($productId, $offset, $limit);

        if (!empty($commonProductPriceList)) {
            $collection = new collection($commonProductPriceList, new \Product\View\CommonProductPriceServiceSerializer);
        }
        
        $document = new Document($collection);
        $this->render($document);
        return true;
    }

    /**
     * 增加一条价格
     * /products/{productId:\d+}/prices
     * POST
     * @param jsonApi array("data"=>array(
     *                                    "type"=>"commonProductPrices",
     *                                    "attributes"=>array(
     *                                                      "specification"=>"规格",
     *                                                      "price"=>"价格"),
     *                                                      )
     *                                      )
     */
    public function addPrices($productId)
    {

        $data = $this->getRequest()->post("data");
        $this->getResponse()->setStatusCode(201);

        $productPrice = new ProductPrice();
        $productPrice->setPrice($data['attributes']['price']);
        //需要根据type 判断 commonProductPrices
        $commonProductPriceService = new \Product\Service\CommonProductPriceService($productPrice);
        $commonProductPriceService->setSpecification($data['attributes']['specification']);

        $commonProductPriceService->addToProduct(new Product($productId));

        $resource = new Resource($commonProductPriceService, new \Product\View\CommonProductPriceServiceSerializer);
        $document = new Document($resource);
        $this->render($document);
        return true;
    }

    /**
     * 编辑价格
     * /products/{productId:\d+}/prices/{id:\d+}
     * PUT
     * @param jsonApi array("data"=>array(
     *                                    "type"=>"commonProductPrices",
     *                                    "attributes"=>array(
     *                                                      "specification"=>"规格",
     *                                                      "price"=>"价格"),
     *                                                      )
     *                                      )
     */
    public function editPrices($productId, $id)
    {
        $data = $this->getRequest()->put("data");

        $productPrice = new ProductPrice($id);
        $productPrice->setPrice($data['attributes']['price']);
        //需要根据type 判断 commonProductPrices
        $commonProductPriceService = new \Product\Service\CommonProductPriceService($productPrice);
        $commonProductPriceService->setSpecification($data['attributes']['specification']);

        $commonProductPriceService->editFromProduct(new Product($productId));

        $resource = new Resource($commonProductPriceService, new \Product\View\CommonProductPriceServiceSerializer);
        $document = new Document($resource);
        $this->render($document);
        return true;
    }

    /**
     * 删除价格
     * /products/{productId:\d+}/prices/{id:\d+}
     * DELETE
     */
    public function deletePrices($productId, $id)
    {

        $productPrice = new ProductPrice($id);
        //需要先用productId获取商品详情的类型,然后根据type 判断 commonProductPrices
        $commonProductPriceService = new \Product\Service\CommonProductPriceService($productPrice);
        $commonProductPriceService->deleteFromProduct(new Product($productId));

        $document = new Document();
        $document->setMeta(['key' => 'value']);
        $document->setJsonapi('v1.0');
        $this->render($document);
        return true;
    }
}
