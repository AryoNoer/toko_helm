<?php
session_start();
require "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header('Location: register.php?error=emptyfields');
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $queryInsert = mysqli_query($con, "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')");

    if ($queryInsert) {
        echo '<script>alert("Registrasi berhasil!");</script>';
        header('Location: login.php');
        exit;
    } else {
        header('Location: register.php?error=sqlerror');
        exit;
    }
} else {
    header('Location: register.php');
    exit;
}

mysqli_close($con);
