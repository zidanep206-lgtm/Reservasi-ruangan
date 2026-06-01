<?php

if (!isset($_SESSION['id'])) {

    header("Location: index.php?page=login");
    exit;
}

if ($_SESSION['role'] != 'admin') {

    die('Akses Ditolak');
}

require_once '../app/models/UserModel.php';

$model = new UserModel();

$action = $_GET['action'] ?? 'index';

switch ($action) {

    case 'create':

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $model->create($_POST);

            header("Location: index.php?page=user");
            exit;
        }

        require '../app/views/user/create.php';

        break;

    case 'edit':

        $data = $model->find($_GET['id']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $model->update(
                $_GET['id'],
                $_POST
            );

            header("Location: index.php?page=user");
            exit;
        }

        require '../app/views/user/edit.php';

        break;

    case 'delete':

        $model->delete($_GET['id']);

        header("Location: index.php?page=user");
        exit;

        break;

    default:

        $users = $model->getAll();

        require '../app/views/user/index.php';

        break;
}

if (!isset($_SESSION['id'])) {

    header("Location: index.php?page=login");
    exit;
}