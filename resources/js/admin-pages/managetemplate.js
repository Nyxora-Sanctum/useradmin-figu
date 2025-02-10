document.addEventListener("DOMContentLoaded", function () {
    const accessToken = localStorage.getItem("access_token");
    const form = document.querySelector(".was-validated");
    const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;

    fetch(`${endpoint}/api/templates/get/all-templates`, {
        method: "GET",
        headers: {
            'Authorization': `Bearer ${accessToken}`,
        },
    })
        .then((response) => response.json())
        .then((templateData) => {
            console.log(templateData);
            const templateList = document.querySelector("#template-list");

            if (Array.isArray(templateData)) {
                templateData.forEach((template) => {
                    const editURL = editTemplateURL.replace('id-from-table', template.unique_cv_id);

                    const templateHtml = `
                        <div class="col-xl-3 col-md-6" style="margin-bottom: 2%;">
                            <div class="card mb-3 mb-xl-0">
                                <img class="card-img-top img-fluid" src="${endpoint}/${template['template-preview']}" alt="img-1">
                                <div class="card-body">
                                    <h5 class="card-title mb-2">${template.name}</h5>
                                    <p class="card-text mb-3">Rp ${template.price}</p>
                                    <a href="${editURL}" class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger delete-btn" data-id="${template.unique_cv_id}">Delete</button>
                                </div>
                            </div>
                        </div>
                    `;

                    templateList.innerHTML += templateHtml;
                });

                // Add event listener to delete buttons
                document.querySelectorAll(".delete-btn").forEach((button) => {
                    button.addEventListener("click", async function () {
                        const templateId = this.getAttribute("data-id");
                        const confirmDelete = confirm("Are you sure you want to delete this template?");
                        
                        if (confirmDelete) {
                            try {
                                const deleteResponse = await fetch(`${endpoint}/api/admin/templates/delete/${templateId}`, {
                                    method: "DELETE",
                                    headers: {
                                        "Authorization": `Bearer ${accessToken}`,
                                    },
                                });

                                if (deleteResponse.ok) {
                                    alert("Template deleted successfully!");
                                    location.reload(); // Refresh to update the list
                                } else {
                                    alert("Failed to delete template.");
                                }
                            } catch (error) {
                                console.error("Error deleting template:", error);
                                alert("An error occurred while deleting the template.");
                            }
                        }
                    });
                });
            } else {
                console.error("Fetched data is not an array");
            }
        })
        .catch((error) => {
            console.error("Error fetching templates:", error);
        });

    form.addEventListener("submit", async function (event) {
        event.preventDefault();

        const formData = new FormData();
        const name = document.querySelector("#name").value;
        const price = document.querySelector("#price").value;
        const templateFile = document.querySelector("#template-link").files[0];
        const previewFile = document.querySelector("#template-preview").files[0];

        if (!templateFile || !previewFile) {
            alert("Please upload both the template and preview files.");
            return;
        }

        const cvId = Math.random().toString(36).substr(2, 9);

        formData.append("name", name);
        formData.append("price", price);
        formData.append("template-link", templateFile);
        formData.append("template-preview", previewFile);
        formData.append("unique_cv_id", cvId);

        for (const pair of formData.entries()) {
            console.log(pair[0], pair[1]);
        }

        try {
            const response = await fetch(`${endpoint}/api/admin/templates/create`, {
                method: "POST",
                headers: {
                    "Authorization": `Bearer ${accessToken}`,
                },
                body: formData,
            });

            if (response.ok) {
                alert("Template uploaded successfully!");
                form.reset();
            } else {
                alert("Error: Failed to upload template");
            }
        } catch (error) {
            console.error("Upload failed:", error);
            alert("An error occurred while uploading the template.");
        }
    });
});

