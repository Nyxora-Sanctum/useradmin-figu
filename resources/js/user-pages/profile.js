const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
const loadingOverlay = document.getElementById("loadingOverlay");
// Fetch user profile data
function getProfile() {
    loadingOverlay.classList.add("active");
    fetch(`${endpoint}/api/user/profile`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + localStorage.getItem("access_token"), // Assuming you're using a token-based auth
        },
    })
        .then((response) => response.json())
        .then((data) => {
            // Populate the form with the fetched data
            loadingOverlay.classList.remove("active");
            document.getElementById("username").value = data.username || "";
            document.getElementById("email").value = data.email || "";
            document.getElementById("gender").value = data.gender || "";
            document.getElementById("phone_number").value =
                data.phone_number || "";
            document.getElementById("address").value = data.address || "";
        })
        .catch((error) => loadingOverlay.classList.remove("active"));
}

// Save profile updates
function saveProfile() {
    loadingOverlay.classList.add("active");
    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    const gender = document.getElementById("gender").value;
    const phone_number = document.getElementById("phone_number").value;
    const address = document.getElementById("address").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (!username || !email) {
        alert("Username and Email must be filled!");
        return;
    }

    if (password && password !== confirmPassword) {
        alert("Passwords do not match!");
        return;
    }

    const updatedProfile = {
        username: username,
        email: email,
        gender: gender || null,
        phone_number: phone_number || null,
        address: address || null,
    };

    // Send updated profile data
    fetch(`${endpoint}/api/user/profile`, {
        method: "PATCH",
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + localStorage.getItem("access_token"), // Assuming you're using a token-based auth
        },
        body: JSON.stringify(updatedProfile),
    })
        .then((response) => response.json())
        .then((data) => {
            loadingOverlay.classList.remove("active");
            alert("Profile updated successfully!");
        })
        .catch((error) => {
            loadingOverlay.classList.remove("active");
            console.error("Error updating profile:", error);
            alert("Failed to update profile.");
        });
}

// Set up event listener for save profile button
window.onload = function () {
    getProfile();

    // Add event listener for Save button
    const saveButton = document.getElementById("saveProfileButton");
    if (saveButton) {
        saveButton.addEventListener("click", saveProfile);
    }
};
