const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
const access_token = localStorage.getItem('access_token');

document.addEventListener("DOMContentLoaded", async function () {
    showLoadingSpinner();
    await fetchAIConfig();
    await fetchRandomPreview();
    updatePreview();
});

// Show loading spinner in both previews
function showLoadingSpinner() {
    const loadingSpinner = `
        <div class="d-flex justify-content-center p-2">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    `;
    document.getElementById("jsonPreview").innerHTML = loadingSpinner;
    document.getElementById("randomPreview").innerHTML = loadingSpinner;
}

// Fetch AI configuration from the backend
async function fetchAIConfig() {
    try {
        const response = await fetch(`${endpoint}/api/admin/config`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${access_token}`,
            }
        });

        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

        const data = await response.json();

        // Populate form fields with the received data
        Object.keys(data).forEach((key) => {
            let inputField = document.querySelector(`[name="${key}"]`);
            if (inputField) {
                inputField.value = JSON.stringify(data[key], null, 4);
            }
        });

        updatePreview();
    } catch (error) {
        console.error("Error fetching AI config:", error);
    }
}

// Fetch a random preview
async function fetchRandomPreview() {
    try {
        const response = await fetch(`${endpoint}/api/ai/prompt`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${access_token}`,
            },
            body: JSON.stringify({ prompt: "write random data" })
        });

        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

        const randomData = await response.json();
        document.getElementById("randomPreview").innerHTML = `<pre>${JSON.stringify(randomData, null, 4)}</pre>`;

    } catch (error) {
        console.error("Error fetching random preview:", error);
    }
}

// Update JSON preview dynamically
function updatePreview() {
    let formData = new FormData(document.getElementById("aiConfigForm"));
    let jsonData = {};

    formData.forEach((value, key) => {
        try {
            jsonData[key] = JSON.parse(value);
        } catch (e) {
            jsonData[key] = value;
        }
    });

    document.getElementById("jsonPreview").innerHTML = `<pre>${JSON.stringify(jsonData, null, 4)}</pre>`;
}

// PATCH request to update AI config
async function saveAIConfig() {
    let formData = new FormData(document.getElementById("aiConfigForm"));
    let jsonData = {};

    formData.forEach((value, key) => {
        try {
            jsonData[key] = JSON.parse(value);
        } catch (e) {
            jsonData[key] = value;
        }
    });

    try {
        const response = await fetch(`${endpoint}/api/admin/config`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${access_token}`,
            },
            body: JSON.stringify(jsonData),
        });

        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

        alert("Configuration updated successfully!");

        // Show loading spinner before updating preview
        showLoadingSpinner();

        // Re-fetch and update all previews
        await fetchAIConfig();
        await fetchRandomPreview();
        updatePreview();
    } catch (error) {
        console.error("Error updating AI config:", error);
        alert("Failed to update configuration.");
    }
}

// Attach event listener to the Save button
document.querySelector("button[onclick='updatePreview()']").addEventListener("click", saveAIConfig);
