<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--=====TITLE=======-->
    <title>Figurer || Register</title>

    <!--=====FAV ICON=======-->
    <link rel="shortcut icon" href="{{ asset('public\images\user\logo\icon-logo.png') }}">

    <!--=====CSS=======-->
    @vite(['resources/user/css/plugins/bootstrap.min.css', 'resources/user/css/plugins/swiper.bundle.css', 'resources/user/css/plugins/fontawesome.css', 'resources/user/css/plugins/mobile.css', 'resources/user/css/plugins/magnific-popup.css', 'resources/user/css/plugins/slick-slider.css', 'resources/user/css/plugins/owlcarousel.min.css', 'resources/user/css/plugins/aos.css', 'resources/user/css/typography.css', 'resources/user/css/master.css'])

    <!--=====JQUERY=======-->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
            integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <!--===== PRELOADER STARTS =======-->
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>
    <!--===== PRELOADER ENDS =======-->

    <!--===== PAGE PROGRESS START=======-->
    <div class="paginacontainer">
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
    </div>
    <!--===== PAGE PROGRESS END=======-->

    <!--===== MOBILE HEADER STARTS =======-->
    <div class="mobile-header mobile-haeder2 d-block d-lg-none">
        <div class="container-fluid">
            <div class="col-12">
                <div class="mobile-header-elements">
                    <div class="mobile-logo">
                        <a href="index.html"><img src="frontend/assets/images/logo/logo1.png" alt=""></a>
                    </div>
                    <div class="mobile-nav-icon dots-menu">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-sidebar mobile-sidebar2">
        <div class="logosicon-area">
            <div class="logos">
                <img src="frontend/assets/images/logo/logo1.png" alt="">
            </div>
            <div class="menu-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <div class="mobile-nav mobile-nav2">
            <ul class="mobile-nav-list nav-list2">
                <li><a href="{{ url('/index') }}">Home</a></li>
                <li><a href="{{ url('/index') }}">Inventory</a></li>
                <li><a href="{{ url('/index') }}">CV Template</a></li>
                <li><a href="{{ url('/index') }}">Shop</a></li>
                <li><a href="{{ url('/index') }}">Invoice</a></li>
            </ul>
            <div class="allmobilesection">
                <a href="contact.html" class="header-btn2 mobile-get">Get Started</a>
                <div class="single-footer">
                    <h3>Contact Info</h3>
                    <div class="footer4-contact-info">
                        <div class="contact-info-single">
                            <div class="contact-info-icon">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <div class="contact-info-text">
                                <a href="tel:+3(924)4596512">+3(924)4596512</a>
                            </div>
                        </div>

                        <div class="contact-info-single">
                            <div class="contact-info-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="contact-info-text">
                                <a href="mailto:figurer@gmail.com">figurer@gmail.com</a>
                            </div>
                        </div>

                        <div class="single-footer">
                            <h3>Our Location</h3>

                            <div class="contact-info-single">
                                <div class="contact-info-icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div class="contact-info-text">
                                    <a href="mailto:figurer@gmail.com">55 East Birchwood Ave.Brooklyn, <br> New York
                                        11201,United States</a>
                                </div>
                            </div>

                        </div>
                        <div class="single-footer">
                            <h3>Social Links</h3>
                            <div class="social-links-mobile-menu">
                                <ul>
                                    <li>
                                        <a data-bs-toggle="tooltip" title="Linked in" href="#"><svg
                                                xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                                                <path
                                                    d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                                            </svg></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" title="Facebook" href="#"><svg
                                                xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                                <path
                                                    d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" />
                                            </svg></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" title="Instagram" href="#"><svg
                                                xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                                <path
                                                    d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                            </svg></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" title="TikTok" href="#"><svg
                                                xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                <path
                                                    d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                            </svg></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== MOBILE HEADER STARTS =======-->
    <style>
    /* Loading overlay */
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7); /* Semi-transparent black */
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.5s ease-in-out, visibility 0.5s ease-in-out;
    }

    /* Show when active */
    .loading-overlay.active {
        opacity: 1;
        visibility: visible;
    }



        </style>
        <div id="loadingOverlay" class="loading-overlay">
        <div class="loader loader--style6">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
            <rect x="0" y="13" width="4" height="5">
                <animate attributeName="height" values="5;21;5" begin="0s" dur="0.6s" repeatCount="indefinite" />
                <animate attributeName="y" values="13; 5; 13" begin="0s" dur="0.6s" repeatCount="indefinite" />
            </rect>
            <rect x="10" y="13" width="4" height="5">
                <animate attributeName="height" values="5;21;5" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
                <animate attributeName="y" values="13; 5; 13" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
            </rect>
            <rect x="20" y="13" width="4" height="5">
                <animate attributeName="height" values="5;21;5" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
                <animate attributeName="y" values="13; 5; 13" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
            </rect>
            </svg>
        </div>
        </div>
    <!--===== WELCOME STARTS =======-->
    <div class="about-welcome-section-area login"
        style="background-image: url('/images/user/background/emailbg.png'); background-repeat: no-repeat; background-size: cover;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="about-welcome-header text-center heading3">
                        <a href="{{ url('/') }}"><img src="/images/user/logo/logoo.png" alt=""
                                width="70%" height="60%" class="logo4"></a>
                        <div class="space16"></div>
                        <a href="{{ url('/index') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Sign
                                Up</span></a>
                    </div>
                    <div class="space50"></div>
                    <div class="login-boxarea heading6">
                        <h2>Create Your Account</h2>
                        <div class="space16"></div>
                        <p>Create an account today and start using Figurer.</p>
                        <div class="space50"></div>

                        {{-- Registration Form --}}
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="input-area">
                                <h4>Username</h4>
                                <div class="space16"></div>
                                <input type="text" name="username" placeholder="Your Name" required>
                            </div>
                            <div class="space16"></div>

                            <div class="input-area">
                                <h4>Email</h4>
                                <div class="space16"></div>
                                <input type="email" name="email" placeholder="Email Address" required>
                            </div>
                            <div class="space24"></div>

                            <div class="input-area">
                                <h4>Gender</h4>
                                <div class="space16"></div>
                                <select name="Gender" required>
                                    <option value="" disabled selected>Pilih Gender</option>
                                    <option value="Laki-laki">Male</option>
                                    <option value="Perempuan">Female</option>
                                </select>
                            </div>

                            <div class="space24"></div>

                            <div class="input-area">
                                <h4>Phone Number</h4>
                                <div class="space16"></div>
                                <input type="Phone Number" name="Phone Number" placeholder="Phone Number" required>
                            </div>
                            <div class="space24"></div>

                            <div class="input-area">
                                <h4>Password</h4>
                                <div class="space16"></div>
                                <input type="password" name="password" placeholder="Enter Your Password" required>
                            </div>
                            <div class="space16"></div>

                            <div class="input-area">
                                <h4>Confirm Password</h4>
                                <div class="space16"></div>
                                <input type="password" name="password_confirmation"
                                    placeholder="Confirm Your Password" required>
                            </div>
                            <div class="space32"></div>

                            <div class="input-area">
                                <button type="submit" class="header-btn2">Create Your Account</button>
                            </div>
                        </form>

                        <div class="space32"></div>
                        <div class="sign-text">
                            <p>If you already have an account, please</p> <a href="{{ route('login') }}">Log In</a>
                        </div>
                        <div class="space40"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--===== WELCOME ENDS =======-->

    <!--=====JS=======-->
    @vite(['resources/user/js/plugins/jquery-3-6-0.min.js', 'resources/user/js/plugins/bootstrap.min.js', 'resources/user/js/plugins/swiper.bundle.js', 'resources/user/js/plugins/mobilemenu.js', 'resources/user/js/plugins/slick-slider.js', 'resources/user/js/plugins/owlcarousel.min.js', 'resources/user/js/plugins/counter.js', 'resources/user/js/plugins/waypoints.js', 'resources/user/js/plugins/aos.js', 'resources/user/js/plugins/gsap.min.js', 'resources/user/js/plugins/magnific-popup.js', 'resources/user/js/plugins/ScrollTrigger.min.js', 'resources/user/js/main.js'])
    <script>document.getElementById('registerForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent default form submission

            const loadingOverlay = document.getElementById('loadingOverlay');

            // Show loading overlay
            loadingOverlay.classList.add('active');

            // Submit the form after a short delay to show animation
            setTimeout(() => {
                this.submit();
            }, 300);
        });
</script>
</body>

</html>
