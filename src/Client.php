<?php

namespace pxgamer\DigitalOcean;

class Client
{
    const BASE_URL = 'https://api.digitalocean.com/v2';

    private $authKey;

    private $dropletId = '';

    private $isInitialised = false;

    private $jsonType = 'application/json';

    public function __construct($authKey = '')
    {
        $this->authKey = $authKey;
        if ($this->authKey !== '') {
            $this->isInitialised = true;

            return true;
        } else {
            return false;
        }
    }

    public function setDroplet($dropletId = '')
    {
        if ($this->isInitialised) {
            return false;
        }
        $this->dropletId = $dropletId;
        if ($this->dropletId !== '') {
            return true;
        } else {
            return false;
        }
    }

    public function createSnapshot($name = '')
    {
        if ($this->isInitialised) {
            return false;
        }
        $name = ($name !== '') ? $name : date('Y-m-d_h.m.s');

        return $this->post('/droplets/' . $this->dropletId . '/actions', [
            'type' => 'snapshot',
            'name' => $name,
        ]);
    }

    public function post($endpoint, $content)
    {
        $cu = curl_init();

        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL => self::BASE_URL . $endpoint,
                CURLOPT_HTTPHEADER => $this->curlHeaders(),
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($content),
            ]
        );

        return curl_exec($cu);
    }

    private function curlHeaders()
    {
        return [
            'Content-Type: ' . $this->jsonType,
            'Authorization: Bearer ' . $this->authKey,
        ];
    }
}
