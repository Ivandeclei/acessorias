<?php
namespace App\Ivandeclei\Controllers;

use App\Ivandeclei\Models\Clients;

class ClientController
{
    private $client;
    private $perPage = 10;

    public function __construct()
    {
        $database = new \App\Ivandeclei\Configs\Databases();
        $db = $database->getConnection();
        $this->client = new Clients($db);
    }

    public function getClients()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $this->perPage;

        $clients = $this->client->getClients($this->perPage, $offset);
        $totalClients = $this->client->getTotalClients();
        $totalPages = ceil($totalClients / $this->perPage);

        require_once './Views/index.php';
    }

    public function addRecords()
    {
        $totalClients = $this->client->getTotalClients();
        if ($totalClients === 0) {
            $this->client->addMultipleClients(120);
            header('Location: http://localhost:8080?message=Records added successfully!');
            exit();
        } else {
            echo 'Records already exist!';
        }
    }

    public function getClientCount()
    {
        return $this->client->getTotalClients();
    }
}
?>
