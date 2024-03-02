<!-- konfirmasi_pembayaran.php -->
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

    <div class="container h-screen mx-auto mb-60 p-4 bg-white">

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
                        <label for="no_telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="text" name="no_telepon" id="no_telepon" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                        <textarea name="note" id="note" rows="3" class="mt-1 p-2 w-full border border-gray-300 rounded-md"></textarea>
                    </div>
                    <div class="mb-4">
                        <p>No Rekening BCA a/n Ammar Zainul Arifin </p>
                        <div class="flex items-center">
                            <svg width="158" height="129" viewBox="0 0 158 129" fill="none" xmlns="http://www.w3.org/2000/svg" class=" w-14 h-14">
                                <g filter="url(#filter0_d_0_23)">
                                    <rect x="26" y="18" width="106.227" height="77.4578" rx="9" stroke="white" stroke-opacity="0.2" stroke-width="6" shape-rendering="crispEdges" />
                                    <rect x="29" y="21" width="100.227" height="71.4578" rx="5.76117" fill="#0060AF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M49.614 63.5763C49.614 62.6173 49.6251 60.0539 49.5999 59.738C49.6218 55.9236 46.6743 53.2328 44.8122 53.4426C43.5237 53.5478 42.4436 54.0422 41.864 55.4644C41.3264 56.7898 41.8071 58.5527 43.5938 58.9664C45.5041 59.4107 46.6199 59.7803 47.4273 60.3018C48.4166 60.9402 49.2242 62.16 49.2456 63.5778" fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M48.8156 63.5778C48.8218 62.3484 48.0926 61.2614 47.1395 60.6773C46.2941 60.161 45.1591 59.8219 43.3281 59.3848C42.7621 59.2486 42.1701 58.946 41.9868 58.5603C41.502 59.0199 41.4139 60.0534 41.4992 60.6575C41.5984 61.3562 42.4664 62.5081 43.7733 62.5532C44.5715 62.5834 45.5806 62.3916 46.0645 62.2949C46.8993 62.1252 48.2201 62.6172 48.4303 63.5762" fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M50.2891 47.4977C48.0728 47.4977 46.1589 48.8728 46.1655 51.2523C46.1725 53.2532 47.8826 54.3244 48.4931 55.0895C49.4153 56.2424 49.9144 57.6071 49.9661 59.6952C50.0067 61.3571 50.0046 62.9981 50.0136 63.5797H50.5026C50.4943 62.9712 50.4721 61.2291 50.4973 59.6438C50.5305 57.555 51.0476 56.2424 51.9702 55.0895C52.586 54.3244 54.2946 53.2532 54.2983 51.2523C54.3068 48.8728 52.3935 47.4977 50.1796 47.4977" fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M50.8514 63.5763C50.8514 62.6173 50.8399 60.0539 50.8646 59.738C50.8429 55.9236 53.7886 53.2328 55.6523 53.4426C56.9408 53.5478 58.0196 54.0422 58.601 55.4644C59.1379 56.7898 58.6547 58.5527 56.8703 58.9664C54.9586 59.4107 53.8444 59.7803 53.0349 60.3018C52.0468 60.9402 51.2957 62.16 51.2727 63.5778" fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M51.6495 63.5778C51.6425 62.3484 52.3715 61.2614 53.3218 60.6773C54.1709 60.161 55.3071 59.8219 57.1364 59.3848C57.7036 59.2486 58.2949 58.946 58.475 58.5603C58.9621 59.0199 59.0502 60.0534 58.9647 60.6575C58.8637 61.3562 57.9978 62.5081 56.6931 62.5532C55.8954 62.5834 54.8808 62.3916 54.3989 62.2949C53.5674 62.1252 52.2429 62.6172 52.0317 63.5762" fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M52.3329 67.5464L52.0496 65.5995L52.734 65.5019C52.9005 65.4806 53.1034 65.508 53.1845 65.606C53.2742 65.7086 53.3017 65.7934 53.3189 65.9279C53.345 66.0945 53.2938 66.2867 53.0946 66.3826V66.3885C53.3169 66.3885 53.4513 66.5388 53.4905 66.7926C53.496 66.8464 53.5131 66.9757 53.496 67.0837C53.4508 67.3408 53.288 67.4236 53.0128 67.4598L52.3329 67.5464ZM52.7734 67.198C52.8546 67.1869 52.9369 67.1828 53.0012 67.1442C53.0999 67.0837 53.0909 66.9544 53.0771 66.8581C53.043 66.647 52.9844 66.5665 52.7462 66.5997L52.5964 66.6214L52.6914 67.2086L52.7734 67.198ZM52.6303 66.2982C52.7209 66.2845 52.8436 66.2741 52.8948 66.1932C52.9217 66.1392 52.9558 66.0962 52.9333 65.9761C52.9054 65.8338 52.8553 65.7453 52.6628 65.7795L52.4837 65.8066L52.5545 66.3056L52.6303 66.2982Z" fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M55.2981 66.3756C55.3034 66.4118 55.3097 66.4521 55.312 66.4884C55.3673 66.8432 55.2981 67.1374 54.8739 67.2183C54.2466 67.3318 54.1265 66.9654 54.0163 66.4521L53.9575 66.1742C53.8711 65.6833 53.8339 65.3115 54.4454 65.1968C54.79 65.1378 55.0178 65.2669 55.1125 65.5896C55.1273 65.6378 55.1457 65.6853 55.1527 65.7339L54.7776 65.8068C54.7342 65.6853 54.6768 65.4686 54.5081 65.4868C54.2051 65.5213 54.3052 65.8758 54.3363 66.0241L54.449 66.5571C54.4829 66.7183 54.5502 66.9758 54.8124 66.9261C55.0252 66.886 54.9323 66.574 54.9134 66.4461" fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M55.9 66.9647L55.7704 64.9499L56.2741 64.8052L57.3307 66.5575L56.9339 66.6692L56.6836 66.2239L56.243 66.3484L56.2999 66.8547L55.9 66.9647ZM56.2061 66.023L56.5245 65.9362L56.1017 65.121L56.2061 66.023Z" fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M43.4523 65.4413C43.61 64.9665 43.7511 64.6166 44.3531 64.7719C44.6752 64.8567 44.8748 64.9901 44.8654 65.3422C44.8637 65.4205 44.8363 65.5005 44.8183 65.5778L44.4437 65.4806C44.4928 65.286 44.5239 65.1318 44.2694 65.058C43.9752 64.9821 43.9035 65.3179 43.863 65.4628L43.7106 65.9908C43.6621 66.1476 43.604 66.4069 43.863 66.4739C44.0769 66.5279 44.2065 66.3305 44.2839 66.042L44.022 65.9765L44.1126 65.671L44.7289 65.8574L44.4363 66.8754L44.1527 66.803L44.2166 66.5878H44.2085C44.0778 66.7639 43.9187 66.7824 43.7793 66.757C43.163 66.6004 43.2273 66.2214 43.3744 65.7151" fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M45.7462 66.3012L45.5606 67.1294L45.1428 67.0446L45.588 65.1107L46.3002 65.2619C46.717 65.3467 46.8429 65.5211 46.7838 65.8808C46.7502 66.0871 46.6421 66.3092 46.3781 66.2912L46.3753 66.288C46.5985 66.3613 46.6174 66.4674 46.5784 66.6502C46.5616 66.7283 46.4456 67.2008 46.5256 67.2771L46.5284 67.3353L46.0961 67.229C46.0781 67.0982 46.1395 66.8626 46.1637 66.732C46.1879 66.6166 46.2268 66.4539 46.1024 66.393C46.0051 66.3439 45.9686 66.3463 45.8584 66.3227L45.7462 66.3012ZM45.8174 66.0016L46.0987 66.073C46.2695 66.0964 46.3645 66.0131 46.3982 65.8188C46.4286 65.6407 46.3892 65.5712 46.2359 65.5368L45.9343 65.479L45.8174 66.0016Z" fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M48.4256 65.5426L48.8388 65.5877L48.6608 66.9474C48.5743 67.3784 48.3973 67.5667 47.8933 67.5079C47.3806 67.4468 47.2589 67.2272 47.2897 66.7927L47.4691 65.4343L47.8855 65.479L47.7068 66.807C47.6877 66.9513 47.6524 67.165 47.9249 67.191C48.1667 67.2084 48.2216 67.0574 48.249 66.87" fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M49.2942 67.5822L49.4187 65.6381L50.2122 65.6704C50.5875 65.688 50.6855 65.9761 50.674 66.2512C50.6629 66.4184 50.6076 66.6052 50.4527 66.7065C50.3256 66.7926 50.1622 66.813 50.011 66.8061L49.7523 66.7926L49.7006 67.6074L49.2942 67.5822ZM49.7638 66.4961L49.9741 66.5071C50.1449 66.513 50.2581 66.4494 50.2728 66.2134C50.2814 65.9869 50.1901 65.9483 49.9688 65.9392L49.8023 65.9338L49.7638 66.4961Z" fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M105.278 49.3767L102.123 54.7647C100.932 53.8547 99.4785 53.1852 97.6233 53.1852C93.233 53.1852 91.4495 56.2643 91.4495 58.4333C91.4495 60.0436 92.5699 62.4189 96.4763 62.4189C98.1162 62.4189 100.447 61.3458 101.118 60.8572L97.9979 67.1082C96.5106 67.3873 96.0219 67.5605 94.7631 67.5971C87.7711 67.7934 84.946 63.7519 84.9479 59.6225C84.9527 54.1631 90.1109 47.5239 98.6626 47.5239C99.1864 47.5239 99.8273 47.6946 100.375 47.8836L100.929 47.217" fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M118.295 47.3861L119.188 66.9682H112.54L112.536 63.61H108.003L106.511 66.9682H99.3002L106.839 52.9849L105.139 52.9745L108.368 47.3861H118.295ZM112.493 53.3767L109.93 59.0725H112.57L112.493 53.3767Z" fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M80.7507 47.3861C84.0431 47.4035 85.9036 49.0851 85.9036 51.514C85.9036 53.7535 83.9414 55.7356 81.7874 56.7605C84.005 57.5278 84.1969 59.4107 84.1969 60.7426C84.1969 63.9612 80.765 66.9682 76.3037 66.9682H66.574L70.3692 53.1797L68.8103 53.1713L71.9971 47.3861C71.9971 47.3861 78.0733 47.3687 80.7507 47.3861V47.3861ZM77.5206 55.3256C78.2016 55.3256 79.4041 55.1633 79.7048 53.9232C80.0342 52.5767 78.9057 52.5405 78.3644 52.5405L76.4301 52.5327L75.7555 55.3256H77.5206ZM74.7858 58.786L73.8952 62.0043H76.173C77.0689 62.0043 78.2901 61.5856 78.5893 60.5383C78.8849 59.4881 78.0312 58.786 77.1385 58.786H74.7858Z" fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M50.3766 69.3744C47.0077 69.3744 43.5458 68.5937 40.0883 67.0496L40.0035 67.0103L39.9629 66.929C38.4113 63.8473 37.5906 60.477 37.5906 57.1793C37.5906 53.8863 38.3777 50.66 39.9301 47.5825L39.973 47.5007L40.0595 47.4599C43.2578 46.0343 46.6983 45.3124 50.289 45.3124C53.6335 45.3124 57.2058 46.1161 60.6174 47.6411L60.7048 47.6777L60.7454 47.761C62.3265 50.8995 63.1604 54.2692 63.1604 57.5125C63.1604 60.7427 62.3597 63.9721 60.7765 67.1086L60.735 67.1908L60.6469 67.229C57.4972 68.6319 53.9457 69.3744 50.3766 69.3744M40.4083 66.627C43.7669 68.1138 47.117 68.8644 50.3767 68.8644C53.833 68.8644 57.2702 68.1535 60.3302 66.806C61.8502 63.7666 62.6207 60.6386 62.6207 57.5125C62.6207 54.3733 61.8165 51.1084 60.2954 48.0621C56.9845 46.5976 53.5268 45.8211 50.2891 45.8211C46.8129 45.8211 43.4808 46.5148 40.3793 47.8836C38.8904 50.8663 38.1326 53.992 38.1326 57.1793C38.1326 60.3722 38.9199 63.6387 40.4083 66.627Z" fill="white" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_0_23" x="0.727438" y="0.151626" width="156.772" height="128.003" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="7.42419" />
                                        <feGaussianBlur stdDeviation="11.1363" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix" values="0 0 0 0 0.795833 0 0 0 0 0.295122 0 0 0 0 0.355207 0 0 0 0.3 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_23" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_23" result="shape" />
                                    </filter>
                                </defs>
                            </svg>
                            <p>
                                <b>4210539901</b>
                            </p>
                        </div>
                    </div>
                    <div class="mb-4">

                        <label for="bukti_pembayaran" class="block text-sm font-medium text-gray-700">Upload Bukti Pembayaran</label>
                        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="mt-1" accept="image/*">
                    </div>

                    <input type="hidden" name="total_belanja" value="<?php echo $totalBelanja; ?>">
                    <p class="text-gray-500 font-bold">
                        Catatan: Untuk Pengiriman Jabodetabek Dikenakan Biaya Rp 10.000 Untuk Layanan Pengiriman JNE/JNT
                    </p>

                    <!-- Tombol Konfirmasi Pemesanan -->
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-full mt-4 mb-20 hover:bg-blue-600 block w-full md:inline-block">
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
                var noTelepon = document.getElementById('no_telepon').value.trim();
                var note = document.getElementById('note').value.trim();
                var buktiPembayaran = document.getElementById('bukti_pembayaran').value.trim();

                if (namaPemesan === '' || alamatTujuan === '' || noTelepon === '' || note === '' || buktiPembayaran === '') {
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