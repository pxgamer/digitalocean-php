<?php

namespace pxgamer\DigitalOcean;

use GuzzleHttp\HandlerStack;

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

    public function __construct(string $authKey, HandlerStack $mockHandler = null)
    {
        $this->authKey = $authKey;
        $this->guzzle = new \GuzzleHttp\Client([
            'base_uri' => Client::BASE_URL,
            'headers'  => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer '.$this->authKey,
            ],
            'handler'  => $mockHandler,
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
                ->get($endpoint)
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
                ->post($endpoint, [
                    'body' => \GuzzleHttp\json_encode($body),
                ])
                ->getBody()
                ->getContents()
        );
    }

    /**
     * @param string $endpoint
     *
     * @return bool
     */
    public function delete(string $endpoint)
    {
        return $this->guzzle
                   ->delete($endpoint)
                   ->getStatusCode() === 204;
    }
}
