<?php
session_start();
require "koneksi.php";

if (!$con) {
    die('Database Connection Error: ' . mysqli_connect_error());
}

$queryProduk = mysqli_query($con, "SELECT id_produk, nama_produk, harga, stok, deskripsi, gambar_path FROM produk LIMIT 6");

if (!$queryProduk) {
    die('Query Error: ' . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Helm Amar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        .bg-hero-image {
            background-image: url('src/img/hero.jpg');
        }
    </style>

</head>

<body class="font-sans">

    <?php require "navbar.php"; ?>

    <div class="bg-hero-image bg-cover bg-center bg-opacity-50 text-white py-24 text-center">
        <div class="container mx-auto">
            <h1 class="text-4xl font-bold mb-4">Selamat Datang di Amar helmet</h1>
            <p class="text-lg mb-8">Temukan helm berkualitas untuk keselamatan Anda</p>
            <a href="produk.php" class="border-2 border-red-600 rounded-full px-3 py-1 hover:bg-white hover:text-red-600 text-white font-semibold">Lihat Produk</a>
        </div>
    </div>
    <div class="container py-10 mx-auto text-center mb-8">
        <h2 class="text-2xl font-bold mb-6">Produk Unggulan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <?php while ($data = mysqli_fetch_array($queryProduk)) { ?>
                <div class="bg-white p-4 rounded shadow-md m-4">
                    <div class="mb-4">
                        <img src="<?php echo $data['gambar_path']; ?>" class="w-full h-40 object-contain rounded" alt="...">
                    </div>
                    <h4 class="text-xl font-bold mb-2"><?php echo $data['nama_produk']; ?></h4>
                    <p class="text-gray-600 text-sm mb-3"><?php echo $data['deskripsi']; ?></p>
                    <p class="text-red-600 font-bold">Rp <?php echo number_format($data['harga'], 2, ',', '.'); ?></p>
                    <a href="produk-detail.php?id=<?php echo $data['id_produk']; ?>" class="bg-red-600 text-white px-4 py-2 rounded-full mt-4 inline-block hover:bg-red-700">Lihat Detail</a>
                </div>
            <?php } ?>
        </div>
        <a href="produk.php" class="btn btn-outline-warning mt-3 inline-block border-2 border-red-600 px-4 py-2 rounded-full hover:bg-red-600 hover:text-white hover:border-transparent transition">Lihat Semua Produk</a>
    </div>

    <?php require "footer.php"; ?>
</body>

</html>