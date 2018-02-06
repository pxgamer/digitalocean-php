<?php

namespace pxgamer\DigitalOcean;

/**
 * Class Client.
 */
class Client
{
    const BASE_URL = 'https://api.digitalocean.com/v2';

    public $authKey;

    private $jsonType = 'application/json';

    /**
     * @param string $authKey
     *
     * @return bool
     */
    public function setAuthKey($authKey = '')
    {
        $this->authKey = $authKey;

        return true;
    }
}
