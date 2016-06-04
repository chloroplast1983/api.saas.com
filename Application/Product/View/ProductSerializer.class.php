<?php
//通用商品
namespace Product\View;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Resource;
use Tobscure\JsonApi\Collection;
use Core;

class ProductSerializer extends AbstractSerializer
{

    protected $type = 'products';

    public function getAttributes($product, array $fields = null)
    {

        return [
            'name' => $product->getName(),
            'createTime' => $product->getCreateTime(),
            'statusTime' => $product->getStatusTime(),
            'status' => $product->getStatus(),
            'updateTime' => $product->getUpdateTime(),
            'category' => $product->getCategory(),
            'feature' => $product->getFeature(),
            // 'description' => $product->getDescription(),
        ];
    }

    public function getId($product)
    {
        
        return $product->getId();
    }

    public function getLinks($product)
    {
        return ['self' => '/products/' . $product->getId()];
    }

    public function user($product)
    {
        $user = new Resource($product->getUser(), new \User\View\UserSerializer);
        return new Relationship($user);
    }

    /**
     * 需要重构代码
     */
    public function produtSlides($product)
    {

        $productSlideList = $product->getProductSlideList();
        //仓库调用 -- 开始
        $repository = Core::$_container->get('Common\Repository\File\FileRepository');
        //仓库调用 -- 结束
        $productSlideIds = $certificateFileServiceList = array();
        if (!empty($productSlideList)) {
            foreach ($productSlideList as $productSlide) {
                $productSlideIds[] = $productSlide->getSlide();
            }
        }
        if (!empty($productSlideList)) {
            $fileList = $repository->getList($productSlideIds);
            if (!empty($fileList)) {
                foreach ($fileList as $file) {
                    $certificateFileServiceList[] = new \Common\Service\CertificateFileService($file);
                }
            }
        }
        $productSlideList = new Collection($certificateFileServiceList, new \Common\View\CertificateFileSerializer);
         return new Relationship($productSlideList);
    }
}
