<?php
session_start();
require "koneksi.php";

$queryProduk = mysqli_query($con, "SELECT id_produk, nama_produk, harga, stok, deskripsi, gambar_path FROM produk");

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
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="font-sans bg-gray-100">
    <?php require "navbar.php"; ?>

    <div class="container mx-auto my-8">
        <h2 class="text-3xl font-bold mb-4 text-center">Daftar Produk</h2>

        <div class="container py-10 mx-auto text-center mb-8">
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
        </div>
        <?php require "footer.php"; ?>
</body>

</html>