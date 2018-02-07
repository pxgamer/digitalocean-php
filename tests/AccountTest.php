<?php

namespace pxgamer\DigitalOcean;

use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
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
    public function testCanGetAccountInstance()
    {
        $response = $this->client->account()->getAccount();

        $this->assertInstanceOf(\stdClass::class, $response);
    }
}
