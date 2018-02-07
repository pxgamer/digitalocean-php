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
     * @return array|bool
     */
    public function listNeighbours()
    {
        return $this->get('reports/droplet_neighbors');
    }
}
