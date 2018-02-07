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
     * @var string
     */
    protected $dropletTestId = 'droplet-test-id';

    /**
     * Set up the test class variables.
     */
    public function setUp()
    {
        $this->authKey = 'dev-test-key';

        $this->client = new Client($this->authKey);
    }
}
