<?php

namespace pxgamer\DigitalOcean;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

/**
 * Class DomainsTest
 */
class DomainsTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testCanGetDomainsList()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(new \stdClass())),
        ]);

        $handler = HandlerStack::create($mock);

        $response = (new Domains($this->authKey, $handler))->listDomains();

        $this->assertInstanceOf(\stdClass::class, $response);
    }
}
