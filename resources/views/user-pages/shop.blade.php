<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop</title>

    <!--=====FAV ICON=======-->
    <link rel="shortcut icon" href="assets/images/logo/icon-logo.png" />

      <!-- Link Tailwind CSS melalui CDN -->
      <script src="https://cdn.tailwindcss.com"></script>
      <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js" defer></script>
      @vite(['resources/js/user-pages/shop.js'])
      <script type="text/javascript" data-client-key="YOUR_CLIENT_KEY"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

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
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); /* Membuat grid responsif */
                gap: 5px; /* Mengatur jarak antar card */
                padding-top: 20px; /* Padding atas agar tidak terlalu rapat */
            }
        </style>

</head>
<body class="bg-gray-100">
    
    <!-- Header Navbar -->
    <header class="bg-[#6E24FF] w-full p-3">
        <div class="container mx-auto flex items-center justify-between">
            <div>
                <a href="{{ url('/index') }}"><img src="images/user/logo/logoo.png" alt="" width="40%"></a>
            </div>
            <nav>
                <ul class="flex space-x-6 font-bold">
                    <li><a href="{{ url('shop') }}" class="text-white hover:text-[#5A1EDB]">Shop</a></li>
                    <li><a href="#" class="text-white hover:text-[#5A1EDB]">Inventory</a></li>
                    <li><a href="{{ url('editor') }}" class="text-white hover:text-[#5A1EDB]">CV Editor</a></li>
                    <li><a href="#" class="text-white hover:text-[#5A1EDB]">Invoice</a></li>
                </ul>
            </nav>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="text" placeholder="Search..." class="pl-4 pr-10 py-2 rounded-full focus:outline-none" />
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.9 14.32a8 8 0 111.414-1.414l4.387 4.387a1 1 0 01-1.414 1.414l-4.387-4.387zM10 16a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <!-- Ikon Profil dengan Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button x-on:click="open = !open" class="focus:outline-none">
                        <img src="images/user/profil/icon-profil.jpg" alt="Profile" class="h-10 w-10 rounded-full border-2 border-white">
                    </button>
                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
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
            <!-- Bagian Kiri: Teks "Filter Harga" dan Tombol Tab -->
            <div class="flex items-center space-x-4">
                <span class="text-gray-700 text-2xl font-bold">SHOP</span>
                <div class="flex space-x-2">
                    <button onclick="filterPrice('all')" 
                        class="price-filter-btn px-6 py-2 bg-[#6E24FF] text-white rounded-full font-bold hover:bg-[#5A1EDB]">
                        Semua
                    </button>
                    <button onclick="filterPrice('free')" 
                        class="price-filter-btn px-6 py-2 bg-[#6E24FF] text-white rounded-full font-bold hover:bg-[#5A1EDB]">
                        Gratis
                    </button>
                    <button onclick="filterPrice('premium')" 
                        class="price-filter-btn px-6 py-2 bg-[#6E24FF] text-white rounded-full font-bold hover:bg-[#5A1EDB]">
                        Berbayar
                    </button>
                </div>
            </div>

            <!-- Bagian Kanan: Ikon Notifikasi dan Favorit -->
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button class="focus:outline-none text-[#6E24FF] hover:text-[#5A1EDB]" aria-label="Notifikasi">
                        <i class="fas fa-bell text-2xl"></i>
                        <span id="notifBadge" 
                            class="absolute -top-1 -right-2 bg-red-500 text-white text-[10px] font-bold w-4 h-4 flex items-center justify-center rounded-full hidden">
                            2
                        </span>
                    </button>
                </div>
                <div class="relative">
                    <button onclick="window.location.href='favorite.html'"
                        class="focus:outline-none text-[#6E24FF] hover:text-[#5A1EDB]">
                        <i class="fas fa-heart text-2xl"></i>
                    </button>
                    <span id="favBadge" 
                        class="absolute -top-1 -right-2 bg-red-500 text-white text-xs font-bold w-4 h-4 flex items-center justify-center rounded-full hidden">
                        0
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Card Container -->
    <section id="cardContainer" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mt-6 mb-10">
        <!-- Card Free -->
        <div class="card bg-white rounded-lg shadow-lg border border-gray-200 p-4" data-category="free">
            <img src="images/user/cv/cv-preview-7.jpg" alt="CV Free" class="w-full rounded-md">
            <p class="text-center text-gray-600 mt-2">Template Free</p>
            <p class="price-tag hidden">0</p> <!-- Harga Gratis -->
        </div>

        <!-- Card Premium -->
        <div class="card bg-white rounded-lg shadow-lg border border-gray-200 p-4" data-category="premium">
            <img src="images/user/cv/cv-preview-6.jpg" alt="CV Premium" class="w-full rounded-md">
            <p class="text-center text-gray-600 mt-2">Template Premium</p>
            <p class="price-tag hidden">50000</p> <!-- Harga Premium -->
        </div>
    </section>
</main>


    <footer class="bg-gray-900 text-white py-10">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-6">

            <div>
                <img src="assets/images/logo/logoo.png" alt="CV AI Logo" class="w-32 mb-2">
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
                    <a href="#" class="text-gray-400 hover:text-purple-300"><i
                            class="fab fa-instagram"></i></a>
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
        function filterPrice(category) {
            const allCards = document.querySelectorAll("#cardContainer > div");
            const buttons = document.querySelectorAll(".price-filter-btn");
    
            // Loop untuk menghapus class 'active' di semua tombol
            buttons.forEach(button => button.classList.remove("active"));
    
            // Tambahkan class 'active' ke tombol yang diklik
            const activeButton = document.querySelector(`button[onclick="filterPrice('${category}')"]`);
            if (activeButton) {
                activeButton.classList.add("active");
            }
    
            allCards.forEach(card => {
                const priceTag = card.querySelector(".price-tag");
                if (!priceTag) {
                    console.warn("Harga tidak ditemukan di salah satu kartu.");
                    return;
                }
    
                const priceText = priceTag.textContent.trim();
                const price = parseFloat(priceText.replace(/[^0-9.]/g, "")) || 0;
    
                if (category === 'all') {
                    card.style.display = 'block';
                } else if (category === 'free' && price === 0) {
                    card.style.display = 'block';
                } else if (category === 'premium' && price > 0) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    
        document.addEventListener("DOMContentLoaded", function () {
            filterPrice("all"); // Atur tampilan awal ke semua harga
        });
    </script>
        </script>
    </body>
</html>
