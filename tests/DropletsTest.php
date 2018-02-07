<?php

namespace pxgamer\DigitalOcean;

/**
 * Class DropletsTest
 */
class DropletsTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testCanGetDropletsList()
    {
        $response = $this->client->droplets()->listDroplets();

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanGetDropletsNeighbours()
    {
        $response = $this->client->droplets()->listNeighbours();

        $this->assertInstanceOf(\stdClass::class, $response);
    }
}
