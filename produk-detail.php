<?php
session_start();
require "koneksi.php";

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $queryDetail = mysqli_query($con, "SELECT id_produk, nama_produk, harga, stok, deskripsi, gambar_path FROM produk WHERE id_produk = $productId");
    $dataDetail = mysqli_fetch_assoc($queryDetail);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['beli'])) {
        if (!isset($_SESSION['keranjang'])) {
            $_SESSION['keranjang'] = array();
        }

        $item = array(
            'id_produk' => $dataDetail['id_produk'],
            'nama_produk' => $dataDetail['nama_produk'],
            'harga' => $dataDetail['harga'],
            'jumlah' => 1
        );

        $produkIndex = array_search($dataDetail['id_produk'], array_column($_SESSION['keranjang'], 'id_produk'));

        if ($produkIndex !== false) {
            $_SESSION['keranjang'][$produkIndex]['jumlah']++;
        } else {
            $_SESSION['keranjang'][] = $item;
        }

        header('Location: keranjang.php');
        exit;
    }

    $queryProdukLainnya = mysqli_query($con, "SELECT id_produk, nama_produk, gambar_path FROM produk WHERE id_produk != $productId LIMIT 3");
    $produkLainnya = mysqli_fetch_all($queryProdukLainnya, MYSQLI_ASSOC);
} else {
    header("Location: produk.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="font-sans">

    <?php require "navbar.php"; ?>

    <div class="container my-10 mx-auto justify-center items-center">
        <h2 class="text-2xl font-bold mb-4 ml-4"><?php echo $dataDetail['nama_produk']; ?></h2>

        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/2 mb-4 md:mr-4">
                <img src="<?php echo $dataDetail['gambar_path']; ?>" alt="<?php echo $dataDetail['nama_produk']; ?>" class="w-96 h-auto mx-auto rounded shadow-md">
            </div>

            <div class="md:w-1/2">
                <div class="bg-white p-4 rounded shadow-md mx-auto">
                    <p class="text-gray-600 text-sm mb-3"><?php echo $dataDetail['deskripsi']; ?></p>
                    <p class="text-yellow-500 font-bold">Rp <?php echo $dataDetail['harga']; ?></p>
                    <p class="text-gray-500">Stok: <?php echo $dataDetail['stok']; ?></p>

                    <form method="post" action="">
                        <input type="submit" name="beli" value="Beli" class="bg-red-600 text-white px-6 py-1 rounded-md mt-4 cursor-pointer hover:bg-red-700 transition block md:inline">
                    </form>

                    <div class="mt-4">
                        <h3 class="text-xl font-bold mb-2">Saran Produk Lainnya</h3>

                        <div class="flex space-x-4">
                            <?php
                            foreach ($produkLainnya as $produk) {
                                echo '<div class="flex items-center">';
                                echo '<a href="produk-detail.php?id=' . $produk['id_produk'] . '" class="bg-red-600 hover:underline"><img src="' . $produk['gambar_path'] . '" alt="' . $produk['nama_produk'] . '" class="w-16 h-auto rounded shadow-md"></a>';
                                echo '<div class="ml-2">';
                                echo '<p class="text-gray-600">' . $produk['nama_produk'] . '</p>';
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require "footer.php"; ?>

</body>

</html>