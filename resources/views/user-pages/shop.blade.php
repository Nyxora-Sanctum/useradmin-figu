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
    @vite(['resources/js/user-pages/shop.js'])
    <script type="text/javascript" data-client-key="YOUR_CLIENT_KEY"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS tambahan jika diperlukan -->
    <style>
        .navbar {
            font-family: "Poppins", sans-serif;
            font-weight: 700;
            /* Bold */
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

        .hidden {
            display: none;
        }
    </style>

</head>

<body class="bg-gray-100">
    <!-- Header Navbar -->
    <header class="bg-[#6E24FF] w-full p-3">
        <div class="container mx-auto flex items-center justify-between">
            <div>
                <a href="{{ url('/index') }}"><img src="images/user/logo/logoo.png" alt=""width="40%" height="10-"></a>
            </div>
            <nav>
                <ul class="flex space-x-6 font-bold">
                    <li><a href="shop1.html" class="text-white hover:text-[#5A1EDB]">Shop</a></li>
                    <li><a href="#" class="text-white hover:text-[#5A1EDB]">Inventory</a></li>
                    <li><a href="#" class="text-white hover:text-[#5A1EDB]">CV Editor</a></li>
                    <li><a href="#" class="text-white hover:text-[#5A1EDB]">Invoice</a></li>
                </ul>
            </nav>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="text" placeholder="Search..."
                        class="pl-4 pr-10 py-2 rounded-full focus:outline-none" />
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M12.9 14.32a8 8 0 111.414-1.414l4.387 4.387a1 1 0 01-1.414 1.414l-4.387-4.387zM10 16a6 6 0 100-12 6 6 0 000 12z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <!-- Ikon Profil -->
                <div class="relative">
                    <button id="profileBtn" class="focus:outline-none">
                        <img src="assets/images/profil/icon-profil.jpg" alt="Profile"
                            class="h-10 w-10 rounded-full border-2 border-white">
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="profileDropdown"
                        class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                        <a href="profile.html" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Profile
                            Settings</a>
                        <a href="logout.html" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="p-4">
        <!-- Tab Kategori (diletakkan setelah header) -->
        <section class="tab-category py-4 mb-6">
            <div class="container mx-auto flex items-center justify-between">
                <!-- Bagian Kiri: Teks "Kategori" dan Tombol Tab -->
                <div class="flex items-center space-x-4">
                    <span class="text-gray-450 text-2xl font-bold">SHOP</span>
                    <div class="flex space-x-2">
                        <button onclick="filterCategory('all')"
                            class="filter-btn px-6 py-2 bg-[#6E24FF] text-white rounded-full font-bold hover:bg-[#5A1EDB]">
                            All
                        </button>
                        <button onclick="filterCategory('free')"
                            class="filter-btn px-6 py-2 bg-[#6E24FF] text-white rounded-full font-bold hover:bg-[#5A1EDB]">
                            Free
                        </button>
                        <button onclick="filterCategory('premium')"
                            class="filter-btn px-6 py-2 bg-[#6E24FF] text-white rounded-full font-bold hover:bg-[#5A1EDB]">
                            Premium
                        </button>
                    </div>
                </div>

                <!-- Bagian Kanan: Ikon Bell dan Ikon Like -->
                <div class="flex items-center space-x-4">
                    <!-- Ikon Notifikasi -->
                    <div class="relative">
                        <button class="focus:outline-none text-[#6E24FF] hover:text-[#5A1EDB]" aria-label="Notifikasi">
                            <i class="fas fa-bell text-2xl"></i>
                            <!-- Badge Notifikasi -->
                            <span id="notifBadge"
                                class="absolute -top-1 -right-2 bg-red-500 text-white text-[10px] font-bold w-4 h-4 flex items-center justify-center rounded-full hidden">
                                2
                            </span>
                        </button>
                    </div>

                    <!-- Ikon Like -->
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
        </section>

        <!-- Card Container -->
        <section id="cardContainer" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5 px-4 mt-6 mb-10">
            <!-- Card Free -->
            <div class="card bg-white rounded-lg shadow-lg border border-gray-200 p-4" data-category="free">
                <img src="images/user/cv/cv-preview-7.jpg" alt="CV Free" class="w-full rounded-md">
                <p class="text-center text-gray-600 mt-2">Template Free</p>
            </div>

            <!-- Card Premium -->
            <div class="card bg-white rounded-lg shadow-lg border border-gray-200 p-4" data-category="premium">
                <img src="images/user/cv/cv-preview-6.jpg" alt="CV Premium" class="w-full rounded-md">
                <p class="text-center text-gray-600 mt-2">Template Premium</p>
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


</body>

</html>
