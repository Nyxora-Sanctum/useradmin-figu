<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop</title>

    <!--===== FAVICON =====-->
    <link rel="shortcut icon" href="assets/images/logo/icon-logo.png" />

    <!-- ===== FONT & ICONS ===== -->
    <link rel="shortcut icon" href="assets/images/logo/icon-logo.png" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js" defer></script>
    @vite(['resources/user/js/plugins/jquery-3-6-0.min.js', 'resources/js/user-pages/shop.js'])
    <!-- Custom CSS tambahan jika diperlukan -->
    <style>
        #preloader {
            position: fixed;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .preloader {
            width: 50px;
            height: 50px;
            border: 5px solid #6E24FF;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .navbar {
            font-family: "Poppins", sans-serif;
            font-weight: 700;
        }

        .btn-filter {
            background-color: #6E24FF;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-filter:hover {
            background-color: #5A1EDB;
        }

        .btn-filter.active {
            background-color: #5A1EDB;
            box-shadow: 0 0 0 2px rgba(106, 48, 255, 0.5);
        }

        .cardContainer {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            /* Membuat grid responsif */
            gap: 5px;
            /* Mengatur jarak antar card */
            padding-top: 20px;
            /* Padding atas agar tidak terlalu rapat */
        }
    </style>

</head>

<body class="bg-gray-100">
    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader"></div>
    </div>

    <!-- Header Navbar -->
    <header class="bg-[#6E24FF] w-full p-3">
        <div class="container mx-auto flex items-center justify-between">
            <div>
                <a href="{{ url('/index') }}"><img src="images/user/logo/logoo.png" alt="" width="40%"></a>
            </div>
            <nav>
                <ul class="flex space-x-6 font-bold">
                    <li><a href="{{ url('shop') }}" class="text-white hover:text-[#5A1EDB]">Shop</a></li>
                    <li><a href="{{ url('inventory') }}" class="text-white hover:text-[#5A1EDB]">Inventory</a></li>
                    <li><a href="{{ url('editor') }}" class="text-white hover:text-[#5A1EDB]">CV Editor</a></li>
                    <li><a href="{{ url('invoice') }}" class="text-white hover:text-[#5A1EDB]">Invoice</a></li>
                </ul>
            </nav>
            <div class="flex items-center space-x-4">
                <!-- Search Bar -->
                <div class="flex items-center justify-between mb-4">
                    <input type="text" id="search" placeholder="Cari template..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600">
                </div>
                <!-- Ikon Profil dengan Dropdown -->
                <div x-data="{ open: false }" class="relative flex items-center space-x-2" @click.away="open = false">
                    <button @click="open = !open" class="focus:outline-none flex items-center space-x-2">
                        <img src="images/user/profil/icon-profil.jpg" alt="Profile"
                            class="h-10 w-10 rounded-full border-2 border-white">
                        <span class="text-white font-medium">Hi, Nadin</span>
                    </button>
                    <!-- Dropdown Menu -->
                    <div x-show="open"
                        class="absolute right-0 top-full mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                        <a href="{{ url('profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Profile
                            Settings</a>
                        <a href="logout.html" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

</body>
<main class="container mx-auto px-6 py-4">
    <!-- Filter Harga -->
    <section class="filter-price py-4 mb-4">
        <div class="flex items-center justify-between">
            <!-- Bagian Kiri: SHOP dan Filter Kategori -->
            <div class="flex items-center space-x-4">
                <span class="text-gray-700 text-2xl font-bold">SHOP</span>
                <select id="filter"
                    class="ml-4 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600">
                    <option value="all">Semua</option>
                    <option value="free">Gratis</option>
                    <option value="premium">Premium</option>
                </select>
            </div>


    </section>

    <!-- Container untuk Template List -->
    <section id="template-list" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mt-6 mb-10">
        @if (isset($templates) && count($templates) > 0)
            @foreach ($templates as $template)
                <div class="card bg-white rounded-lg shadow-lg border border-gray-200 p-4"
                    data-category="{{ $template->category }}">
                    <img src="{{ asset($template->image) }}" alt="{{ $template->name }}" class="w-full rounded-md">
                    <p class="text-center text-gray-600 mt-2">{{ $template->name }}</p>
                    <p class="price-tag hidden">{{ $template->price }}</p>
                </div>
            @endforeach
        @else
            <p class="text-gray-600 text-center">No templates available</p>
        @endif
    </section>

    <!-- Modal Overlay -->
    <div id="previewModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-4 rounded-lg shadow-lg max-w-sm w-full relative">
            <!-- Tombol Close -->
            <button id="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                ✕
            </button>

            <!-- Gambar dengan Rasio 3:4 -->
            <div class="w-full aspect-[3/4] max-h-60 overflow-hidden">
                <img id="modalImage" class="w-full h-full object-contain rounded-lg" src="" alt="">
            </div>

            <!-- Informasi Template -->
            <h2 id="modalTitle" class="text-xl font-semibold mt-3"></h2>
            <p id="modalCategory" class="text-sm text-gray-500"></p>
            <p id="modalPrice" class="text-lg font-bold mt-2"></p>

            <!-- Tombol Beli & Tutup -->
            <div class="mt-4 flex justify-between">
                <button id="buyButton"
                    class="px-4 py-2 bg-purple-600 text-white rounded-lg shadow-md hover:bg-purple-700 transition">Beli</button>
                <button id="closeModalBtn"
                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Overlay Pembayaran -->
    <div id="paymentOverlay" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-5 rounded-lg shadow-lg max-w-md w-full relative">
            <!-- Tombol Close -->
            <button id="closePayment" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                ✕
            </button>

            <!-- Informasi Pembayaran -->
            <h2 class="text-xl font-semibold">Konfirmasi Pembayaran</h2>
            <p id="paymentTemplateName" class="text-sm text-gray-600 mt-2"></p>
            <p id="paymentPrice" class="text-lg font-bold mt-1"></p>

            <!-- Tombol Konfirmasi -->
            <div class="mt-4 flex justify-end">
                <button id="confirmPayment"
                    class="px-4 py-2 bg-purple-600 text-white rounded-lg shadow-md hover:bg-purple-700 transition">
                    Konfirmasi Pembayaran
                </button>
            </div>
        </div>
    </div>

</main>


<footer class="bg-gray-900 text-white py-10">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-6">

        <div>
            <img src="images/user/logo/logoo.png" alt="CV AI Logo" class="w-32 mb-2">
            <!-- Tambahkan logo di sini -->
            <h2 class="text-lg font-semibold">About Us</h2>
            <p class="text-sm mt-2 text-gray-400">Platform AI untuk membuat CV profesional secara otomatis.
                Tingkatkan peluang kerja dengan CV yang menarik.</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold">Quick Links</h2>
            <ul class="mt-2 space-y-2 text-sm text-gray-400">
                <li><a href="#" class="hover:text-purple-300">Home</a></li>
                <li><a href="#" class="hover:text-purple-300">CV Editor</a></li>
                <li><a href="#" class="hover:text-purple-300">Shop</a></li>
                <li><a href="#" class="hover:text-purple-300">My Templates</a></li>
                <li><a href="#" class="hover:text-purple-300">Invoice & Payment</a></li>
            </ul>
        </div>

        <div>
            <h2 class="text-lg font-semibold">Support</h2>
            <ul class="mt-2 space-y-2 text-sm text-gray-400">
                <li><a href="#" class="hover:text-purple-300">FAQ</a></li>
                <li><a href="#" class="hover:text-purple-300">Help Center</a></li>
                <li><a href="#" class="hover:text-purple-300">Contact Us</a></li>
            </ul>
            <h2 class="text-lg font-semibold mt-4">Legal</h2>
            <ul class="mt-2 space-y-2 text-sm text-gray-400">
                <li><a href="#" class="hover:text-purple-300">Terms & Conditions</a></li>
                <li><a href="#" class="hover:text-purple-300">Privacy Policy</a></li>
            </ul>
        </div>

        <div>
            <h2 class="text-lg font-semibold">Follow Us</h2>
            <div class="flex space-x-4 mt-2">
                <a href="#" class="text-gray-400 hover:text-purple-300"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-gray-400 hover:text-purple-300"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-gray-400 hover:text-purple-300"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-gray-400 hover:text-purple-300"><i class="fab fa-linkedin"></i></a>
            </div>
            <h2 class="text-lg font-semibold mt-4">Newsletter</h2>
            <form class="mt-2">
                <input type="email" placeholder="Enter your email"
                    class="w-full p-2 rounded bg-gray-800 border border-gray-700 text-white">
                <button class="w-full mt-2 p-2 bg-purple-500 rounded hover:bg-purple-600">Subscribe</button>
            </form>
        </div>
    </div>

    <div class="text-center text-gray-400 text-sm mt-10 border-t border-gray-700 pt-4">
        &copy; 2025 CV AI | All Rights Reserved.
    </div>
</footer>

<script></script>
</body>

</html>
