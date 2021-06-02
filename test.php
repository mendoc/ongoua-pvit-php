<?php

require_once "src/Ongoua/OngouaPvit.php";
require_once "src/Ongoua/OngouaPvitResponse.php";

use Ongoua\OngouaPvit;

$clientPvit = new OngouaPvit("074213803", "");
$clientPvit->setMontant(100);
$clientPvit->setRef("PROD66784");
$clientPvit->setTelClient("074213803");

try {
    $response = $clientPvit->send();
    echo $response->getStatut();
} catch (Exception $e) {
    echo 'Error message: ' . $e->getMessage();
}
