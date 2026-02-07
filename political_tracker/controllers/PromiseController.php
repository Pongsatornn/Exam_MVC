<?php
include_once 'config/database.php';
include_once 'models/PromiseModel.php';
include_once 'models/PoliticianModel.php';

class PromiseController {
    private $model;
    private $polModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->model = new PromiseModel($db);
        $this->polModel = new PoliticianModel($db);
    }

    public function index() {
        $promises = $this->model->getAllPromises();
        $content = 'views/promise_list.php';
        include 'views/layout.php';
    }

    public function detail($id) {
        $promise = $this->model->getPromiseById($id);
        $updates = $this->model->getUpdates($id);
        $content = 'views/promise_detail.php';
        include 'views/layout.php';
    }

    public function update($id) {
        if (!isset($_SESSION['admin'])) {
            header("Location: index.php");
            exit;
        }

        $promise = $this->model->getPromiseById($id);
        
        if ($promise['status'] == 'เงียบหาย') {
            echo "<script>alert('ไม่สามารถอัปเดตสัญญาที่เงียบหายได้'); window.location.href='index.php?action=detail&id=$id';</script>";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $details = $_POST['update_details'];
            $status = $_POST['status'];
            
            $this->model->addUpdate($id, $details, $status);
            header("Location: index.php?action=detail&id=$id");
        } else {
            $content = 'views/promise_update.php';
            include 'views/layout.php';
        }
    }
    public function politician($id) {
        $politician = $this->polModel->getPoliticianById($id);
        $promises = $this->model->getPromisesByPolitician($id);
        include 'views/politician_profile.php';
    }
}
?>