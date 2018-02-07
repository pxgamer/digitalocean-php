<?php

namespace pxgamer\DigitalOcean;

use PHPUnit\Framework\TestCase;

/**
 * Class ClientTest
 */
class ClientTest extends TestCase
{
    /**
     * The auth key.
     */
    private $authKey;

    /**
     * @var Client
     */
    private $client;

    public function setUp()
    {
        $this->authKey = getenv('DIGITALOCEAN_API_KEY') ?? '';

        $this->client = new Client($this->authKey);
    }

    public function testCanGetApiResponse()
    {
        $client = new Sector($this->authKey);
        $response = $client->get('/');

        $this->assertArrayHasKey('id', $response);
        $this->assertArrayHasKey('message', $response);
    }

    public function testCanGetAccountInstance()
    {
        $response = $this->client->account();

        $this->assertInstanceOf(Account::class, $response);
    }

    public function testCanGetDomainsInstance()
    {
        $response = $this->client->domains();

        $this->assertInstanceOf(Domains::class, $response);
    }

    public function testCanGetDropletInstance()
    {
        $response = $this->client->droplet();

        $this->assertInstanceOf(Droplet::class, $response);
    }

    public function testCanGetDropletsInstance()
    {
        $response = $this->client->droplets();

        $this->assertInstanceOf(Droplets::class, $response);
    }
}
