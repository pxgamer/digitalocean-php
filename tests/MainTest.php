<?php
use pxgamer\DigitalOcean\Client;

class MainTest extends PHPUnit_Framework_TestCase
{
    public function testCanBeInitialised()
    {
        $digitalOcean = new Client;
        $this->assertInstanceOf(Client::class, $digitalOcean);
    }
}
