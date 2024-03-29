<?php
namespace StudentLink\AppDelegate;

use StudentLink\Test\ServiceTest;
use Zend\Db\Adapter\AdapterInterface;
use StudentLink\AppDelegate\AppDelegateService;
use Zend\Db\Adapter\Adapter;
use StudentLink\Utils\FileUtils;
use StudentLink\Auth\AuthContext;
use StudentLink\Auth\AuthConstants;
use Exception;
use StudentLink\Transaction\TransactionManager;
use StudentLink\Db\Migration\Migration;
use StudentLink\Db\Persistence\Persistence;

class AppDelegateServiceTest extends ServiceTest
{
    public function setUp() : void
    {
        $this->loadConfig();
        $this->data = array(
            "appName" => 'ox_client_app',
            'UUID' => 8765765,
            'description' => 'FirstAppOfTheClient',
        );

        $config = $this->getApplicationConfig();
        $this->persistence = new Persistence($config, $this->data['UUID'], $this->data['appName']);
        $path = __DIR__.'/../../../../data/delegate/'.$this->data['UUID'];
        if (!is_link($path)) {
            symlink(__DIR__.'/../delegate/', $path);
        }
        parent::setUp();
    }

    public function tearDown() : void
    {
        parent::tearDown();
        $path = __DIR__.'/../../../../data/delegate/'.$this->data['UUID'];
        if (is_link($path)) {
            unlink($path);
        }
    }

    public function testDelegateExecute()
    {
        $data = array("Checking App Delegate","Checking1");
        $appId = $this->data['UUID'];
        $appName = $this->data['appName'];
        $config = $this->getApplicationConfig();
        
        $delegateService = $this->getApplicationServiceLocator()->get(AppDelegateService::class);
        $delegateService->setPersistence($appId, $this->persistence);
        $content = $delegateService->execute($appId, 'TestDocDelegateImpl', $data);
        $this->assertEquals("Checking App Delegate", $content[0]);
    }
}
