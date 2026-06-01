<?php

if (!isset($_SESSION['id'])) {

    header("Location: index.php?page=login");
    exit;
}

require_once '../app/models/ReservasiModel.php';
require_once '../app/models/RuanganModel.php';

$reservasiModel = new ReservasiModel();
$ruanganModel = new RuanganModel();

$action = $_GET['action'] ?? 'index';

switch ($action) {

    case 'create':

        $ruangan = $ruanganModel->getActiveRooms();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($_POST['jam_mulai'] >= $_POST['jam_selesai']) {

                $error = "Jam selesai harus lebih besar dari jam mulai.";

            } else {

                $conflict = $reservasiModel->checkConflict(
                    $_POST['ruangan_id'],
                    $_POST['tanggal'],
                    $_POST['jam_mulai'],
                    $_POST['jam_selesai']
                );

                if ($conflict) {

                    $error = "Jadwal bentrok dengan reservasi lain.";

                } else {

                    $_POST['user_id'] = $_SESSION['id'];
                    $_POST['surat_pdf'] = null;

                    if (
                        isset($_FILES['surat_pdf']) &&
                        $_FILES['surat_pdf']['error'] === 0
                    ) {

                        $fileName = time() . '_' . basename($_FILES['surat_pdf']['name']);

                        $targetPath = __DIR__ . '/../../public/uploads/' . $fileName;

                        if (move_uploaded_file($_FILES['surat_pdf']['tmp_name'], $targetPath)) {

                            $_POST['surat_pdf'] = $fileName;
                        }
                    }

                    $reservasiModel->create($_POST);

                    header("Location: index.php?page=reservasi");
                    exit;
                }
            }
        }

        require '../app/views/reservasi/create.php';

        break;

    case 'approve':

        if ($_SESSION['role'] != 'admin') {

            die('Akses Ditolak');
        }

        $reservasiModel->updateStatus(
            $_GET['id'],
            'disetujui'
        );

        header("Location: index.php?page=reservasi");
        exit;

        break;

    case 'reject':

        if ($_SESSION['role'] != 'admin') {

            die('Akses Ditolak');
        }

        $reservasiModel->updateStatus(
            $_GET['id'],
            'ditolak'
        );

        header("Location: index.php?page=reservasi");
        exit;

        break;

    case 'calendar':

        $ruangan = $ruanganModel->getActiveRooms();

        $events = $reservasiModel->getCalendarEvents();

        if (isset($_GET['ruangan_id']) && $_GET['ruangan_id'] != '') {

            $events = array_filter($events, function ($e) {

                return $e['ruangan_id'] == $_GET['ruangan_id'];
            });
        }

        $totalPending = $reservasiModel->countPending();
        $totalDisetujui = $reservasiModel->countDisetujui();
        $totalDitolak = $reservasiModel->countDitolak();

        require '../app/views/reservasi/calendar.php';

        break;

    case 'detail':

        $reservasi = $reservasiModel->find($_GET['id']);

        require '../app/views/reservasi/detail.php';

        break;

    default:

        if ($_SESSION['role'] == 'admin') {

            $reservasi = $reservasiModel->getAll();

        } else {

            $reservasi = $reservasiModel->getByUser($_SESSION['id']);
        }

        require '../app/views/reservasi/index.php';

        break;
}