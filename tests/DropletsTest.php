<?php

namespace pxgamer\DigitalOcean;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

/**
 * Class DropletsTest
 */
class DropletsTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testCanGetDropletsList()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(new \stdClass())),
        ]);

        $handler = HandlerStack::create($mock);

        $response = (new Droplets($this->authKey, $handler))->listDroplets();

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanGetDropletsNeighbours()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(new \stdClass())),
        ]);

        $handler = HandlerStack::create($mock);

        $response = (new Droplets($this->authKey, $handler))->listNeighbours();

        $this->assertInstanceOf(\stdClass::class, $response);
    }
}
