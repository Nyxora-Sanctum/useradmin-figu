document.addEventListener("DOMContentLoaded", async function () {
    var access_token = localStorage.getItem("access_token");
    const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
    const form = document.querySelector(".was-validated");
    const cancelButton = document.querySelector("#cancel-button"); 
    const saveButton = document.querySelector("#save-button");

    // Extract template ID from URL (Assumes /templates/edit/{id} format)
    const pathSegments = window.location.pathname.split('/');
    const id = pathSegments[pathSegments.length - 1];

    if (!id) {
        alert("No template ID provided.");
        return;
    }

    // Fetch existing template data
    try {
        const response = await fetch(`${endpoint}/api/templates/get/${id}`, {
            method: "GET",
            headers: {
                "Authorization": `Bearer ${access_token}`,
            },
        });

        if (response.ok) {
            const data = await response.json();
            document.querySelector("#name").value = data.name || "";
            document.querySelector("#price").value = data.price || "";

            // Display previously uploaded file names
            if (data.template_link) {
                document.querySelector("#template-file-info").innerHTML = 
                    `Previously uploaded: <a href="${data.template_link}" target="_blank">Download</a>`;
            }
            if (data.template_preview) {
                document.querySelector("#preview-file-info").innerHTML = 
                    `Previously uploaded: <a href="${data.template_preview}" target="_blank">View</a>`;
            }
        } else {
            console.error("Failed to fetch template data.");
            alert("Error fetching template details.");
        }
    } catch (error) {
        console.error("Fetch error:", error);
    }

    // Save Changes Button Event
    form.addEventListener("submit", async function (event) {
        event.preventDefault();

        const confirmSave = confirm("Are you sure you want to save changes?");
        if (!confirmSave) return;

        const formData = new FormData();
        const name = document.querySelector("#name").value.trim();
        const price = document.querySelector("#price").value.trim();
        const templateFile = document.querySelector("#template-link").files[0];
        const previewFile = document.querySelector("#template-preview").files[0];

        if (name) formData.append("name", name);
        if (price) formData.append("price", price);
        if (templateFile) formData.append("template-link", templateFile);
        if (previewFile) formData.append("template-preview", previewFile);
        
        formData.append("unique_cv_id", id);

        try {
            const response = await fetch(`${endpoint}/api/admin/templates/patch/${id}`, {
                method: "PATCH",
                headers: {
                    "Authorization": `Bearer ${access_token}`,
                },
                body: formData,
            });

            if (response.ok) {
                alert("Template updated successfully!");
                window.location.href = "/user-management/manage-template"; // Redirect after success
            } else {
                alert("Error: Failed to update template.");
            }
        } catch (error) {
            console.error("Upload failed:", error);
            alert("An error occurred while updating the template.");
        }
    });

    // Cancel Button Event
    cancelButton.addEventListener("click", function () {
        const confirmCancel = confirm("Are you sure you want to cancel changes?");
        if (confirmCancel) {
            window.location.href = "/user-management/manage-template"; // Redirect after canceling
        }
    });
});
