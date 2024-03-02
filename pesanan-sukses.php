<?php
session_start();
require "koneksi.php";

if (isset($_GET['id'])) {
    $orderID = $_GET['id'];

    $queryDetailPesanan = mysqli_prepare($con, "SELECT * FROM pesanan WHERE id_pesanan = ?");
    mysqli_stmt_bind_param($queryDetailPesanan, "i", $orderID);
    mysqli_stmt_execute($queryDetailPesanan);

    $result = mysqli_stmt_get_result($queryDetailPesanan);

    if (!$result || mysqli_num_rows($result) === 0) {
        die("Query failed or order not found: " . mysqli_error($con));
    }

    $detailPesanan = mysqli_fetch_assoc($result);
    mysqli_stmt_close($queryDetailPesanan);
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Sukses</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100 my-20 h-screen flex items-center justify-center">
    <div class="w-full mx-4 md:mx-40 bg-white p-8 rounded-lg shadow-md">
        <div class="flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="w-20 h-20">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
            </svg>
        </div>
        <h2 class="text-3xl text-center font-bold my-4 text-green-600">Berhasil 🎉</h2>

        <div class="mb-4 border-2 border-zinc-100 rounded-md p-4">
            <h3 class="text-lg font-semibold mb-2">Detail Pesanan:</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="grid grid-rows-2 items-center">
                    <span class="font-semibold">Nama:</span>
                    <span class="text-left py-2"><?php echo $detailPesanan['nama_pemesan']; ?></span>
                </div>
                <div class="grid grid-rows-2 items-center">
                    <span class="font-semibold">Alamat:</span>
                    <span class="text-left py-2"><?php echo $detailPesanan['alamat_tujuan']; ?></span>
                </div>
                <div class="grid grid-rows-2 items-center">
                    <span class="font-semibold">No Telepon:</span>
                    <span class="text-left py-2"><?php echo $detailPesanan['no_telepon']; ?></span>
                </div>
                <div class="grid grid-rows-2 items-center">
                    <span class="font-semibold">Note:</span>
                    <span class="text-left py-2"><?php echo $detailPesanan['note']; ?></span>
                </div>
                <div class="grid grid-rows-2 items-center">
                    <span class="font-semibold">Total:</span>
                    <span class="text-left py-2">Rp <?php echo number_format($detailPesanan['total_belanja'], 0); ?></span>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-center items-center">
            <p class="text-gray-700 font-semibold my-2">Terima kasih atas pesanannya di Amar Helmet! Pesananmu Akan Kami Proses Di 2-3 Hari Kerja dan Tim Kami Akan Menghubungi Ke Nomor Telepon Yang Kamu Berikan Untuk No.Resi.</p>

            <p class="text-gray-500 text-sm font-bold mb-4">
                (Catatan: Untuk Pengiriman Jabodetabek Dikenakan Biaya Rp 10.000 Untuk Layanan Pengiriman JNE/JNT)
            </p>

            <a href="index.php" class="bg-blue-500 mx-auto text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-300 ease-in-out">Kembali ke Halaman Utama</a>
        </div>
    </div>
</body>

</html>