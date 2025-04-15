<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventory</title>

    <!--===== FAVICON =====-->
    <link rel="shortcut icon" href="assets/images/logo/icon-logo.png" />

    <!-- ===== FONT & ICONS ===== -->
    <link rel="shortcut icon" href="assets/images/logo/icon-logo.png" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js" defer></script>
    @vite(['resources/js/user-pages/inventory.js', 'resources/user/js/plugins/jquery-3-6-0.min.js'])

    <!-- Custom CSS tambahan jika diperlukan -->
    <style>
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

<body class="bg-gray-100 flex flex-col min-h-screen ">

    <!-- Header Navbar -->
    <div class="w-full px-4">
        <div class="max-w-[1000px] mx-auto">
          <nav class="bg-gradient-to-br from-[#6E24FF] to-purple-300 px-6 py-3 rounded-full mt-6 flex items-center justify-between shadow-lg">
          
          <!-- Kiri: Logo dan Menu -->
          <div class="flex items-center space-x-6">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
              <img src="images/user/logo/logoo.png" alt="Logo" class="h-8 w-15" />
              <span class="text-white font-bold text-lg tracking-wide"></span>
            </div>
            
            <!-- Menu -->
            <div class="flex items-center space-x-6 ml-auto">
                <a href="{{ url('shop') }}" 
                   class="text-white font-bold hover:text-[#5a1eae] focus:outline-none no-underline active:text-[#5a1eae]">Shop</a>
                <a href="{{ url('inventory') }}" 
                   class="text-white font-bold hover:text-[#5a1eae] focus:outline-none no-underline active:text-[#5a1eae]">Inventory</a>
              </div>
          </div>
  
          <!-- Kanan: Profile -->
          <div
            x-data="{ open: false, username: 'Nadin' }"
            class="relative flex items-center space-x-3"
            @click.away="open = false"
          >
            <span class="text-white font-medium hidden md:inline">
              Hi, <span x-text="username"></span>
            </span>
            <button @click="open = !open" class="focus:outline-none">
              <img src="images/user/profil/icon-profil.jpg" alt="Profile" class="h-10 w-10 rounded-full border-2 border-white" />
            </button>
  
            <!-- Dropdown -->
            <div
              x-show="open"
              class="absolute right-0 top-full mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50"
              x-transition
            >
            <a href="{{ url('profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Profile Settings</a>
            <a href="{{ url('invoice') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Invoice</a>
              <button onclick="alert('Logged out')" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-200">
                Logout
              </button>
            </div>
          </div>
        </nav>
      </div>
    </div>
</body>


<main class="container mx-auto px-6 py-4 flex-grow">

    <!-- Container untuk Template List -->
    <section id="template-list" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mt-4 mb-10">
        @if (isset($templates) && count($templates) > 0)
            @foreach ($templates as $template)
                <div class="card bg-white rounded-lg shadow-lg border border-gray-200 p-4">
                    <img src="{{ asset($template->image) }}" alt="{{ $template->name }}"
                        class="w-full rounded-md h-40 object-cover">
                    <p class="text-center text-gray-600 mt-2 font-semibold">{{ $template->name }}</p>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-between mt-3">
                        <button class="text-sm text-purple-600 hover:underline preview-btn"
                            data-image="{{ asset($template->image) }}" data-name="{{ $template->name }}">Preview</button>
                        <a href="{{ url('editor?template=' . $template->id) }}"
                            class="text-sm bg-purple-600 text-white px-3 py-1 rounded hover:bg-purple-700 transition">Pakai</a>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-gray-600 text-center col-span-full flex flex-col items-center">
                <img src="/images/empty-box.svg" alt="No data" class="w-32 h-32 mb-4">
                Kamu belum membeli template apapun.
            </p>
        @endif
    </section>

    <!-- Modal Overlay -->
    <!-- Modal Preview -->
    <div id="preview-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-4 rounded-lg shadow-lg max-w-sm w-full relative">
            <button id="close-modal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">✕</button>
            <img id="preview-image" class="w-full rounded-md object-contain max-h-[75vh]" src="" alt="Preview">
        </div>
    </div>

    <!-- Informasi Template -->
    <h2 id="modalTitle" class="text-xl font-semibold mt-3"></h2>
    <p id="modalCategory" class="text-sm text-gray-500"></p>
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
<script>
    function logout() {
        // Remove token from localStorage
        localStorage.removeItem("access_token");

        // Optionally redirect to login or home page
        window.location.href = "/";
    }

</script>
<!-- Loading Overlay -->
<div id="loadingOverlay" class="loading-overlay">
    <div class="loader">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

</body>

</html>