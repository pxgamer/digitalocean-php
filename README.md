# digitalocean-php

An easy to use wrapper for the DigitalOcean API written in PHP.

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
