# digitalocean-php

An easy to use wrapper for the DigitalOcean API written in PHP.

## Example

```php
// createSnapshot
$do = new DigitalOcean('API-KEY');
$do->setDroplet('DROPLET-ID');
$do->createSnapshot('SNAPSHOT-NAME');
```

_NOTE: This is still a work in progress._
