<?php require '../app/views/layouts/header.php'; ?>
<?php require '../app/views/layouts/navbar.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php require '../app/views/layouts/sidebar.php'; ?>

        <div class="col-md-10 p-4">

            <h3>User Management</h3>

            <a
                href="index.php?page=user&action=create"
                class="btn btn-primary mb-3"
            >
                Tambah User
            </a>

            <table class="table table-bordered">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    <?php $no = 1; ?>

                    <?php foreach ($users as $u): ?>

                        <tr>

                            <td><?= $no++ ?></td>
                            <td><?= $u['nama'] ?></td>
                            <td><?= $u['email'] ?></td>
                            <td><?= ucfirst($u['role']) ?></td>

                            <td>

                                <a
                                    href="index.php?page=user&action=edit&id=<?= $u['id'] ?>"
                                    class="btn btn-warning btn-sm"
                                >
                                    Edit
                                </a>

                                <a
                                    href="index.php?page=user&action=delete&id=<?= $u['id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus user?')"
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