<?php

require_once 'Database.php';

class RuanganModel extends DB
{
    public function getAll()
    {
        $stmt = $this->conn->prepare("
            SELECT *
            FROM ruangan
            ORDER BY id DESC
        ");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO ruangan
            (
                nama_ruangan,
                gedung,
                kapasitas,
                fasilitas
            )
            VALUES
            (
                ?, ?, ?, ?
            )
        ");

        return $stmt->execute([
            $data['nama_ruangan'],
            $data['gedung'],
            $data['kapasitas'],
            $data['fasilitas']
        ]);
    }

    public function find($id)
    {
        $stmt = $this->conn->prepare("
            SELECT *
            FROM ruangan
            WHERE id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("
            UPDATE ruangan
            SET
                nama_ruangan = ?,
                gedung = ?,
                kapasitas = ?,
                fasilitas = ?
            WHERE id = ?
        ");

        return $stmt->execute([
            $data['nama_ruangan'],
            $data['gedung'],
            $data['kapasitas'],
            $data['fasilitas'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("
            DELETE FROM ruangan
            WHERE id = ?
        ");

        return $stmt->execute([$id]);
    }

    public function search($keyword)
    {
        $stmt = $this->conn->prepare("
            SELECT *
            FROM ruangan
            WHERE nama_ruangan LIKE ?
            OR gedung LIKE ?
            ORDER BY id DESC
        ");

        $keyword = "%" . $keyword . "%";

        $stmt->execute([
            $keyword,
            $keyword
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getActiveRooms()
    {
        $stmt = $this->conn->prepare("
            SELECT *
            FROM ruangan
            WHERE status = 'aktif'
            ORDER BY nama_ruangan ASC
        ");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function count()
    {
        $stmt = $this->conn->prepare("
            SELECT COUNT(*) total
            FROM ruangan
        ");

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}