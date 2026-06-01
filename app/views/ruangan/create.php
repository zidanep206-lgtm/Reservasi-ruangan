<?php require '../app/views/layouts/header.php'; ?>
<?php require '../app/views/layouts/navbar.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php require '../app/views/layouts/sidebar.php'; ?>

        <div class="col-md-10 p-4">

            <h3>Tambah Ruangan</h3>

            <form method="POST">

                <div class="mb-3">

                    <label>Nama Ruangan</label>

                    <input
                        type="text"
                        name="nama_ruangan"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>Gedung</label>

                    <input
                        type="text"
                        name="gedung"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>Kapasitas</label>

                    <input
                        type="number"
                        name="kapasitas"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>Fasilitas</label>

                    <textarea
                        name="fasilitas"
                        class="form-control"
                    ></textarea>

                </div>

                <button class="btn btn-success">
                    Simpan
                </button>

                <a
                    href="index.php?page=ruangan"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

<?php require '../app/views/layouts/footer.php'; ?>