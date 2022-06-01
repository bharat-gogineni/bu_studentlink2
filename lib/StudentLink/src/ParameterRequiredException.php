<?php

namespace StudentLink;

use Throwable;
use StudentLink\StudentLinkServiceException;

class ParameterRequiredException extends StudentLinkServiceException
{
    public function __construct(
        string $message,
        $contextData = null,
        int $errorCode = parent::ERR_CODE_UNPROCESSABLE_ENTITY,
        string $errorType = parent::ERR_TYPE_ERROR,
        Throwable $rootCause = null
    )
    {
        parent::__construct(
            $message,
            $contextData,
            empty($errorCode) ? parent::ERR_CODE_UNPROCESSABLE_ENTITY : $errorCode,
            empty($errorType) ? parent::ERR_TYPE_ERROR : $errorType,
            $rootCause
        );
    }
}

?>

