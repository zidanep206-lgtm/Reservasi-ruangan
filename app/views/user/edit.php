<?php require '../app/views/layouts/header.php'; ?>
<?php require '../app/views/layouts/navbar.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php require '../app/views/layouts/sidebar.php'; ?>

        <div class="col-md-10 p-4">

            <h3>Edit User</h3>

            <form method="POST">

                <div class="mb-3">

                    <label>Nama</label>

                    <input
                        type="text"
                        name="nama"
                        class="form-control"
                        value="<?= $data['nama'] ?>"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="<?= $data['email'] ?>"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>Role</label>

                    <select
                        name="role"
                        class="form-control"
                    >

                        <option
                            value="admin"
                            <?= $data['role'] == 'admin' ? 'selected' : '' ?>
                        >
                            Admin
                        </option>

                        <option
                            value="dosen"
                            <?= $data['role'] == 'dosen' ? 'selected' : '' ?>
                        >
                            Dosen
                        </option>

                        <option
                            value="mahasiswa"
                            <?= $data['role'] == 'mahasiswa' ? 'selected' : '' ?>
                        >
                            Mahasiswa
                        </option>

                    </select>

                </div>

                <button class="btn btn-success">
                    Update
                </button>

                <a
                    href="index.php?page=user"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

<?php require '../app/views/layouts/footer.php'; ?>