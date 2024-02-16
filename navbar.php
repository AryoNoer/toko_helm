<nav class="bg-gray-800 p-4 sticky top-0">
    <div class="container mx-auto flex items-center justify-between">
        <div class="flex items-center space-x-4 ">
            <a href="index.php" class=" left-4"><img src="src/img/helmet.png" alt="logo" class="w-8 h-8"></a>
            <a href="index.php" class="text-white font-medium">Amar Helmet</a>
        </div>

        <div class="flex items-center space-x-4">
            <a href="keranjang.php" class="text-white hover:text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>

            </a>

            <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
                echo '<a href="/toko_helm/admin/logout.php" class="text-white font-bold border border-white rounded-md px-3 py-1 hover:bg-white hover:text-purple-800">Logout</a>';
            } else {
                echo '<a href="/toko_helm/admin/login.php" class="text-white font-bold border border-white rounded-md px-3 py-1 hover:bg-white hover:text-purple-800">Masuk</a>';
                echo '<a href="/toko_helm/admin/register.php" class="text-white font-bold border border-white rounded-md px-3 py-1 hover:bg-white hover:text-purple-800">Register</a>';
            }
            ?>
        </div>
    </div>
</nav>