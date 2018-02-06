<?php

namespace pxgamer\DigitalOcean;

/**
 * Class Account.
 */
class Account extends Sector
{
    /**
     * @return array|bool
     */
    public function getAccount()
    {
        return $this->get('/account');
    }
}
