<?php

namespace pxgamer\DigitalOcean;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * Class TestCase
 */
class TestCase extends PHPUnitTestCase
{
    /**
     * The auth key.
     */
    protected $authKey;

    /**
     * @var Client
     */
    protected $client;

    /**
     * Set up the test class variables.
     */
    public function setUp()
    {
        $this->authKey = getenv('DIGITALOCEAN_API_KEY') ?? '';

        $this->client = new Client($this->authKey);
    }
}
