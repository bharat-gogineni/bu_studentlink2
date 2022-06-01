<?php
namespace User\Controller;

use StudentLink\Controller\AbstractApiControllerHelper;
use StudentLink\Service\UserService;
use StudentLink\Auth\AuthContext;
use StudentLink\Auth\AuthConstants;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterInterface;
use Exception;

class ForgotPasswordController extends AbstractAPIControllerHelper
{
    private $userService;
    private $log;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->log = $this->getLogger();
    }

    public function forgotPasswordAction()
    {
        $data = $this->extractPostData();
        $username = $data['username'];
        try {
            $responseData = $this->userService->sendResetPasswordCode($username);
            return $this->getSuccessResponseWithData($responseData, 200);
        } catch (Exception $e) {
            $this->log->error($e->getMessage(), $e);
            return $this->exceptionToResponse($e);
        }
    }
    public function resetPasswordAction()
    {
        $data = $this->extractPostData();
        $newPassword = $data['new_password'];
        $confirmPassword = $data['confirm_password'];
        if ($newPassword != $confirmPassword) {
            return $this->getErrorResponse("Passwords do not match", 400);
        }
        try {
            $this->userService->resetPassword($data);
        } catch (Exception $e) {
            $this->log->error($e->getMessage(), $e);
            return $this->exceptionToResponse($e);
        }
        return $this->getSuccessResponse("Password reset successful", 200);
    }
}
