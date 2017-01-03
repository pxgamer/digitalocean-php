<?php

namespace pxgamer\DigitalOcean;

/**
 * Class Account.
 */
class Account
{
    public $client;

    /**
     * Domains constructor.
     *
     * @param Client|null $client
     */
    public function __construct(Client $client = null)
    {
        if (is_null($client)) {
            $client = new Client();
        }
        $this->client = $client;

        if ($this->client->authKey) {
            return true;
        }

        return false;
    }

    /**
     * @return array|bool
     */
    public function getAccount()
    {
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->get('/account');
    }
}
