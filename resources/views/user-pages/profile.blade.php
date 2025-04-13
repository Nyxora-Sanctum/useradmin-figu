<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Header Navbar -->
    <header class="bg-[#6E24FF] w-full p-3">
        <div class="container mx-auto flex items-center justify-between">
            <div>
                <a href="{{ url('/index') }}"><img src="images/user/logo/logoo.png" alt=""width="40%" height="10-"></a>
            </div>
            <nav>
                <ul class="flex space-x-8 font-bold text-white">
                    <li><a href="{{ url('shop') }}" class="hover:text-[#4A1AB0]">Shop</a></li>
                    <li><a href="{{ url('inventory') }}" class="hover:text-[#4A1AB0]">Inventory</a></li>
                    <li><a href="{{ url('editor') }}" class="hover:text-[#4A1AB0]">Editor</a></li>
                </ul>
            </nav>
            <button class="focus:outline-none">
                <img src="images/user/profil/icon-profil.jpg" alt="Profile" class="h-10 w-10 rounded-full border-2 border-white" />
            </button>
        </div>
    </header>

    <div class="relative">
        <button onclick="history.back()" class="absolute top-2 left-2 p-2 rounded-full text-gray-600 hover:text-gray-900">
            <!-- Icon Back (SVG) -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
    </div>
    <!-- Profile Settings -->
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg mt-10 p-6">
        <h2 class="text-2xl font-bold text-center">Profile Settings</h2>

        <!-- Foto Profil -->
        <div class="flex flex-col items-center mt-6">
            <img id="profileImg" src="images/user/profil/icon-profil.jpg" alt="Profile Picture" class="w-24 h-24 rounded-full border-4 border-gray-300 shadow-md">
            <input type="file" id="fileInput" class="hidden" accept="image/*">
            <button onclick="document.getElementById('fileInput').click()" class="mt-3 bg-blue-500 text-white px-4 py-2 text-sm rounded-lg hover:bg-blue-700">
                Change Photo
            </button>
        </div>

        <!-- Form Settings -->
        <form class="mt-6 space-y-4">
            <div>
                <label class="block text-gray-700 font-semibold">Full Name</label>
                <input type="text" id="fullName" class="w-full mt-1 p-2 border rounded-[10px] focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your name">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Username</label>
                <input type="text" id="fullName" class="w-full mt-1 p-2 border rounded-[10px] focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your username">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Gender</label>
                <input type="text" id="fullName" class="w-full mt-1 p-2 border rounded-[10px] focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your gender">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Phone Number</label>
                <input type="text" id="fullName" class="w-full mt-1 p-2 border rounded-[10px] focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your phone number">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Address</label>
                <input type="text" id="fullName" class="w-full mt-1 p-2 border rounded-[10px] focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your address">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Email Address</label>
                <input type="text" id="fullName" class="w-full mt-1 p-2 border rounded-[10px] focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your email">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">New Password</label>
                <input type="password" id="password" class="w-full mt-1 p-2 border rounded-[10px] focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter new password">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Confirm Password</label>
                <input type="password" id="confirmPassword" class="w-full mt-1 p-2 border rounded-[10px] focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Confirm new password">
            </div>

            <button type="button" onclick="saveProfile()" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-700 font-semibold">
                Save Changes
            </button>
        </form>
    </div>

    <script>
        document.getElementById('fileInput').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('profileImg').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        function saveProfile() {
            const name = document.getElementById('fullName').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (!name || !email) {
                alert("Nama dan Email harus diisi!");
                return;
            }

            if (password && password !== confirmPassword) {
                alert("Password tidak cocok!");
                return;
            }

            alert("Profile updated successfully!");
        }
    </script>

</body>
</html>
