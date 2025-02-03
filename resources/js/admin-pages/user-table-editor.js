document.addEventListener('DOMContentLoaded', async () => {
    const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT; // Ensure this endpoint is correctly set
    const access_token = localStorage.getItem('access_token'); // Get token from localStorage

    // Check if the access_token is available
    if (!access_token) {
        console.error('No access token found.');
        return;
    }

    // Extract the ID from the URL path
    const pathSegments = window.location.pathname.split('/');
    const id = pathSegments[pathSegments.length - 1]; // Get the last segment of the path

    // Check if ID is found in the URL
    if (!id || isNaN(id)) {
        console.error('No valid ID found in URL path');
        return;
    }

    try {
        // Fetch user data to populate the form
        const response = await fetch(`${endpoint}/api/admin/data/accounts/get/${id}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${access_token}`,
            },
        });

        if (response.ok) {
            const userData = await response.json();
            console.log('User Data:', userData);
            
            // Fill in the form with the fetched data
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
submitButton.addEventListener('click', submitForm);

async function submitForm(){
   const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT; // Ensure this endpoint is correctly set
    const access_token = localStorage.getItem('access_token'); // Get token from localStorage

    // Check if the access_token is available
    if (!access_token) {
        console.error('No access token found.');
        return; // Stop the form submission if no access token
    }

    // Extract the ID from the URL path
    const pathSegments = window.location.pathname.split('/');
    const id = pathSegments[pathSegments.length - 1]; // Get the last segment of the path

    // Check if ID is found in the URL
    if (!id || isNaN(id)) {
        console.error('No valid ID found in URL path');
        return;
    }

    // Send the PATCH request
    try {
        const form = document.querySelector('#userForm');
        const formData = new FormData(form); // Create FormData from the form
        console.log('Form Data:', formData);

        // Optionally, you can convert FormData to an object for easier inspection
        const formDataObject = Object.fromEntries(formData.entries());
        console.log('Form Data Object:', formDataObject);
        
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
            window.location.href = managementRoute;
            // You can show a success message or redirect the user here
            // Example:
            // window.location.href = '/success-page';
        } else {
            // Handle different types of errors
            const errorData = await response.json();
            console.error('Failed to save user information:', errorData.message || 'Unknown error');
            // You can display the error to the user
        }
    } catch (error) {
        console.error('Error during request:', error);
        // You can display a general error message to the user
    }
}