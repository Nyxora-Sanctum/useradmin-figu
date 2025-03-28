<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Editor Form with CV Template</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!--=====JS=======-->

    @vite([
        'resources/user/js/plugins/jquery-3-6-0.min.js', 
        'resources/user/js/plugins/swiper.bundle.js', 
        'resources/user/js/plugins/ScrollTrigger.min.js', 
        'resources/user/js/plugins/aos.js',
        'resources/js/user-pages/editor.js'
    ])


    <!--===== CSS =======-->
    @vite(['resources/user/css/plugins/bootstrap.min.css', 'resources/user/css/plugins/swiper.bundle.css', 'resources/user/css/plugins/mobile.css', 'resources/user/css/plugins/magnific-popup.css', 'resources/user/css/plugins/slick-slider.css', 'resources/user/css/plugins/owlcarousel.min.css', 'resources/user/css/plugins/aos.css', 'resources/user/css/typography.css', 'resources/user/css/master.css', 'resources/user/css/plugins/fontawesome.css'])
</head>

<body>
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
                                    <li><a href="contact.html" class="nav-link active">Invoice</a></li>
                                </ul>
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
        <!-- Editor Section -->
        <div class="editor">
            <form id="editor-form">
                @csrf
                <!-- Container untuk textarea dan ikon -->
                <div class="textarea-container">
                    <textarea name="prompt" id="prompt" cols="30" rows="10" class="form-control"
                        placeholder="Type your message..."></textarea>
                    <!-- Submit Button as Icon -->
                    <button type="submit" id="submit-button">
                        <i class="fas fa-paper-plane"></i> <!-- Font Awesome icon -->
                    </button>
                </div>
                <button type="button" id="download-cv" class="btn btn-primary">
                    <i class="fas fa-download"></i> Download CV
                </button>
            </form>
        </div>
        <!-- CV Container -->
        <div class="cv-container">
            <div class="cv">
                <!-- Title -->
                <div class="w-64 h-64 rounded-full relative">
                    <input type="file" id="upload" hidden>
                    <label for="upload" class="upload-label">
                        <img id="image" src="https://via.placeholder.com/150" class="profile-photo">
                        <i class="fa fa-upload upload-icon"></i>
                    </label>
                </div>
                <div class="header">
                    <span class="name" id="name">MISELLIA IKHWAN</span>
                    <div class="header-menu">
                        <span class="upper-header-menu">CV</span>
                        <span class="lower-header-menu">2025</span>
                    </div>
                </div>
                <!-- Personal Information -->
                <section class="job-and-contact">
                    <span class="job" id="job">Graphic & Web Designer</span>
                    <div class="contact-container">
                        <span class="contact-label">CONTACT</span>
                        <span class="contact" id="contact">+62 812 3456 7890</span>
                    </div>
                    <div class="address-container">
                        <span class="address-label">ADDRESS</span>
                        <span class="address" id="address"> Jalan Diponegoro</span>
                    </div>
                </section>

                <!-- Summary -->
                <section class="education-summary">
                    <h2>EDUCATION</h2>
                    <ul>
                        <li>
                            <div class="education-summary-container">
                                <span class="education-year" id="education-year">2007-2019</span>
                                <span class="education-major" id="education-major">Teknik Komputer dan
                                    Jaringan</span>
                                <span class="education-place" id="education-place">SMKN 4 Malang, Jalan Tanimbar no
                                    22
                                    Malang</span>
                                <span class="education-description" id="experience-description">Focus on game
                                    development with passion on enhancing Cryptocurrency based transactions.</span>
                            </div>
                        </li>
                        <li>
                            <div class="education-summary-container">
                                <span class="education-year" id="education-year">2007-2019</span>
                                <span class="education-major" id="education-major">Teknik Komputer dan
                                    Jaringan</span>
                                <span class="education-place" id="education-place">SMKN 4 Malang, Jalan Tanimbar no
                                    22
                                    Malang</span>
                                <span class="education-description" id="experience-description">Focus on game
                                    development with passion on enhancing Cryptocurrency based transactions.</span>
                            </div>
                        </li>
                    </ul>
                </section>

                <!-- Experience -->
                <section class="experience-summary">
                    <h2>EXPERIENCES</h2>
                    <ul>
                        <li>
                            <div class="experience-summary-container">
                                <span class="experience-year" id="experience-year">2022-2025</span>
                                <span class="experience" id="experience">Game Developer</span>
                                <span class="experience-place" id="experience-place">PT. Unimasoft</span>
                                <span class="experience-description" id="experience-description">Focus on game
                                    development with passion on enhancing Cryptocurrency based transactions.</span>
                            </div>
                        </li>
                        <li>
                            <div class="experience-summary-container">
                                <span class="experience-year" id="experience-year">2022-2025</span>
                                <span class="experience" id="experience">Web Developer</span>
                                <span class="experience-place" id="experience-place">PT Unimasoft</span>
                                <span class="experience-description" id="experience-description">Focus on game
                                    development with passion on enhancing Cryptocurrency based transactions.</span>
                            </div>
                        </li>
                    </ul>
                </section>

                <!-- Skills -->
                <section class="skills-summary">
                    <h2>SKILLS</h2>
                    <ul class="skill-container-list">
                        <li>
                            <div class="skill-container">
                                <span class="skill">EXPERTISE</span>
                                <ul class="subskill-container-list">
                                    <li>
                                        <span class="subskill">Website Design</span>
                                    </li>
                                    <li>
                                        <span class="subskill">Mobile Apps</span>
                                    </li>
                                    <li>
                                        <span class="subskill">UI/UX</span>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="skill-container">
                                <span class="skill">EXPERTISE</span>
                                <ul class="subskill-container-list">
                                    <li>
                                        <span class="subskill">Website Design</span>
                                    </li>
                                    <li>
                                        <span class="subskill">Mobile Apps</span>
                                    </li>
                                    <li>
                                        <span class="subskill">UI/UX</span>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="skill-container">
                                <span class="skill">EXPERTISE</span>
                                <ul class="subskill-container-list">
                                    <li>
                                        <span class="subskill">Website Design</span>
                                    </li>
                                    <li>
                                        <span class="subskill">Mobile Apps</span>
                                    </li>
                                    <li>
                                        <span class="subskill">UI/UX</span>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional, for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('upload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image').src = e.target.result;
                    document.querySelector('.upload-icon').style.display =
                        'none'; // Sembunyikan ikon setelah gambar dipilih
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        document.getElementById("download-cv").addEventListener("click", function() {
            // Simulasi mengunduh file CV (ubah 'cv-sample.pdf' ke path yang sesuai)
            const link = document.createElement("a");
            link.href = "cv-sample.pdf"; // Ganti dengan path CV yang benar
            link.download = "My_CV.pdf";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    </script>

    <!-- JS -->
    @vite([
        'resources/user/js/plugins/swiper.bundle.js', 
        'resources/user/js/plugins/slick-slider.js', 'resources/user/js/plugins/bootstrap.min.js', 'resources/user/js/plugins/mobilemenu.js', 'resources/user/js/plugins/owlcarousel.min.js', 'resources/user/js/plugins/counter.js', 'resources/user/js/plugins/waypoints.js', 'resources/user/js/plugins/magnific-popup.js', 'resources/user/js/main.js'])
    <!-- JS -->

</body>

</html>
