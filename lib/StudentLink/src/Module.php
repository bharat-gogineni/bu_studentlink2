<?php

namespace StudentLink;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\ModuleEvent;
use Zend\ModuleManager\ModuleManager;
use Logger;

class Module
{
    private static $logInitialized = false;
    public function init(ModuleManager $moduleManager)
    {
        ini_set('max_execution_time', 100);
        $events = $moduleManager->getEventManager();
        // Registering a listener at default priority, 1, which will trigger
        // after the ConfigListener merges config.
        $events->attach(ModuleEvent::EVENT_MERGE_CONFIG, array($this, 'onMergeConfig'));
    }

    public function onMergeConfig(ModuleEvent $e)
    {
        $configListener = $e->getConfigListener();
        $config         = $configListener->getMergedConfig(false);
        if (!self::$logInitialized) {
            self::$logInitialized = true;
            Logger::configure($config['logger']);
        }
    }
    public function getServiceConfig()
    {
        return [
            'factories' => [
                Auth\AuthContext::class => function ($container) {
                    return new Auth\AuthContext();
                },
                Auth\AuthSuccessListener::class => function ($container) {
                    return new Auth\AuthSuccessListener($container->get(Service\UserService::class));
                },
                Service\AppService::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    return new Service\AppService(
                        $container->get('config'),
                        $dbAdapter,
                        $container->get(Model\AppTable::class),
                        $container->get(\StudentLink\Service\WorkflowService::class),
                        $container->get(\StudentLink\Service\FormService::class),
                        $container->get(\StudentLink\Service\FieldService::class),
                        $container->get(\StudentLink\Service\JobService::class),
                        $container->get(\StudentLink\Service\AccountService::class),
                        $container->get(\StudentLink\Service\EntityService::class),
                        $container->get(\StudentLink\Service\PrivilegeService::class),
                        $container->get(\StudentLink\Service\RoleService::class),
                        $container->get(\App\Service\MenuItemService::class),
                        $container->get(\App\Service\PageService::class),
                        $container->get(\StudentLink\Service\UserService::class),
                        $container->get(\StudentLink\Service\BusinessRoleService::class),
                        $container->get(Messaging\MessageProducer::class)
                    );
                },
                Model\AppTable::class => function ($container) {
                    $tableGateway = $container->get(Model\AppTableGateway::class);
                    return new Model\AppTable($tableGateway);
                },
                Model\AppTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\App());
                    return new TableGateway('ox_app', $dbAdapter, null, $resultSetPrototype);
                },
                Service\UserService::class => function ($container) {
                    return new Service\UserService(
                        $container->get('config'),
                        $container->get(AdapterInterface::class),
                        $container->get(Model\UserTable::class),
                    );
                },
                Model\UserTable::class => function ($container) {
                    return new Model\UserTable(
                        $container->get(Model\UserTableGateway::class)
                    );
                },
                Model\UserTableGateway::class => function ($container) {
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\User());
                    return new TableGateway(
                        'ox_user',
                        $container->get(AdapterInterface::class),
                        null,
                        $resultSetPrototype
                    );
                },
                Service\ElasticService::class => function ($container) {
                    $config = $container->get('config');
                    return new Service\ElasticService($config);
                },
                Model\FileAttachmentTable::class => function ($container) {
                    $tableGateway = $container->get(Model\FileAttachmentTableGateway::class);
                    return new Model\FileAttachmentTable($tableGateway);
                },
                Model\FileAttachmentTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\FileAttachment());
                    return new TableGateway('ox_file_attachment', $dbAdapter, null, $resultSetPrototype);
                },
                \StudentLink\Service\FileService::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    return new \StudentLink\Service\FileService(
                        $container->get('config'),
                        $dbAdapter,
                        $container->get(\StudentLink\Model\FileTable::class),
                        $container->get(\StudentLink\Service\FormService::class),
                        $container->get(Messaging\MessageProducer::class),
                        $container->get(\StudentLink\Service\FieldService::class),
                        $container->get(\StudentLink\Service\EntityService::class),
                        $container->get(\StudentLink\Model\FileAttachmentTable::class),
                        $container->get(\StudentLink\Service\SubscriberService::class)
                    );
                },
                Service\RoleService::class => function ($container) {
                    return new Service\RoleService(
                        $container->get('config'),
                        $container->get(AdapterInterface::class),
                        $container->get(Model\RoleTable::class),
                        $container->get(Model\PrivilegeTable::class)
                    );
                },
                Model\RoleTable::class => function ($container) {
                    return new Model\RoleTable(
                        $container->get(Model\RoleTableGateway::class)
                    );
                },
                Model\RoleTableGateway::class => function ($container) {
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Role());
                    return new TableGateway(
                        'ox_role',
                        $container->get(AdapterInterface::class),
                        null,
                        $resultSetPrototype
                    );
                },
                Service\BusinessRoleService::class => function ($container) {
                    return new Service\BusinessRoleService(
                        $container->get('config'),
                        $container->get(AdapterInterface::class),
                        $container->get(Model\BusinessRoleTable::class)
                    );
                },
                Model\BusinessRoleTable::class => function ($container) {
                    return new Model\BusinessRoleTable(
                        $container->get(Model\BusinessRoleTableGateway::class)
                    );
                },
                Model\BusinessRoleTableGateway::class => function ($container) {
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\BusinessRole());
                    return new TableGateway(
                        'ox_business_role',
                        $container->get(AdapterInterface::class),
                        null,
                        $resultSetPrototype
                    );
                },
                Service\PrivilegeService::class => function ($container) {
                    return new Service\PrivilegeService(
                        $container->get('config'),
                        $container->get(AdapterInterface::class),
                        $container->get(Model\PrivilegeTable::class)
                    );
                },
                Model\PrivilegeTable::class => function ($container) {
                    return new Model\PrivilegeTable(
                        $container->get(Model\PrivilegeTableGateway::class)
                    );
                },
                Model\PrivilegeTableGateway::class => function ($container) {
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Privilege());
                    return new TableGateway(
                        'ox_privilege',
                        $container->get(AdapterInterface::class),
                        null,
                        $resultSetPrototype
                    );
                },
                \StudentLink\Service\CommentService::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    return new \StudentLink\Service\CommentService($container->get('config'), $dbAdapter, $container->get(\StudentLink\Model\CommentTable::class), $container->get(Messaging\MessageProducer::class));
                },
                \StudentLink\Service\SubscriberService::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    return new \StudentLink\Service\SubscriberService($container->get('config'), $dbAdapter, $container->get(\StudentLink\Model\SubscriberTable::class));
                },
                \StudentLink\Model\FileTable::class => function ($container) {
                    $tableGateway = $container->get(\StudentLink\Model\FileTableGateway::class);
                    return new \StudentLink\Model\FileTable($tableGateway);
                },
                \StudentLink\Model\CommentTable::class => function ($container) {
                    $tableGateway = $container->get(\StudentLink\Model\CommentTableGateway::class);
                    return new \StudentLink\Model\CommentTable($tableGateway);
                },
                \StudentLink\Model\SubscriberTable::class => function ($container) {
                    $tableGateway = $container->get(\StudentLink\Model\SubscriberTableGateway::class);
                    return new \StudentLink\Model\SubscriberTable($tableGateway);
                },
                \StudentLink\Model\FileTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \StudentLink\Model\File());
                    return new TableGateway('ox_file', $dbAdapter, null, $resultSetPrototype);
                },
                \StudentLink\Model\CommentTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \StudentLink\Model\Comment());
                    return new TableGateway('ox_comment', $dbAdapter, null, $resultSetPrototype);
                },
                \StudentLink\Model\SubscriberTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \StudentLink\Model\Subscriber());
                    return new TableGateway('ox_subscriber', $dbAdapter, null, $resultSetPrototype);
                },
                Service\FormService::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    return new Service\FormService(
                        $container->get('config'),
                        $dbAdapter,
                        $container->get(Model\FormTable::class),
                        $container->get(FormEngine\FormFactory::class),
                        $container->get(Service\FieldService::class)
                    );
                },
                Service\ActivityService::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    return new Service\ActivityService($container->get('config'), $dbAdapter, $container->get(Model\ActivityTable::class), $container->get(Service\FormService::class));
                },
                Service\FieldService::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    return new Service\FieldService($container->get('config'), $dbAdapter, $container->get(Model\FieldTable::class));
                },
                Model\FormTable::class => function ($container) {
                    $tableGateway = $container->get(Model\FormTableGateway::class);
                    return new Model\FormTable($tableGateway);
                },
                Model\FormTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Form());
                    return new TableGateway('ox_form', $dbAdapter, null, $resultSetPrototype);
                },
                Model\ActivityTable::class => function ($container) {
                    $tableGateway = $container->get(Model\ActivityTableGateway::class);
                    return new Model\ActivityTable($tableGateway);
                },
                Model\ActivityTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Activity());
                    return new TableGateway('ox_activity', $dbAdapter, null, $resultSetPrototype);
                },
                Model\FieldTable::class => function ($container) {
                    $tableGateway = $container->get(Model\FieldTableGateway::class);
                    return new Model\FieldTable($tableGateway);
                },
                Model\FieldTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Field());
                    return new TableGateway('ox_field', $dbAdapter, null, $resultSetPrototype);
                },
                Service\EntityService::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    return new Service\EntityService(
                        $container->get('config'),
                        $dbAdapter,
                        $container->get(Model\App\EntityTable::class),
                        $container->get(Service\FormService::class),
                        $container->get(\App\Service\PageContentService::class)
                    );
                },
                Model\App\EntityTable::class => function ($container) {
                    $tableGateway = $container->get(Model\App\EntityTableGateway::class);
                    return new Model\App\EntityTable($tableGateway);
                },
                Model\App\EntityTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\App\Entity());
                    return new TableGateway('ox_app_entity', $dbAdapter, null, $resultSetPrototype);
                },
                Service\AccountService::class => function ($container) {
                    return new Service\AccountService(
                        $container->get('config'),
                        $container->get(AdapterInterface::class),
                        $container->get(Model\AccountTable::class),
                        $container->get(Service\UserService::class),
                        $container->get(Service\RoleService::class),
                        $container->get(Service\PrivilegeService::class),
                        $container->get(Service\OrganizationService::class),
                        $container->get(Service\EntityService::class),
                        $container->get(Messaging\MessageProducer::class)
                    );
                },
                Model\OrganizationTable::class => function ($container) {
                    return new Model\OrganizationTable(
                        $container->get(Model\OrganizationTableGateway::class)
                    );
                },
                Model\OrganizationTableGateway::class => function ($container) {
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Organization());
                    return new TableGateway(
                        'ox_organization',
                        $container->get(AdapterInterface::class),
                        null,
                        $resultSetPrototype
                    );
                },
                Service\AddressService::class => function ($container) {
                    return new Service\AddressService(
                        $container->get('config'),
                        $container->get(AdapterInterface::class),
                        $container->get(Model\AddressTable::class)
                    );
                },
                Model\AddressTable::class => function ($container) {
                    return new Model\AddressTable(
                        $container->get(Model\AddressTableGateway::class)
                    );
                },
                Model\AddressTableGateway::class => function ($container) {
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Address());
                    return new TableGateway(
                        'ox_address',
                        $container->get(AdapterInterface::class),
                        null,
                        $resultSetPrototype
                    );
                },
                Service\OrganizationService::class => function ($container) {
                    return new Service\OrganizationService(
                        $container->get('config'),
                        $container->get(AdapterInterface::class),
                        $container->get(Service\AddressService::class),
                        $container->get(Model\OrganizationTable::class)
                    );
                },
                Model\AccountTable::class => function ($container) {
                    return new Model\AccountTable(
                        $container->get(Model\AccountTableGateway::class)
                    );
                },
                Model\AccountTableGateway::class => function ($container) {
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Account());
                    return new TableGateway(
                        'ox_account',
                        $container->get(AdapterInterface::class),
                        null,
                        $resultSetPrototype
                    );
                },
                Service\PersonService::class => function ($container) {
                    return new Service\PersonService(
                        $container->get('config'),
                        $container->get(AdapterInterface::class),
                        $container->get(Service\AddressService::class),
                        $container->get(Model\PersonTable::class)
                    );
                },
                 Model\PersonTable::class => function ($container) {
                     return new Model\PersonTable(
                         $container->get(Model\PersonTableGateway::class)
                     );
                 },
                Model\PersonTableGateway::class => function ($container) {
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Person());
                    return new TableGateway(
                        'ox_person',
                        $container->get(AdapterInterface::class),
                        null,
                        $resultSetPrototype
                    );
                },
                Service\UserTokenService::class => function ($container) {
                    $config = $container->get('config');
                    $dbAdapter = $container->get(AdapterInterface::class);
                    return new Service\UserTokenService($config, $dbAdapter, $container->get(Model\UserTokenTable::class));
                },
                Model\UserTokenTable::class => function ($container) {
                    $tableGateway = $container->get(Model\UserTokenTableGateway::class);
                    return new Model\UserTokenTable($tableGateway);
                },
                Model\UserTokenTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\UserToken());
                    return new TableGateway('ox_user_refresh_token', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }
    /**
     * Retrieve default zend-db configuration for zend-mvc context.
     *
     * @return array
     */
    public function getConfig()
    {
        return [
        ];
    }
}
