<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!--=====TITLE=======-->
  <title>Quad || Shop</title>

  <!--=====FAV ICON=======-->
  <link rel="shortcut icon" href="{{ asset('images/user/logo/fav-logo.png') }}">

  {{-- CSS Plugins --}}
  @vite([
    'resources/user/css/plugins/bootstrap.min.css',
    'resources/user/css/plugins/swiper.bundle.css',
    'resources/user/css/plugins/mobile.css',
    'resources/user/css/plugins/magnific-popup.css',
    'resources/user/css/plugins/slick-slider.css',
    'resources/user/css/plugins/owlcarousel.min.css', 
    'resources/user/css/plugins/aos.css',
    'resources/user/css/typography.css',
    'resources/user/css/master.css'
  ])

  {{-- JS Plugins --}}
  @vite([
    'resources/user/js/plugins/jquery-3-6-0.min.js',
    'resources/user/js/plugins/swiper.bundle.js',
    'resources/user/js/plugins/ScrollTrigger.min.js',
    'resources/user/js/plugins/aos.js'
])

</head>
<body>
  <!--===== PRELOADER STARTS =======-->
  <div id="preloader">
    <div class="preloader">
      <span></span>
      <span></span>
    </div>
  </div>
  <!--===== PRELOADER ENDS =======-->

  <!--===== PAGE PROGRESS START=======-->
  <div class="paginacontainer">
    <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
      </svg>
    </div>
  </div>
  <!--===== PAGE PROGRESS END=======-->

  <!-- Konten halaman lainnya bisa ditambahkan di sini -->

</body>
</html>


  <!--=====HEADER START=======-->
  <header>
    <div class="header-area homepage2 header header-sticky d-none d-lg-block " id="header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="header-elements">
              <div class="site-logo">
                <a href="index.html"><img src="assets/images/logo/logo1.png" alt=""></a>
              </div>
              <div class="main-menu">
                <ul>
                  <li><a href="#">Home <i class="fa-solid fa-angle-down"></i></a>
                    <ul class="dropdown-padding">
                      <li class="main-small-menu"><a href="#">Multiple Page <i class="fa-solid fa-angle-right"></i></a>
                        <ul class="small-dropdown">
                          <li><a href="index.html">Email Marketing</a></li>
                          <li><a href="index2.html">Project Managment</a></li>
                          <li><a href="index3.html">SEO Software</a></li>
                          <li><a href="index4.html">Social Marketing</a></li>
                          <li><a href="index5.html">Content Writer</a></li>
                          <li><a href="rtl.html">RTL</a></li>
                        </ul>
                      </li>

                      <li class="main-small-menu"><a href="#">Landing Page <i class="fa-solid fa-angle-right"></i></a>
                        <ul class="small-dropdown">
                          <li><a href="single-index1.html">Email Marketing</a></li>
                          <li><a href="single-index2.html">Project Managment</a></li>
                          <li><a href="single-index3.html">SEO Software</a></li>
                          <li><a href="single-index4.html">Social Marketing</a></li>
                          <li><a href="single-index5.html">Content Writer</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li><a href="about.html">About</a></li>
                  <li><a href="features.html">Features</a></li>
                  <li><a href="#">Resource <i class="fa-solid fa-angle-down"></i></a>
                  <ul class="dropdown-padding">
                    <li><a href="blogv1.html">Blog V1</a></li>
                    <li><a href="blogv2.html">Blog V2</a></li>
                    <li><a href="blog-left.html">Blog Left</a></li>
                    <li><a href="blog-right.html">Blog Right</a></li>
                    <li><a href="blog-details.html">Blog Single</a></li>
                  </ul>
                  </li>
                  <li><a href="#">Pages <i class="fa-solid fa-angle-down"></i></a>
                    <ul class="dropdown-padding">
                      <li><a href="pricing-plan.html">Pricing Plan</a></li>
                      <li><a href="testimonial1.html">Testimonials 01</a></li>
                      <li><a href="testimonial2.html">Testimonials 02</a></li>
                      <li><a href="team.html">Team</a></li>
                      <li><a href="login.html">Login</a></li>
                      <li><a href="signup.html">Sign Up</a></li>
                      <li><a href="forget.html">Forget Password</a></li>
                      <li><a href="resetpass.html">Reset Password</a></li>
                      <li><a href="verify.html">Verify Email</a></li>
                      <li><a href="faq.html">FAQ</a></li>
                      <li><a href="download.html">Download</a></li>
                      <li><a href="404.html">404</a></li>
                    </ul>
                  </li>
                  <li><a href="contact.html">Contact</a></li>
                </ul>
                <a href="login.html" class="header-btn2">Login</a>
                  <a href="signup.html" class="header-btn3">Sign Up Free</a>
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
          <a href="index.html"><img src="assets/images/logo/logo1.png" alt=""></a>
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
      <img src="assets/images/logo/logo1.png" alt="">
    </div>
    <div class="menu-close">
      <i class="fa-solid fa-xmark"></i>
    </div>
   </div>
  <div class="mobile-nav mobile-nav2">
    <ul class="mobile-nav-list nav-list2">
      <li><a href="#" >Home </a>
        <ul class="sub-menu">
          <li><a href="#">Multiple Page</a>
          <ul class="sub-menu">
            <li><a href="index.html">Email Marketing</a></li>
            <li><a href="index2.html">Project Managment </a></li>
            <li><a href="index3.html">SEO Software</a></li>
            <li><a href="index4.html">Social Marketing</a></li>
            <li><a href="index5.html">Content Writer</a></li>
            <li><a href="rtl.html">RTL</a></li>
          </ul>
        </li>
        <li><a href="#">Landing Page</a>
          <ul class="sub-menu">
            <li><a href="single-index1.html">Email Marketing</a></li>
            <li><a href="single-index2.html">Project Managment </a></li>
            <li><a href="single-index3.html">SEO Software</a></li>
            <li><a href="single-index4.html">Social Marketing</a></li>
            <li><a href="single-index5.html">Content Writer</a></li>
          </ul>
        </li>
        </ul>
      </li>
      <li><a href="about.html">About</a></li>
      <li><a href="features.html">Features</a></li>
      <li><a href="#">Resource</a>
        <ul class="sub-menu">
          <li><a href="blogv1.html">Blog V1</a></li>
          <li><a href="blogv2.html">Blog V2</a></li>
          <li><a href="blog-left.html">Blog Left</a></li>
          <li><a href="blog-right.html">Blog Right</a></li>
          <li><a href="blog-details.html">Blog Single</a></li>
        </ul>
      </li>
      <li><a href="#">Pages</a>
        <ul class="sub-menu">
          <li><a href="pricing-plan.html">Pricing Plan</a></li>
          <li><a href="testimonial1.html">Testimonials 01</a></li>
          <li><a href="testimonial2.html">Testimonials 02</a></li>
          <li><a href="team.html">Team</a></li>
          <li><a href="login.html">Login</a></li>
          <li><a href="signup.html">Sign Up</a></li>
          <li><a href="forget.html">Forget Password</a></li>
          <li><a href="resetpass.html">Reset Password</a></li>
          <li><a href="verify.html">Verify Email</a></li>
          <li><a href="faq.html">FAQ</a></li>
          <li><a href="download.html">Download</a></li>
                      <li><a href="404.html">404</a></li>
        </ul>
      </li>
      <li><a href="contact.html">Contact</a></li>
    </ul>
    <div class="allmobilesection">
      <a href="contact.html"  class="header-btn2 mobile-get">Get Started</a>
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
                <a href="mailto:info@example.com" >55 East Birchwood Ave.Brooklyn, <br> New York 11201,United States</a>
              </div>
            </div>

          </div>
          <div class="single-footer">
            <h3>Social Links</h3>
            <div class="social-links-mobile-menu">
              <ul>
                <li>
                  <a data-bs-toggle="tooltip" title="Linked in" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg></a>
                </li>
                <li>
                  <a data-bs-toggle="tooltip" title="Facebook" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/></svg></a>
                </li>
                <li>
                  <a data-bs-toggle="tooltip" title="Instagram" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg></a>
                </li>
                <li>
                  <a data-bs-toggle="tooltip" title="TikTok" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg></a>
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
<div class="about-welcome-section-area about2" style="background-image: url(assets/images/background/header2-bg.png); background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 m-auto">
                <div class="about-welcome-header text-center heading3">
                    <h1>News & Article</h1>
                    <div class="space16"></div>
                    <a href="index.html">Home <i class="fa-solid fa-angle-right"></i> <span>Blog V1</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== WELCOME ENDS =======-->



<div class="blog-artical-area sp3">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="blog-artical-header">
          <h2 class="heading6">Latest Article</h2>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">All</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Sass</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Development</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-software-tab" data-bs-toggle="pill" data-bs-target="#pills-software" type="button" role="tab" aria-controls="pills-software" aria-selected="false">Software</button>
              </li>
            </ul>
        </div>
        <div class="space60"></div>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <div class="row">
              <div class="col-lg-4 col-md-6 ">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img1.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Sass</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Mastering Sass Variables: A Comprehensive Guide</a>
                    <div class="space16"></div>
                    <p>Learn the ins and outs of Sass variables how they can streamline your styling workflow.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img2.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Development</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Top 10 Sass Mixing Every Developer Should Know</a>
                    <div class="space16"></div>
                    <p>Discover essential Sass mixins that can supercharge your development process.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img3.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Software</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Sass vs. CSS: Understanding the Differences and Benefits</a>
                    <div class="space16"></div>
                    <p>Uncover the advantages of using Sass over traditional CSS and why it's become a staple...</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img4.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Email</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">The Future of Web Design: Exploring SassScript</a>
                    <div class="space16"></div>
                    <p>Delve into the power of SassScript and its potential to transform the way you write..</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img5.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>SEO</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Optimizing Performance with Sass: Best Practices.</a>
                    <div class="space16"></div>
                    <p>Discover best practices for optimizing performance when using Sass in your projects.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img6.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Management</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Exploring Sass Modules: Organise Your Code Like a Pro</a>
                    <div class="space16"></div>
                    <p>Unlock the benefits of modular styling with Sass modules. Learn how to structure your</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img7.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Marketing</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Harnessing the Power of Sass Extensions</a>
                    <div class="space16"></div>
                    <p>Explore the world of Sass extensions and how they can extend the functionality of your Sass</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img8.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Project</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Advanced Sass Techniques: Pushing the Boundaries.</a>
                    <div class="space16"></div>
                    <p>Take your Sass skills to the next level with advanced techniques and concepts learn.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img9.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Inspiration</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Sass Security: Best Practices for Secure Styling</a>
                    <div class="space16"></div>
                    <p>Ensure the security of your Sass projects with best practices and techniques for secure style.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            <div class="row">
              <div class="col-lg-4 col-md-6 ">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img1.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Sass</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Mastering Sass Variables: A Comprehensive Guide</a>
                    <div class="space16"></div>
                    <p>Learn the ins and outs of Sass variables how they can streamline your styling workflow.</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img2.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Development</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Top 10 Sass Mixing Every Developer Should Know</a>
                    <div class="space16"></div>
                    <p>Discover essential Sass mixins that can supercharge your development process.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img3.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Software</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Sass vs. CSS: Understanding the Differences and Benefits</a>
                    <div class="space16"></div>
                    <p>Uncover the advantages of using Sass over traditional CSS and why it's become a staple...</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img4.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Email</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">The Future of Web Design: Exploring SassScript</a>
                    <div class="space16"></div>
                    <p>Delve into the power of SassScript and its potential to transform the way you write..</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img5.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>SEO</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Optimizing Performance with Sass: Best Practices.</a>
                    <div class="space16"></div>
                    <p>Discover best practices for optimizing performance when using Sass in your projects.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
            <div class="row">
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img2.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Development</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Top 10 Sass Mixing Every Developer Should Know</a>
                    <div class="space16"></div>
                    <p>Discover essential Sass mixins that can supercharge your development process.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img3.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Software</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Sass vs. CSS: Understanding the Differences and Benefits</a>
                    <div class="space16"></div>
                    <p>Uncover the advantages of using Sass over traditional CSS and why it's become a staple...</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img4.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Email</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">The Future of Web Design: Exploring SassScript</a>
                    <div class="space16"></div>
                    <p>Delve into the power of SassScript and its potential to transform the way you write..</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-software" role="tabpanel" aria-labelledby="pills-software-tab" tabindex="0">
            <div class="row">
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img3.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Software</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Sass vs. CSS: Understanding the Differences and Benefits</a>
                    <div class="space16"></div>
                    <p>Uncover the advantages of using Sass over traditional CSS and why it's become a staple...</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img4.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Email</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">The Future of Web Design: Exploring SassScript</a>
                    <div class="space16"></div>
                    <p>Delve into the power of SassScript and its potential to transform the way you write..</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img5.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>SEO</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Optimizing Performance with Sass: Best Practices.</a>
                    <div class="space16"></div>
                    <p>Discover best practices for optimizing performance when using Sass in your projects.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img6.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Management</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Exploring Sass Modules: Organise Your Code Like a Pro</a>
                    <div class="space16"></div>
                    <p>Unlock the benefits of modular styling with Sass modules. Learn how to structure your</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img7.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Marketing</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Harnessing the Power of Sass Extensions</a>
                    <div class="space16"></div>
                    <p>Explore the world of Sass extensions and how they can extend the functionality of your Sass</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="blog-inner-tabs">
                  <div class="img1">
                    <img src="assets/images/all-images/blog-v1-img8.png" alt="">
                  </div>
                  <div class="space16"></div>
                  <div class="content-area">
                    <span>Project</span>
                    <div class="space16"></div>
                    <a href="blog-details.html">Advanced Sass Techniques: Pushing the Boundaries.</a>
                    <div class="space16"></div>
                    <p>Take your Sass skills to the next level with advanced techniques and concepts learn.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="space20"></div>
        <div class="text-center">
          <a href="blogv1.html" class="header-btn2">View All Blogs</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== BLOG INNER ENDS =======-->

<!--===== FOOTER AREA STARTS =======-->
<div class="footer2-section-area" style="background-image: url(assets/images/background/bg1.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 m-auto">
        <div class="footer-header heading2 text-center sp8">
          <h2 data-aos="fade-up" data-aos-duration="1000">Deliver Your Best Work With Quad.Com</h2>
          <span data-aos="fade-up" data-aos-duration="1200">No Credit Card Needed <img src="assets/images/icons/star-icon1.svg" alt="">Unlimited Time On Free Plan</span>
          <div class="div text-center" data-aos="fade-up" data-aos-duration="1400">
            <a href="contact.html" class="header-btn2">Get Started Now </a>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="footer2-last-section">
          <div class="row">
            <div class="col-lg col-md-6 col-12">
              <div class="footer-auhtor-area">
                <img src="assets/images/logo/logo2.png" alt="">
                <p>Tailor our Project <br class="d-lg-block d-none"> Management Software to <br class="d-lg-block d-none"> fit your unique processes.</p>
                <ul class="social-links">
                  <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                </ul>
              </div>
            </div>

            <div class="col-lg col-md-6 col-12">
              <div class="footer-auhtor-area">
                <h3>Features</h3>
                <ul>
                  <li><a href="#">Docs</a></li>
                  <li><a href="#">Integrations</a></li>
                  <li><a href="#">Automations</a></li>
                  <li><a href="#">Files</a></li>
                  <li><a href="#">Dashboards</a></li>
                  <li><a href="#">Kanban</a></li>
                </ul>
              </div>
            </div>

            <div class="col-lg col-md-6 col-12">
              <div class="footer-auhtor-area">
                <h3>Use Cases</h3>
                <ul>
                  <li><a href="#">Marketing</a></li>
                  <li><a href="#">Project</a></li>
                  <li><a href="#">Management</a></li>
                  <li><a href="#">Sales</a></li>
                  <li><a href="#">Developers</a></li>
                  <li><a href="#">Construction</a></li>
                </ul>
              </div>
            </div>

            <div class="col-lg col-md-6 col-12">
              <div class="footer-auhtor-area">
                <h3>Company</h3>
                <ul>
                  <li><a href="about.html">About</a></li>
                  <li><a href="#">Customer Stories</a></li>
                  <li><a href="#">Become a Partner</a></li>
                  <li><a href="#">Become a Partner</a></li>
                  <li><a href="#">Emergency Response</a></li>
                  <li><a href="#">Quad-U</a></li>
                </ul>
              </div>
            </div>

            <div class="col-lg col-md-6 col-12">
              <div class="footer-auhtor-area">
                <h3>Resources</h3>
                <ul>
                  <li><a href="#">Community</a></li>
                  <li><a href="blog-details.html">Blog</a></li>
                  <li><a href="#">Academy</a></li>
                  <li><a href="#">App Development</a></li>
                  <li><a href="#">Sass & Startup</a></li>
                  <li><a href="#">Find a Partner</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="copyright-social-area">
                <ul>
                  <li class="copy"><p>Copyright @2024 Quad. All Right Reserved</p></li>
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
  @vite([
    'resources/user/js/plugins/slick-slider.js',
    'resources/user/js/plugins/bootstrap.min.js',
    'resources/user/js/plugins/mobilemenu.js',
    'resources/user/js/plugins/owlcarousel.min.js',
    'resources/user/js/plugins/counter.js',
    'resources/user/js/plugins/waypoints.js',
    'resources/user/js/plugins/magnific-popup.js',
    'resources/user/js/main.js'
])

</body>
</html>