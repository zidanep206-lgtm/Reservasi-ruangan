<?php

require_once 'Database.php';

class ReservasiModel extends DB
{
    public function getAll()
    {
        $stmt = $this->conn->prepare("
            SELECT
                reservasi.*,
                users.nama,
                ruangan.nama_ruangan
            FROM reservasi
            JOIN users
                ON users.id = reservasi.user_id
            JOIN ruangan
                ON ruangan.id = reservasi.ruangan_id
            ORDER BY reservasi.id DESC
        ");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO reservasi
            (
                user_id,
                ruangan_id,
                tanggal,
                jam_mulai,
                jam_selesai,
                kegiatan,
                surat_pdf
            )
            VALUES
            (
                ?,?,?,?,?,?,?
            )
        ");

        return $stmt->execute([
            $data['user_id'],
            $data['ruangan_id'],
            $data['tanggal'],
            $data['jam_mulai'],
            $data['jam_selesai'],
            $data['kegiatan'],
            $data['surat_pdf']
        ]);
    }

    public function checkConflict(
    $ruangan_id,
    $tanggal,
    $jam_mulai,
    $jam_selesai
)
{
    $stmt = $this->conn->prepare("
        SELECT *
        FROM reservasi
        WHERE ruangan_id = ?
        AND tanggal = ?
        AND status IN ('pending','disetujui')
        AND (
            jam_mulai < ?
            AND jam_selesai > ?
        )
    ");

    $stmt->execute([
        $ruangan_id,
        $tanggal,
        $jam_selesai,
        $jam_mulai
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function updateStatus($id,$status)
{
    $stmt = $this->conn->prepare("
        UPDATE reservasi
        SET status = ?
        WHERE id = ?
    ");

    return $stmt->execute([
        $status,
        $id
    ]);
}

public function count()
{
    $stmt = $this->conn->prepare("
        SELECT COUNT(*) total
        FROM reservasi
    ");

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function getByUser($user_id)
{
    $stmt = $this->conn->prepare("
        SELECT
            reservasi.*,
            users.nama,
            ruangan.nama_ruangan
        FROM reservasi
        JOIN users
            ON users.id = reservasi.user_id
        JOIN ruangan
            ON ruangan.id = reservasi.ruangan_id
        WHERE reservasi.user_id = ?
        ORDER BY reservasi.id DESC
    ");

    $stmt->execute([$user_id]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function countPending()
{
    $stmt = $this->conn->prepare("
        SELECT COUNT(*) total
        FROM reservasi
        WHERE status='pending'
    ");

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function countDisetujui()
{
    $stmt = $this->conn->prepare("
        SELECT COUNT(*) total
        FROM reservasi
        WHERE status='disetujui'
    ");

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function countDitolak()
{
    $stmt = $this->conn->prepare("
        SELECT COUNT(*) total
        FROM reservasi
        WHERE status='ditolak'
    ");

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function getCalendarEvents()
{
    $stmt = $this->conn->prepare("
        SELECT
            reservasi.*,
            ruangan.id AS ruangan_id,
            ruangan.nama_ruangan,
            users.nama
        FROM reservasi
        JOIN ruangan
            ON ruangan.id = reservasi.ruangan_id
        JOIN users
            ON users.id = reservasi.user_id
        ORDER BY reservasi.tanggal ASC
    ");

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function find($id)
{
    $stmt = $this->conn->prepare("
        SELECT
            reservasi.*,
            users.nama,
            ruangan.nama_ruangan
        FROM reservasi
        JOIN users ON users.id = reservasi.user_id
        JOIN ruangan ON ruangan.id = reservasi.ruangan_id
        WHERE reservasi.id = ?
    ");

    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}