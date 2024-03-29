<?php

namespace StudentLink;

use Throwable;
use StudentLink\StudentLinkServiceException;

class MultipleRowException extends StudentLinkServiceException
{
    public function __construct(
        string $message,
        $contextData = null,
        int $errorCode = parent::ERR_CODE_INTERNAL_SERVER_ERROR,
        string $errorType = parent::ERR_TYPE_ERROR,
        Throwable $rootCause = null
    )
    {
        parent::__construct(
            $message,
            $contextData,
            empty($errorCode) ? parent::ERR_CODE_INTERNAL_SERVER_ERROR : $errorCode,
            empty($errorType) ? parent::ERR_TYPE_ERROR : $errorType,
            $rootCause
        );
    }
}

?>

