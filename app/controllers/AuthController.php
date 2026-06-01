<?php

require_once '../app/models/UserModel.php';

$model = new UserModel();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $model->login($email);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['id'] = $user['id'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['role'] = $user['role'];

        header("Location: index.php?page=dashboard");
        exit;
    }

    $error = "Email atau Password salah";
}

require '../app/views/auth/login.php';