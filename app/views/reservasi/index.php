<?php require '../app/views/layouts/header.php'; ?>
<?php require '../app/views/layouts/navbar.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php require '../app/views/layouts/sidebar.php'; ?>

        <div class="col-md-10 p-4">

            <h3>Data Reservasi</h3>

            <a
                href="index.php?page=reservasi&action=create"
                class="btn btn-primary mb-3"
            >
                Buat Reservasi
            </a>

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Pemohon</th>
                        <th>Ruangan</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Kegiatan</th>
                        <th>Surat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        <th>Detail</th>

                    </tr>

                </thead>

                <tbody>

                    <?php $no = 1; ?>

                    <?php foreach ($reservasi as $r): ?>

                        <tr>

                            <td><?= $no++ ?></td>

                            <td><?= $r['nama'] ?></td>

                            <td><?= $r['nama_ruangan'] ?></td>

                            <td><?= $r['tanggal'] ?></td>

                            <td>
                                <?= $r['jam_mulai'] ?>
                                -
                                <?= $r['jam_selesai'] ?>
                            </td>

                            <td><?= $r['kegiatan'] ?></td>

                            <td>

                                <?php if ($r['surat_pdf']): ?>

                                    <a
                                        target="_blank"
                                        href="uploads/<?= $r['surat_pdf'] ?>"
                                    >
                                        Lihat Surat
                                    </a>

                                <?php else: ?>

                                    -

                                <?php endif; ?>

                            </td>

                            <td>

                                <?php if ($r['status'] == 'pending'): ?>

                                    <span class="badge bg-warning">
                                        Pending
                                    </span>

                                <?php elseif ($r['status'] == 'disetujui'): ?>

                                    <span class="badge bg-success">
                                        Disetujui
                                    </span>

                                <?php else: ?>

                                    <span class="badge bg-danger">
                                        Ditolak
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>

                                <?php if (
                                    $_SESSION['role'] == 'admin'
                                    &&
                                    $r['status'] == 'pending'
                                ): ?>

                                    <a
                                        href="index.php?page=reservasi&action=approve&id=<?= $r['id'] ?>"
                                        class="btn btn-success btn-sm"
                                        onclick="return confirm('Setujui reservasi ini?')"
                                    >
                                        Approve
                                    </a>

                                    <a
                                        href="index.php?page=reservasi&action=reject&id=<?= $r['id'] ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Tolak reservasi ini?')"
                                    >
                                        Tolak
                                    </a>

                                <?php else: ?>

                                    -

                                <?php endif; ?>

                            </td>

                            <td>

                                <a
                                    href="index.php?page=reservasi&action=detail&id=<?= $r['id'] ?>"
                                    class="btn btn-info btn-sm"
                                >
                                    Detail
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