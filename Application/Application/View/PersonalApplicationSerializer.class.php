<?php
namespace Application\View;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Resource;
use Tobscure\JsonApi\Collection;

class PersonalApplicationSerializer extends AbstractSerializer
{

    protected $type = 'personalApplication';

    public function getAttributes($personalApplication, array $fields = null)
    {

        return [
            'id' => $personalApplication->getApplication()->getId(),
            'title'  => $personalApplication->getApplication()->getTitle(),
            'contactPeople'  => $personalApplication->getApplication()->getContactPeople(),
            'contactPeoplePhone' => $personalApplication->getApplication()->getContactPeoplePhone(),
            'contactPeopleQQ' => $personalApplication->getApplication()->getContactPeopleQQ(),
            'address' => $personalApplication->getApplication()->getAddress(),
            'bankCardHolderName' => $personalApplication->getApplication()->getBankCardHolderName(),
            'bankCardNumber' => $personalApplication->getApplication()->getBankCardNumber(),
            'bankCardCellphone' => $personalApplication->getApplication()->getBankCardCellphone(),
            'updateTime' => $personalApplication->getApplication()->getUpdateTime(),
            'createTime' => $personalApplication->getApplication()->getCreateTime(),
            'status' => $personalApplication->getApplication()->getStatus(),
        ];
    }

    public function getId($personalApplication)
    {
        
        return $personalApplication->getApplication()->getId();
    }

    // public function getLinks($bankAccount) {
    //     return ['self' => '/users/' . $bankAccount->getUser()->getId().'/bankAccounts/'.$bankAccount->getId()];
    // }

    public function user($personalApplication)
    {
        $user = new Resource($personalApplication->getApplication()->getUser(), new \User\View\UserSerializer);
        return new Relationship($user);
    }

    public function areas($personalApplication)
    {
        $areas = new Collection(array($personalApplication->getApplication()->getProvince(),$personalApplication->getApplication()->getCity()), new \Area\View\AreaSerializer);
        return new Relationship($areas);
    }

    public function certificates($personalApplication)
    {
        array($personalApplication->getApplication()->getIdentifyCardFrontPhoto(),$personalApplication->getApplication()->getIdentifyCardBackPhoto(),$personalApplication->getTourGuidePic());
    }
}
