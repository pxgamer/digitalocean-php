<?php

namespace pxgamer\DigitalOcean;

/**
 * Class Droplet.
 */
class Droplet extends Sector
{
    private $dropletId;

    /**
     * @param string $dropletId
     */
    public function setDroplet(string $dropletId)
    {
        $this->dropletId = $dropletId;
    }

    /**
     * @return array|bool
     */
    public function getDroplet()
    {
        return $this->get('droplets/'.$this->dropletId);
    }

    /**
     * @param \stdClass $attributes
     *
     * @return array|bool
     *
     * @internal param string $name
     */
    public function createDroplet(\stdClass $attributes)
    {
        return $this->post('droplets', $attributes);
    }

    /**
     * @return array|bool
     */
    public function deleteDroplet()
    {
        return $this->delete('droplets/'.$this->dropletId);
    }

    /**
     * @return array|bool
     */
    public function listNeighbours()
    {
        return $this->get('droplets/'.$this->dropletId.'/neighbors');
    }

    /**
     * @param string $name
     *
     * @return array|bool
     */
    public function createSnapshot(string $name = null)
    {
        $name = $name ?? date('Y-m-d_h.m.s');

        return $this->post('droplets/'.$this->dropletId.'/actions', [
            'type' => 'snapshot',
            'name' => $name,
        ]);
    }

    /**
     * @return array|bool
     */
    public function enableBackups()
    {
        return $this->post('droplets/'.$this->dropletId.'/actions', [
            'type' => 'enable_backups',
        ]);
    }

    /**
     * @return array|bool
     */
    public function disableBackups()
    {
        return $this->post('droplets/'.$this->dropletId.'/actions', [
            'type' => 'enable_backups',
        ]);
    }

    /**
     * @return array|bool
     */
    public function reboot()
    {
        return $this->post('droplets/'.$this->dropletId.'/actions', [
            'type' => 'reboot',
        ]);
    }

    /**
     * @return array|bool
     */
    public function powerCycle()
    {
        return $this->post('droplets/'.$this->dropletId.'/actions', [
            'type' => 'power_cycle',
        ]);
    }

    /**
     * @return array|bool
     */
    public function shutdown()
    {
        return $this->post('droplets/'.$this->dropletId.'/actions', [
            'type' => 'shutdown',
        ]);
    }

    /**
     * @return array|bool
     */
    public function powerOff()
    {
        return $this->post('droplets/'.$this->dropletId.'/actions', [
            'type' => 'power_off',
        ]);
    }

    /**
     * @return array|bool
     */
    public function powerOn()
    {
        return $this->post('droplets/'.$this->dropletId.'/actions', [
            'type' => 'power_on',
        ]);
    }

    /**
     * @param string $size
     * @param bool   $increaseDiskSize
     *
     * @return array|bool
     */
    public function resize($size, $increaseDiskSize = false)
    {
        return $this->post('droplets/'.$this->dropletId.'/actions', [
            'type' => 'resize',
            'disk' => $increaseDiskSize,
            'size' => $size,
        ]);
    }

    /**
     * @return array|bool
     */
    public function passwordReset()
    {
        return $this->post('droplets/'.$this->dropletId.'/actions', [
            'type' => 'password_reset',
        ]);
    }

    /**
     * @param $name
     *
     * @return array|bool
     */
    public function rename($name)
    {
        return $this->post('droplets/'.$this->dropletId.'/actions', [
            'type' => 'rename',
            'name' => $name,
        ]);
    }

    /**
     * @return array|bool
     */
    public function enableIPv6()
    {
        return $this->post('droplets/'.$this->dropletId.'/actions', [
            'type' => 'enable_ipv6',
        ]);
    }

    /**
     * @return array|bool
     */
    public function enablePrivateNetworking()
    {
        return $this->post('droplets/'.$this->dropletId.'/actions', [
            'type' => 'enable_private_networking',
        ]);
    }
}
