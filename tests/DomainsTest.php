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
            new Response(200, [], json_encode([
                'domains' => [
                    [
                        'name'      => 'example.com',
                        'ttl'       => 1800,
                        'zone_file' => '...',
                    ],
                ],
                'links'   => [],
                'meta'    => [],
                'total'   => 1,
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = (new Domains($this->authKey, $handler))->listDomains();

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanGetDomain()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode([
                'domain' => [
                    'name'      => 'example.com',
                    'ttl'       => 1800,
                    'zone_file' => '...',
                ],
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = (new Domains($this->authKey, $handler))->getDomain('example.com');

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanCreateDomain()
    {
        $mock = new MockHandler([
            new Response(201, [], json_encode([
                'domain' => [
                    'name'      => 'example.com',
                    'ttl'       => 1800,
                    'zone_file' => null,
                ],
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = (new Domains($this->authKey, $handler))->createDomain([
            'name' => 'example.com',
        ]);

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanDeleteDomain()
    {
        $mock = new MockHandler([
            new Response(204),
        ]);

        $handler = HandlerStack::create($mock);

        $response = (new Domains($this->authKey, $handler))->deleteDomain('example.com');

        $this->assertTrue($response);
    }
}
