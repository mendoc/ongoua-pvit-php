# ongoua-pvit-php
A composer package for use PVit payment gateway

## Installation
### Using Composer
```bash
composer require ongoua/pvit
```
## Usage
### Submitting request

```php
<?php

use Ongoua\OngouaPvit;

const TEL_MARCHAND = "077000000";
const TOKEN        = "PVIT_TOKEN";

$clientPvit = new OngouaPvit(TEL_MARCHAND, TOKEN);
$clientPvit->setMontant(100);
$clientPvit->setRef("PROD66784");
$clientPvit->setTelClient("074567890");

try {
    $response = $clientPvit->send();
    echo $response->getStatut();
} catch (Exception $e) {
    echo 'Error message: ' . $e->getMessage();
}
```
### In your PVit callback
```php
<?php

use Ongoua\OngouaPvit;

try {
    // $xmlPVit contains XML response provided by PVit
    $xmlPVit = "XML response from PVit";
    $data = OngouaPvit::parse($xmlPVit);
    echo $data->getStatut();
} catch (Exception $e) {
    echo 'Error message: ' . $e->getMessage();
}
```

## Report bug
DM me on Twitter [@DimitriONGOUA](https://twitter.com/DimitriOngoua)