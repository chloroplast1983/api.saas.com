<?php
//通用商品
namespace Product\View;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Resource;
use Core;

class CommonProductServiceSerializer extends AbstractSerializer
{

    protected $type = 'commonProducts';

    public function getAttributes($commonProductService, array $fields = null)
    {

        return [
            'name' => $commonProductService->getProduct()->getName(),
            'createTime' => $commonProductService->getProduct()->getCreateTime(),
            'statusTime' => $commonProductService->getProduct()->getStatusTime(),
            'status' => $commonProductService->getProduct()->getStatus(),
            'updateTime' => $commonProductService->getProduct()->getUpdateTime(),
            'category' => $commonProductService->getProduct()->getCategory(),
            'feature' => $commonProductService->getProduct()->getFeature(),
            'description' => $commonProductService->getProduct()->getDescription(),
        ];
    }

    public function getId($commonProductService)
    {
        
        return $commonProductService->getProduct()->getId();
    }

    public function getLinks($commonProductService)
    {
        return ['self' => '/products/' . $commonProductService->getProduct()->getId()];
    }

    // public function productPrices($commonProductService){
    //     $productPrices = new Collection($commonProductService->getProductPriceList(),new \Product\View\CommonProductPriceServiceSerializer);
    //     return new Relationship($productPrices);
    // }

    public function productType($commonProductService)
    {
        $productType = new Resource($commonProductService->getProductType(), new \Product\View\ProductTypeSerializer);
        return new Relationship($productType);
    }

    public function user($commonProductService)
    {
        $user = new Resource($commonProductService->getProduct()->getUser(), new \User\View\UserSerializer);
        return new Relationship($user);
    }

    // /**
    //  * 需要重构代码
    //  *
    //  */
    // public function produtSlides($commonProductService){

    //     $productSlideList = $commonProductService->getProduct()->getProductSlideList();
    //     //仓库调用 -- 开始
    //     $repository = Core::$_container->get('Common\Repository\File\FileRepository');
    //     //仓库调用 -- 结束
    //     $productSlideIds = $certificateFileServiceList = array();
    //     if(!empty($productSlideList)){
    //         foreach($productSlideList as $productSlide){
    //             $productSlideIds[] = $productSlide->getSlide();
    //         }
    //     }
    
    //     if(!empty($productSlideList)){
    //         $fileList = $repository->getList($productSlideIds);
    //         if(!empty($fileList)){
    //             foreach($fileList as $file){
    //                 $certificateFileServiceList[] = new \Common\Service\CertificateFileService($file);
    //             }
    //         }
    //     }
    //     $productSlideList = new Collection($certificateFileServiceList,new \Common\View\CertificateFileSerializer);
    //      return new Relationship($productSlideList);
    // }
}
