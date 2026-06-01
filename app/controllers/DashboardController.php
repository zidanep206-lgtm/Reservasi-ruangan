<?php

if (!isset($_SESSION['id'])) {

    header("Location: index.php?page=login");
    exit;
}

require_once '../app/models/UserModel.php';
require_once '../app/models/RuanganModel.php';
require_once '../app/models/ReservasiModel.php';

$userModel = new UserModel();
$ruanganModel = new RuanganModel();
$reservasiModel = new ReservasiModel();

$totalUser = $userModel->count();
$totalRuangan = $ruanganModel->count();
$totalReservasi = $reservasiModel->count();

$totalPending = $reservasiModel->countPending();
$totalDisetujui = $reservasiModel->countDisetujui();
$totalDitolak = $reservasiModel->countDitolak();

require '../app/views/dashboard/index.php';

if (!isset($_SESSION['id'])) {

    header("Location: index.php?page=login");
    exit;
}