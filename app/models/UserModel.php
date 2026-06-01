<?php

require_once 'Database.php';

class UserModel extends DB
{
    public function login($email)
    {
        $query = "
            SELECT *
            FROM users
            WHERE email = ?
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("
            SELECT *
            FROM users
            ORDER BY id DESC
        ");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->conn->prepare("
            SELECT *
            FROM users
            WHERE id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO users
            (
                nama,
                email,
                password,
                role
            )
            VALUES
            (
                ?, ?, ?, ?
            )
        ");

        return $stmt->execute([
            $data['nama'],
            $data['email'],
            password_hash($data['password'], PASSWORD_DEFAULT),
            $data['role']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("
            UPDATE users
            SET
                nama = ?,
                email = ?,
                role = ?
            WHERE id = ?
        ");

        return $stmt->execute([
            $data['nama'],
            $data['email'],
            $data['role'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("
            DELETE FROM users
            WHERE id = ?
        ");

        return $stmt->execute([$id]);
    }

    public function count()
    {
        $stmt = $this->conn->prepare("
            SELECT COUNT(*) total
            FROM users
        ");

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}