<?php require '../app/views/layouts/header.php'; ?>
<?php require '../app/views/layouts/navbar.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php require '../app/views/layouts/sidebar.php'; ?>

        <div class="col-md-10 p-4">

            <h3 class="mb-4">Dashboard</h3>

            <div class="row g-3">

                <p>
                    Selamat datang,
                    <b><?= $_SESSION['nama']; ?></b>
                </p>

                <p>
                    Role :
                    <b><?= ucfirst($_SESSION['role']); ?></b>
                </p>

                <div class="row mt-4">

                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 rounded-3">
                            <div class="card-body d-flex justify-content-between align-items-center">

                                <div>
                                    <h6 class="text-muted">Total User</h6>
                                    <h3 class="fw-bold">
                                        <?= $totalUser['total'] ?>
                                    </h3>
                                </div>

                                <div style="font-size:40px;">
                                    👤
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 rounded-3">
                            <div class="card-body d-flex justify-content-between align-items-center">

                                <div>
                                    <h6 class="text-muted">Total Ruangan</h6>
                                    <h3 class="fw-bold">
                                        <?= $totalRuangan['total'] ?>
                                    </h3>
                                </div>

                                <div style="font-size:40px;">
                                    🏢
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 rounded-3">
                            <div class="card-body d-flex justify-content-between align-items-center">

                                <div>
                                    <h6 class="text-muted">Total Reservasi</h6>
                                    <h3 class="fw-bold">
                                        <?= $totalReservasi['total'] ?>
                                    </h3>
                                </div>

                                <div style="font-size:40px;">
                                    📋
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <br>

                <div class="row">

                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 rounded-3">
                            <div class="card-body d-flex justify-content-between align-items-center">

                                <div>
                                    <h6 class="text-muted">Pending</h6>
                                    <h3 class="fw-bold">
                                        <?= $totalPending['total'] ?? 0 ?>
                                    </h3>
                                </div>

                                <div style="font-size:40px;">
                                    ⏳
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 rounded-3">
                            <div class="card-body d-flex justify-content-between align-items-center">

                                <div>
                                    <h6 class="text-muted">Disetujui</h6>
                                    <h3 class="fw-bold text-success">
                                        <?= $totalDisetujui['total'] ?>
                                    </h3>
                                </div>

                                <div style="font-size:40px;">
                                    ✅
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 rounded-3">
                            <div class="card-body d-flex justify-content-between align-items-center">

                                <div>
                                    <h6 class="text-muted">Ditolak</h6>
                                    <h3 class="fw-bold text-danger">
                                        <?= $totalDitolak['total'] ?>
                                    </h3>
                                </div>

                                <div style="font-size:40px;">
                                    ❌
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php require '../app/views/layouts/footer.php'; ?>