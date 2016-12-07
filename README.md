# digitalocean-php

An easy to use wrapper for the DigitalOcean API written in PHP.

[![GitHub release](https://img.shields.io/github/release/PXgamer/digitalocean-php.svg)](https://github.com/PXgamer/digitalocean-php/releases/latest) [![Scrutinizer Build](https://img.shields.io/scrutinizer/build/g/PXgamer/digitalocean-php.svg)](https://scrutinizer-ci.com/g/PXgamer/digitalocean-php/build-status/master) [![SensioLabs Insight](https://img.shields.io/sensiolabs/i/018dadac-10ae-41ea-8177-99341f60a407.svg)](https://insight.sensiolabs.com/projects/018dadac-10ae-41ea-8177-99341f60a407)

## Usage

__Include the class:__
- Using Composer  
`composer require pxgamer/digitalocean-php`  
```php
<?php
require 'vendor/autoload.php';
$do = new \pxgamer\DigitalOcean('API-KEY');
```
- Including the file manually  
```php
<?php
include 'src/DigitalOcean.php';
$do = new \pxgamer\DigitalOcean('API-KEY');
```

## Example

```php
// createSnapshot
$do = new \pxgamer\DigitalOcean('API-KEY');
$do->setDroplet('DROPLET-ID');
$do->createSnapshot('SNAPSHOT-NAME');
```

_NOTE: This is still a work in progress._
