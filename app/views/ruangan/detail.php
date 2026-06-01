<?php require '../app/views/layouts/header.php'; ?>
<?php require '../app/views/layouts/navbar.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php require '../app/views/layouts/sidebar.php'; ?>

        <div class="col-md-10 p-4">

            <h3>Detail Ruangan</h3>

            <table class="table table-bordered">

                <tr>
                    <th>Nama Ruangan</th>
                    <td><?= $data['nama_ruangan'] ?></td>
                </tr>

                <tr>
                    <th>Gedung</th>
                    <td><?= $data['gedung'] ?></td>
                </tr>

                <tr>
                    <th>Kapasitas</th>
                    <td><?= $data['kapasitas'] ?></td>
                </tr>

                <tr>
                    <th>Fasilitas</th>
                    <td><?= $data['fasilitas'] ?></td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td><?= $data['status'] ?></td>
                </tr>

            </table>

            <a
                href="index.php?page=ruangan"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </div>

    </div>

</div>

<?php require '../app/views/layouts/footer.php'; ?>