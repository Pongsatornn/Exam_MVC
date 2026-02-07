<?php
session_start(); 

if (isset($_GET['login'])) {
    $_SESSION['admin'] = true; // จำว่าล็อกอินแล้ว
    header("Location: index.php"); // รีเฟรชเพื่อซ่อน URL login
    exit;
}

if (isset($_GET['logout'])) {
    session_destroy(); 
    header("Location: index.php"); 
    exit;
}

include_once 'controllers/PromiseController.php';
include_once 'controllers/PoliticianController.php';

$controller = new PromiseController(); 
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($action) {
    case 'detail':
        $controller->detail($id);
        break;
    case 'update':
        $controller->update($id);
        break;
    case 'politician':
        $polController = new PoliticianController();
        $polController->show($id);
        break;
    default:
        $controller->index();
        break;
}
?>