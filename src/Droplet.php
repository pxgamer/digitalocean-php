<?php

namespace pxgamer\DigitalOcean;

/**
 * Class Droplet.
 */
class Droplet
{
    private $dropletId = '';

    public $client;

    /**
     * Droplet constructor.
     *
     * @param Client|null $client
     */
    public function __construct(Client $client = null)
    {
        if (is_null($client)) {
            $client = new Client();
        }
        $this->client = $client;
    }

    /**
     * @param string $dropletId
     *
     * @return bool
     */
    public function setDroplet($dropletId = '')
    {
        $this->dropletId = $dropletId;
        if ($this->dropletId !== '') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return array|bool
     */
    public function getDroplet()
    {
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->get('/droplets/'.$this->dropletId);
    }

    /**
     * @param null $attributes
     *
     * @return array|bool
     *
     * @internal param string $name
     */
    public function createDroplet($attributes = null)
    {
        if (!$this->client->authKey || !is_object($attributes)) {
            return false;
        }

        return $this->client->post('/droplets', $attributes);
    }

    /**
     * @return array|bool
     */
    public function deleteDroplet()
    {
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->delete('/droplets/'.$this->dropletId);
    }

    /**
     * @return array|bool
     */
    public function listNeighbours()
    {
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->get('/droplets/'.$this->dropletId.'/neighbors');
    }

    /**
     * @param string $name
     *
     * @return array|bool
     */
    public function createSnapshot($name = '')
    {
        if (!$this->client->authKey) {
            return false;
        }
        $name = ($name !== '') ? $name : date('Y-m-d_h.m.s');

        return $this->client->post('/droplets/'.$this->dropletId.'/actions', [
            'type' => 'snapshot',
            'name' => $name,
        ]);
    }

    /**
     * @return array|bool
     */
    public function enableBackups()
    {
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->post('/droplets/'.$this->dropletId.'/actions', [
            'type' => 'enable_backups',
        ]);
    }

    /**
     * @return array|bool
     */
    public function disableBackups()
    {
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->post('/droplets/'.$this->dropletId.'/actions', [
            'type' => 'enable_backups',
        ]);
    }

    /**
     * @return array|bool
     */
    public function reboot()
    {
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->post('/droplets/'.$this->dropletId.'/actions', [
            'type' => 'reboot',
        ]);
    }

    /**
     * @return array|bool
     */
    public function powerCycle()
    {
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->post('/droplets/'.$this->dropletId.'/actions', [
            'type' => 'power_cycle',
        ]);
    }

    /**
     * @return array|bool
     */
    public function shutdown()
    {
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->post('/droplets/'.$this->dropletId.'/actions', [
            'type' => 'shutdown',
        ]);
    }

    /**
     * @return array|bool
     */
    public function powerOff()
    {
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->post('/droplets/'.$this->dropletId.'/actions', [
            'type' => 'power_off',
        ]);
    }

    /**
     * @return array|bool
     */
    public function powerOn()
    {
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->post('/droplets/'.$this->dropletId.'/actions', [
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
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->post('/droplets/'.$this->dropletId.'/actions', [
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
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->post('/droplets/'.$this->dropletId.'/actions', [
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
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->post('/droplets/'.$this->dropletId.'/actions', [
            'type' => 'rename',
            'name' => $name,
        ]);
    }

    /**
     * @return array|bool
     */
    public function enableIPv6()
    {
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->post('/droplets/'.$this->dropletId.'/actions', [
            'type' => 'enable_ipv6',
        ]);
    }

    /**
     * @return array|bool
     */
    public function enablePrivateNetworking()
    {
        if (!$this->client->authKey) {
            return false;
        }

        return $this->client->post('/droplets/'.$this->dropletId.'/actions', [
            'type' => 'enable_private_networking',
        ]);
    }
}
