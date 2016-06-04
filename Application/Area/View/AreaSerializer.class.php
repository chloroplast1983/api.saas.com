<?php
namespace Area\View;

use Tobscure\JsonApi\AbstractSerializer;

class AreaSerializer extends AbstractSerializer
{

    protected $type = 'area';

    public function getAttributes($area, array $fields = null)
    {

        return [
            'id' => $area->getId(),
            'name'  => $area->getName(),
        ];
    }

    public function getId($area)
    {
        
        return $area->getId();
    }
}
