document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();  // Prevent default form submission

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const loginRoute = '/login';
    const loadingOverlay = document.getElementById('loadingOverlay');

    // Show the loading overlay smoothly
    loadingOverlay.classList.add('active');

    fetch(loginRoute, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ username, password })
    })
    .then(response => response.json())
    .then(data => {
        // Hide loader smoothly after a delay
        setTimeout(() => {
            loadingOverlay.classList.remove('active');
        }, 300);

        if (data.success) {
            localStorage.setItem('access_token', data.bearer_token);
            window.location.href = data.role === 'admin' ? adminDashboard : userDashboard;
        } else {
            showErrorPopup('Login failed: ' + data.error);
        }
    })
    .catch(error => {
        setTimeout(() => {
            loadingOverlay.classList.remove('active');
        }, 300);
        showErrorPopup('An error occurred during login.');
        console.error('Error:', error);
    });
});

// Error handler popup function
function showErrorPopup(message) {
    alert(message);
}
