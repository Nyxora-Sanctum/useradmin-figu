document
    .getElementById("loginForm")
    .addEventListener("submit", async function (event) {
        event.preventDefault(); // Prevent default form submission

        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;
        const loginRoute = "/login";
        const loadingOverlay = document.getElementById("loadingOverlay");

        // Show the loading overlay smoothly
        loadingOverlay.classList.add("active");

        try {
            const response = await fetch(loginRoute, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({ username, password }),
            });

            const data = await response.json();

            setTimeout(() => {
                loadingOverlay.classList.remove("active");
            }, 300);

            if (data.success) {
                // First save to localStorage
                localStorage.setItem("access_token", data.bearer_token);
                console.log("Token saved to localStorage");

                // Optional: Call a protected route to validate token, e.g., /user/auth
                try {
                    const authResponse = await fetch("/user/auth", {
                        method: "GET",
                        headers: {
                            Authorization: "Bearer " + data.bearer_token,
                            Accept: "application/json",
                        },
                    });

                    const authData = await authResponse.json();

                    // Save additional data after validation (if needed)
                    sessionStorage.setItem(
                        "access_token",
                        authData.access_token || data.bearer_token
                    );
                    console.log("Token validated and saved to sessionStorage");
                } catch (authError) {
                    console.warn("Token validation failed, continuing anyway");
                    sessionStorage.setItem("access_token", data.bearer_token);
                }

                // Final storage after everything to avoid race conditions
                localStorage.setItem("access_token", data.bearer_token);
                sessionStorage.setItem("access_token", data.bearer_token);

                // Redirect based on role
                window.location.href =
                    data.role === "admin" ? adminDashboard : userDashboard;
            } else {
                showErrorPopup("Login failed: " + data.error);
            }
        } catch (error) {
            setTimeout(() => {
                loadingOverlay.classList.remove("active");
            }, 300);
            showErrorPopup("An error occurred during login.");
            console.error("Error:", error);
        }
    });

// Error handler popup function
function showErrorPopup(message) {
    alert(message);
}
