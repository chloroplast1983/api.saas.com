<?php
namespace Web\View;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Resource;

class ShopSerializer extends AbstractSerializer
{

    protected $type = 'shop';

    public function getAttributes($shop, array $fields = null)
    {

        return [
            'contactPeoplePhone'  => $shop->getContactPeoplePhone(),
            'title'  => $shop->getTitle(),
            'contactPeople' => $shop->getContactPeople(),
            'contactPeopleQQ' => $shop->getContactPeopleQQ(),
            'address' => $shop->getAddress(),
            'createTime' => $shop->getCreateTime(),
            'statusTime' => $shop->getStatusTime(),
            'status' => $shop->getStatus()
        ];
    }

    public function getId($shop)
    {
        
        return $shop->getId();
    }

    public function getLinks($shop)
    {
        return ['self' => '/shops/' . $shop->getId()];
    }

    public function province($shop)
    {
        $province = new Resource($shop->getProvince(), new \Area\View\AreaSerializer);
        return new Relationship($province);
    }

    public function city($shop)
    {
        $city = new Resource($shop->getCity(), new \Area\View\AreaSerializer);
        return new Relationship($city);
    }

    public function productTypes($shop)
    {
        $productTypes = new Collection($shop->getProductTypeList(), new \Web\View\ProductTypeSerializer);
        return new Relationship($productTypes);
    }
}
