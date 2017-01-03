<?php

namespace pxgamer\DigitalOcean;

/**
 * Class Droplets.
 */
class Droplets
{
    public $client;

    /**
     * Droplets constructor.
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
    public function listDroplets()
    {
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->get('/droplets');
    }

    /**
     * @return array|bool
     */
    public function listNeighbours()
    {
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->get('/reports/droplet_neighbors');
    }
}
