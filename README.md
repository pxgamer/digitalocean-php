# digitalocean-php

An easy to use wrapper for the DigitalOcean API written in PHP.

## Usage

__Include the class:__
- Using Composer  

`composer require pxgamer/digitalocean-php`  
```php
<?php
require 'vendor/autoload.php';
```
- Including the file manually  
```php
<?php
include 'src/Client.php';
```

Once included, you can initialise the class using either of the following:

```php
$client = new \pxgamer\DigitalOcean\Client;
```
```php
use \pxgamer\DigitalOcean\Client;
$client = new Client;
```
## Classes

##### Client
- This is the main class and is used to hold the CURL functions. It also contains the API key, and should be called first.  
- _This class __must__ be passed to other classes upon their initialisation._  
##### Account
- This class is used to retrieve account information.  
##### Domains
- This class is used to modify and retrieve domain information.  
##### Droplets
- This class is used to manage multiple droplets, or all droplets for an account.  
##### Droplet
- This class is used to manage droplets individually and can provides functions such as creating snapshots, enabling and disabling features, etc.  

## Getting started with Composer
```php
<?php
// Include Composer
require 'vendor/autoload.php';

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

## Methods

### Client Class
##### Initialise Client Class
```php
/**
 * This is required to be initialised first.
 * It must be passed into all other classes.
 */
use \pxgamer\DigitalOcean\Client;
$client = new Client;
$client->setAuthKey('API_KEY');
```

### Account Class
##### Initialise Account Class
```php
use \pxgamer\DigitalOcean\Account;
$account = new Account($client);
```
##### Getting Account Information
```php
$account->getAccount();
```

### Domains Class
##### Initialise Domains Class
```php
use \pxgamer\DigitalOcean\Domains;
$domains = new Domains($client);
```
##### Getting a list of domains
```php
$domains->listDomains();
```
##### Getting information for a specific domain
```php
$domains->getDomain('example.com');
```
##### Create a new domain
```php
$domains->createDomain('example.com');
```
##### Deleting a domain
```php
$domains->deleteDomain('example.com');
```

### Droplets Class
##### Initialise Droplets Class
```php
// Requires the Client class to be initialised
use \pxgamer\DigitalOcean\Droplets;
$droplets = new Droplets($client);
```
##### Listing droplets
```php
$droplets->listDroplets();
```
##### Listing neighbours of Droplets (droplets in the same location)
```php
$droplets->listNeighbours();
```

### Droplet Class
##### Initialise Droplet Class
```php
// Requires the Client class to be initialised
use \pxgamer\DigitalOcean\Droplet;
$droplet = new Droplet($client);
```
##### Setting the Droplet ID
```php
$droplet->setDroplet('DROPLET_ID');
```
##### Getting information about a droplet
```php
// Requires the droplet ID to be set
$droplet->getDroplet();
```
##### Creating a Droplet
```php
$array = ($dropletAttributes)[
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
##### Deleting a Droplet
```php
// Requires the droplet ID to be set
$droplet->deleteDroplet();
```
##### Listing a Droplet's neighbours
```php
// Requires the droplet ID to be set
$droplet->listNeighbours();
```
##### Create a snapshot
```php
// Requires the droplet ID to be set
$droplet->createSnapshot('SNAPSHOT-NAME');
```
##### Enabling backups for a Droplet
```php
// Requires the droplet ID to be set
$droplet->enableBackups();
```
##### Disabling backups for a Droplet
```php
// Requires the droplet ID to be set
$droplet->disableBackups();
```
##### Rebooting a Droplet
```php
// Requires the droplet ID to be set
$droplet->reboot();
```
##### Power Cycling a Droplet
```php
// Requires the droplet ID to be set
$droplet->powerCycle();
```
##### Shutting down a Droplet
```php
// Requires the droplet ID to be set
$droplet->shutdown();
```
##### Powering off a Droplet
```php
// Requires the droplet ID to be set
$droplet->powerOff();
```
##### Powering on a Droplet
```php
// Requires the droplet ID to be set
$droplet->powerOn();
```
##### Resizing a Droplet
```php
/**
 * // Requires the droplet ID to be set
 * Attributes:
 * - $size [string] (e.g. '1gb')
 * - $increaseDiskSize [boolean] (e.g. false) - Determines whether this is a permanent resize or not
 */

$droplet->resize('1gb', false);
```
##### Reset a Droplet's password
```php
// Requires the droplet ID to be set
$droplet->passwordReset();
```
##### Renaming a Droplet
```php
// Requires the droplet ID to be set
$droplet->rename('NEW_DROPLET_NAME');
```
##### Enable IPv6 for a Droplet
```php
// Requires the droplet ID to be set
$droplet->enableIPv6();
```
##### Enable Private Networking for a Droplet
```php
// Requires the droplet ID to be set
$droplet->enablePrivateNetworking();
```