<?php
session_start();
require "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header('Location: login.php?error=emptyfields');
        exit;
    }

    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");

    if ($query) {
        if ($data = mysqli_fetch_assoc($query)) {
            $passwordCheck = password_verify($password, $data['password']);

            if ($passwordCheck) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $data['username'];
                $_SESSION['role'] = $data['role'];

                if ($_SESSION['role'] === 'admin') {
                    header('Location: dashboard.php');
                } else {
                    header('Location: ../index.php');
                }

                exit;
            } else {
                header('Location: login.php?error=wrongpassword');
                exit;
            }
        } else {
            header('Location: login.php?error=nouser');
            exit;
        }
    } else {
        header('Location: login.php?error=sqlerror');
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}

mysqli_close($con);
