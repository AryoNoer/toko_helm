<?php
session_start();
require "koneksi.php";

if (isset($_SESSION['keranjang']) && !empty($_SESSION['keranjang'])) {
    $produkIds = array_column($_SESSION['keranjang'], 'id_produk');
    $produkIdsString = implode(',', $produkIds);

    $queryKeranjang = mysqli_query($con, "SELECT id_produk, nama_produk, harga, gambar_path FROM produk WHERE id_produk IN ($produkIdsString)");

    if ($queryKeranjang === false) {
        die("Query gagal: " . mysqli_error($con));
    }
} else {
    $queryKeranjang = false;
}

if (isset($_GET['hapus_produk'])) {
    $id_produk_hapus = $_GET['hapus_produk'];
    hapusProduk($id_produk_hapus);
    header("Location: keranjang.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jumlah'])) {
    updateKeranjang($_POST['jumlah']);
    header("Location: keranjang.php");
    exit();
}

function hapusProduk($id_produk)
{
    if (isset($_SESSION['keranjang'])) {
        $produkIndex = array_search($id_produk, array_column($_SESSION['keranjang'], 'id_produk'));

        if ($produkIndex !== false && isset($_SESSION['keranjang'][$produkIndex])) {
            unset($_SESSION['keranjang'][$produkIndex]);
        }
    }
}

function updateKeranjang($data)
{
    if (isset($_SESSION['keranjang'])) {
        foreach ($data as $id_produk => $jumlah) {
            $produkIndex = array_search($id_produk, array_column($_SESSION['keranjang'], 'id_produk'));

            if ($produkIndex !== false && isset($_SESSION['keranjang'][$produkIndex])) {
                $_SESSION['keranjang'][$produkIndex]['jumlah'] = $jumlah;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="font-sans bg-gray-100">

    <?php require "navbar.php"; ?>

    <div class="container h-screen w-full mx-auto p-4 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Keranjang Belanja</h2>
        <?php if ($queryKeranjang !== false && mysqli_num_rows($queryKeranjang) > 0) : ?>
            <form action="keranjang.php" method="post">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="border p-4">ID Produk</th>
                            <th class="border p-4">Nama Produk</th>
                            <th class="border p-4">Harga</th>
                            <th class="border p-4">Jumlah</th>
                            <th class="border p-4">Subtotal</th>
                            <th class="border p-4">Gambar</th>
                            <th class="border p-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $totalBelanja = 0;

                        while ($row = mysqli_fetch_assoc($queryKeranjang)) {
                            $produkIndex = array_search($row['id_produk'], array_column($_SESSION['keranjang'], 'id_produk'));

                            if ($produkIndex !== false && isset($_SESSION['keranjang'][$produkIndex])) {
                                $jumlah = $_SESSION['keranjang'][$produkIndex]['jumlah'];
                                $harga = $row['harga'];
                                $subtotal = $harga * $jumlah;

                                $totalBelanja += $subtotal;
                        ?>
                                <tr>
                                    <td class="border p-4"><?php echo $row['id_produk']; ?></td>
                                    <td class="border p-4"><?php echo $row['nama_produk']; ?></td>
                                    <td class="border p-4" id="harga-<?php echo $row['id_produk']; ?>">Rp <?php echo number_format($harga); ?></td>
                                    <td class="border p-4">
                                        <div class="flex items-center">
                                            <button type="button" onclick="updateQuantity(<?php echo $row['id_produk']; ?>, -1)" class="p-2 bg-gray-200 rounded-l hover:bg-gray-300">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <span class="p-2 w-12 text-center" id="quantity-<?php echo $row['id_produk']; ?>"><?php echo $jumlah; ?></span>
                                            <button type="button" onclick="updateQuantity(<?php echo $row['id_produk']; ?>, 1)" class="p-2 bg-gray-200 rounded-r hover:bg-gray-300">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="border p-4" id="subtotal-<?php echo $row['id_produk']; ?>">Rp <?php echo number_format($subtotal); ?></td>
                                    <td class="border p-4">
                                        <img src="<?php echo $row['gambar_path']; ?>" alt="<?php echo $row['nama_produk']; ?>" class="w-16 h-16 object-cover">
                                    </td>
                                    <td class="border p-4">
                                        <a href="?hapus_produk=<?php echo $row['id_produk']; ?>" class="text-red-500">Hapus</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </form>

            <p class="text-right mt-4" id="totalBelanja">Total Belanja: Rp <?php echo number_format($totalBelanja); ?></p>
            <a href="konfirmasi_pembayaran.php?total=<?php echo $totalBelanja; ?>" class="bg-green-500 text-white p-2 rounded-full mt-4 hover:bg-green-600">Lanjut ke Pembayaran</a>
            <a href="produk.php" class="text-blue-500">Kembali ke Produk</a>
        <?php else : ?>
            <div class="flex flex-col items-center justify-center">
                <img src="src/img/sad.png" alt="" class="w-24 mt-36">
                <h1 class="font-medium text-center mt-10">Oops! Keranjang masih kosong nih. Ayo belanja!</h1>
                <a href="produk.php" class="bg-red-500 text-white py-2 px-3 rounded-full mt-4">Lihat Produk</a>
            </div>
        <?php endif; ?>

    </div>

    <?php require "footer.php"; ?>

    <script>
        function updateQuantity(id, amount) {
            var inputElement = document.querySelector('#quantity-' + id);
            var currentQuantity = parseInt(inputElement.textContent);

            if (currentQuantity + amount >= 1) {
                inputElement.textContent = currentQuantity + amount;
                updateSubtotal(id);
                updateTotalBelanja();
            }
        }

        function updateSubtotal(id) {
            var inputElement = document.querySelector('#quantity-' + id);
            var currentQuantity = parseInt(inputElement.textContent);

            var hargaElement = document.querySelector('#harga-' + id);
            var harga = parseFloat(hargaElement.textContent.replace('Rp ', '').replace(',', ''));

            var subtotalElement = document.querySelector('#subtotal-' + id);
            var subtotal = harga * currentQuantity;

            subtotalElement.textContent = 'Rp ' + formatNumber(subtotal);
        }

        function updateTotalBelanja() {
            var totalBelanjaElement = document.querySelector('#totalBelanja');
            var subtotals = document.querySelectorAll('[id^="subtotal-"]');

            var totalBelanja = 0;

            subtotals.forEach(function(subtotalElement) {
                var subtotal = parseFloat(subtotalElement.textContent.replace('Rp ', '').replace(',', ''));
                totalBelanja += subtotal;
            });

            totalBelanjaElement.textContent = 'Total Belanja: Rp ' + formatNumber(totalBelanja);
            var konfirmasiPembayaranLink = document.querySelector('#konfirmasiPembayaranLink');
            konfirmasiPembayaranLink.href = 'konfirmasi_pembayaran.php?total=' + totalBelanja;
        }

        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>

</body>

</html>