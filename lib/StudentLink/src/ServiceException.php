<?php
namespace StudentLink;

use Exception;

class ServiceException extends StudentLinkServiceException
{
    private $messageCode;
    public function __construct(string $message, string $messageCode, int $codeValue = StudentLinkServiceException::ERR_CODE_INTERNAL_SERVER_ERROR)
    {
        parent::__construct($message, null, $codeValue);
        $this->messageCode = $messageCode;
    }

    public function getMessageCode()
    {
        return $this->messageCode;
    }
}
