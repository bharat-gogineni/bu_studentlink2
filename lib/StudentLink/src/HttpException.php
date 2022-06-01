<?php

namespace StudentLink;

use Throwable;
use StudentLink\StudentLinkServiceException;

class HttpException extends StudentLinkServiceException
{
    public function __construct(
        string $message,
        int $errorCode = parent::ERR_CODE_NOT_FOUND
    )
    {
        parent::__construct($message, null, empty($errorCode) ? parent::ERR_CODE_NOT_FOUND : $errorCode, parent::ERR_TYPE_ERROR, null);
    }
}

?>

