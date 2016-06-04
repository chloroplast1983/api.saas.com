<?php
namespace Web\Translator;

use System\Classes\Translator;

class CrewGroupTranslator extends Translator
{

    public function translate(array $expression)
    {

        $crewGroup = new \Web\Model\CrewGroup($expression['webUserGroupId']);
        $crewGroup->setName($expression['name']);
        $crewGroup->setCreateTime($expression['createTime']);
        $crewGroup->setUpdateTime($expression['updateTime']);
        $crewGroup->setPurview($expression['purview']);
        $crewGroup->setStatusTime($expression['statusTime']);
        $crewGroup->setStatus($expression['status']);
        return $crewGroup;
    }
}
