<body>
    <div class="main-container">
        <div class="editor">
            <form id="editor-form">
                <textarea name="prompt" id="prompt" cols="30" rows="10"></textarea>
                <button type="button" id="submit-button">Submit</button>
            </form>
        </div>
        <div class="cv-container"><!-- This is the template file templates, the template file will be inserted here -->
            <div class="cv"
                style="font-family: Arial, sans-serif; width: 210mm; height: 297mm; background-color: white; position=relative;">
                <!-- Inline CSS for this div -->
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
                    @import url("https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css");
                    
                    .header{
                        height: 230px;
                        background-color: rebeccapurple;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        margin-top: 35px;
                    }
                    
                    .cv-inner-decorator-1{
                        position: absolute;
                        width: 675px;
                        display: flex;
                    }

                    .name-container{
                        background-color: green;
                        margin-right: 65px;
                        transform: translateY(-60px);
                        width: 500px;
                        height: fit-contentpx;
                    }

                    .name{
                        font-family: 'Oswald', sans-serif;
                        font-weight: 500;
                        font-size: 40px;
                        text-align: center;
                        letter-spacing: 5px;
                        color: #3E3E3F;
                    }

                    .job-container{
                        margin-right: -35px;
                        display: flex;
                        flex-direction: row;
                        background-color: red;
                        transform: translateY(-60px);
                        width: 600px;
                        height: fit-contentpx;
                    }

                    .job{
                        width: 100%;
                        font-family: 'Oswald', sans-serif;
                        font-size: 15px;
                        font-weight: 400;
                        letter-spacing: 3px;
                    }

                    .decorator-job{
                        margin-left: 10px;
                        transform: translateY(5px);
                        width: 100%;
                        height: 1.5px; /* Updated height */
                        background-color: #3E3E3F;
                        margin-top: 10px;
                    }

                    .header-menu{
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        margin-top: 50px;
                    }

                    .contact-container{
                        font-family: 'Popins', sans-serif;
                        background-color: goldenrod;
                        margin-left: 60px;
                        display: flex;
                        flex-direction: row;
                    }

                    .phone-container{
                        display: flex;
                        flex-direction: column;
                        background-color: blue;
                        color: red;
                        margin-left: 20px;
                        gap: 6px;
                    }

                    .contact-label{
                        font-weight: 600;
                        font-size: 13px;
                    }

                    .contact{
                        font-size: 12px;
                    }

                    .address-container{
                        display: flex;
                        flex-direction: column;
                        background-color: yellow;
                        color: red;
                        margin-left: 20px;
                        gap: 6px;
                    }

                    .address-label{
                        font-weight: 600;
                        font-size: 13px;
                    }

                    .address-container{
                        font-size: 12px;
                    }
                </style>

                <!-- Title -->
                <div class="header">
                    <svg width="1321" height="446" viewBox="0 0 1321 446" fill="none" xmlns="http://www.w3.org/2000/svg" class="cv-inner-decorator-1">
                        <path d="M7.5 7.5H1313.5V438.5H231.765L7.5 289.479V223V7.5Z" stroke="#3E3E3F" stroke-width="13">
                            <div class="header-menu">
                                <div class="name-container">
                                    <span class="name" id="name">MISELLIA IKHWAN</span>
                                </div>
                                <div class="job-container">
                                    <span class="job" id="job">MARKETING MANAGER</span>
                                    <div class="decorator-job"></div>
                                </div>
                                <div class="contact-container">
                                    <div class="phone-container">
                                        <span class="contact-label">Phone</span>
                                        <span class="contact" id="contact">+62 812 3456 7890</span>
                                    </div>
                                    <div class="address-container">
                                        <span class="address-label">ADDRESS</span>
                                        <span class="address" id="address"> Jalan Diponegoro</span>
                                    </div>

                                </div>
                                <div class="profile-photo">
                                    <!-- <img src="" alt="photo" /> -->
                                </div>
                            </div>
                        </path>
                    </svg>


                </div>

                <!-- Personal Information -->
                <section class="job-and-contact">

                    <div class="contact-container">


                    </div>
                    <div class="address-container">

                    </div>
                </section>

                <!-- Summary -->
                <section class="education-summary">
                    <h2>EDUCATION</h2>
                    <ul>
                        <li>
                            <div class="education-summary-container">
                                <span class="education-year" id="education-year">2007-2019</span>
                                <span class="education-major" id="education-major">Teknik Komputer dan Jaringan</span>
                                <span class="education-place" id="education-place">SMKN 4 Malang, Jalan Tanimbar no 22
                                    Malang</span>
                                <span class="education-description" id="experience-description">Focus on game development with
                                    passion on
                                    enchancing
                                    Cryptocurrency based transactions.</span>
                            </div>
                        </li>
                        <li>
                            <div class="education-summary-container">
                                <span class="education-year" id="education-year">2007-2019</span>
                                <span class="education-major" id="education-major">Teknik Komputer dan Jaringan</span>
                                <span class="education-place" id="education-place">SMKN 4 Malang, Jalan Tanimbar no 22
                                    Malang</span>
                                <span class="education-description" id="experience-description">Focus on game development with
                                    passion on enchancing
                                    Cryptocurrency based transactions.</span>
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
                                <span class="experience-description" id="experience-description">Focus on game development with
                                    passion on enchancing Cryptocurrency based transactions.</span>
                            </div>
                        </li>
                        <li>
                            <div class="experience-summary-container">
                                <span class="experience-year" id="experience-year">2022-2025</span>
                                <span class="experience" id="experience">Web Developer</span>
                                <span class="experience-place" id="experience-place">PT Unimasoft</span>
                                <span class="experience-description" id="experience-description">Focus on game development with
                                    passion on enchancing
                                    Cryptocurrency based transactions.</span>
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
</body>


<style>
    body{
        height: 100%;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        overflow-y: hidden;
        background-color: black;
    }

    .main-container{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: stretch;
        height: 100%;
        gap: 0;
    }

    .cv-container {
        background-color: black;
        display: flex;
        flex-direction: column;
        justify-content: center; /* Updated: center alignment */
        align-items: flex-end; /* Updated: right alignment */
        height: 100%;
        margin-right: 3vw;
        gap: 0;
    }

    .editor{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 50vw;
        background-color: #f5f5f5;
        gap: 0;
    }
</style>

@vite(['resources/js/user-pages/editor.js'])


