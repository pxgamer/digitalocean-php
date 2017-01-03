<?php

namespace pxgamer\DigitalOcean;

/**
 * Class Domains.
 */
class Domains
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
    public function listDomains()
    {
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->get('/domains');
    }

    /**
     * @param string $domain_name
     *
     * @return array|bool
     */
    public function getDomain($domain_name = null)
    {
        if (!$this->client->authKey || !is_string($domain_name)) {
            return false;
        }

        return $this->client->get('/domains/'.$domain_name);
    }

    /**
     * @param object $attributes
     *
     * @return array|bool
     */
    public function createDomain($attributes = null)
    {
        if (!$this->client->authKey || !is_object($attributes)) {
            return false;
        }

        return $this->client->post('/domains', $attributes);
    }

    /**
     * @param string $domain_name
     *
     * @return array|bool
     */
    public function deleteDomain($domain_name = null)
    {
        if (!$this->client->authKey || !is_string($domain_name)) {
            return false;
        }

        return $this->client->delete('/domains/'.$domain_name);
    }
}
