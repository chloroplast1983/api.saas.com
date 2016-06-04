<?php
namespace Web\View;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Resource;

class DeliveredInformationSerializer extends AbstractSerializer
{

    protected $type = 'deliveredInformations';

    public function getAttributes($deliveredInformation, array $fields = null)
    {

        return [
            'consignee'  => $deliveredInformation->getConsignee(),
            'consigneeAddress' => $deliveredInformation->getConsigneeAddress(),
            'consigneePhone' => $deliveredInformation->getConsigneePhone(),
            'consigneePostalCode' => $deliveredInformation->getConsigneePostalCode(),
            'createTime'  => $deliveredInformation->getCreateTime(),
            'updateTime' => $deliveredInformation->getUpdateTime(),
            'status' => $deliveredInformation->getStatus(),
        ];
    }

    public function getId($deliveredInformation)
    {
        
        return $deliveredInformation->getId();
    }

    public function getLinks($deliveredInformation)
    {
        return ['self' => '/deliveredInformations/' . $deliveredInformation->getId()];
    }

    public function guest($deliveredInformation)
    {
        $guest = new Resource($deliveredInformation->getGuest(), new \Web\View\GuestSerializer);
        return new Relationship($guest);
    }


    public function province($deliveredInformation)
    {
        $province = new Resource($deliveredInformation->getProvince(), new \Area\View\AreaSerializer);
        return new Relationship($province);
    }

    public function city($deliveredInformation)
    {
        $city = new Resource($deliveredInformation->getCity(), new \Area\View\AreaSerializer);
        return new Relationship($city);
    }

    public function disrict($deliveredInformation)
    {
        $areas = new Resource($deliveredInformation->getDistrict(), new \Area\View\AreaSerializer);
        return new Relationship($areas);
    }
}
