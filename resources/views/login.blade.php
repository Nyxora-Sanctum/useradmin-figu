<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Figurer || Log In</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        const adminDashboard = "{{ route('admin-index') }}";
        const userDashboard = "{{ route('user-index') }}";
    </script>
    <link rel="shortcut icon" href="assets/images/logo/icon-logo.png" />
    <!--=====JQUERY=======-->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite('resources/user/js/plugins/swiper.bundle.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--===== CSS =======-->
    @vite(['resources/user/css/plugins/bootstrap.min.css', 'resources/user/css/plugins/swiper.bundle.css', 'resources/user/css/plugins/mobile.css', 'resources/user/css/plugins/magnific-popup.css', 'resources/user/css/plugins/slick-slider.css', 'resources/user/css/plugins/owlcarousel.min.css', 'resources/user/css/plugins/aos.css', 'resources/user/css/typography.css', 'resources/user/css/master.css'])
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
</head>

<body class="min-h-screen flex">

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="loading-overlay">
        <div class="loader">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- Left Side (Form) -->
    <div class="w-1/2 bg-white flex flex-col justify-center items-center px-16 py-10">
        <div class="w-full max-w-md">
            <h1 class="text-3xl font-bold mb-6 text-center">Welcome Back</h1>

            <div class="relative mb-6 text-center">
                <hr class="border-gray-300" />
                <span
                    class="absolute top-[-12px] bg-white px-4 text-sm text-gray-500 left-1/2 transform -translate-x-1/2">
                    Please log in first
                </span>
            </div>

            <form id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 mb-1 text-lg">Username</label>
                    <input type="text" id="username" name="username"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 text-lg" required
                        placeholder="Enter your username" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 mb-1 text-lg">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 text-sm" required
                        placeholder="Enter your password" />
                </div>

                <button type="submit"
                    class="w-full bg-[#6E24FF] text-white px-4 py-2 rounded-md hover:bg-[#4A1AB0] transition mt-6 text-base">
                    Log In
                </button>

                <div class="mt-6 text-center text-base">
                    <p>Don’t have an account? <a href="{{ route('register') }}"
                            class="text-blue-600 hover:underline">Register Today.</a></p>
                    <p class="mt-2">Take care of your password!</p>
                </div>
            </form>
        </div>
    </div>

    <!-- Right Side (Image/Illustration) -->
    <div class="w-1/2 bg-[#6E24FF] text-white flex flex-col justify-center items-center p-10">
        <div class="mb-2">
            <a href="{{ url('/') }}">
                <img src="/images/user/logo/logoo.png" alt="Logo" class="w-52 h-12 mx-auto mt-2">
            </a>
        </div>
        <img src="/images/login1.svg" alt="Illustration" class="w-[32rem] h-[32rem] object-contain -mt-4" />
    </div>


    <!-- Loading logic -->
    <script>
        const form = document.getElementById('loginForm');
        const overlay = document.getElementById('loadingOverlay');

        form.addEventListener('submit', function() {
            overlay.classList.add('active');
        });
    </script>

    <!--=====JS=======-->
    @vite(['resources/js/user-pages/auth.js', 'resources/user/js/plugins/slick-slider.js', 'resources/user/js/plugins/bootstrap.min.js', 'resources/user/js/plugins/mobilemenu.js', 'resources/user/js/plugins/owlcarousel.min.js', 'resources/user/js/plugins/counter.js', 'resources/user/js/plugins/waypoints.js', 'resources/user/js/plugins/magnific-popup.js', 'resources/user/js/main.js'])

</body>

</html>
