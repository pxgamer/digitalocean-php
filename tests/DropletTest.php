<?php

namespace pxgamer\DigitalOcean;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

/**
 * Class DropletTest
 */
class DropletTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testCanGetDroplet()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode([
                'droplet' => [
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
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = $this->getInitializedDroplet($handler)->getDroplet();

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanDeleteDroplet()
    {
        $mock = new MockHandler([
            new Response(204),
        ]);

        $handler = HandlerStack::create($mock);

        $response = $this->getInitializedDroplet($handler)->deleteDroplet();

        $this->assertTrue($response);
    }

    /**
     * @throws \Exception
     */
    public function testCanListNeighbours()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode([
                'droplets' => [
                    new \stdClass(),
                    new \stdClass(),
                ],
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = $this->getInitializedDroplet($handler)->listNeighbours();

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanCreateSnapshot()
    {
        $mock = new MockHandler([
            new Response(201, [], json_encode([
                'action' => [
                    'id'            => 000000,
                    'status'        => 'in-progress',
                    'type'          => 'snapshot',
                    'started_at'    => '2018-02-08T00:00:00Z',
                    'completed_at'  => null,
                    'resource_id'   => 000000,
                    'resource_type' => 'droplet',
                    'region'        => 'nyc3',
                    'region_slug'   => 'nyc3',
                ],
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = $this->getInitializedDroplet($handler)->createSnapshot('test-snapshot');

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanEnableBackups()
    {
        $mock = new MockHandler([
            new Response(201, [], json_encode([
                'action' => [
                    'id'            => 000000,
                    'status'        => 'in-progress',
                    'type'          => 'enable_backups',
                    'started_at'    => '2018-02-08T00:00:00Z',
                    'completed_at'  => null,
                    'resource_id'   => 000000,
                    'resource_type' => 'droplet',
                    'region'        => 'nyc3',
                    'region_slug'   => 'nyc3',
                ],
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = $this->getInitializedDroplet($handler)->enableBackups();

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanDisableBackups()
    {
        $mock = new MockHandler([
            new Response(201, [], json_encode([
                'action' => [
                    'id'            => 000000,
                    'status'        => 'in-progress',
                    'type'          => 'disable_backups',
                    'started_at'    => '2018-02-08T00:00:00Z',
                    'completed_at'  => null,
                    'resource_id'   => 000000,
                    'resource_type' => 'droplet',
                    'region'        => 'nyc3',
                    'region_slug'   => 'nyc3',
                ],
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = $this->getInitializedDroplet($handler)->disableBackups();

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanReboot()
    {
        $mock = new MockHandler([
            new Response(201, [], json_encode([
                'action' => [
                    'id'            => 000000,
                    'status'        => 'in-progress',
                    'type'          => 'reboot',
                    'started_at'    => '2018-02-08T00:00:00Z',
                    'completed_at'  => null,
                    'resource_id'   => 000000,
                    'resource_type' => 'droplet',
                    'region'        => 'nyc3',
                    'region_slug'   => 'nyc3',
                ],
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = $this->getInitializedDroplet($handler)->reboot();

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanPowerCycle()
    {
        $mock = new MockHandler([
            new Response(201, [], json_encode([
                'action' => [
                    'id'            => 000000,
                    'status'        => 'in-progress',
                    'type'          => 'power_cycle',
                    'started_at'    => '2018-02-08T00:00:00Z',
                    'completed_at'  => null,
                    'resource_id'   => 000000,
                    'resource_type' => 'droplet',
                    'region'        => 'nyc3',
                    'region_slug'   => 'nyc3',
                ],
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = $this->getInitializedDroplet($handler)->powerCycle();

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanShutdown()
    {
        $mock = new MockHandler([
            new Response(201, [], json_encode([
                'action' => [
                    'id'            => 000000,
                    'status'        => 'in-progress',
                    'type'          => 'shutdown',
                    'started_at'    => '2018-02-08T00:00:00Z',
                    'completed_at'  => null,
                    'resource_id'   => 000000,
                    'resource_type' => 'droplet',
                    'region'        => 'nyc3',
                    'region_slug'   => 'nyc3',
                ],
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = $this->getInitializedDroplet($handler)->shutdown();

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanPowerOff()
    {
        $mock = new MockHandler([
            new Response(201, [], json_encode([
                'action' => [
                    'id'            => 000000,
                    'status'        => 'in-progress',
                    'type'          => 'power_off',
                    'started_at'    => '2018-02-08T00:00:00Z',
                    'completed_at'  => null,
                    'resource_id'   => 000000,
                    'resource_type' => 'droplet',
                    'region'        => 'nyc3',
                    'region_slug'   => 'nyc3',
                ],
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = $this->getInitializedDroplet($handler)->powerOff();

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanPowerOn()
    {
        $mock = new MockHandler([
            new Response(201, [], json_encode([
                'action' => [
                    'id'            => 000000,
                    'status'        => 'in-progress',
                    'type'          => 'power_on',
                    'started_at'    => '2018-02-08T00:00:00Z',
                    'completed_at'  => null,
                    'resource_id'   => 000000,
                    'resource_type' => 'droplet',
                    'region'        => 'nyc3',
                    'region_slug'   => 'nyc3',
                ],
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = $this->getInitializedDroplet($handler)->powerOn();

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanResize()
    {
        $mock = new MockHandler([
            new Response(201, [], json_encode([
                'action' => [
                    'id'            => 000000,
                    'status'        => 'in-progress',
                    'type'          => 'resize',
                    'started_at'    => '2018-02-08T00:00:00Z',
                    'completed_at'  => null,
                    'resource_id'   => 000000,
                    'resource_type' => 'droplet',
                    'region'        => 'nyc3',
                    'region_slug'   => 'nyc3',
                ],
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = $this->getInitializedDroplet($handler)->resize('1gb', true);

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanResetPassword()
    {
        $mock = new MockHandler([
            new Response(201, [], json_encode([
                'action' => [
                    'id'            => 000000,
                    'status'        => 'in-progress',
                    'type'          => 'password_reset',
                    'started_at'    => '2018-02-08T00:00:00Z',
                    'completed_at'  => null,
                    'resource_id'   => 000000,
                    'resource_type' => 'droplet',
                    'region'        => 'nyc3',
                    'region_slug'   => 'nyc3',
                ],
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = $this->getInitializedDroplet($handler)->passwordReset();

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanRename()
    {
        $mock = new MockHandler([
            new Response(201, [], json_encode([
                'action' => [
                    'id'            => 000000,
                    'status'        => 'in-progress',
                    'type'          => 'rename',
                    'started_at'    => '2018-02-08T00:00:00Z',
                    'completed_at'  => null,
                    'resource_id'   => 000000,
                    'resource_type' => 'droplet',
                    'region'        => 'nyc3',
                    'region_slug'   => 'nyc3',
                ],
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = $this->getInitializedDroplet($handler)->rename('new-droplet-name');

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanEnableIPv6()
    {
        $mock = new MockHandler([
            new Response(201, [], json_encode([
                'action' => [
                    'id'            => 000000,
                    'status'        => 'in-progress',
                    'type'          => 'enable_ipv6',
                    'started_at'    => '2018-02-08T00:00:00Z',
                    'completed_at'  => null,
                    'resource_id'   => 000000,
                    'resource_type' => 'droplet',
                    'region'        => 'nyc3',
                    'region_slug'   => 'nyc3',
                ],
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = $this->getInitializedDroplet($handler)->enableIPv6();

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * @throws \Exception
     */
    public function testCanEnablePrivateNetworking()
    {
        $mock = new MockHandler([
            new Response(201, [], json_encode([
                'action' => [
                    'id'            => 000000,
                    'status'        => 'in-progress',
                    'type'          => 'enable_private_networking',
                    'started_at'    => '2018-02-08T00:00:00Z',
                    'completed_at'  => null,
                    'resource_id'   => 000000,
                    'resource_type' => 'droplet',
                    'region'        => 'nyc3',
                    'region_slug'   => 'nyc3',
                ],
            ])),
        ]);

        $handler = HandlerStack::create($mock);

        $response = $this->getInitializedDroplet($handler)->enablePrivateNetworking();

        $this->assertInstanceOf(\stdClass::class, $response);
    }

    /**
     * Retrieve a pre-filled Droplet instance.
     *
     * @param HandlerStack $handler
     * @return Droplet
     */
    private function getInitializedDroplet(HandlerStack $handler)
    {
        $droplet = new Droplet($this->authKey, $this->dropletTestId, $handler);

        return $droplet;
    }
}
