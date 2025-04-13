document.addEventListener("DOMContentLoaded", function () {
    const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
    const uniqueCvId = window.uniqueCvId;
    const token = localStorage.getItem("access_token");
    const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
    const csrfToken = csrfTokenElement?.getAttribute("content");

    document
        .getElementById("custom-submit")
        .addEventListener("click", function (event) {
            event.preventDefault();

            // Get form values
            const name = document.getElementById("form-name").value.trim();
            const job = document.getElementById("form-job").value.trim();
            const contact = document
                .getElementById("form-contact")
                .value.trim();
            const address = document
                .getElementById("form-address")
                .value.trim();

            // Education
            const educations = Array.from(
                document.querySelectorAll("#education-section .edu-item")
            ).map((item) => ({
                start: item.querySelector(".edu-year-start").value.trim(),
                end: item.querySelector(".edu-year-end").value.trim(),
                major: item.querySelector(".edu-major").value.trim(),
                school: item.querySelector(".edu-place").value.trim(),
                description: item.querySelector(".edu-desc").value.trim(),
            }));

            // Experience
            const experiences = Array.from(
                document.querySelectorAll("#experience-section .exp-item")
            ).map((item) => ({
                start: item.querySelector(".edu-year-start").value.trim(),
                end: item.querySelector(".edu-year-end").value.trim(),
                experience: item.querySelector(".exp-role").value.trim(),
                place: item.querySelector(".exp-place").value.trim(),
                description: item.querySelector(".exp-desc").value.trim(),
            }));

            // Skills
            const skills = Array.from(
                document.querySelectorAll(".skill-item")
            ).map((input) => ({
                skill_name: input.value.trim(),
                subskill: [], // Update if you collect subskills dynamically
            }));

            // Create the prompt by joining the data with semicolons
            const prompt = [
                name,
                job,
                contact,
                address,
                ...educations.map(
                    (edu) =>
                        `${edu.start} - ${edu.end} ${edu.major} at ${edu.school}: ${edu.description}`
                ),
                ...experiences.map(
                    (exp) =>
                        `${exp.start} - ${exp.end} ${exp.experience} at ${exp.place}: ${exp.description}`
                ),
                ...skills.map((skill) => skill.skill_name),
            ].join("; "); // Join all data with a semicolon and space

            const payload = {
                name,
                job,
                contact,
                address,
                prompt, // Added prompt here
                education: educations,
                experiences,
                skills,
            };

            // Submit the form data to the API
            fetch(endpoint + "/api/ai/prompt", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                    Authorization: "Bearer " + token,
                },
                body: JSON.stringify(payload),
            })
                .then((response) => response.json())
                .then((data) => {
                    console.log(data);

                    // Fill in the HTML with the response data
                    document.getElementById("name").textContent =
                        data.name || "MISELLIA IKHWAN";
                    document.getElementById("job").textContent =
                        data.job || "Graphic & Web Designer";
                    document.getElementById("contact").textContent =
                        data.contact || "+62 812 3456 7890";
                    document.getElementById("address").textContent =
                        data.address || "Jalan Diponegoro";

                    // Set Education info
                    if (data.education.length > 0) {
                        const education = data.education[0]; // Assuming there's only one education entry
                        document.getElementById("education-year").textContent =
                            `${education.start} - ${education.end}` ||
                            "2007-2019";
                        document.getElementById("education-major").textContent =
                            education.major || "Teknik Komputer dan Jaringan";
                        document.getElementById("education-place").textContent =
                            education.school ||
                            "SMKN 4 Malang, Jalan Tanimbar no 22 Malang";
                        document.getElementById(
                            "education-description"
                        ).textContent =
                            education.description ||
                            "Focus on Software Engineering";
                    }

                    // Set Experience info
                    if (data.experiences.length > 0) {
                        const experience1 = data.experiences[0];
                        document.getElementById("experience-year").textContent =
                            `${experience1.start} - ${experience1.end}` ||
                            "2022-2025";
                        document.getElementById("experience").textContent =
                            experience1.experience || "Game Developer";
                        document.getElementById(
                            "experience-place"
                        ).textContent = experience1.place || "PT. Unimasoft";
                        document.getElementById(
                            "experience-description"
                        ).textContent =
                            experience1.description ||
                            "Focus on game development";
                    }
                    if (data.experiences.length > 1) {
                        const experience2 = data.experiences[1];
                        document.getElementById("experience-year").textContent =
                            `${experience2.start} - ${experience2.end}` ||
                            "2022-2025";
                        document.getElementById("experience").textContent =
                            experience2.experience || "Web Developer";
                        document.getElementById(
                            "experience-place"
                        ).textContent = experience2.place || "PT. Unimasoft";
                        document.getElementById(
                            "experience-description"
                        ).textContent =
                            experience2.description ||
                            "Focus on enhancing web-based systems";
                    }

                    // Set Skills info
                    const skillsContainer = document.querySelector(
                        ".skill-container-list"
                    );
                    skillsContainer.innerHTML = ""; // Clear current skills

                    data.skills.forEach((skill) => {
                        const skillElement = document.createElement("li");
                        skillElement.innerHTML = `
                        <div class="skill-container">
                            <span class="skill">${skill.skill_name}</span>
                            <ul class="subskill-container-list">
                                ${skill.subskill
                                    .map(
                                        (sub) =>
                                            `<li><span class="subskill">${sub.subskill_name}</span></li>`
                                    )
                                    .join("")}
                            </ul>
                        </div>
                    `;
                        skillsContainer.appendChild(skillElement);
                    });

                    alert("CV data updated successfully!");
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("There was a problem submitting your data.");
                });
        });
});
