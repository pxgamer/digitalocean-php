<?php

namespace pxgamer\DigitalOcean;

use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    const API_KEY = '';

    public function testCanSetAuthorizationKey()
    {
        $client = new Client();
        $client->setAuthKey(self::API_KEY);

        $this->assertTrue($client->authKey == 'API_KEY');
    }

    public function testCanGetApiResponse()
    {
        $client = new Sector(self::API_KEY);
        $response = $client->get('/');

        $this->assertArrayHasKey('id', $response);
        $this->assertArrayHasKey('message', $response);
    }
}
