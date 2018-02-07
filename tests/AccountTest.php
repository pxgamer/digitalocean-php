<?php

namespace pxgamer\DigitalOcean;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

/**
 * Class AccountTest
 */
class AccountTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testCanGetAccount()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode((object)[
                'droplet_limit'     => 25,
                'floating_ip_limit' => 3,
                'email'             => 'example@example.com',
                'uuid'              => rand(),
                'email_verified'    => true,
                'status'            => 'active',
                'status_message'    => '',
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = (new Account($this->authKey, $handler))->getAccount();
        $this->assertInstanceOf(\stdClass::class, $response);
    }
}
