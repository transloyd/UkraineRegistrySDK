<?php

namespace WBS\Tests\Services\Facade\Products;

use GuzzleHttp\Client;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use PHPUnit\Framework\TestCase;
use Transloyd\Services\UkraineRegistry\{Provider, UkraineRegistry, UkraineRegistryManager};

class UkraineRegistryManagerTest extends TestCase
{
    private $client;
    private $provider;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = new Client();
        $this->provider = new Provider(
            $this->client,
            new GuzzleMessageFactory()
        );
    }

    public function testCreateCode(): void
    {
//        $ukraineRegistry = new UkraineRegistry($this->provider);
//        $ukraineRegistryManager = $ukraineRegistry->getCode(312312312312);
//        $this->assertEquals($ukraineRegistryManager);
    }
}