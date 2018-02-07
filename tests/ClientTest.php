<?php

namespace pxgamer\DigitalOcean;

use GuzzleHttp\Exception\ClientException;
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

    /**
     *
     */
    public function setUp()
    {
        $this->authKey = getenv('DIGITALOCEAN_API_KEY') ?? '';

        $this->client = new Client($this->authKey);
    }

    /**
     * @throws \Exception
     */
    public function testCanGetApiResponse()
    {
        $this->expectException(ClientException::class);

        $client = new Sector($this->authKey);
        $client->get('');
    }

    /**
     * @throws \Exception
     */
    public function testCanGetAccountInstance()
    {
        $response = $this->client->account();

        $this->assertInstanceOf(Account::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanGetDomainsInstance()
    {
        $response = $this->client->domains();

        $this->assertInstanceOf(Domains::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanGetDropletInstance()
    {
        $response = $this->client->droplet();

        $this->assertInstanceOf(Droplet::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanGetDropletsInstance()
    {
        $response = $this->client->droplets();

        $this->assertInstanceOf(Droplets::class, $response);
    }
}
