<?php

namespace pxgamer\DigitalOcean;

/**
 * Class Droplets.
 */
class Droplets extends Sector
{
    /**
     * @return array|bool
     */
    public function listDroplets()
    {
        return $this->get('droplets');
    }

    /**
     * @param array $attributes
     *
     * @return array|bool
     *
     * @internal param string $name
     */
    public function createDroplet(array $attributes)
    {
        return $this->post('droplets', $attributes);
    }

    /**
     * @return array|bool
     */
    public function listNeighbours()
    {
        return $this->get('reports/droplet_neighbors');
    }
}
