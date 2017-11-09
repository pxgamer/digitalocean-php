<?php

namespace pxgamer\DigitalOcean;

use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testCanSetAuthorizationKey()
    {
        $client = new Client();
        $client->setAuthKey('API_KEY');

        $this->assertTrue($client->authKey == 'API_KEY');
    }

    public function testCanGetApiResponse()
    {
        $client = new Client();
        $response = $client->get('/');

        $this->assertArrayHasKey('id', $response);
        $this->assertArrayHasKey('message', $response);
    }
}
