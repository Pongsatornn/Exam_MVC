<?php
include_once 'config/database.php';
include_once 'models/PoliticianModel.php';
include_once 'models/PromiseModel.php';

class PoliticianController {
    private $polModel;
    private $promiseModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->polModel = new PoliticianModel($db);
        $this->promiseModel = new PromiseModel($db);
    }

    public function show($id) {
        $politician = $this->polModel->getPoliticianById($id);
        $promises = $this->promiseModel->getPromisesByPolitician($id);
        $content = 'views/politician_profile.php';
        include 'views/layout.php';
    }
}
?>