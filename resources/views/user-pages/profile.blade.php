<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Pastikan untuk memuat AlpineJS jika ingin menggunakan x-data -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    <style>
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s ease-in-out, visibility 0.5s ease-in-out;
            z-index: 9999;
        }

        .loading-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .loader {
            display: flex;
            gap: 6px;
        }

        .loader div {
            width: 6px;
            height: 20px;
            background: #9b98f2;
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

    <div class="relative">
        <button onclick="history.back()" class="absolute top-2 left-2 p-2 rounded-full text-gray-600 hover:text-gray-900">
            <!-- Icon Back (SVG) -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
    </div>

    <!-- Profile Settings -->
    <div class="w-full max-w-3xl mx-auto bg-white shadow-lg rounded-lg mt-10 p-6">
        <h2 class="text-2xl font-bold text-center">Profile Settings</h2>

        <!-- Foto Profil -->
        <div class="flex flex-col items-center mt-6">
            <img id="profileImg" src="images/user/profil/icon-profil.jpg" alt="Profile Picture" class="w-36 h-36 rounded-full border-4 border-gray-300 shadow-md">
            <input type="file" id="fileInput" class="hidden" accept="image/*">
            <button onclick="document.getElementById('fileInput').click()" class="mt-3 bg-[#6E24FF] text-white px-4 py-2 text-sm rounded-lg hover:bg-[#5a1eae]">
                Change Photo
            </button>
        </div>

        <!-- Form Settings -->
        <form class="mt-6 space-y-4">
            <div>
                <label class="block text-gray-700 font-semibold">Username</label>
                <input type="text" id="username" class="w-full mt-1 p-2 border rounded-[10px] focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your username">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold" for="gender">Gender</label>
                <select id="gender" class="w-full mt-1 p-2 border rounded-[10px] focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled selected>Select your gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Phone Number</label>
                <input type="text" id="phone_number" class="w-full mt-1 p-2 border rounded-[10px] focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your phone number">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Address</label>
                <input type="text" id="address" class="w-full mt-1 p-2 border rounded-[10px] focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your address">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Email Address</label>
                <input type="text" id="email" class="w-full mt-1 p-2 border rounded-[10px] focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your email">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">New Password</label>
                <input type="password" id="password" class="w-full mt-1 p-2 border rounded-[10px] focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter new password">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Confirm Password</label>
                <input type="password" id="confirmPassword" class="w-full mt-1 p-2 border rounded-[10px] focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Confirm new password">
            </div>

            <button type="button" id="saveProfileButton"
            class="w-full bg-gradient-to-br from-[#6E24FF] to-purple-300 text-white py-2 rounded-lg font-semibold transition duration-300 hover:from-purple-700 hover:to-purple-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Save Changes
            </button>
        </form>
    </div>

    <script>
        function logout() {
            // Remove token from localStorage
            localStorage.removeItem("access_token");

            // Optionally redirect to login or home page
            window.location.href = "/";
        }
    </script>
</body>

</html>
