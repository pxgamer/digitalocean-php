<?php

namespace pxgamer\DigitalOcean;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

/**
 * Class DropletsTest
 */
class DropletsTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testCanGetDropletsList()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode([
                'droplet' => [
                    'id'           => 00000000,
                    'name'         => 'example.com',
                    'memory'       => 1024,
                    'vcpus'        => 1,
                    'disk'         => 25,
                    'locked'       => true,
                    'status'       => 'new',
                    'kernel'       => [
                        'id'      => 00000000,
                        'name'    => '...',
                        'version' => '...',
                    ],
                    'created_at'   => '2014-11-14T16:36:31Z',
                    'features'     => [
                        'virtio',
                    ],
                    'backup_ids'   => [],
                    'snapshot_ids' => [],
                    'image'        => [],
                    'volume_ids'   => [],
                    'size'         => [],
                    'size_slug'    => 's-1vcpu-1gb',
                    'networks'     => [],
                    'region'       => [],
                    'tags'         => [
                        'web',
                    ],
                ],
                'links'   => [
                    'actions' => [
                        [
                            'id'   => 00000000,
                            'rel'  => 'create',
                            'href' => '...',
                        ],
                    ],
                ],
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = (new Droplets($this->authKey, $handler))->listDroplets();

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanGetDropletsNeighbours()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode([
                'neighbors' => [
                    new \stdClass(),
                    new \stdClass(),
                ],
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = (new Droplets($this->authKey, $handler))->listNeighbours();

        $this->assertInstanceOf(\stdClass::class, $response);
    }
}
