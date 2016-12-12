<?php
use pxgamer\DigitalOcean;

class MainTest extends PHPUnit_Framework_TestCase
{

    public function testCanBeInitialised()
    {
        $digitalOcean = new DigitalOcean();
        $this->assertInstanceOf(DigitalOcean::class, $digitalOcean);
    }

}
