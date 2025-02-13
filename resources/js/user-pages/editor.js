document.addEventListener('DOMContentLoaded', function() {

console.log('Editor script loaded!');

const form = document.getElementById('editor-form');
const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
//const accessToken = localStorage.getItem('access_token');

document.getElementById('submit-button').addEventListener('click', (event) => {
    event.preventDefault(); // Prevent form submission
    const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');

    if (!csrfTokenElement) {
        console.error("CSRF token meta tag not found!");
        return;
    }

    var csrfToken = csrfTokenElement.getAttribute('content');
    console.log("CSRF Token:", csrfToken); // Debugging


    console.log("Button Clicked")
    fetch(endpoint + '/api/ai/prompt', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Authorization': localStorage.getItem('access_token'),
        },
        body: JSON.stringify({ prompt: document.querySelector('#editor-form textarea').value }),
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        // Fill in the HTML with the response data
        document.getElementById('name').textContent = data.name || 'MISELLIA IKHWAN';
        document.getElementById('job').textContent = data.job || 'Graphic & Web Designer';
        document.getElementById('contact').textContent = data.contact || '+62 812 3456 7890';
        document.getElementById('address').textContent = data.address || 'Jalan Diponegoro';
        
        // Set Education info
        if(data.education.length > 0) {
        const education = data.education[0]; // Assuming there's only one education entry
        document.getElementById('education-year').textContent = `${education.start} - ${education.end}` || '2007-2019';
        document.getElementById('education-major').textContent = education.major || 'Teknik Komputer dan Jaringan';
        document.getElementById('education-place').textContent = education.school || 'SMKN 4 Malang, Jalan Tanimbar no 22 Malang';
        document.getElementById('experience-description').textContent = education.description || 'Focus on Software Engineering';
        }
        // Set Experience info
        if(data.experiences.length > 0) {
        const experience1 = data.experiences[0];
        document.getElementById('experience-year').textContent = `${experience1.start} - ${experience1.end}` || '2022-2025';
        document.getElementById('experience').textContent = experience1.experience || 'Game Developer';
        document.getElementById('experience-place').textContent = experience1.place || 'PT. Unimasoft';
        document.getElementById('experience-description').textContent = experience1.description || 'Focus on game development';
        }
        if(data.experiences.length > 1) {
        const experience2 = data.experiences[1];
        document.getElementById('experience-year').textContent = `${experience2.start} - ${experience2.end}` || '2022-2025';
        document.getElementById('experience').textContent = experience2.experience || 'Web Developer';
        document.getElementById('experience-place').textContent = experience2.place || 'PT. Unimasoft';
        document.getElementById('experience-description').textContent = experience2.description || 'Focus on enhancing web-based systems';
        }   
        // Set Skills info
        const skillsContainer = document.querySelector('.skill-container-list');
        skillsContainer.innerHTML = ''; // Clear current skills
        
        data.skills.forEach(skill => {
            const skillElement = document.createElement('li');
            skillElement.innerHTML = `
                <div class="skill-container">
                    <span class="skill">${skill.skill_name}</span>
                    <ul class="subskill-container-list">
                        ${skill.subskill.map(subskill => `<li><span class="subskill">${subskill.subskill_name}</span></li>`).join('')}
                    </ul>
                </div>
            `;
            skillsContainer.appendChild(skillElement);
        });
    })
    .catch(error => console.error('Error:', error));

    // Log textarea value
    const textareaValue = document.querySelector('#editor-form textarea').value;
    console.log(textareaValue);
});

});

