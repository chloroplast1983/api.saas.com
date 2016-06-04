<?php
namespace Application\Translator;

use System\Classes\Translator;

class PersonalApplicationTranslator
{
    
    public function translate(array $expression)
    {

        $applicationTranslator = new ApplicationTranslator();
        $application = $applicationTranslator->translate($expression);
        $personalApplication = new \Application\Service\PersonalApplicationService($application);
        $personalApplication->setTourGuidePic($expression['tourGuide']);

        return $personalApplication;
    }
}
