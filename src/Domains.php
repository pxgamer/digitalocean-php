<?php

namespace pxgamer\DigitalOcean;

/**
 * Class Domains.
 */
class Domains extends Sector
{
    /**
     * @return array|bool
     */
    public function listDomains()
    {
        return $this->get('domains');
    }

    /**
     * @param string $domain_name
     *
     * @return array|bool
     */
    public function getDomain(string $domain_name)
    {
        return $this->get('domains/'.$domain_name);
    }

    /**
     * @param array $attributes
     *
     * @return array|bool
     */
    public function createDomain(array $attributes = null)
    {
        return $this->post('domains', $attributes);
    }

    /**
     * @param string $domain_name
     *
     * @return array|bool
     */
    public function deleteDomain(string $domain_name)
    {
        return $this->delete('domains/'.$domain_name);
    }
}
