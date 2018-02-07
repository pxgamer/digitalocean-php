<?php

namespace pxgamer\DigitalOcean;

/**
 * Class DomainsTest
 */
class DomainsTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testCanGetDomainsList()
    {
        $response = $this->client->domains()->listDomains();

        $this->assertInstanceOf(\stdClass::class, $response);
    }
}
