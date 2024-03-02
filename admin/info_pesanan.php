<!-- info_pesanan.php -->
<?php
require "../koneksi.php";

$queryPesanan = mysqli_query($con, "SELECT * FROM pesanan");

if (!$queryPesanan) {
    die("Query failed: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Pesanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="font-sans">


    <div class="container mx-auto my-8">
        <h2 class="text-2xl font-bold mb-4">Info Pesanan</h2>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="border p-4">ID Pesanan</th>
                    <th class="border p-4">Nama Pemesan</th>
                    <th class="border p-4">Alamat Tujuan</th>
                    <th class="border p-4">No Telepon</th>
                    <th class="border p-4">Note</th>
                    <th class="border p-4">Total Belanja</th>
                    <th class="border p-4">Waktu Pemesanan</th>
                    <th class="border p-4">Bukti Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($queryPesanan)) {
                ?>
                    <tr>
                        <td class="border p-4"><?php echo $row['id_pesanan']; ?></td>
                        <td class="border p-4"><?php echo $row['nama_pemesan']; ?></td>
                        <td class="border p-4"><?php echo $row['alamat_tujuan']; ?></td>
                        <td class="border p-4"><?php echo $row['no_telepon']; ?></td>
                        <td class="border p-4"><?php echo $row['note']; ?></td>
                        <td class="border p-4"><?php echo $row['total_belanja']; ?></td>
                        <td class="border p-4"><?php echo $row['waktu_pemesanan']; ?></td>
                        <td class="border p-4">
                            <?php
                            if (!empty($row['bukti_pembayaran'])) {
                                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['bukti_pembayaran']) . '" class="w-16 h-16 object-cover" alt="Bukti Pembayaran">';
                            } else {
                                echo 'Tidak ada bukti pembayaran';
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <a href="dashboard.php" class="text-blue-500">Kembali ke Dashboard</a>

    </div>



</body>

</html>