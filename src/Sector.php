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
     * @var \GuzzleHttp\Client
     */
    protected $guzzle;

    public function __construct(string $authKey)
    {
        $this->authKey = $authKey;
        $this->guzzle = new \GuzzleHttp\Client([
            'base_uri' => Client::BASE_URL,
            'headers'  => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer '.$this->authKey,
            ],
        ]);
    }

    /**
     * @param string $endpoint
     *
     * @return array|mixed
     */
    public function get(string $endpoint)
    {
        return \GuzzleHttp\json_decode(
            $this->guzzle
                ->get(Client::BASE_URL.$endpoint)
                ->getBody()
                ->getContents()
        );
    }

    /**
     * @param string $endpoint
     * @param array  $body
     *
     * @return array|mixed
     */
    public function post(string $endpoint, array $body)
    {
        return \GuzzleHttp\json_decode(
            $this->guzzle
                ->post(Client::BASE_URL.$endpoint, [
                    'body' => $body,
                ])
                ->getBody()
                ->getContents()
        );
    }

    /**
     * @param string $endpoint
     * @param array  $body
     *
     * @return array|mixed
     */
    public function put(string $endpoint, array $body)
    {
        return \GuzzleHttp\json_decode(
            $this->guzzle
                ->put(Client::BASE_URL.$endpoint, [
                    'body' => $body,
                ])
                ->getBody()
                ->getContents()
        );
    }

    /**
     * @param string $endpoint
     *
     * @return array|mixed
     */
    public function delete(string $endpoint)
    {
        return \GuzzleHttp\json_decode(
            $this->guzzle
                ->delete(Client::BASE_URL.$endpoint)
                ->getBody()
                ->getContents()
        );
    }
}
