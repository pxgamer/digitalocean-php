<?php

use pxgamer\DigitalOcean;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    private $client;

    public function testCanBeInitialised()
    {
        $client = new DigitalOcean\Client();
        $this->client = $client;
        $this->assertInstanceOf(DigitalOcean\Client::class, $client);
    }

    public function testAccountCanBeInitialised()
    {
        $account = new DigitalOcean\Account($this->client);
        $this->assertInstanceOf(DigitalOcean\Account::class, $account);
    }

    public function testDomainsCanBeInitialised()
    {
        $domains = new DigitalOcean\Domains($this->client);
        $this->assertInstanceOf(DigitalOcean\Domains::class, $domains);
    }

    public function testDropletsCanBeInitialised()
    {
        $droplets = new DigitalOcean\Droplets($this->client);
        $this->assertInstanceOf(DigitalOcean\Droplets::class, $droplets);
    }

    public function testDropletCanBeInitialised()
    {
        $droplet = new DigitalOcean\Droplet($this->client);
        $this->assertInstanceOf(DigitalOcean\Droplet::class, $droplet);
    }
}
