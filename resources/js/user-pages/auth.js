document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();  // Prevent the default form submission

    console.log("Form submitted!"); // Debugging line to check if submission is triggered

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    const loginRoute = '/login';  // Set this to the correct login route URL

    // Make AJAX request to the server for login
    fetch(loginRoute, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            username: username,
            password: password
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data); // Debugging line to see the response

        if (data.success) {
            const token = data.bearer_token;  // Get the token from the response
            localStorage.setItem('access_token', token);  // Store the token in localStorage

            // Redirect based on the user's role
            if (data.role === 'admin') {
                window.location.href = adminDashboard;
            } else if (data.role === 'user') {
                window.location.href = userDashboard;
            }
        } else {
            alert('Login failed: ' + data.error);  // Show an error message
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred during login.');
    });
});
