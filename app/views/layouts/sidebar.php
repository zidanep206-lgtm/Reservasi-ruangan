<?php
$page = $_GET['page'] ?? 'dashboard';
$action = $_GET['action'] ?? '';
?>

<style>
    
.nav-link.active {
    background: rgba(255,255,255,0.2);
    border-radius: 8px;
}
</style>

<div class="col-md-2 bg-dark min-vh-100 p-3 text-white">

    <h4 class="mb-4">Menu</h4>

    <ul class="nav flex-column">

        <li class="nav-item mb-2">
            <a class="nav-link text-white <?= $page=='dashboard' ? 'active' : '' ?>"
               href="index.php?page=dashboard">
                📊 Dashboard
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link text-white <?= $page=='ruangan' ? 'active' : '' ?>"
               href="index.php?page=ruangan">
                🏢 Data Ruangan
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link text-white <?= $page=='reservasi' && $action=='' ? 'active' : '' ?>"
               href="index.php?page=reservasi">
                📅 Data Reservasi
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link text-white <?= ($page=='reservasi' && $action=='calendar') ? 'active' : '' ?>"
               href="index.php?page=reservasi&action=calendar">
                📆 Kalender Reservasi
            </a>
        </li>

        <li class="nav-item mt-4">
            <a class="nav-link text-danger"
               href="logout.php">
                🚪 Logout
            </a>
        </li>

    </ul>

</div>