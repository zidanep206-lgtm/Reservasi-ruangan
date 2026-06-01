<?php

if (!isset($_SESSION['id'])) {

    header("Location: index.php?page=login");
    exit;
}

require_once '../app/models/RuanganModel.php';

$model = new RuanganModel();

$action = $_GET['action'] ?? 'index';

switch ($action) {

    case 'create':

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $model->create($_POST);

            header("Location: index.php?page=ruangan");
            exit;
        }

        require '../app/views/ruangan/create.php';

        break;

    case 'delete':

        $model->delete($_GET['id']);

        header("Location: index.php?page=ruangan");
        exit;

        break;

    case 'detail':

        $data = $model->find($_GET['id']);

        require '../app/views/ruangan/detail.php';

        break;

    case 'edit':

        $data = $model->find($_GET['id']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $model->update(
                $_GET['id'],
                $_POST
            );

            header("Location: index.php?page=ruangan");
            exit;
        }

        require '../app/views/ruangan/edit.php';

        break;

    default:

        if (isset($_GET['keyword']) && $_GET['keyword'] != '') {

            $ruangan = $model->search($_GET['keyword']);

        } else {

            $ruangan = $model->getAll();
        }

        require '../app/views/ruangan/index.php';

        break;
}

if (!isset($_SESSION['id'])) {

    header("Location: index.php?page=login");
    exit;
}