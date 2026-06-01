<?php require '../app/views/layouts/header.php'; ?>
<?php require '../app/views/layouts/navbar.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php require '../app/views/layouts/sidebar.php'; ?>

        <div class="col-md-10 p-4">

            <h3>Buat Reservasi</h3>

            <?php if (isset($error)): ?>

                <div class="alert alert-danger">
                    <?= $error ?>
                </div>

            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">

                    <label>Ruangan</label>

                    <select
                        name="ruangan_id"
                        class="form-control"
                        required
                    >

                        <option value="">
                            Pilih Ruangan
                        </option>

                        <?php foreach ($ruangan as $r): ?>

                            <option value="<?= $r['id'] ?>">
                                <?= $r['nama_ruangan'] ?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Tanggal</label>

                    <input
                        type="date"
                        name="tanggal"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>Jam Mulai</label>

                    <input
                        type="time"
                        name="jam_mulai"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>Jam Selesai</label>

                    <input
                        type="time"
                        name="jam_selesai"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>Kegiatan</label>

                    <textarea
                        name="kegiatan"
                        class="form-control"
                        required
                    ></textarea>

                </div>

                <div class="mb-3">

                    <label>Upload Surat PDF</label>

                    <input
                        type="file"
                        name="surat_pdf"
                        class="form-control"
                        accept=".pdf"
                    >

                </div>

                <button class="btn btn-success">
                    Simpan
                </button>

                <a
                    href="index.php?page=reservasi"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

<?php require '../app/views/layouts/footer.php'; ?>