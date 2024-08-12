<?php

namespace App\Ivandeclei;

require_once '../src/Configs/db.php';
require_once '../src/Controllers/ClientController.php';
require_once '../src/Models/Client.php';

use App\Ivandeclei\Controllers\ClientController;

$controller = new ClientController();

$totalClients = $controller->getClientCount();

if ($totalClients === 0) {
    $controller->addRecords();
} else {
    $clients = $controller->getClients();
}
?>
