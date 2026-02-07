<?php
class PoliticianModel {
    private $conn;
    public function __construct($db) { $this->conn = $db; }

    public function getPoliticianById($id) {
        $query = "SELECT * FROM politicians WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>