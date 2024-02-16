<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header('Location: login.php');
    exit;
}

require "../koneksi.php";
$username = $_SESSION['username'];
$action = "Viewed Dashboard";
$queryLog = mysqli_query($con, "INSERT INTO dashboard_logs (username, action) VALUES ('$username', '$action')");

$message = '';
$alertType = '';
if (isset($_GET['message'])) {
    $message = $_GET['message'];
    $alertType = ($_GET['status'] == 'success') ? 'bg-green-500' : 'bg-red-500';
}

$query = mysqli_query($con, "SELECT * FROM produk");

if (!$query) {
    die("Query failed: " . mysqli_error($con));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah_produk'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];

    $gambar_path = 'uploads/' . $_FILES['gambar']['name']; // Sesuaikan dengan folder penyimpanan gambar di server
    move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar_path);

    $queryInsert = mysqli_query($con, "INSERT INTO produk (nama_produk, harga, stok, deskripsi, gambar_path) VALUES ('$nama_produk', $harga, $stok, '$deskripsi', '$gambar_path')");

    if ($queryInsert) {
        $message = "Produk berhasil ditambahkan.";
        $status = "success";
    } else {
        $message = "Gagal menambahkan produk.";
        $status = "error";
    }

    header("Location: dashboard.php?status=$status&message=$message");
    exit();
}
if (isset($_GET['hapus_produk'])) {
    $id_produk_hapus = $_GET['hapus_produk'];

    $queryDelete = mysqli_query($con, "DELETE FROM produk WHERE id_produk = $id_produk_hapus");

    if ($queryDelete) {
        $message = "Produk berhasil dihapus.";
        $status = "success";
    } else {
        $message = "Gagal menghapus produk.";
        $status = "error";
    }

    header("Location: dashboard.php?status=$status&message=$message");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="font-sans bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-md rounded-md p-8 w-full max-w-6xl">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-3xl font-bold text-blue-500 uppercase">Admin Dashboard</h2>
                <form action="logout.php" method="post" class="">
                    <button type="submit" class="bg-red-500 text-white px-6 py-3 rounded-full hover:bg-red-600 w-full"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                        </svg>
                    </button>
                </form>
            </div>

            <p class="text-gray-600 font-bold">Welcome, <?php echo $username; ?>!</p>
            <P>Apa ada produk baru hari ini?</P>

            <?php
            if (isset($status) && isset($message)) {
                $alertType = ($status == 'success') ? 'bg-green-500' : 'bg-red-500';
                echo '<div id="notification" class="' . $alertType . ' text-white p-4 mb-4 rounded">' . $message . '</div>';
            }
            ?>

            <form action="dashboard.php" method="post" enctype="multipart/form-data" class="mt-8 space-y-4">
                <!-- ... form fields ... -->
                <label for="nama_produk" class="block">Nama Produk:</label>
                <input type="text" name="nama_produk" required class="border p-2 w-full">

                <label for="harga" class="block mt-4">Harga:</label>
                <input type="number" name="harga" required class="border p-2 w-full">

                <label for="stok" class="block mt-4">Stok:</label>
                <input type="number" name="stok" required class="border p-2 w-full">

                <label for="deskripsi" class="block mt-4">Deskripsi:</label>
                <textarea name="deskripsi" required class="border p-2 w-full"></textarea>

                <label for="gambar" class="block mt-4">Gambar Produk:</label>
                <input type="file" name="gambar" accept="image/*" required class="border p-2">
                <button type="submit" name="tambah_produk" class="bg-blue-500 text-white px-6 py-3 rounded-full hover:bg-blue-600 w-full">Tambah Produk</button>
            </form>

            <div class="mt-8">
                <h2 class="text-2xl font-bold mb-4 text-gray-600">List Barang</h2>
                <a href="info_pesanan.php" class="bg-red-500 text-white text-center px-4 py-2 rounded-full hover:bg-red-600 block mb-4">Pesanan</a>

                <?php
                if (isset($_GET['message'], $_GET['status'])) {
                    $message = htmlspecialchars($_GET['message']);
                    $status = ($_GET['status'] == 'success') ? 'bg-green-500' : 'bg-red-500';
                    echo '<div id="notification" class="' . $status . ' text-white p-4 mb-4 rounded">' . $message . '</div>';
                }
                ?>

                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <!-- ... table content ... -->
                        <thead>
                            <tr>
                                <th class="border p-4">ID</th>
                                <th class="border p-4">Nama Produk</th>
                                <th class="border p-4">Harga</th>
                                <th class="border p-4">Stok</th>
                                <th class="border p-4">Deskripsi</th>
                                <th class="border p-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                                <tr>
                                    <td class="border p-4 justify-center"><?php echo $row['id_produk']; ?></td>
                                    <td class="border p-4 justify-center"><?php echo $row['nama_produk']; ?></td>
                                    <td class="border p-4 justify-center"><?php echo $row['harga']; ?></td>
                                    <td class="border p-4 justify-center"><?php echo $row['stok']; ?></td>
                                    <td class="border p-4 justify-center"><?php echo $row['deskripsi']; ?></td>
                                    <td class="border p-4 flex row-span-2 gap-4 justify-center">
                                        <a href="edit_produk.php?id=<?php echo $row['id_produk']; ?>" class="text-blue-500 mr-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                                            </svg>
                                        </a>
                                        <a href="?hapus_produk=<?php echo $row['id_produk']; ?>" class="text-red-500" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            var notification = document.getElementById('notification');
            if (notification) {
                notification.style.display = 'none';
            }
        }, 1000);
    </script>

</body>

</html>