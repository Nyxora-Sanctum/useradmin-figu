<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>

    <link rel="shortcut icon" href="{{ asset('public\images\user\logo\icon-logo.png') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--=====JS=======-->

    @vite(['resources/user/js/plugins/jquery-3-6-0.min.js', 'resources/user/js/plugins/swiper.bundle.js', 'resources/user/js/plugins/ScrollTrigger.min.js', 'resources/user/js/plugins/aos.js'])

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--===== CSS =======-->
    @vite(['resources/user/css/plugins/bootstrap.min.css', 'resources/user/css/plugins/swiper.bundle.css', 'resources/user/css/plugins/mobile.css', 'resources/user/css/plugins/magnific-popup.css', 'resources/user/css/plugins/slick-slider.css', 'resources/user/css/plugins/owlcarousel.min.css', 'resources/user/css/plugins/aos.css', 'resources/user/css/typography.css', 'resources/user/css/master.css', 'resources/user/css/plugins/fontawesome.css'])

    <!--===== CSS =======-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"> </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"> </script>

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
                                <ul>
                                    <li><a href="about.html" class="nav-link active">Inventory</a></li>
                                    <li><a href="{{ url('editor') }}"class="nav-link active">CV Editor</a></li>
                                    <li><a href="features.html" class="nav-link active">Shop</a></li>
                                    <li><a href="{{ url('invoice') }}" class="nav-link active">Invoice</a></li>
                                </ul>
                                <a href="{{ url('login') }}" class="header-btn2">Login</a>
                                <a href="signup.html" class="header-btn3">Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--=====HEADER END =======-->

    <div class="main-container welcome2-section-area-cv"
        style="background-image: url('images/user/background/header2-bg.png'); background-position: center; background-repeat: no-repeat; background-size: cover;">

        <!--=== Invoice Start ====-->
        <div class="invoice-card">
            <!-- Header -->
            <div class="invoice-header">
                <h2>INVOICE</h2>
                <p>No. #12345</p>
            </div>

            <!-- Invoice Details -->
            <div class="invoice-details">
                <div class="row">
                    <div class="col-6">
                        <span class="label">Invoice Date:</span> 25 Oktober 2023
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <span class="label">Bill To:</span><br>
                        John Doe<br>
                        johndoe@example.com<br>
                        123 Main St, City, Country
                    </div>
                </div>
            </div>

            <!-- Items Table with Scroll Container -->
            <div class="invoice-table-container">
                <table class="invoice-table">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Order_id</th>
                            <th>Invoice_id</th>
                            <th>Status</th>
                            <th>Item_id</th>
                            <th>Create_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>schiller.angelica</td>
                            <td>8a7ad048-7cc5-3058-be4c-137f2ea6447c</td>
                            <td>66b8af26-053a-3f04-9a84-b59954514e7c</td>
                            <td>unpaid</td>
                            <td>72647</td>
                            <td>2025-01-04T19:06:17.000000Z</td>
                        </tr>
                        <tr>
                            <td>dietrich.gerry</td>
                            <td>86fdb29c-74d0-314a-bd01-b4d9425d09a0</td>
                            <td>66b8af26-053a-3f04-9a84-b59954514e7c</td>
                            <td>paid</td>
                            <td>72648</td>
                            <td>2025-05-04T19:06:17.000000Z</td>
                        </tr>
                        <tr>
                            <td>yanto.basna</td>
                            <td>86fdb29c-74d0-314a-bd01-b4d9425d09a0</td>
                            <td>66b8af26-053a-3f04-9a84-b59954514e7c</td>
                            <td>paid</td>
                            <td>72649</td>
                            <td>2025-15-04T19:06:17.000000Z</td>
                        </tr>
                        <tr>
                            <td>yanto.basna</td>
                            <td>86fdb29c-74d0-314a-bd01-b4d9425d09a0</td>
                            <td>66b8af26-053a-3f04-9a84-b59954514e7c</td>
                            <td>paid</td>
                            <td>72649</td>
                            <td>2025-15-04T19:06:17.000000Z</td>
                        </tr>
                        <tr>
                            <td>yanto.basna</td>
                            <td>86fdb29c-74d0-314a-bd01-b4d9425d09a0</td>
                            <td>66b8af26-053a-3f04-9a84-b59954514e7c</td>
                            <td>paid</td>
                            <td>72649</td>
                            <td>2025-15-04T19:06:17.000000Z</td>
                        </tr>
                        <tr>
                            <td>yanto.basna</td>
                            <td>86fdb29c-74d0-314a-bd01-b4d9425d09a0</td>
                            <td>66b8af26-053a-3f04-9a84-b59954514e7c</td>
                            <td>paid</td>
                            <td>72649</td>
                            <td>2025-15-04T19:06:17.000000Z</td>
                        </tr>
                        <tr>
                            <td>yanto.basna</td>
                            <td>86fdb29c-74d0-314a-bd01-b4d9425d09a0</td>
                            <td>66b8af26-053a-3f04-9a84-b59954514e7c</td>
                            <td>paid</td>
                            <td>72649</td>
                            <td>2025-15-04T19:06:17.000000Z</td>
                        </tr>
                        <tr>
                            <td>yanto.basna</td>
                            <td>86fdb29c-74d0-314a-bd01-b4d9425d09a0</td>
                            <td>66b8af26-053a-3f04-9a84-b59954514e7c</td>
                            <td>paid</td>
                            <td>72649</td>
                            <td>2025-15-04T19:06:17.000000Z</td>
                        </tr>
                        <tr>
                            <td>yanto.basna</td>
                            <td>86fdb29c-74d0-314a-bd01-b4d9425d09a0</td>
                            <td>66b8af26-053a-3f04-9a84-b59954514e7c</td>
                            <td>paid</td>
                            <td>72649</td>
                            <td>2025-15-04T19:06:17.000000Z</td>
                        </tr>
                        <tr>
                            <td>yanto.basna</td>
                            <td>86fdb29c-74d0-314a-bd01-b4d9425d09a0</td>
                            <td>66b8af26-053a-3f04-9a84-b59954514e7c</td>
                            <td>paid</td>
                            <td>72649</td>
                            <td>2025-15-04T19:06:17.000000Z</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Footer -->
            <div class="invoice-footer">
                <p>Thank you for your business!</p>
                <p>If you have any questions, please contact us at company@example.com</p>
            </div>
        </div>

        <!-- Bootstrap JS (Optional) -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

        <!--=====JS=======-->

        @vite(['resources/user/js/plugins/swiper.bundle.js', 'resources/user/js/plugins/slick-slider.js', 'resources/user/js/plugins/bootstrap.min.js', 'resources/user/js/plugins/mobilemenu.js', 'resources/user/js/plugins/owlcarousel.min.js', 'resources/user/js/plugins/counter.js', 'resources/user/js/plugins/waypoints.js', 'resources/user/js/plugins/magnific-popup.js', 'resources/user/js/main.js'])

</body>
