<?php
namespace StudentLink;

class AccessDeniedException extends StudentLinkServiceException
{
    public function __construct($message)
    {
        parent::__construct($message, null, StudentLinkServiceException::ERR_CODE_UNAUTHORIZED);
    }
}
