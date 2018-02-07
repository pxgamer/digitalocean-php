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
                'droplets' => [
                    [
                        'id'           => 3164494,
                        'name'         => 'example.com',
                        'memory'       => 1024,
                        'vcpus'        => 1,
                        'disk'         => 25,
                        'locked'       => false,
                        'status'       => 'active',
                        'kernel'       => [
                            'id'      => 2233,
                            'name'    => 'Ubuntu 14.04 x64 vmlinuz-3.13.0-37-generic',
                            'version' => '3.13.0-37-generic',
                        ],
                        'created_at'   => '2014-11-14T16=>36=>31Z',
                        'features'     => [
                            'ipv6',
                            'virtio',
                        ],
                        'backup_ids'   => [

                        ],
                        'snapshot_ids' => [
                            7938206,
                        ],
                        'image'        => [
                            'id'             => 6918990,
                            'name'           => '14.04 x64',
                            'distribution'   => 'Ubuntu',
                            'slug'           => 'ubuntu-16-04-x64',
                            'public'         => true,
                            'regions'        => [
                                'nyc1',
                                'ams1',
                                'sfo1',
                                'nyc2',
                                'ams2',
                                'sgp1',
                                'lon1',
                                'nyc3',
                                'ams3',
                                'nyc3',
                            ],
                            'created_at'     => '2014-10-17T20=>24=>33Z',
                            'type'           => 'snapshot',
                            'min_disk_size'  => 20,
                            'size_gigabytes' => 2.34,
                        ],
                        'volume_ids'   => [

                        ],
                        'size'         => [
                        ],
                        'size_slug'    => 's-1vcpu-1gb',
                        'networks'     => [
                            'v4' => [
                                [
                                    'ip_address' => '104.131.186.241',
                                    'netmask'    => '255.255.240.0',
                                    'gateway'    => '104.131.176.1',
                                    'type'       => 'public',
                                ],
                            ],
                            'v6' => [
                                [
                                    'ip_address' => '2604=>A880=>0800=>0010=>0000=>0000=>031D=>2001',
                                    'netmask'    => 64,
                                    'gateway'    => '2604=>A880=>0800=>0010=>0000=>0000=>0000=>0001',
                                    'type'       => 'public',
                                ],
                            ],
                        ],
                        'region'       => [
                            'name'      => 'New York 3',
                            'slug'      => 'nyc3',
                            'sizes'     => [
                                's-1vcpu-1gb',
                                's-1vcpu-2gb',
                                's-1vcpu-3gb',
                                's-2vcpu-2gb',
                                's-3vcpu-1gb',
                                's-2vcpu-4gb',
                                's-4vcpu-8gb',
                                's-6vcpu-16gb',
                                's-8vcpu-32gb',
                                's-12vcpu-48gb',
                                's-16vcpu-64gb',
                                's-20vcpu-96gb',
                                's-24vcpu-128gb',
                                's-32vcpu-192gb',
                            ],
                            'features'  => [
                                'virtio',
                                'private_networking',
                                'backups',
                                'ipv6',
                                'metadata',
                            ],
                            'available' => true,
                        ],
                        'tags'         => [],
                    ],
                ],
                "links"    => [
                    "pages" => [
                        "last" => "https://api.digitalocean.com/v2/droplets?page=3&per_page=1",
                        "next" => "https://api.digitalocean.com/v2/droplets?page=2&per_page=1",
                    ],
                ],
                "meta"     => [
                    "total" => 3,
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
    public function testCanCreateDroplet()
    {
        $mock = new MockHandler([
            new Response(201, [], json_encode([
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

        $attributes = [];
        $response = (new Droplets($this->authKey, $handler))->createDroplet($attributes);

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
