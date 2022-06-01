<?php
namespace User\Controller;

use StudentLink\Auth\AuthConstants;
use StudentLink\Auth\AuthContext;
use StudentLink\Controller\AbstractApiController;
use StudentLink\Model\User;
use StudentLink\Model\UserTable;
use StudentLink\Service\UserService;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Ddl\Column\Datetime;
use Zend\View\Model\JsonModel;
use Exception;

class UserController extends AbstractApiController
{
    private $dbAdapter;

    /**
     * @ignore __construct
     */
    public function __construct(UserTable $table, UserService $userService, AdapterInterface $adapterInterface)
    {
        parent::__construct($table, User::class, EmailService::class);
        $this->setIdentifierName('userId');
        $this->userService = $userService;
    }

    /**
     * Create User API
     * @api
     * @link /user
     * @method POST
     * @param array $data Array of elements as shown</br>
     * <code>
     *        gamelevel : string,
     *        username : string,
     *        password : string,
     *        firstname : string,
     *        lastname : string,
     *        name : string,
     *        role : string,
     *        email : string,
     *        status : string,
     *        dob : string,
     *        designation : string,
     *        sex : string,
     *        managerid : string,
     *        cluster : string,
     *        level : string,
     *        org_role_id : string,
     *        doj : string
     * </code>
     * @return array Returns a JSON Response with Status Code and Created User.</br>
     * <code> status : "success|error",
     *        data : array Created User Object
     * </code>
     */
    public function create($data)
    {
        try {
            $params = $this->params()->fromRoute();
            $this->userService->createUser($params, $data);
            return $this->getSuccessResponseWithData($data, 201);
        } catch (Exception $e) {
            $this->log->error($e->getMessage(), $e);
            return $this->exceptionToResponse($e);
        }
        return $this->getSuccessResponseWithData($data, 201);
        /*
    PLease see the html error codes. https://www.restapitutorial.com/httpstatuscodes.html
    Successful create = 201
     */
    }

    /**
     * GET User API
     * @api
     * @link /user[/:userId]
     * @method GET
     * @param $id ID of User to Delete
     * @return array $data
     * @return array Returns a JSON Response with Status Code and Created User.
     * @Route Info: (a=>All Fields, m=>Minimum Fields, d=>Detailed); In future we are planning to add "Detailed" type
     * with more fields to load.
     */
    public function get($id)
    {
        try {
            return $this->getUserInfo($id);
        } catch (Exception $e) {
            $this->log->error($e->getMessage(), $e);
            return $this->exceptionToResponse($e);
        }
    }

    /**
     * GET User API
     * @api
     * @link /user[/:userId]
     * @method GET
     * @param $id ID of User to Delete
     * @return array $data
     * @return array Returns a JSON Response with Status Code and Created User.
     * @Route Info: (a=>All Fields, m=>Minimum Fields, d=>Detailed); In future we are planning to add "Detailed" type
     * with more fields to load.
     */
    public function getUserDetailAction()
    {
        $params = $this->params()->fromRoute();
        $id = AuthContext::get(AuthConstants::USER_ID);
        return $this->getUserInfo($id, $params);
    }

    /**
     * GET List User API
     * @api
     * @link /user
     * @method GET
     * @return array $dataget list of Users
     */
    public function getList()
    {
        $filterParams = $this->params()->fromQuery(); // empty method call
        try {
            $result = $this->userService->getUsers($filterParams, $this->getBaseUrl());
            return $this->getSuccessResponseDataWithPagination($result['data'], $result['total']);
        } catch (Exception $e) {
            $this->log->error($e->getMessage(), $e);
            return $this->exceptionToResponse($e);
        }
    }

    /**
     * Delete User API
     * @api
     * @link /user[/:userId]
     * @method DELETE
     * @param $id ID of User to Delete
     * @return array success|failure response
     */
    public function delete($id)
    {
        try {
            $id = $this->params()->fromRoute();
            $this->userService->deleteUser($id);
        } catch (Exception $e) {
            $this->log->error($e->getMessage(), $e);
            return $this->exceptionToResponse($e);
        }
        return $this->getSuccessResponse();
    }

    /**
     * @param $id
     * @param $params
     * @return JsonModel
     */
    private function getUserInfo($id)
    {
        try {
                $userInfo = $this->userService->getUserWithMinimumDetails($id);
        } catch (Exception $e) {
            $this->log->error($e->getMessage(), $e);
            return $this->exceptionToResponse($e);
        }
        if (empty($userInfo)) {
            return $this->getErrorResponse("User Does not Exist", 404);
        }
        return $this->getSuccessResponseWithData($userInfo);
    }

    public function changePasswordAction()
    {
        $data = $this->extractPostData();
        $userId = AuthContext::get(AuthConstants::USER_ID);
        try {
            $userDetail = $this->userService->getUser($userId, true);
            $oldPassword = md5(sha1($data['old_password']));
            $newPassword = md5(sha1($data['new_password']));
            $confirmPassword = md5(sha1($data['confirm_password']));
            if (($oldPassword == $userDetail['password']) && ($newPassword == $confirmPassword)) {
                $formData = array('password' => $newPassword, 'password_reset_date' => Date("Y-m-d H:i:s"), 'otp' => null);
                $result = $this->update($userDetail['uuid'], $formData);
                return $this->getSuccessResponse("Password changed successfully!");
            } elseif (($oldPassword != $userDetail['password'])) {
                $response = ['id' => $userId];
                return $this->getErrorResponse("Old password is not valid.", 404, $response);
            } elseif (($newPassword != $confirmPassword)) {
                $response = ['id' => $userId];
                return $this->getErrorResponse("Confirm password missmatch.", 404, $response);
            } else {
                $response = ['id' => $userId];
                return $this->getErrorResponse("Failed to Update Password.", 404, $response);
            }
        } catch (Exception $e) {
            $this->log->error($e->getMessage(), $e);
            return $this->exceptionToResponse($e);
        }
    }

    /**
     * Update User API
     * @api
     * @link /user[/:userId]
     * @method PUT
     * @param array $id ID of User to update
     * @param array $data
     * <code>
     *        gamelevel : string,
     *        username : string,
     *        password : string,
     *        firstname : string,
     *        lastname : string,
     *        name : string,
     *        role : string,
     *        email : string,
     *        status : string,
     *        dob : string,
     *        designation : string,
     *        sex : string,
     *        managerid : string,
     *        cluster : string,
     *        level : string,
     *        org_role_id : string,
     *        doj : string
     * </code>
     * @return array Returns a JSON Response with Status Code and Created User.
     */
    public function update($id, $data)
    {
        $params = $this->params()->fromRoute();
        $params['accountId'] = isset($params['accountId']) ? $params['accountId'] : null;
        try {
            $this->userService->updateUser($id, $data, $params['accountId']);
        } catch (Exception $e) {
            $this->log->error($e->getMessage(), $e);
            return $this->exceptionToResponse($e);
        }
        return $this->getSuccessResponseWithData($data, 200);
    }
}
