<?php
session_start();

require "../koneksi.php";
$username = $_SESSION['username'];
$action = "Logged Out";
$queryLog = mysqli_query($con, "INSERT INTO dashboard_logs (username, action) VALUES ('$username', '$action')");

session_destroy();
header('Location: ../index.php');
exit;
