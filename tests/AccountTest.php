<?php

namespace pxgamer\DigitalOcean;

/**
 * Class AccountTest
 */
class AccountTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testCanGetAccount()
    {
        $response = $this->client->account()->getAccount();

        $this->assertInstanceOf(\stdClass::class, $response);
    }
}
