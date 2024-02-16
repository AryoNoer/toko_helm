<?php
session_start();
require "koneksi.php";

if (empty($_SESSION['keranjang'])) {
    header("Location: produk.php");
    exit();
}

$produkIds = array_column($_SESSION['keranjang'], 'id_produk');
$produkIdsString = implode(',', $produkIds);
$queryDetail = mysqli_query($con, "SELECT id_produk, nama_produk, harga, gambar_path FROM produk WHERE id_produk IN ($produkIdsString)");

if (!$queryDetail) {
    die("Query failed: " . mysqli_error($con));
}
function getJumlahProduk($id_produk)
{
    if (isset($_SESSION['keranjang'])) {
        foreach ($_SESSION['keranjang'] as $produk) {
            if ($produk['id_produk'] == $id_produk) {
                return $produk['jumlah'];
            }
        }
    }
    return 0;
}

$totalBelanja = 0;
$detailPemesanan = array();
while ($row = mysqli_fetch_assoc($queryDetail)) {
    $jumlah = getJumlahProduk($row['id_produk']);
    $subtotal = $row['harga'] * $jumlah;
    $totalBelanja += $subtotal;
    $detailPemesanan[] = [
        'id_produk' => $row['id_produk'],
        'nama_produk' => $row['nama_produk'],
        'harga' => $row['harga'],
        'jumlah' => $jumlah,
        'subtotal' => $subtotal,
        'gambar_path' => $row['gambar_path'],
    ];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="font-sans bg-white">

    <?php require "navbar.php"; ?>

    <div class="container h-screen mx-auto my-10 p-4 bg-white">

        <h2 class="text-2xl font-bold mb-4">Konfirmasi Pembayaran</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- Tabel Detail Pemesanan -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 mb-4">
                    <thead>
                        <tr>
                            <th class="border p-2 text-center">ID</th>
                            <th class="border p-2 text-center">Nama Produk</th>
                            <th class="border p-2 text-center">Harga</th>
                            <th class="border p-2 text-center">Jumlah</th>
                            <th class="border p-2 text-center">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($detailPemesanan as $detail) {
                        ?>
                            <tr>
                                <td class="border p-2 text-center"><?php echo $detail['id_produk']; ?></td>
                                <td class="border p-2 text-center"><?php echo $detail['nama_produk']; ?></td>
                                <td class="border p-2 text-center">Rp <?php echo number_format($detail['harga']); ?></td>
                                <td class="border p-2 text-center"><?php echo $detail['jumlah']; ?></td>
                                <td class="border p-2 text-center">Rp <?php echo number_format($detail['subtotal']); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Informasi Total Belanja -->
                <div class="mb-4 flex flex-col">
                    <div>
                        <p class="text-xl font-bold">Total Belanja: Rp <?php echo number_format($totalBelanja); ?></p>
                    </div>

                    <div class="flex flex-wrap gap-4 mt-4">
                        <?php
                        foreach ($detailPemesanan as $detail) {
                        ?>
                            <div class="p-4 bg-slate-100 shadow-md border border-gray-300 rounded-md">
                                <img src="<?php echo $detail['gambar_path']; ?>" alt="<?php echo $detail['nama_produk']; ?>" class="w-20 h-20 object-cover">
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>
            </div>

            <!-- Formulir Informasi Pemesan -->
            <div>
                <form action="proses_konfirmasi.php" method="post" enctype="multipart/form-data">

                    <div class="mb-4">
                        <label for="nama_pemesan" class="block text-sm font-medium text-gray-700">Nama Pemesan</label>
                        <input type="text" name="nama_pemesan" id="nama_pemesan" class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="alamat_tujuan" class="block text-sm font-medium text-gray-700">Alamat Tujuan</label>
                        <textarea name="alamat_tujuan" id="alamat_tujuan" rows="3" class="mt-1 p-2 w-full border border-gray-300 rounded-md"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                        <textarea name="note" id="note" rows="3" class="mt-1 p-2 w-full border border-gray-300 rounded-md"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="bukti_pembayaran" class="block text-sm font-medium text-gray-700">Upload Bukti Pembayaran</label>
                        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="mt-1" accept="image/*">
                    </div>

                    <input type="hidden" name="total_belanja" value="<?php echo $totalBelanja; ?>">

                    <!-- Tombol Konfirmasi Pemesanan -->
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-full mt-4 hover:bg-blue-600 block w-full md:inline-block">
                        Konfirmasi Pemesanan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fungsi buat validasi sebelum mengirim formulir
            function validateForm() {
                var namaPemesan = document.getElementById('nama_pemesan').value.trim();
                var alamatTujuan = document.getElementById('alamat_tujuan').value.trim();
                var note = document.getElementById('note').value.trim();
                var buktiPembayaran = document.getElementById('bukti_pembayaran').value.trim();

                if (namaPemesan === '' || alamatTujuan === '' || note === '' || buktiPembayaran === '') {
                    alert('Harap isi semua field sebelum mengkonfirmasi pemesanan.');
                    return false;
                }

                return true;
            }

            var form = document.querySelector('form');
            form.addEventListener('submit', function(event) {
                if (!validateForm()) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>

</html>