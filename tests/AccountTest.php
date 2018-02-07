<?php

namespace pxgamer\DigitalOcean;

class AccountTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testCanGetAccountInstance()
    {
        $response = $this->client->account()->getAccount();

        $this->assertInstanceOf(\stdClass::class, $response);
    }
}
