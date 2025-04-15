const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
const loadingOverlay = document.getElementById("loadingOverlay");

function showLoading(show) {
    if (show) {
        loadingOverlay.classList.add("flex");
        loadingOverlay.classList.remove("hidden");
    } else {
        loadingOverlay.classList.remove("flex");
        loadingOverlay.classList.add("hidden");
    }
}

// Fetch user profile data
function getProfile() {
    showLoading(true);
    fetch(`${endpoint}/api/user/profile`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + localStorage.getItem("access_token"),
        },
    })
        .then((response) => response.json())
        .then((data) => {
            showLoading(false);
            document.getElementById("username").value = data.username || "";
            document.getElementById("email").value = data.email || "";
            document.getElementById("gender").value = data.gender || "";
            document.getElementById("phone_number").value =
                data.phone_number || "";
            document.getElementById("address").value = data.address || "";
        })
        .catch((error) => {
            console.error("Failed to load profile:", error);
            showLoading(false);
        });
}

// Save profile updates
function saveProfile() {
    showLoading(true);
    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    const gender = document.getElementById("gender").value;
    const phone_number = document.getElementById("phone_number").value;
    const address = document.getElementById("address").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (!username || !email) {
        alert("Username and Email must be filled!");
        showLoading(false);
        return;
    }

    if (password && password !== confirmPassword) {
        alert("Passwords do not match!");
        showLoading(false);
        return;
    }

    const updatedProfile = {
        username,
        email,
        gender: gender || null,
        phone_number: phone_number || null,
        address: address || null,
        ...(password ? { password } : {}),
    };

    fetch(`${endpoint}/api/user/profile`, {
        method: "PATCH",
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + localStorage.getItem("access_token"),
        },
        body: JSON.stringify(updatedProfile),
    })
        .then((response) => {
            if (!response.ok) throw new Error("Failed to update profile.");
            return response.json();
        })
        .then(() => {
            showLoading(false);
            alert("Profile updated successfully!");
        })
        .catch((error) => {
            showLoading(false);
            console.error("Error updating profile:", error);
            alert("Failed to update profile.");
        });
}

window.onload = function () {
    getProfile();
    const saveButton = document.getElementById("saveProfileButton");
    if (saveButton) {
        saveButton.addEventListener("click", saveProfile);
    }
};
