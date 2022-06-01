<?php

namespace User;

use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'user' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/user[/:userId]',
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'access' => [
                            // SET ACCESS CONTROL
                            'put' => ['MANAGE_USER_WRITE'],
                            'post' => ['MANAGE_USER_WRITE'],
                            'delete' => ['MANAGE_USER_WRITE'],
                        ],
                    ],
                ],
            ],
            'loggedInUser' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/user/me[/:type]',
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'method' => 'GET',
                        'action' => 'getUserDetail',
                        'access' => [
                            // SET ACCESS CONTROL
                        ],
                    ],
                ],
            ],
            'saveMe' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/user/me/save',
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'method' => 'PUT',
                        'action' => 'saveMe',
                    ],
                ],
            ],
            'switchAccount' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/user/switchaccount',
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'method' => 'POST',
                        'action' => 'switchAccount',
                    ],
                ],
            ],
            'userInfoById' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/user/:userId/detail/:type',
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'method' => 'GET',
                        'action' => 'getUserInfoById',
                        'access' => [
                            // SET ACCESS CONTROL
                        ],
                    ],
                ],
            ],
            'userToken' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/user/usertoken',
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'method' => 'get',
                        'action' => 'userLoginToken',
                    ],
                ],
            ],
            'userSearch' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/user/usersearch',
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'method' => 'POST',
                        'action' => 'userSearch',
                    ],
                ],
            ],
            'usersList' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/users/list',
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'method' => 'POST',
                        'action' => 'usersList',
                    ],
                ],
            ],
            'changePassword' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/user/me/changepassword',
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'method' => 'POST',
                        'action' => 'changePassword',
                    ],
                ],
            ],
            'profilePicture' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/user/profile/:profileId',
                    'defaults' => [
                        'controller' => Controller\ProfilePictureDownloadController::class,
                    ],
                ],
            ],
            'profilePictureByUsername' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/user/profile/username/:username',
                    'defaults' => [
                        'controller' => Controller\ProfilePictureDownloadController::class,
                        'action' => 'profilePictureByUsername',
                    ],
                ],
            ],
            'updateProfile' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/user/profile',
                    'defaults' => [
                        'controller' => Controller\ProfilePictureController::class,
                        'method' => 'POST',
                        'action' => 'updateProfile',
                    ],
                ],
            ],
            'forgotPassword' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/user/me/forgotpassword',
                    'defaults' => [
                        'controller' => Controller\ForgotPasswordController::class,
                        'method' => 'POST',
                        'action' => 'forgotPassword',
                    ],
                ],
            ],
            'resetPassword' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/user/me/resetpassword',
                    'defaults' => [
                        'controller' => Controller\ForgotPasswordController::class,
                        'method' => 'POST',
                        'action' => 'resetPassword',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        // We need to set this up so that we're allowed to return JSON
        // responses from our controller.
        'strategies' => ['ViewJsonStrategy'],
    ],
];
