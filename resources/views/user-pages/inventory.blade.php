<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventory</title>

    <!--=====FAV ICON=======-->
    <link rel="shortcut icon" href="assets/images/logo/icon-logo.png" />

    <!-- Link Tailwind CSS melalui CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/js/user-pages/shop.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js" defer></script>
    <script type="text/javascript" data-client-key="YOUR_CLIENT_KEY"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
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
                <!-- Input Pencarian -->
                <div class="relative">
                    <input type="text" placeholder="Search..." class="pl-4 pr-10 py-2 rounded-full focus:outline-none" />
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.9 14.32a8 8 0 111.414-1.414l4.387 4.387a1 1 0 01-1.414 1.414l-4.387-4.387zM10 16a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <!-- Ikon Profil dengan Dropdown -->
                <div x-data="{ open: false }" class="relative flex items-center space-x-2" @click.away="open = false">
                    <button @click="open = !open" class="focus:outline-none flex items-center space-x-2">
                        <img src="images/user/profil/icon-profil.jpg" alt="Profile" class="h-10 w-10 rounded-full border-2 border-white">
                        <span class="text-white font-medium">Hi, Nadin</span>
                    </button>
                    <!-- Dropdown Menu -->
                    <div x-show="open" class="absolute right-0 top-full mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                        <a href="{{ url('profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Profile Settings</a>
                        <a href="logout.html" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
</body>

<body class="bg-gray-100">
        <div class="flex justify-between mb-4">
            <div>
                <button class="bg-gray-300 px-4 py-2 rounded">Semua</button>
                <button class="bg-gray-300 px-4 py-2 rounded">Tersedia</button>
                <button class="bg-gray-300 px-4 py-2 rounded">Habis</button>
            </div>
        </div>
        
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-white p-4 shadow rounded">
                <img src="product-image.jpg" alt="Produk" class="w-full h-40 object-cover rounded">
                <h2 class="text-lg font-semibold mt-2">Nama Produk</h2>
                <p class="text-gray-500">Kategori</p>
                <p class="text-sm">Stok: <span class="font-bold text-green-500">10</span></p>
                <div class="mt-2 flex justify-between">
                    <button class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
                </div>
            </div>
            <div class="bg-white p-4 shadow rounded">
                <img src="product-image.jpg" alt="Produk" class="w-full h-40 object-cover rounded">
                <h2 class="text-lg font-semibold mt-2">Nama Produk</ h2>
                <p class="text-gray-500">Kategori</p>
                <p class="text-sm">Stok: <span class="font-bold text-red-500">0</span></p>
                <div class="mt-2 flex justify-between">
                    <button class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
                </div>
            </div>
        </div>
    </main>
</body>