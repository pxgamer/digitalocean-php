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
$digitalOcean = new \pxgamer\DigitalOcean\Client('API-KEY');
```
```php
use \pxgamer\DigitalOcean\Client;
$digitalOcean = new Client('API-KEY');
```

## Class Methods

Method Name      | Parameters  | Returns
---------------- | ----------- | -------
__construct()    | string      | `string (json)`
setDroplet()     | string      | `string (json)`
createSnapshot() | string      | `string (json)`

## Examples

```php
// createSnapshot
use \pxgamer\DigitalOcean\Client;
$do = new Client('API-KEY';
$do->setDroplet('DROPLET-ID');
$do->createSnapshot('SNAPSHOT-NAME');
```

_NOTE: This is still a work in progress._
