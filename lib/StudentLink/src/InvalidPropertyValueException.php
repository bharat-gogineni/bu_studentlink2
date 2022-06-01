<?php

namespace StudentLink;

use Throwable;
use StudentLink\StudentLinkServiceException;

//This exception is thrown when an entity property fails validation.
class InvalidPropertyValueException extends StudentLinkServiceException
{
    public function __construct(
        string $message,
        $contextData = null,
        int $errorCode = parent::ERR_CODE_NOT_ACCEPTABLE,
        string $errorType = parent::ERR_TYPE_ERROR,
        Throwable $rootCause = null
    )
    {
        parent::__construct(
            $message,
            $contextData,
            empty($errorCode) ? parent::ERR_CODE_NOT_ACCEPTABLE : $errorCode,
            empty($errorType) ? parent::ERR_TYPE_ERROR : $errorType,
            $rootCause
        );
    }
}
