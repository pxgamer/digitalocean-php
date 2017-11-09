<?php

namespace pxgamer\DigitalOcean;

use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    private $client;

    public function testCanBeInitialised()
    {
        $client = new Client();
        $this->client = $client;
        $this->assertInstanceOf(Client::class, $client);
    }

    public function testAccountCanBeInitialised()
    {
        $account = new Account($this->client);
        $this->assertInstanceOf(Account::class, $account);
    }

    public function testDomainsCanBeInitialised()
    {
        $domains = new Domains($this->client);
        $this->assertInstanceOf(Domains::class, $domains);
    }

    public function testDropletsCanBeInitialised()
    {
        $droplets = new Droplets($this->client);
        $this->assertInstanceOf(Droplets::class, $droplets);
    }

    public function testDropletCanBeInitialised()
    {
        $droplet = new Droplet($this->client);
        $this->assertInstanceOf(Droplet::class, $droplet);
    }
}
