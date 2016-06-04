<?php
namespace User\View;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Collection;

class UserSerializer extends AbstractSerializer
{

    protected $type = 'user';

    public function getAttributes($user, array $fields = null)
    {

        return [
            'cellPhone'  => $user->getCellPhone(),
            'nickName'  => $user->getNickName(),
            'signUpTime' => $user->getSignUpTime(),
            'userName' => $user->getUserName(),
            'updateTime' => $user->getUpdateTime(),
        ];
    }

    public function getId($user)
    {
        
        return $user->getId();
    }

    public function getLinks($user)
    {
        return ['self' => '/users/' . $user->getId()];
    }
}
