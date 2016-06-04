<?php
namespace Web\View;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Collection;

class GuestSerializer extends AbstractSerializer
{

    protected $type = 'guest';

    public function getAttributes($guest, array $fields = null)
    {

        return [
            'cellPhone'  => $guest->getCellPhone(),
            'userName'  => $guest->getUserName(),
            'nickName'  => $guest->getNickName(),
            'signUpTime' => $guest->getSignUpTime(),
            'userName' => $guest->getUserName(),
            'updateTime' => $guest->getUpdateTime(),
        ];
    }

    public function getId($guest)
    {
        
        return $guest->getId();
    }

    public function getLinks($guest)
    {
        return ['self' => '/guests/' . $guest->getId()];
    }

    // public function shop($guest){
    //     $shop = new Resource($guest->getSourceShop(), new \Web\View\ShopSerializer);
    //     return new Relationship($shop);
    // }
}
