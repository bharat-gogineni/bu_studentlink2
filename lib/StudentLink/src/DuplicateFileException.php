<?php

namespace StudentLink;

use Throwable;
use StudentLink\StudentLinkServiceException;

class DuplicateFileException extends StudentLinkServiceException
{
    public function __construct(
        string $message,
        $contextData = null,
        int $errorCode = parent::ERR_CODE_CONFLICT,
        string $errorType = parent::ERR_TYPE_ERROR,
        Throwable $rootCause = null
    )
    {
        parent::__construct(
            $message,
            $contextData,
            empty($errorCode) ? parent::ERR_CODE_CONFLICT : $errorCode,
            empty($errorType) ? parent::ERR_TYPE_ERROR : $errorType,
            $rootCause
        );
    }
}

?>

