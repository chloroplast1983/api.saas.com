<?php
namespace Web\View;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Resource;

class ProductTypeSerializer extends AbstractSerializer
{

    protected $type = 'productType';

    public function getAttributes($productType, array $fields = null)
    {

        return [
            'name' => $productType->getName(),
            'createTime' => $productType->getCreateTime(),
            'statusTime' => $productType->getStatusTime(),
            'status' => $productType->getStatus(),
        ];
    }

    public function getId($productType)
    {
        
        return $productType->getId();
    }

    public function getLinks($productType)
    {
        return ['self' => '/productTypes/' . $productType->getId()];
    }

    public function user($productType)
    {
        $user = new Resource($productType->getUser(), new \User\View\UserSerializer);
        return new Relationship($user);
    }
}
