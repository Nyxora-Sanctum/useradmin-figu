<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--=====TITLE=======-->
    <title> FIGURER </title>

    <!--=====FAV ICON=======-->
    <link rel="shortcut icon" href="{{ asset('images/user/logo/icon-logo.png') }}">
    <!--=====JS=======-->

    @vite(['resources/user/js/plugins/jquery-3-6-0.min.js', 'resources/user/js/plugins/swiper.bundle.js', 'resources/user/js/plugins/ScrollTrigger.min.js', 'resources/user/js/plugins/aos.js'])
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--===== CSS =======-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite(['resources/user/css/plugins/bootstrap.min.css', 'resources/user/css/plugins/swiper.bundle.css', 'resources/user/css/plugins/mobile.css', 'resources/user/css/plugins/magnific-popup.css', 'resources/user/css/plugins/slick-slider.css', 'resources/user/css/plugins/owlcarousel.min.css', 'resources/user/css/plugins/aos.css', 'resources/user/css/typography.css', 'resources/user/css/master.css', 'resources/user/css/plugins/fontawesome.css'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });
    });
</script>

<body>
    <!--===== PRELOADER STARTS =======-->
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>
    <!--===== PRELOADER ENDS =======-->

    <!--===== PAGE PROGRESS START=======-->
    <div class="paginacontainer">
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100" height="100" viewBox="0 0 100 100">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" stroke="black" stroke-width="2" fill="blue" />
            </svg>
        </div>
    </div>
    <!--===== PAGE PROGRESS END =======-->

    <!--=====HEADER START=======-->
    <header>
        <div class="header-area homepage2 header header-sticky d-none d-lg-block" id="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-elements">
                            <div class="site-logo">
                                <a href="{{ url('/index') }}"><img src="images/user/logo/logoo.png"
                                        alt=""width="90%" height="42"></a>
                            </div>
                            <div class="main-menu">
                                <a href="{{ url('login') }}" class="header-btn2">Login</a>
                                <a href="signup.html" class="header-btn3">Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--=====HEADER END =======-->

    <!--===== MOBILE HEADER STARTS =======-->
    <div class="mobile-header mobile-haeder2 d-block d-lg-none">
        <div class="container-fluid">
            <div class="col-12">
                <div class="mobile-header-elements">
                    <div class="mobile-logo">
                        <a href="{{ url('/index') }}"><img src=" images/user/logo/logoo.png" alt=""></a>
                        <a href="{{ url('/index') }}"><img src="images/user/logo/logo1.png" alt=""></a>
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
                <img src=" images\user\logo\logo1.png" alt="">
                <img src="images/user/logo/logo1.png" alt="">
            </div>
            <div class="menu-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <div class="mobile-nav mobile-nav2">
            <ul class="mobile-nav-list nav-list2">
                <li><a href="about.html">Inventory</a></li>
                <li><a href="features.html">CV Editor</a></li>
                <li><a href="features.html">Shop</a></li>
                <li><a href="contact.html">Invoice</a></li>
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
                                <a href="mailto:info@example.com">info@example.com</a>
                            </div>
                        </div>

                        <div class="single-footer">
                            <h3>Our Location</h3>

                            <div class="contact-info-single">
                                <div class="contact-info-icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div class="contact-info-text">
                                    <a href="mailto:info@example.com">55 East Birchwood Ave.Brooklyn, <br> New York
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
                                                xmlns="http://www.w3.org/2000/svg" height="1em"
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                            </svg></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" title="TikTok" href="#"><svg
                                                xmlns="http://www.w3.org/2000/svg" height="1em"
                                                viewBox="0 0 512 512">
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

    <!--===== WELCOME STARTS =======-->
    <div class="welcome2-section-area"
        style="background-image: url('images/user/background/header2-bg.png'); background-position: center; background-repeat: no-repeat; background-size: cover;">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="welcome2-header heading3">
                        <span data-aos="fade-up" data-aos-duration="600">Figurer AI - Better CV, Brighter Careers!
                        </span>
                        <h1 data-aos="fade-up" data-aos-duration="800">Create an attractive and professional CV with
                            AI assistance
                        </h1>
                        <p data-aos="fade-up" data-aos-duration="1000">"Welcome to Figurer AI - The Smart Platform for
                            Creating Professional CV.</p>
                        <div data-aos="fade-up" data-aos-duration="1200">
                            <a href="{{ url('/register') }}" class="header-btn2">Get Started </a>
                            <a href="{{ route('any', 'editor') }}" class="header-btn3">Explore CV AI</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="header-images-area">
                        <div class="header-elements1 reveal">
                            <img src="images/user/all-images/haeder2-img1.png" alt="">
                        </div>
                        <div class="header-elements2" data-aos="zoom-out" data-aos-duration="1000">
                            <img src="images/user/elements/header2-elements.png" alt=""
                                class="aniamtion-key-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== WELCOME ENDS =======-->

    <!--===== OTHERS STARTS =======-->
    <div class="brand2-section-area sp8">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="brand2-header text-center">
                        <h2 data-aos="fade-up" data-aos-duration="1000">
                            Many people Start your Success Journey with Figurer
                        </h2>
                    </div>
                </div>
            </div>
            <div class="space30"></div>
            <div class="row">
                <div class="col-lg-12" data-aos="fade-left" data-aos-duration="1200">
                    <!-- Swiper Slider -->
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <p class="slider-text">Boost your career opportunities with an attractive and
                                    ATS-friendly CV.</p>
                            </div>
                            <div class="swiper-slide">
                                <p class="slider-text">Join now and craft your best CV with AI technology!</p>
                            </div>
                            <div class="swiper-slide">
                                <p class="slider-text">Make your resume stand out and get hired faster!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== OTHERS ENDS =======-->
    <!--===== PROCESS AREA STARTS =======-->
    <div class="process-section-area sp3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="process-header heading4 text-center">
                        <span data-aos="fade-up" data-aos-duration="800">Process</span>
                        <h2 data-aos="fade-up" data-aos-duration="1000">Easy steps to create a CV with AI in Figurer
                        </h2>
                    </div>
                </div>
            </div>
            <div class="space60"></div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="process-images reveal">
                        <img src="images\user\all-images\process-img1.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="process-images-content heading4">
                        <span data-aos="fade-left" data-aos-duration="800">Choose</span>
                        <h2 data-aos="fade-left" data-aos-duration="1000">Choose and Select Template</h2>
                        <p data-aos="fade-left" data-aos-duration="1200">Start by choosing from a variety of
                            professionally designed CV templates. Each template is designed to be attractive and in
                            accordance with ATS (Applicant Tracking System) standards, making it easier for your CV to
                            pass the initial recruitment selection..
                        </p>
                    </div>
                </div>
                <div class="process-section2">
                    <img src="images/user/elements/process-elements1.png" alt=""
                        class="process-elements1 d-lg-block d-none">
                    <img src="images/user/elements/process-elements2.png" alt=""
                        class="process-elements2 d-lg-block d-none">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="process-images-content heading4">
                                <span data-aos="fade-right" data-aos-duration="800">Fill Information</span>
                                <h2 data-aos="fade-right" data-aos-duration="1000">Fill in Personal Information & Work
                                    Experience</h2>
                                <p data-aos="fade-right" data-aos-duration="1200">Enter important details such as
                                    personal data, work experience, education and relevant skills. AI Figurer will help
                                    organize and refine its content to make it more interesting and effective in
                                    attracting recruiters' attention.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="process-images reveal">
                                <img src="images/user/all-images/process-img2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="process-images reveal">
                            <img src="images/user/all-images/process-img3.png" alt="" class="process-img3">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="process-images-content heading4">
                            <span data-aos="fade-left" data-aos-duration="800">Optimize & Download</span>
                            <h2 data-aos="fade-left" data-aos-duration="1000">Optimize with AI & Download your CV</h2>
                            <p data-aos="fade-left" data-aos-duration="1200">Once all the information is filled in,
                                let AI analyze and refine your CV to make it more professional. Once you are satisfied
                                with the results, download your CV in PDF format which is ready to be used to apply for
                                your dream job.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== PROCESS AREA ENDS =======-->

    <!--===== SERVICE AREA STARTS =======-->
    <div class="service2-section-area sp3"
        style="background-image: url('images/user/background/footer-bg2.png'); background-repeat: no-repeat; background-size: cover;">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 m-auto">
                    <div class="service2-header heading4 text-center">
                        <span data-aos="fade-up" data-aos-duration="800">Why Choose Us</span>
                        <h2 data-aos="fade-up" data-aos-duration="1000">Transform Your Marketing: The Figurer
                            Advantage
                        </h2>
                    </div>
                    <div class="space60"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="service2-bg-area">
                        <div class="row">
                            <div class="col-lg-4 col-md-6" data-aos="fade-right" data-aos-duration="1200">
                                <div class="service2-box-area text-center">
                                    <div class="service2-icon2">
                                        <img src="images/user/icons/service2-icon1.svg" alt="">.
                                    </div>
                                    <div class="service2-content">
                                        <a href="features.html">Professional CV in Minutes</a>
                                        <p>Figurer with advanced AI helps you create a professional CV quickly and
                                            easily, without the hassle of layout or word choice.</p>
                                        <a href="#" class="readmore">Read More <i
                                                class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6" data-aos="fade-down" data-aos-duration="1200">
                                <div class="service2-box-area text-center">
                                    <div class="service2-icon2">
                                        <img src="images/user/icons/service2-icon2.svg" alt="">.
                                    </div>
                                    <div class="service2-content">
                                        <a href="features.html">Modern & ATS-Friendly Template</a>
                                        <p>Choose an ATS-friendly CV template to make it easier for the recruitment
                                            system to read and increase interview opportunities. </p>
                                        <a href="#" class="readmore">Read More <i
                                                class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6" data-aos="fade-left" data-aos-duration="1200">
                                <div class="service2-box-area text-center">
                                    <div class="service2-icon2">
                                        <img src="images/user/icons/service2-icon3.svg" alt="">.
                                    </div>
                                    <div class="service2-content">
                                        <a href="features.html">Access Anytime & Anywhere</a>
                                        <p>Figurer online, allows you to edit your CV at any time on your computer or
                                            mobile phone. Download in PDF format and apply for jobs easily.
                                        </p>
                                        <a href="#" class="readmore">Read More <i
                                                class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== SERVICE AREA ENDS =======-->

    <!--===== TEMPLETE AREA STARTS =======-->
    <div class="templete1-section-area sp3">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 m-auto">
                    <div class="templete-header text-center heading4">
                        <span data-aos="fade-up" data-aos-duration="800">CV Template</span>
                        <h2 data-aos="fade-up" data-aos-duration="1000">Figurer CV Template</h2>
                    </div>
                </div>
                <div class="space30"></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-carousel-area" data-aos="fade-right" data-aos-duration="1000">
                        <div class="align-items-start">
                            <div class="nav nav-pills" id="v-pills-tab" aria-orientation="vertical" role="tablist">
                                <button class="nav-link active" id="v-pills-all-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-all" type="button" role="tab"
                                    aria-controls="v-pills-all" aria-selected="true">All</button>
                                <button class="nav-link" id="v-pills-Free-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-Free" type="button" role="tab"
                                    aria-controls="v-pills-Free" aria-selected="false">Free</button>
                                <button class="nav-link" id="v-pills-Premium-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-Premium" type="button" role="tab"
                                    aria-controls="v-pills-Premium" aria-selected="false">Premium</button>
                            </div>
                            <div class="space60"></div>
                            <div class="tab-content" id="v-pills-tabContent" data-aos="fade-left"
                                data-aos-duration="1200">
                                <div class="tab-pane fade show active" id="v-pills-all" role="tabpanel"
                                    aria-labelledby="v-pills-all-tab">
                                    <div class="tab-carousel-section owl-carousel">
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-Free" role="tabpanel"
                                    aria-labelledby="v-pills-Free-tab">
                                    <div class="tab-carousel-section owl-carousel">
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-Premium" role="tabpanel"
                                    aria-labelledby="v-pills-Premium-tab">
                                    <div class="tab-carousel-section owl-carousel">
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                        <div class="tabs-carousel-img">
                                            <img src="{{ asset('images\user\all-images\template-img2.png') }}"
                                                alt="">
                                            <div class="tabs-morebtn">
                                                <a href="{{ url('editor') }}" class="header-btn2">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== TEMPLETE AREA ENDS =======-->
    <!--===== FOOTER AREA STARTS =======-->
    <div class="footer2-section-area"
        style="background-image: url('images/user/background/bg1.png'); background-repeat: no-repeat; background-size: cover; background-position: center;">

        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="footer-header heading2 text-center sp8">
                        <h2 data-aos="fade-up" data-aos-duration="1000">Figurer CV AI</h2>
                        <span data-aos="fade-up" data-aos-duration="1200">
                            <img src="images/user/icons/star-icon1.svg" alt="">Start now and
                            achieve your dream career!</span>
                        <div class="div text-center" data-aos="fade-up" data-aos-duration="1400">
                            <a href="contact.html" class="header-btn2">Get Started Now </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="footer2-last-section">
                        <div class="row">
                            <div class="col-lg-2 col-md-6 col-12">
                                <div class="site-logo">
                                    <a href="{{ url('/index') }}"><img src="images/user/logo/logoo.png"
                                            alt=""width="90%" height="42"></a>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-6 col-12">
                                <div class="footer-auhtor-area">
                                    <p>Figurer is an innovative platform designed to help users create professional CVs
                                        quickly and easily with the assistance of artificial intelligence (AI). With
                                        Figurer, you don't have to worry about formatting or choosing the right
                                        words our AI will optimize every part of your CV to meet industry standards and
                                        attract recruiters' attention.</p>
                                </div>
                            </div>

                            <div class="col-lg col-md-6 col-12">
                                <div class="footer-auhtor-area">
                                    <div>
                                        <ul>
                                            <h6>Ikuti Kami</h6>
                                        </ul>
                                    </div>
                                    <ul class="social-links">
                                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="copyright-social-area">
                                    <ul>
                                        <li class="copy">
                                            <p>Copyright @2025 Figurer. All Right Reserved</p>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li><a>Your Privacy</a></li>
                                        <li class="terms"><a>Terms</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== FOOTER ENDS =======-->

    <!--=====JS=======-->

    @vite(['resources/user/js/plugins/swiper.bundle.js', 'resources/user/js/plugins/slick-slider.js', 'resources/user/js/plugins/bootstrap.min.js', 'resources/user/js/plugins/mobilemenu.js', 'resources/user/js/plugins/owlcarousel.min.js', 'resources/user/js/plugins/counter.js', 'resources/user/js/plugins/waypoints.js', 'resources/user/js/plugins/magnific-popup.js', 'resources/user/js/main.js'])

</body>

</html>
