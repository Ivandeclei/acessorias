<?php
namespace App\Ivandeclei\Models;

use PDO;

class Clients
{
    private $conn;
    private $table_name = "clients";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getClients($limit, $offset)
    {
        $query = "SELECT * FROM " . $this->table_name . " LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalClients()
    {
        $query = "SELECT COUNT(id) as total FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function addMultipleClients($numberOfClients)
    {
        $query = "INSERT INTO " . $this->table_name . " (name, phone, email) VALUES ";
        $values = [];
        $params = [];
        for ($i = 0; $i < $numberOfClients; $i++) {
            $values[] = "(?, ?, ?)";
            $params[] = "Client {$i}";
            $params[] = "1234567890";
            $params[] = "client{$i}@example.com";
        }
        $query .= implode(", ", $values);
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
    }
}
?>
