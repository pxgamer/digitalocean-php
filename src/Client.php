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
    /**
     * The API base URI.
     */
    const BASE_URL = 'https://api.digitalocean.com/v2';

    /**
     * @var string
     */
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

    /**
     *
     */
    public function account()
    {
        if (!($this->account instanceof Account)) {
            $this->account = new Account($this->authKey);
        }
    }

    /**
     *
     */
    public function domains()
    {
        if (!($this->domains instanceof Domains)) {
            $this->domains = new Domains($this->authKey);
        }
    }

    /**
     *
     */
    public function droplet()
    {
        if (!($this->droplet instanceof Droplet)) {
            $this->droplet = new Droplet($this->authKey);
        }
    }

    /**
     *
     */
    public function droplets()
    {
        if (!($this->droplets instanceof Droplets)) {
            $this->droplets = new Droplets($this->authKey);
        }
    }
}
