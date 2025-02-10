document.addEventListener('DOMContentLoaded', async () => {
    const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
    const access_token = localStorage.getItem('access_token');

    if (!access_token) {
        console.error('No access token found.');
        return;
    }

    const pathSegments = window.location.pathname.split('/');
    const id = pathSegments[pathSegments.length - 1];

    if (!id || isNaN(id)) {
        console.error('No valid ID found in URL path');
        return;
    }

    try {
        const response = await fetch(`${endpoint}/api/admin/data/accounts/get/${id}`, {
            method: 'GET',
            headers: { 'Authorization': `Bearer ${access_token}` },
        });

        if (response.ok) {
            const userData = await response.json();
            console.log('User Data:', userData);

            const form = document.querySelector('#userForm');
            Object.keys(userData).forEach(key => {
                const input = form.querySelector(`[name=${key}]`);
                if (input) {
                    input.value = userData[key];
                }
            });
        } else {
            const errorData = await response.json();
            console.error('Failed to fetch user data:', errorData.message || 'Unknown error');
        }
    } catch (error) {
        console.error('Error during request:', error);
    }
});

const submitButton = document.querySelector('#submit');
submitButton.addEventListener('click', confirmSubmission);

function confirmSubmission() {
    const confirmationModal = confirm("Are you sure you want to save changes?");
    if (confirmationModal) {
        submitForm();
    }
}

async function submitForm() {
    const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
    const access_token = localStorage.getItem('access_token');

    if (!access_token) {
        console.error('No access token found.');
        return;
    }

    const pathSegments = window.location.pathname.split('/');
    const id = pathSegments[pathSegments.length - 1];

    if (!id || isNaN(id)) {
        console.error('No valid ID found in URL path');
        return;
    }

    try {
        const form = document.querySelector('#userForm');
        const formData = new FormData(form);
        const formDataObject = Object.fromEntries(formData.entries());

        console.log('Form Data Object:', formDataObject);

        setTimeout(() => {
            showModal("Updating...", "Please wait while we process your request.", "bx bx-loader-alt bx-spin", "bg-warning", false, true);
        }, 300);

        const response = await fetch(`${endpoint}/api/admin/accounts/update/${id}`, {
            method: 'PATCH',
            body: JSON.stringify(formDataObject),
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${access_token}`,
            },
        });

        if (response.ok) {
            console.log('User information saved successfully');
            showModal("Well Done!", "User information updated successfully.", "bx bx-check-double", "bg-info", true, false, () => {
                window.location.href = managementRoute;
            });
        } else {
            const errorData = await response.json();
            console.error('Failed to save user information:', errorData.message || 'Unknown error');
            showModal("Update Failed!", errorData.message || "Something went wrong.", "bx bx-error", "bg-danger", false, false);
        }
    } catch (error) {
        console.error('Error during request:', error);
        showModal("Update Failed!", "An unexpected error occurred. Please try again.", "bx bx-error", "bg-danger", false, false);
    }
}

function showModal(title, message, iconClass, bgColor, redirect, disableInteraction, callback) {
    const existingModal = document.getElementById("dynamicModal");
    if (existingModal) existingModal.remove();

    const modal = document.createElement("div");
    modal.id = "dynamicModal";
    modal.className = "modal fade";
    modal.setAttribute("tabindex", "-1");
    modal.setAttribute("role", "dialog");
    modal.setAttribute("aria-hidden", "true");

    modal.innerHTML = `
        <div class="modal-dialog modal-sm">
            <div class="modal-content modal-filled ${bgColor}">
                <div class="modal-body">
                    <div class="text-center">
                        <i class="${iconClass} display-6 mt-0 text-white"></i>
                        <h4 class="mt-3 text-white">${title}</h4>
                        <p class="mt-3 text-white">${message}</p>
                        <button type="button" id="modalContinueBtn" class="btn btn-light mt-3" data-bs-dismiss="modal">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    `;

    document.body.appendChild(modal);
    const bootstrapModal = new bootstrap.Modal(modal);

    if (disableInteraction) {
        modal.querySelector(".modal-content").classList.add("disabled-modal");
        modal.querySelector("#modalContinueBtn").style.display = "none";
    }

    bootstrapModal.show();

    document.getElementById("modalContinueBtn").addEventListener("click", () => {
        bootstrapModal.hide();
        setTimeout(() => {
            modal.remove();
            if (callback) callback();
        }, 500);
    });
}
