<?php
session_start();

require "../koneksi.php";

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];

if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];

    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE id_produk = $id_produk");

    if ($queryProduk && mysqli_num_rows($queryProduk) > 0) {
        $produk = mysqli_fetch_assoc($queryProduk);
    } else {
        header("Location: dashboard.php?status=error&message=Produk tidak ditemukan.");
        exit();
    }
} else {
    header("Location: dashboard.php?status=error&message=ID produk tidak valid.");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_produk'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];

    if (!empty($_FILES['gambar']['name'])) {
        $gambar_path = 'uploads/' . $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar_path);

        $queryUpdate = mysqli_query($con, "UPDATE produk SET 
            nama_produk = '$nama_produk',
            harga = $harga,
            stok = $stok,
            deskripsi = '$deskripsi',
            gambar_path = '$gambar_path'
            WHERE id_produk = $id_produk");
    } else {
        $queryUpdate = mysqli_query($con, "UPDATE produk SET 
            nama_produk = '$nama_produk',
            harga = $harga,
            stok = $stok,
            deskripsi = '$deskripsi'
            WHERE id_produk = $id_produk");
    }

    if ($queryUpdate) {
        $message = "Produk berhasil diupdate.";
        $status = "success";
    } else {
        $message = "Gagal mengupdate produk.";
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
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-200 h-screen">
    <div class="bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-8 text-center">Edit Produk</h2>

        <form action="edit_produk.php?id=<?php echo $id_produk; ?>" method="post" enctype="multipart/form-data" class="mt-8">
            <label for="nama_produk" class="block">Nama Produk:</label>
            <input type="text" name="nama_produk" value="<?php echo $produk['nama_produk']; ?>" required class="border p-2 w-full">

            <label for="harga" class="block mt-4">Harga:</label>
            <input type="number" name="harga" value="<?php echo $produk['harga']; ?>" required class="border p-2 w-full">

            <label for="stok" class="block mt-4">Stok:</label>
            <input type="number" name="stok" value="<?php echo $produk['stok']; ?>" required class="border p-2 w-full">

            <label for="deskripsi" class="block mt-4">Deskripsi:</label>
            <textarea name="deskripsi" required class="border p-2 w-full"><?php echo $produk['deskripsi']; ?></textarea>

            <label for="gambar" class="block mt-4">Gambar Produk:</label>
            <input type="file" name="gambar" accept="image/*" class="border p-2">

            <button type="submit" name="edit_produk" class="mt-4 bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600">Edit Produk</button>
        </form>
    </div>
</body>

</html>