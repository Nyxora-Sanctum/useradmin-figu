<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CV Editor</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!--=====JS=======-->

    @vite(['resources/user/js/plugins/jquery-3-6-0.min.js', 'resources/user/js/plugins/swiper.bundle.js', 'resources/user/js/plugins/ScrollTrigger.min.js', 'resources/user/js/plugins/aos.js', 'resources/js/user-pages/editor.js'])


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
                                    <li><a href="{{ url('inventory') }}" class="nav-link active">Inventory</a></li>
                                    <li><a href="{{ url('editor') }}"class="nav-link active">CV Editor</a></li>
                                    <li><a href="{{ url('shop') }}" class="nav-link active">Shop</a></li>
                                    <li><a href="{{ url('invoice') }}" class="nav-link active">Invoice</a></li>
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
            <form id="cv-form">
                @csrf
                <h2>Form Pengisian CV</h2>

                <!-- Upload Foto -->
                <div class="form-grid-2col">
                    <div class="form-group">
                        <label for="upload">Upload Foto:</label>
                        <input type="file" id="upload" name="upload">
                    </div>
                </div>

                <!-- Informasi Dasar -->
                <div class="form-grid-2col">
                    <div class="form-group">
                        <label>Nama:</label>
                        <input type="text" id="form-name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan:</label>
                        <input type="text" id="form-job" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No tlpn:</label>
                        <input type="text" id="form-contact" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat:</label>
                        <input type="text" id="form-address" class="form-control">
                    </div>
                </div>

                <!-- Pendidikan -->
                <h4>Pendidikan</h4>
                <div id="education-section">
                    <div class="edu-item">
                        <div class="grid-2col">
                            <input type="number" placeholder="Tahun Mulai" class="edu-year-start form-control" min="1900" max="2099" step="1">
                            <input type="number" placeholder="Tahun Selesai" class="edu-year-end form-control" min="1900" max="2099" step="1">
                        </div>
                        <input type="text" placeholder="Jurusan" class="edu-major form-control">
                        <input type="text" placeholder="Tempat" class="edu-place form-control">
                        <textarea placeholder="Deskripsi" class="edu-desc form-control"></textarea>
                    </div>
                </div>
                <button type="button" class="btn-small" onclick="addEducation()">+Pendidikan</button>

                <h4>Pengalaman</h4>
                <div id="experience-section">
                    <div class="exp-item">
                        <div class="grid-2col">
                            <input type="number" placeholder="Tahun Mulai" class="edu-year-start form-control" min="1900" max="2099" step="1">
                            <input type="number" placeholder="Tahun Selesai" class="edu-year-end form-control" min="1900" max="2099" step="1">
                        </div>                        
                        <input type="text" placeholder="Jabatan" class="exp-role form-control">
                        <input type="text" placeholder="Perusahaan" class="exp-place form-control">
                        <textarea placeholder="Deskripsi" class="exp-desc form-control"></textarea>
                    </div>
                </div>
                <button type="button" class="btn-small" onclick="addExperience()">+Pengalaman</button>

                <h4>Skill</h4>
                <div id="skill-section">
                    <input type="text" class="skill-item form-control" placeholder="Contoh: Website Design">
                </div>
                <button type="button" class="btn-small" onclick="addSkill()">+Skill</button>

                <div class="form-group">
                    <label>Prompt Tambahan:</label>
                    <input type="text" id="form-address" class="form-control">
                </div>

                <button class="btn-small-create" type="submit">Buat CV</button>
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
                    <br>
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
            <a href="path/to/your-cv.pdf" download class="btn btn-primary btn-sm mt-3 btn-small-download "
                title="Download CV">
                <i class="bi bi-download"></i>
            </a>
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
                        'none';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        document.getElementById("download-cv").addEventListener("click",
            function() {
                const link = document.createElement("a");
                link.href = "cv-sample.pdf"; // Ganti dengan path CV yang benar
                link.download = "My_CV.pdf";
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });

        // Tambah Pendidikan
        function addEducation() {
            const container = document.getElementById('education-section');
            const clone = container.children[0].cloneNode(true);
            clone.querySelectorAll('input, textarea').forEach(el => el.value = '');
            container.appendChild(clone);
        }

        // Tambah Pengalaman
        function addExperience() {
            const container = document.getElementById('experience-section');
            const clone = container.children[0].cloneNode(true);
            clone.querySelectorAll('input, textarea').forEach(el => el.value = '');
            container.appendChild(clone);
        }

        // Tambah Skill
        function addSkill() {
            const container = document.getElementById('skill-section');
            const input = document.createElement('input');
            input.type = 'text';
            input.placeholder = 'Contoh: UI/UX';
            input.classList.add('skill-item');
            container.appendChild(input);
        }

        // Submit Data ke CV
        document.getElementById('cv-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Basic Info
            document.getElementById('name').textContent = document.getElementById('form-name').value;
            document.getElementById('job').textContent = document.getElementById('form-job').value;
            document.getElementById('contact').textContent = document.getElementById('form-contact').value;
            document.getElementById('address').textContent = document.getElementById('form-address').value;

            // Gambar
            const fileInput = document.getElementById('upload');
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image').src = e.target.result;
                }
                reader.readAsDataURL(fileInput.files[0]);
            }

            // Pendidikan
            const eduItems = document.querySelectorAll('#education-section .edu-item');
            const eduList = document.querySelector('.education-summary ul');
            eduList.innerHTML = ''; // clear
            eduItems.forEach(item => {
                eduList.innerHTML += `
                <li>
                    <div class="education-summary-container">
                        <span class="education-year">${item.querySelector('.edu-year').value}</span>
                        <span class="education-major">${item.querySelector('.edu-major').value}</span>
                        <span class="education-place">${item.querySelector('.edu-place').value}</span>
                        <span class="education-description">${item.querySelector('.edu-desc').value}</span>
                    </div>
                </li>`;
            });

            // Pengalaman
            const expItems = document.querySelectorAll('#experience-section .exp-item');
            const expList = document.querySelector('.experience-summary ul');
            expList.innerHTML = ''; // clear
            expItems.forEach(item => {
                expList.innerHTML += `
                <li>
                    <div class="experience-summary-container">
                        <span class="experience-year">${item.querySelector('.exp-year').value}</span>
                        <span class="experience">${item.querySelector('.exp-role').value}</span>
                        <span class="experience-place">${item.querySelector('.exp-place').value}</span>
                        <span class="experience-description">${item.querySelector('.exp-desc').value}</span>
                    </div>
                </li>`;
            });

            // Skill
            const skillItems = document.querySelectorAll('.skill-item');
            const skillList = document.querySelectorAll('.subskill-container-list');
            const skillHTML = Array.from(skillItems).map(input => `
            <li><span class="subskill">${input.value}</span></li>
        `).join('');

            skillList.forEach(list => list.innerHTML = skillHTML);
        });
    </script>

    <!-- JS -->
    @vite(['resources/user/js/plugins/swiper.bundle.js', 'resources/user/js/plugins/slick-slider.js', 'resources/user/js/plugins/bootstrap.min.js', 'resources/user/js/plugins/mobilemenu.js', 'resources/user/js/plugins/owlcarousel.min.js', 'resources/user/js/plugins/counter.js', 'resources/user/js/plugins/waypoints.js', 'resources/user/js/plugins/magnific-popup.js', 'resources/user/js/main.js'])
    <!-- JS -->

</body>

</html>
