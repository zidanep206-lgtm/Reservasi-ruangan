<h3>Detail Reservasi</h3>

<p>
    <b>Pemohon:</b>
    <?= $reservasi['nama'] ?>
</p>

<p>
    <b>Ruangan:</b>
    <?= $reservasi['nama_ruangan'] ?>
</p>

<p>
    <b>Tanggal:</b>
    <?= $reservasi['tanggal'] ?>
</p>

<p>
    <b>Jam:</b>
    <?= $reservasi['jam_mulai'] ?> - <?= $reservasi['jam_selesai'] ?>
</p>

<p>
    <b>Kegiatan:</b>
    <?= $reservasi['kegiatan'] ?>
</p>

<p>
    <b>Status:</b>
    <?= $reservasi['status'] ?>
</p>

<?php if ($reservasi['surat_pdf']): ?>

    <p>
        <a
            target="_blank"
            href="uploads/<?= $reservasi['surat_pdf'] ?>"
        >
            Lihat Surat PDF
        </a>
    </p>

<?php endif; ?>

<a
    href="index.php?page=reservasi"
    class="btn btn-secondary"
>
    Kembali
</a>

<?php require '../app/views/layouts/footer.php'; ?>