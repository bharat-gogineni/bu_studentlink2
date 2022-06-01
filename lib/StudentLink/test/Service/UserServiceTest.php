<?php
namespace StudentLink\Service;

use Zend\Stdlib\ArrayUtils;
use StudentLink\Test\ServiceTest;
use StudentLink\Service\EmailService;
use StudentLink\Service\AddressService;
use Zend\Db\Adapter\AdapterInterface;
use StudentLink\Service\TemplateService;
use StudentLink\Transaction\TransactionManager;
use Zend\Db\Adapter\Adapter;
use StudentLink\Messaging\MessageProducer;

class UserServiceTest extends ServiceTest
{
    public function setUp() : void
    {
        $this->loadConfig();
        // parent::setUp();
        $config = $this->getApplicationConfig();
        $this->adapter = new Adapter($config['db']);
        $tm = TransactionManager::getInstance($this->adapter);
        $tm->setRollbackOnly(true);
        $tm->beginTransaction();
    }

    public function tearDown() : void
    {
        $tm = TransactionManager::getInstance($this->adapter);
        $tm->rollback();
        $_REQUEST = [];
    }


    private function getUserService()
    {
        return $this->getApplicationServiceLocator()->get(\StudentLink\Service\UserService::class);
    }

    public function testGetPrivileges()
    {
        $data = $this->getUserService()->getPrivileges(1, 1);
        $this->assertEquals(isset($data), true);
        $this->assertEquals(count($data) > 0, true);
    }
}
