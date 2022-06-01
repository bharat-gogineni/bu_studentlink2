<?php

namespace StudentLink\Security;

use StudentLink\Auth\AuthConstants;
use StudentLink\Auth\AuthContext;
use StudentLink\Error\ErrorHandler;

class SecurityManager
{
    private static $instance;
    private function __construct()
    {
    }
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new SecurityManager();
        }
        return self::$instance;
    }
}
