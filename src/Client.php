<?php

namespace pxgamer\DigitalOcean;

/**
 * Class Client.
 */
class Client
{
    /**
     * The API base URI.
     */
    const BASE_URL = 'https://api.digitalocean.com/v2/';

    /**
     * @var string
     */
    public $authKey;

    /**
     * @var Account
     */
    private $account;
    /**
     * @var Domains
     */
    private $domains;
    /**
     * @var Droplet
     */
    private $droplet;
    /**
     * @var Droplets
     */
    private $droplets;

    /**
     * Client constructor.
     *
     * @param string $authKey
     */
    public function __construct(string $authKey)
    {
        $this->authKey = $authKey;
    }

    /**
     * @return Account
     */
    public function account()
    {
        if (!($this->account instanceof Account)) {
            $this->account = new Account($this->authKey);
        }

        return $this->account;
    }

    /**
     * @return Domains
     */
    public function domains()
    {
        if (!($this->domains instanceof Domains)) {
            $this->domains = new Domains($this->authKey);
        }

        return $this->domains;
    }

    /**
     * @return Droplet
     */
    public function droplet()
    {
        if (!($this->droplet instanceof Droplet)) {
            $this->droplet = new Droplet($this->authKey);
        }

        return $this->droplet;
    }

    /**
     * @return Droplets
     */
    public function droplets()
    {
        if (!($this->droplets instanceof Droplets)) {
            $this->droplets = new Droplets($this->authKey);
        }

        return $this->droplets;
    }
}
