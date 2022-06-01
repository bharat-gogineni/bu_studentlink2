<?php
namespace StudentLink\Auth;

use StudentLink\Auth\AuthContext;
use StudentLink\Auth\AuthConstants;

class AuthSuccessListener
{
    private $userService;

    public function __construct($userService)
    {
        $this->userService = $userService;
    }

    public function loadUserDetails($params)
    {
        foreach ($params as $key => $value) {
            AuthContext::put($key, $value);
            $result = $this->userService->getUserContextDetails($value);
            if (isset($result) && count($result)==0) {
                return [];
            }
            AuthContext::put(AuthConstants::NAME, $result['fname']." ".$result['lname']);
            AuthContext::put(AuthConstants::USER_ID, $result['id']);
        }
    }
}
