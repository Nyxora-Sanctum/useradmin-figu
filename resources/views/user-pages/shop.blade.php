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
    @vite(['resources/js/user-pages/shop.js', 'resources/user/js/plugins/jquery-3-6-0.min.js'])
    
    <!-- Custom CSS tambahan jika diperlukan -->
    <style>
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

    <!-- Header Navbar -->
    <header class="bg-[#6E24FF] w-full h-12 md:h-16">
        <div class="container mx-auto h-full flex items-center justify-between px-6">
            <div class="h-full flex items-center">
                <a href="{{ url('/index') }}"> <img src="images/user/logo/logoo.png" alt="Logo" class="h-6 md:h-10"></a>
            </div>
            <nav class="hidden md:block">
                <ul class="flex space-x-6 font-bold text-white">
                    <li><a href="{{ url('shop') }}" class="hover:text-[#d1c3ff]">Shop</a></li>
                    <li><a href="{{ url('inventory') }}" class="hover:text-[#d1c3ff]">Inventory</a></li>
                    <li><a href="{{ url('editor') }}" class="hover:text-[#d1c3ff]">CV Editor</a></li>
                    <li><a href="{{ url('invoice') }}" class="hover:text-[#d1c3ff]">Invoice</a></li>
                </ul>
            </nav>
                   <!-- Search + Profile -->
        <div class="flex items-center space-x-4">
            <!-- Search -->
            <div class="relative">
                <input
                    type="text"
                    id="search"
                    placeholder="Cari template CV..."
                    class="pl-10 pr-4 py-1.5 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-300 focus:border-transparent w-48 md:w-64 text-sm"
                />
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"/>
                    </svg>
                </div>
            </div>

            <!-- Profile Dropdown -->
            <div x-data="{ open: false }" class="relative" @click.away="open = false">
                <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                    <img src="images/user/profil/icon-profil.jpg" alt="Profile"
                         class="h-10 w-10 rounded-full border-2 border-white">
                    <span class="text-white font-medium hidden md:inline">Hi, Nadin</span>
                </button>
                <!-- Dropdown -->
                <div x-show="open"
                     class="absolute right-0 top-full mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                    <a href="{{ url('profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Profile Settings</a>
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
        <div class="relative">
            <select id="filter"
              class="appearance-none pl-4 pr-10 py-1 border border-gray-300 rounded-lg bg-white shadow-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent cursor-pointer transition duration-200">
              <option value="all">Semua</option>
              <option value="free">Gratis</option>
              <option value="premium">Premium</option>
            </select>
          
            <!-- Icon panah dropdown, sekarang agak menjauh dari edge -->
            <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center pr-1">
              <svg class="w-4 h-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M5.23 7.21a.75.75 0 011.06.02L10 11.584l3.71-4.354a.75.75 0 111.14.976l-4.25 5a.75.75 0 01-1.14 0l-4.25-5a.75.75 0 01.02-1.06z"
                  clip-rule="evenodd" />
              </svg>
            </div>
          </div>
  </section>
<style>
    /* Loading overlay */
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8);
        /* Semi-transparent white */
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.5s ease-in-out, visibility 0.5s ease-in-out;
        z-index: 9999;
        /* Ensure it's on top */
    }

    /* Show when active */
    .loading-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    /* Loader animation */
    .loader {
        display: flex;
        gap: 6px;
    }

    .loader div {
        width: 6px;
        height: 20px;
        background: #9b98f2;
        /* Purple */
        animation: loadingBounce 0.6s infinite ease-in-out alternate;
    }

    .loader div:nth-child(1) {
        animation-delay: 0s;
    }

    .loader div:nth-child(2) {
        animation-delay: 0.2s;
    }

    .loader div:nth-child(3) {
        animation-delay: 0.4s;
    }

    @keyframes loadingBounce {
        from {
            transform: scaleY(0.5);
        }

        to {
            transform: scaleY(1.5);
        }
    }
</style>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="loading-overlay">
    <div class="loader">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

    <!-- Container untuk Template List -->
    <section id="template-list" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mt-6 mb-10">

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
            <div class="mt-4 space-y-1.5">
                <!-- Nama Template -->
                <h2 id="modalTitle" class="text-2xl font-bold text-gray-800"></h2>

                <!-- Harga -->
                <p id="modalPrice" class="text-lg font-semibold text-gray-700 mt-1"></p>

                <!-- Kategori -->
                <p id="modalCategory" class="text-sm text-purple-600 italic"></p>

                <!-- Deskripsi -->
                <p id="modalDescription" class="text-sm text-gray-600 mt-3 leading-relaxed"></p>
            </div>


            <!-- Tombol Beli & Tutup -->
            <div class="mt-4 flex justify-end">
                <button id="buyButton"
                    class="px-4 py-2 bg-purple-600 text-white rounded-lg shadow-md hover:bg-purple-700 transition">Beli Sekarang</button>
            </div>
        </div>
    </div>

<!-- Modal Konfirmasi Pembayaran -->
<div id="paymentConfirmModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg shadow-xl max-w-sm text-center">
        <h2 id="confirmModalTitle" class="text-lg font-semibold mb-2">Konfirmasi Pembelian</h2>
        <p id="confirmModalDesc" class="text-sm text-gray-600 mb-4">Deskripsi produk</p>
        <button id="confirmPayBtn" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">Bayar Sekarang</button>
    </div>
</div>

<!-- Overlay Invoice -->
<div id="invoiceOverlay" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60">
    <div class="bg-white p-6 rounded-lg text-center shadow-xl">
        <h2 class="text-xl font-bold mb-2 text-green-600">Pembayaran Berhasil</h2>
        <p>Invoice #: <span id="invoiceCode" class="font-mono text-sm"></span></p>
        <button id="closeInvoiceOverlay" class="mt-4 px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-900">Tutup</button>
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

<script>

document.addEventListener("DOMContentLoaded", () => {
            const previewModal = document.getElementById("previewModal");
            const overlayCard = document.getElementById("overlayCard");
            const buyButton = document.getElementById("buyButton");

            document.querySelectorAll(".preview-btn").forEach(button => {
            button.addEventListener("click", (e) => {
                const card = e.currentTarget; // gunakan currentTarget, bukan target

                document.getElementById("modalImage").src = card.dataset.image;
                document.getElementById("modalTitle").textContent = card.dataset.name;
                document.getElementById("modalCategory").textContent = card.dataset.category;
                document.getElementById("modalPrice").textContent = `Rp ${card.dataset.price}`;
                document.getElementById("modalDescription").textContent = card.dataset.description;

                previewModal.classList.remove("hidden");
            });
        });


            document.getElementById("closeModal").addEventListener("click", () => {
                previewModal.classList.add("hidden");
            });
            buyButton.addEventListener("click", () => {
                previewModal.classList.add("hidden");
                setTimeout(() => {
                    document.getElementById("invoiceNumber").textContent = "INV-" + Math.floor(Math.random() * 100000);
                    document.getElementById("paymentStatus").textContent = "Berhasil";
                    overlayCard.classList.remove("hidden");
                }, 1000);
            });

            document.getElementById("closeOverlayBtn").addEventListener("click", () => {
                overlayCard.classList.add("hidden");
            });
        });

</script>
</body>

</html>
