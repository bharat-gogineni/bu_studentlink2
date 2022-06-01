<?php
namespace Analytics;

use StudentLink\NLP\NLPEngine;
use PHPUnit\DbUnit\DataSet\SymfonyYamlParser;
use StudentLink\Test\ServiceTest;
use StudentLink\Auth\AuthContext;
use StudentLink\Auth\AuthConstants;
use function GuzzleHttp\json_decode;

class NLPTest extends ServiceTest
{
    private $dataset;
    private $searchFactory;
    private $analyticsFactory;

    public function setUp() : void
    {
        $this->loadConfig();
        parent::setUp();
    }
    
    public function testNLP()
    {
        if (enableNLP==0) {
            $this->markTestSkipped('Only Integration Test');
        }
        AuthContext::put(AuthConstants::ACCOUNT_ID, 1);
        $nlp = $this->getApplicationServiceLocator()->get(NLPEngine::class);
        $response = $nlp->processText("What is the amount of sales closed this year");
        $response_array = json_decode($response, true);
        $this->assertEquals(isset($response_array['parameters']), true);
        $this->assertEquals(isset($response_array['action']), true);
        $this->assertEquals(isset($response_array['response']), true);
    }
}
