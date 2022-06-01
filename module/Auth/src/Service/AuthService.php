<?php
namespace Auth\Service;

use Exception;
use function GuzzleHttp\json_decode;
use StudentLink\Service\AbstractService;
use StudentLink\Utils\ArrayUtils;

class AuthService extends AbstractService
{
    private $table;
    private $userService;
    public function __construct($config, $dbAdapter, $userService)
    {
        parent::__construct($config, $dbAdapter);
        $this->userService = $userService;
    }

    public function getApiSecret($apiKey)
    {
        $queryString = "select secret from ox_api_key";
        $where = 'where api_key = "' . $apiKey . '"';
        $resultSet = $this->executeQuerywithParams($queryString, $where);
        return $resultSet->toArray();
    }
}
