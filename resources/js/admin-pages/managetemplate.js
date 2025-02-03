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
        .then((response) => response.json()) // Parse the JSON data
        .then((templateData) => {
            console.log(templateData); // Check the fetched data
            const templateList = document.querySelector("#template-list");

            // Ensure templateData is an array before iterating
            if (Array.isArray(templateData)) {
                templateData.forEach((template) => {
                    const templateHtml = `
                        <div class="col-xl-3 col-md-6" style="margin-bottom: 2%;">
                            <div class="card mb-3 mb-xl-0">
                                <img class="card-img-top img-fluid" src="${endpoint}/${template['template-preview']}" alt="img-1">
                                <div class="card-body">
                                    <h5 class="card-title mb-2">${template.name}</h5>
                                    <p class="card-text mb-3">Rp ${template.price}</p>
                                    <a href="${template['template-link']}" class="btn btn-primary">Edit</a>
                                    <a href="${template['template-link']}" class="btn btn-primary">Delete</a>
                                </div> <!-- end card body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                    `;

                    // Append the HTML to the template list container
                    templateList.innerHTML += templateHtml;
                });
            } else {
                console.error('Fetched data is not an array');
            }
        })
        .catch((error) => {
            console.error('Error fetching templates:', error);
        });


    form.addEventListener("submit", async function (event) {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData();

        // Get input values
        const name = document.querySelector("#name").value;
        const price = document.querySelector("#price").value;
        const templateFile = document.querySelector("#template-link").files[0];
        const previewFile = document.querySelector("#template-preview").files[0];

        // Validate file selection
        if (!templateFile || !previewFile) {
            alert("Please upload both the template and preview files.");
            return;
        }

        // Generate random cv_id
        const cvId = Math.random().toString(36).substr(2, 9);

        // Append data to FormData
        formData.append("name", name);
        formData.append("price", price);
        formData.append("template-link", templateFile);
        formData.append("template-preview", previewFile);
        formData.append("unique_cv_id", cvId);

        // END: abpxx6d04wxr
        

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

    const contentType = response.headers.get("Content-Type");
    let result;
    console.log(contentType);

    if (response.ok) {  
        alert("Template uploaded successfully!");
        form.reset();
    } else {
        alert("Error: " + (result.message || "Failed to upload template"));
    }
} catch (error) {
    console.error("Upload failed:", error);
    alert("An error occurred while uploading the template.");
}

    });
});
