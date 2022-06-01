<?php

namespace StudentLink;

use Throwable;
use StudentLink\StudentLinkServiceException;

class DuplicateEntityException extends StudentLinkServiceException
{
    public function __construct(string $message, $contextData = null, Throwable $rootCause = null)
    {
        parent::__construct(
            $message,
            $contextData,
            parent::ERR_CODE_CONFLICT,
            parent::ERR_TYPE_ERROR,
            $rootCause
        );
    }
}

?>

