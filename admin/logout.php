<?php
session_start();

require "../koneksi.php";
$username = $_SESSION['username'];
$action = "Logged Out";
$queryLog = mysqli_query($con, "INSERT INTO dashboard_logs (username, action) VALUES ('$username', '$action')");

session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <script>
        alert("Anda telah logout! Terima Kasih !");
        window.location.href = "../index.php";
    </script>
</head>

<body>
    <!-- Tidak perlu konten apapun di sini -->
</body>

</html>