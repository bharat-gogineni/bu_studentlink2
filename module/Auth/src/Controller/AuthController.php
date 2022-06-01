<?php

namespace Auth\Controller;

use Auth\Adapter\LoginAdapter as AuthAdapter;
use Auth\Service\AuthService;
use Exception;
use Firebase\JWT\JWT;
use StudentLink\Controller\AbstractApiControllerHelper;
use StudentLink\Encryption\Crypto;
use StudentLink\ServiceException;
use StudentLink\Service\UserService;
use StudentLink\Service\UserTokenService;
use StudentLink\ValidationException;
use StudentLink\EntityNotFoundException;
use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter as ApiAdapter;

class AuthController extends AbstractApiControllerHelper
{
    private $authAdapter;
    private $apiAdapter;
    private $log;
    private $userService;
    private $userTokenService;
    private $authService;

    public function __construct(AuthAdapter $authAdapter, ApiAdapter $apiAdapter, UserService $userService, UserTokenService $userTokenService, AuthService $authService)
    {
        $this->authAdapter = $authAdapter;
        $this->apiAdapter = $apiAdapter;
        $this->log = $this->getLogger();
        $this->userService = $userService;
        $this->userTokenService = $userTokenService;
        $this->authService = $authService;
    }

    public function authAction()
    {
        $data = $this->request->getPost()->toArray();
        $crypto = new Crypto();
        if (isset($data['username']) && isset($data['password'])) {
            $data['username'] = trim($data['username']);
            $this->authAdapter->setIdentity($data['username']);
            $this->authAdapter->setCredential($data['password']);
            $result = $this->authAdapter->authenticate();
        }
        if (isset($result)) {
            if ($result->isValid()) {
                if (isset($data['username']) && isset($data['password'])) {
                    return $this->getJwt($data['username'], $this->userService->getUserAccount($data['username']), 0);
                } elseif (isset($data['apikey'])) {
                    return $this->getApiJwt($data['apikey']);
                }
            }
        }
        return $this->getErrorResponse("Authentication Failure - Incorrect data specified", 404);
    }

    private function getJwt($userName, $accountId, $raw = 0)
    {
        $data = ['username' => $userName, 'accountId' => $accountId];
        $dataJwt = $this->getTokenPayload($data);
        $userDetail = $this->userService->getUserDetailsbyUserName($userName);
        $jwt = $this->generateJwtToken($dataJwt);
        return $this->getSuccessResponseWithData(['jwt' => $jwt, 'username' => $userName,'role'=>$userDetail['role'],'id'=>$userDetail['id']]);
    }

    public function validatetokenAction()
    {
        $data = $this->request->getPost()->toArray();
        try {
            if (isset($data['jwt'])) {
                $tokenPayload = $this->decodeJwtToken($data['jwt']);
                if (is_array($tokenPayload) && !is_object($tokenPayload)) {
                    if ($tokenPayload['Error'] == 'Expired token') {
                        return $this->getErrorResponse("Token Expired");
                    } else {
                        return $this->getErrorResponse("Token Invalid");
                    }
                } else {
                    return $this->getSuccessResponse("Token Valid");
                }
            } else {
                return $this->getErrorResponse("JWT Token Not Found", 404);
            }
        } catch (Exception $e) {
            $this->log->error($e->getMessage(), $e);
            return $this->getErrorResponse("Invalid JWT Token", 404);
        }
    }
    private function getApiJwt($apiKey)
    {
        $data = ['apikey' => $apiKey];
        $dataJwt = $this->getTokenPayload($data);
        $jwt = $this->generateJwtToken($dataJwt);
        if ($jwt) {
            return $this->getSuccessResponseWithData(['jwt' => $jwt]);
        } else {
            return $this->getErrorResponse("Invalid JWT Token", 404, array());
        }
    }

    public function getApiSecret($apiKey)
    {
        $apiSecret = $this->authService->getApiSecret($apiKey);
        return $apiSecret;
    }

    public function userprofAction()
    {
        $data = $this->request->getPost()->toArray();
        try {
            if (isset($data["username"])) {
                $username = $data["username"];
                $res = $this->userService->getUserBaseProfile($username);
                $profilePicUrl = $this->getBaseUrl() . "/user/profile/" . $res["uuid"];
                return $this->getSuccessResponseWithData(['username' => $res["name"], 'profileUrl' => $profilePicUrl]);
            } else {
                return $this->getErrorResponse("Invalid Request", 404);
            }
        } catch (EntityNotFoundException $e) {
            return $this->getErrorResponse("Invalid User", 404);
        } catch (Exception $e) {
            $this->log->error($e->getMessage(), $e);
            return $this->getErrorResponse("Something went wrong", 404);
        }
    }
}
