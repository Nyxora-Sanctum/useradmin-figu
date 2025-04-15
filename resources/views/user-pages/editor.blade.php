<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CV Editor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    <!--=====JS=======-->

    @vite(['resources/user/js/plugins/jquery-3-6-0.min.js', 'resources/user/js/plugins/swiper.bundle.js', 'resources/user/js/plugins/ScrollTrigger.min.js', 'resources/user/js/plugins/aos.js', 'resources/js/user-pages/editor.js'])


    <!--===== CSS =======-->
    @vite(['resources/user/css/plugins/bootstrap.min.css', 'resources/user/css/plugins/swiper.bundle.css', 'resources/user/css/plugins/mobile.css', 'resources/user/css/plugins/magnific-popup.css', 'resources/user/css/plugins/slick-slider.css', 'resources/user/css/plugins/owlcarousel.min.css', 'resources/user/css/plugins/aos.css', 'resources/user/css/typography.css', 'resources/user/css/master.css', 'resources/user/css/plugins/fontawesome.css'])
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
                <img src="{{ asset('images/user/logo/logoo.png') }}" alt="Logo" class="h-8 w-15" />
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
              <img src="{{ asset('images/user/profil/icon-profil.jpg') }}"  alt="Profile" class="h-10 w-10 rounded-full border-2 border-white" />
            </button>
  
            <!-- Dropdown -->
            <div
              x-show="open"
              class="absolute right-0 top-full mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50"
              x-transition
            >
              <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Profile Settings</a>
              <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Invoice</a>
              <button onclick="alert('Logged out')" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-200">
                Logout
              </button>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <!--=====HEADER END =======-->

    <div class="main-container welcome2-section-area-cv"
        style="background-image: url('{{ asset('images/user/background/header2_bg.png') }}'); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <!-- Editor Section -->
        <div class="editor">
            <form id="frm">
                @csrf
                <h2>Form Pengisian CV</h2>
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
                            <input type="number" placeholder="Tahun Mulai" class="edu-year-start form-control"
                                min="1900" max="2099" step="1">
                            <input type="number" placeholder="Tahun Selesai" class="edu-year-end form-control"
                                min="1900" max="2099" step="1">
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
                            <input type="number" placeholder="Tahun Mulai" class="edu-year-start form-control"
                                min="1900" max="2099" step="1">
                            <input type="number" placeholder="Tahun Selesai" class="edu-year-end form-control"
                                min="1900" max="2099" step="1">
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
                    <input type="text" id="form-prompt" class="form-control">
                </div>

                <button type="button" id="custom-submit" class="btn-small-create">Buat CV</button>

            </form>
        </div>

        <div class="cv-container">
            <div class="">
                <div class="cv-inner-container">
                    <!-- Isi dari $templateHtml akan masuk di sini -->
                    {!! $templateHtml !!}
                </div>
            </div>
            <a href="path/to/your-cv.pdf" download class="btn btn-primary btn-sm mt-3 btn-small-download"
                title="Download CV">
                <i class="bi bi-download"></i>
            </a>
        </div>
    </div>
        </div>

        <!-- Bootstrap JS (Optional, for interactive components) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
        </script>
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
        <!-- JS -->
        @vite(['resources/user/js/plugins/swiper.bundle.js', 'resources/user/js/plugins/slick-slider.js', 'resources/user/js/plugins/bootstrap.min.js', 'resources/user/js/plugins/mobilemenu.js', 'resources/user/js/plugins/owlcarousel.min.js', 'resources/user/js/plugins/counter.js', 'resources/user/js/plugins/waypoints.js', 'resources/user/js/plugins/magnific-popup.js', 'resources/user/js/main.js'])
        <!-- JS -->
        <script>
            // window.uniqueCvId = @json($id);
        </script>
        </script>
        <!-- JS -->
        @vite(['resources/user/js/plugins/swiper.bundle.js', 'resources/user/js/plugins/slick-slider.js', 'resources/user/js/plugins/bootstrap.min.js', 'resources/user/js/plugins/mobilemenu.js', 'resources/user/js/plugins/owlcarousel.min.js', 'resources/user/js/plugins/counter.js', 'resources/user/js/plugins/waypoints.js', 'resources/user/js/plugins/magnific-popup.js', 'resources/user/js/main.js'])
        <!-- JS -->
        <script>
            window.uniqueCvId = @json($id);
        </script>
</body>

</html>
