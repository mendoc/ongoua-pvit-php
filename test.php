<?php
require_once __DIR__ . '/vendor/autoload.php';

use Ongoua\OngouaPvit;

//$clientPvit = new OngouaPvit("074213803", "");
//$clientPvit->setMontant(100);
//$clientPvit->setRef("PROD66784");
//$clientPvit->setTelClient("074213803");
//
//try {
//    $response = $clientPvit->send();
//    echo $response->getStatut();
//} catch (Exception $e) {
//    echo 'Error message: ' . $e->getMessage();
//}

try {
    // $xmlPVit contains XML response provided by PVit
    $xmlPVit = '<?xml version="1.0" encoding="UTF-8"?> <REPONSE> <INTERFACEID>BAKOAI</INTERFACEID> <REF>PROD2X3T8</REF> <TYPE>1</TYPE> <STATUT>003</STATUT> <OPERATEUR>AM</OPERATEUR> <TEL_CLIENT></TEL_CLIENT> <TOKEN></TOKEN> <MESSAGE>Le marchand est inconnu de PVIT</MESSAGE> </REPONSE>';
    $data = OngouaPvit::parse($xmlPVit);
    echo $data->getStatut();
} catch (Exception $e) {
    echo 'Error message: ' . $e->getMessage();
}