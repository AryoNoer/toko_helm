<?php
session_start();
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $namaPemesan = mysqli_real_escape_string($con, $_POST['nama_pemesan']);
    $alamatTujuan = mysqli_real_escape_string($con, $_POST['alamat_tujuan']);
    $note = mysqli_real_escape_string($con, $_POST['note']);
    $totalBelanja = floatval($_POST['total_belanja']);

    if ($_FILES['bukti_pembayaran']['error'] !== UPLOAD_ERR_OK) {
        die('Error during file upload: ' . $_FILES['bukti_pembayaran']['error']);
    }

    $fileTmpPath = $_FILES['bukti_pembayaran']['tmp_name'];

    $buktiPembayaran = file_get_contents($fileTmpPath);
    if ($buktiPembayaran === false) {
        die('Error reading file');
    }

    var_dump($buktiPembayaran);
    $fileTmpPath = $_FILES['bukti_pembayaran']['tmp_name'];
    $buktiPembayaran = file_get_contents($fileTmpPath);

    if ($buktiPembayaran === false) {
        die('Error reading file');
    }

    $insertOrderQuery = "INSERT INTO pesanan (nama_pemesan, alamat_tujuan, note, bukti_pembayaran, total_belanja)
                        VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $insertOrderQuery);
    mysqli_stmt_bind_param($stmt, "sssbd", $namaPemesan, $alamatTujuan, $note, $buktiPembayaran, $totalBelanja);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo '<script>';
        echo 'alert("Pesanan berhasil dibuat. Terima kasih atas pesanannya!");';
        echo 'window.location.href = "index.php";';
        echo '</script>';
    } else {
        error_log("Error: " . mysqli_error($con));
    }

    mysqli_stmt_close($stmt);

    mysqli_close($con);
}
