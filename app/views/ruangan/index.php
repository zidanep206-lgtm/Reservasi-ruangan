<?php require '../app/views/layouts/header.php'; ?>
<?php require '../app/views/layouts/navbar.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php require '../app/views/layouts/sidebar.php'; ?>

        <div class="col-md-10 p-4">

            <h3>Data Ruangan</h3>

            <a
                href="index.php?page=ruangan&action=create"
                class="btn btn-primary mb-3"
            >
                Tambah Ruangan
            </a>

            <form method="GET" class="mb-3">

                <input
                    type="hidden"
                    name="page"
                    value="ruangan"
                >

                <div class="row">

                    <div class="col-md-4">

                        <input
                            type="text"
                            name="keyword"
                            class="form-control"
                            placeholder="Cari nama ruangan atau gedung"
                        >

                    </div>

                    <div class="col-md-2">

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Cari
                        </button>

                    </div>

                </div>

            </form>

            <table class="table table-bordered">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Ruangan</th>
                        <th>Gedung</th>
                        <th>Kapasitas</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    <?php $no = 1; ?>

                    <?php foreach ($ruangan as $r): ?>

                        <tr>

                            <td><?= $no++ ?></td>

                            <td><?= $r['nama_ruangan'] ?></td>

                            <td><?= $r['gedung'] ?></td>

                            <td><?= $r['kapasitas'] ?></td>

                            <td>

                                <a
                                    href="index.php?page=ruangan&action=detail&id=<?= $r['id'] ?>"
                                    class="btn btn-info btn-sm"
                                >
                                    Detail
                                </a>

                                <a
                                    href="index.php?page=ruangan&action=edit&id=<?= $r['id'] ?>"
                                    class="btn btn-warning btn-sm"
                                >
                                    Edit
                                </a>

                                <a
                                    href="index.php?page=ruangan&action=delete&id=<?= $r['id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data?')"
                                >
                                    Hapus
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php require '../app/views/layouts/footer.php'; ?>