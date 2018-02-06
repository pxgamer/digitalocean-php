<?php

namespace pxgamer\DigitalOcean;

/**
 * Class Client.
 *
 * @property Account  $account
 * @property Domains  $domains
 * @property Droplet  $droplet
 * @property Droplets $droplets
 */
class Client
{
    const BASE_URL = 'https://api.digitalocean.com/v2';

    public $authKey;

    /**
     * @param string $authKey
     *
     * @return void
     */
    public function setAuthKey(string $authKey)
    {
        $this->authKey = $authKey;
    }
}
