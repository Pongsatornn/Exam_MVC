<?php
class PromiseModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllPromises() {
        $query = "SELECT p.*, pol.name as politician_name, pol.party 
                  FROM promises p 
                  JOIN politicians pol ON p.politician_id = pol.id 
                  ORDER BY p.announce_date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPromiseById($id) {
        $query = "SELECT p.*, pol.name as politician_name, pol.party 
                  FROM promises p 
                  JOIN politicians pol ON p.politician_id = pol.id 
                  WHERE p.id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUpdates($promise_id) {
        $query = "SELECT * FROM promise_updates WHERE promise_id = ? ORDER BY update_date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$promise_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUpdate($promise_id, $details, $new_status) {
        // Update status in promises table
        $query1 = "UPDATE promises SET status = ? WHERE id = ?";
        $stmt1 = $this->conn->prepare($query1);
        $stmt1->execute([$new_status, $promise_id]);

        $query2 = "INSERT INTO promise_updates (promise_id, update_details) VALUES (?, ?)";
        $stmt2 = $this->conn->prepare($query2);
        return $stmt2->execute([$promise_id, $details]);
    }
    public function getPromisesByPolitician($pol_id) {
        $query = "SELECT * FROM promises WHERE politician_id = ? ORDER BY announce_date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$pol_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>