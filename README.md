# digitalocean-php

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Style CI][ico-styleci]][link-styleci]
[![Code Coverage][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

An easy to use wrapper for the DigitalOcean API written in PHP.

## Structure

```
src/
tests/
vendor/
```

## Install

Via Composer

``` bash
$ composer require pxgamer/digitalocean-php
```

## Usage

```php
use \pxgamer\DigitalOcean\Client;
$client = new Client();
```

### Classes

_Client_
- This is the main class and is used to hold the CURL functions. It also contains the API key, and should be called first.  
- _This class **must** be passed to other classes upon their initialisation._  

_Account_
- This class is used to retrieve account information.  

_Domains_
- This class is used to modify and retrieve domain information.  

_Droplets_
- This class is used to manage multiple droplets, or all droplets for an account.  

_Droplet_
- This class is used to manage droplets individually and can provides functions such as creating snapshots, enabling and disabling features, etc.  

```php
// Use the specific classes as their short names
use \pxgamer\DigitalOcean;

// Create a new Client instance
$client   = new DigitalOcean\Client();
$client->setAuthKey('API_KEY');

// Initialise a new instance of each class
$account  = new DigitalOcean\Account($client);
$domains  = new DigitalOcean\Domains($client);
$droplets = new DigitalOcean\Droplets($client);
$droplet  = new DigitalOcean\Droplet($client);
```

### Methods

#### Client Class

```php
/**
 * This is required to be initialised first.
 * It must be passed into all other classes.
 */
use \pxgamer\DigitalOcean\Client;
$client = new Client();
$client->setAuthKey('API_KEY');
```

#### Account Class

_Initialise Account Class_

```php
use \pxgamer\DigitalOcean\Account;
$account = new Account($client);
```

_Getting Account Information_

```php
$account->getAccount();
```

#### Domains Class

_Initialise Domains Class_

```php
use \pxgamer\DigitalOcean\Domains;
$domains = new Domains($client);
```

_Getting a list of domains_

```php
$domains->listDomains();
```

_Getting information for a specific domain_

```php
$domains->getDomain('example.com');
```

_Create a new domain_

```php
$domains->createDomain('example.com');
```

_Deleting a domain_

```php
$domains->deleteDomain('example.com');
```

#### Droplets Class

_Initialise Droplets Class_

```php
// Requires the Client class to be initialised
use \pxgamer\DigitalOcean\Droplets;
$droplets = new Droplets($client);
```

_Listing droplets_

```php
$droplets->listDroplets();
```

_Listing neighbours of Droplets (droplets in the same location)_

```php
$droplets->listNeighbours();
```

#### Droplet Class

_Initialise Droplet Class_

```php
// Requires the Client class to be initialised
use \pxgamer\DigitalOcean\Droplet;
$droplet = new Droplet($client);
```

_Setting the Droplet ID_

```php
$droplet->setDroplet('DROPLET_ID');
```

_Getting information about a droplet_

```php
// Requires the droplet ID to be set
$droplet->getDroplet();
```

_Creating a Droplet_

```php
$dropletAttributes = (array)[
    'name' => 'example.com',       // Required
    'region' => 'nyc3',            // Required
    'size' => '512mb',             // Required
    'image' => 'ubuntu-14-04-x64', // Required
    'ssh_keys' => null,
    'backups' => false,
    'ipv6' => true,
    'user_data' => null,
    'private_networking' => null,
    'volume' => null,
    'tags' => [
        'web'
    ],
];

$droplet->createDroplet($dropletAttributes);
```

_Deleting a Droplet_

```php
// Requires the droplet ID to be set
$droplet->deleteDroplet();
```

_Listing a Droplet's neighbours_

```php
// Requires the droplet ID to be set
$droplet->listNeighbours();
```

_Create a snapshot_

```php
// Requires the droplet ID to be set
$droplet->createSnapshot('SNAPSHOT-NAME');
```

_Enabling backups for a Droplet_

```php
// Requires the droplet ID to be set
$droplet->enableBackups();
```

_Disabling backups for a Droplet_

```php
// Requires the droplet ID to be set
$droplet->disableBackups();
```

_Rebooting a Droplet_

```php
// Requires the droplet ID to be set
$droplet->reboot();
```

_Power Cycling a Droplet_

```php
// Requires the droplet ID to be set
$droplet->powerCycle();
```

_Shutting down a Droplet_

```php
// Requires the droplet ID to be set
$droplet->shutdown();
```

_Powering off a Droplet_

```php
// Requires the droplet ID to be set
$droplet->powerOff();
```

_Powering on a Droplet_

```php
// Requires the droplet ID to be set
$droplet->powerOn();
```

_Resizing a Droplet_

```php
/**
 * Requires the droplet ID to be set
 *
 * Attributes:
 * - $size [string] (e.g. '1gb')
 * - $increaseDiskSize [boolean] (e.g. false) - Determines whether this is a permanent resize or not
 */

$droplet->resize('1gb', false);
```

_Reset a Droplet's password_

```php
// Requires the droplet ID to be set
$droplet->passwordReset();
```

_Renaming a Droplet_

```php
// Requires the droplet ID to be set
$droplet->rename('NEW_DROPLET_NAME');
```

_Enable IPv6 for a Droplet_

```php
// Requires the droplet ID to be set
$droplet->enableIPv6();
```

_Enable Private Networking for a Droplet_

```php
// Requires the droplet ID to be set
$droplet->enablePrivateNetworking();
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email owzie123@gmail.com instead of using the issue tracker.

## Credits

- [pxgamer][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/pxgamer/digitalocean-php.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/pxgamer/digitalocean-php/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/71349574/shield
[ico-code-quality]: https://img.shields.io/codecov/c/github/pxgamer/digitalocean-php.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pxgamer/digitalocean-php.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/pxgamer/digitalocean-php
[link-travis]: https://travis-ci.org/pxgamer/digitalocean-php
[link-styleci]: https://styleci.io/repos/71349574
[link-code-quality]: https://codecov.io/gh/pxgamer/digitalocean-php
[link-downloads]: https://packagist.org/packages/pxgamer/digitalocean-php
[link-author]: https://github.com/pxgamer
[link-contributors]: ../../contributors
