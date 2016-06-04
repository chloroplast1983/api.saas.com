<?php
namespace Web\View;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Resource;

class CrewSerializer extends AbstractSerializer
{

    protected $type = 'crew';

    public function getAttributes($crew, array $fields = null)
    {

        return [
            'cellPhone'  => $crew->getCellPhone(),
            'userName' => $crew->getUserName(),
            'realName' => $crew->getRealName(),
            'weixinAccount' => $crew->getWeixinAccount(),
            'nickName'  => $crew->getNickName(),
            'signUpTime' => $crew->getSignUpTime(),
            'updateTime' => $crew->getUpdateTime(),
        ];
    }

    public function getId($crew)
    {
        
        return $crew->getId();
    }

    public function getLinks($crew)
    {
        return ['self' => '/crews/' . $crew->getId()];
    }

    public function shop($crew)
    {
        $shop = new Resource($crew->getSourceShop(), new \Web\View\ShopSerializer);
        return new Relationship($shop);
    }
}
