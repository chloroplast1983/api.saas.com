<?php
namespace Application\Translator;

use System\Classes\Translator;

class OrganizationApplicationTranslator extends Translator
{

    public function translate(array $expression)
    {

        $applicationTranslator = new ApplicationTranslator();
        $application = $applicationTranslator->translate($expression);
        $organizationApplication = new \Application\Service\OrganizationApplicationService($application);
        $organizationApplication->setBusinessLicenseCertificatePic($expression['businessLicenseCertificate']);
        $organizationApplication->setAuthorizationCertificatePic($expression['authorizationCertificate']);
        $organizationApplication->setRecordRegistrationPic($expression['recordRegistration']);
        $organizationApplication->setType($expression['type']);
        
        return $organizationApplication;
    }
}
