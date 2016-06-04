<?php
namespace Common\View;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Resource;

class CertificateFileSerializer extends AbstractSerializer
{

    //临时,这里需要修改
    protected $type = 'imgFile';

    public function getAttributes($certificateFileService, array $fields = null)
    {
        return [
            'filePath' => $certificateFileService->getFile()->getFileURL(),
        ];
    }

    public function getId($certificateFileService)
    {
        
        return $certificateFileService->getFile()->getId();
    }
}
