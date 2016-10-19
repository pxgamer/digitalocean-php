<?php

class DigitalOcean
{
    private $authKey, $dropletId = '';
    private $isInitialised = false;

    private $baseUrl = 'https://api.digitalocean.com';
    private $jsonType = 'application/json';

    public function __construct($authKey = '')
    {
        $this->authKey = $authKey;
        if ($this->authKey !== '') {
            $this->ready();

            return true;
        } else {
            return false;
        }
    }

    private function ready()
    {
        $this->isInitialised = true;

        return true;
    }

    public function setDroplet($dropletId = '')
    {
        $this->dropletId = $dropletId;
        if ($this->dropletId !== '') {
            return true;
        } else {
            return false;
        }
    }

    private function curlHeaders()
    {
        return [
        'Content-Type: '.$this->jsonType,
        'Authorization: Bearer '.$this->authKey,
      ];
    }

    public function createSnapshot($name = '')
    {
        $name = ($name !== '') ? $name : date('Y-m-d_h.m.s');
        $snapshotUrl = $this->baseUrl.'/v2/droplets/'.$this->dropletId.'/actions';
        $cu = curl_init();

        $data = (object) [
          'type' => 'snapshot',
          'name' => $name,
        ];

        curl_setopt_array(
          $cu,
          [
            CURLOPT_URL => $snapshotUrl,
            CURLOPT_HTTPHEADER => $this->curlHeaders(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
          ]
        );

        $res = curl_exec($cu);
        $res = json_decode($res);

        return ($res->action->status == 'in-progress') ? true : false;
    }

    public function printAll()
    {
        print_r($this);
    }
}
