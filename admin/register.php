<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        .bg-hero-image {
            background-image: url('../src/img/hero.jpg');
        }
    </style>
</head>

<body class="bg-red-800">


    <div class="bg-hero-image bg-cover bg-center container mx-auto flex justify-center items-center h-screen">
        <div class="bg-white p-8 rounded shadow-md w-96">
            <h2 class="text-2xl font-bold mb-8 text-center">Register</h2>

            <form action="register_process.php" method="post">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
                    <input type="text" id="username" name="username" class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                    <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600">Register</button>
            </form>

            <p class="mt-4 text-center">Sudah punya akun? <a href="login.php" class="text-blue-500">Login</a></p>
            <a href="../index.php" class="text-blue-500 hover:underline mb-4 block text-center mt-4">&larr; Kembali ke Beranda</a>
        </div>
    </div>

</body>

</html>