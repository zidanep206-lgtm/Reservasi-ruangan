<?php

$page = $_GET['page'] ?? 'login';

switch ($page) {

    case 'login':
        require '../app/controllers/AuthController.php';
        break;

    case 'dashboard':
        require '../app/controllers/DashboardController.php';
        break;

    case 'ruangan':
        require '../app/controllers/RuanganController.php';
        break;

    case 'reservasi':
        require '../app/controllers/ReservasiController.php';
        break;

    case 'user':
        require '../app/controllers/UserController.php';
        break;

    default:
        echo "404 Not Found";
}