<?php

namespace pxgamer\DigitalOcean;

/**
 * Class Sector
 */
class Sector
{
    /**
     * @var string
     */
    protected $authKey;
    /**
     * @var string
     */
    private $jsonType = 'application/json';

    public function __construct(string $authKey)
    {
        $this->authKey = $authKey;
    }

    /**
     * @param $endpoint
     *
     * @return array|mixed
     */
    public function get($endpoint)
    {
        $cu = curl_init();

        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL            => Client::BASE_URL.$endpoint,
                CURLOPT_HTTPHEADER     => $this->curlHeaders(),
                CURLOPT_RETURNTRANSFER => true,
            ]
        );

        return $this->toArray(curl_exec($cu));
    }

    /**
     * @param $endpoint
     * @param $content
     *
     * @return array|mixed
     */
    public function post($endpoint, $content)
    {
        $cu = curl_init();

        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL            => Client::BASE_URL.$endpoint,
                CURLOPT_HTTPHEADER     => $this->curlHeaders(),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST           => true,
                CURLOPT_POSTFIELDS     => json_encode($content),
            ]
        );

        return $this->toArray(curl_exec($cu));
    }

    /**
     * @param $endpoint
     * @param $content
     *
     * @return array|mixed
     */
    public function put($endpoint, $content)
    {
        $cu = curl_init();

        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL            => Client::BASE_URL.$endpoint,
                CURLOPT_HTTPHEADER     => $this->curlHeaders(),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST           => true,
                CURLOPT_POSTFIELDS     => json_encode($content),
                CURLOPT_CUSTOMREQUEST  => 'PUT',
            ]
        );

        return $this->toArray(curl_exec($cu));
    }

    /**
     * @param $endpoint
     *
     * @return array|mixed
     */
    public function delete($endpoint)
    {
        $cu = curl_init();

        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL            => Client::BASE_URL.$endpoint,
                CURLOPT_HTTPHEADER     => $this->curlHeaders(),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST  => 'DELETE',
            ]
        );

        return $this->toArray(curl_exec($cu));
    }

    /**
     * @return array
     */
    private function curlHeaders()
    {
        return [
            'Content-Type: '.$this->jsonType,
            'Authorization: Bearer '.$this->authKey,
        ];
    }

    /**
     * @param $string
     *
     * @return array|mixed
     */
    private function toArray($string)
    {
        if (is_string($string)) {
            return json_decode($string, true);
        } else {
            return [];
        }
    }
}
