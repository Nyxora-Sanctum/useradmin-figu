<header class="app-topbar">
     <div class="container-fluid">
          <div class="navbar-header">
               <div class="d-flex align-items-center gap-2">
                    <!-- Menu Toggle Button -->
                    <div class="topbar-item">
                         <button type="button" class="button-toggle-menu topbar-button">
                              <iconify-icon icon="solar:hamburger-menu-outline"
                                   class="fs-24 align-middle"></iconify-icon>
                         </button>
                    </div>
               </div>

               <div class="d-flex align-items-center gap-2">
                    <!-- Theme Color (Light/Dark) -->
                    <div class="topbar-item">
                         <button type="button" class="topbar-button" id="light-dark-mode">
                              <iconify-icon icon="solar:moon-outline"
                                   class="fs-22 align-middle light-mode"></iconify-icon>
                              <iconify-icon icon="solar:sun-2-outline"
                                   class="fs-22 align-middle dark-mode"></iconify-icon>
                         </button>
                    </div>

                    <!-- Notification -->

                    <!-- User -->
                    <div class="dropdown topbar-item">
                         <a type="button" class="topbar-button" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <span class="d-flex align-items-center">
                                   <img class="rounded-circle" width="32" src="/images/users/avatar-1.jpg"
                                        alt="avatar-3">
                              </span>
                         </a>
                         <div class="dropdown-menu dropdown-menu-end">
                              <!-- item-->
                              <h6 class="dropdown-header">Hello, Admin!</h6>



                              <div class="dropdown-divider my-1"></div>

                         <a class="dropdown-item text-danger" href="#"
                              onclick="event.preventDefault(); logout();">
                              <iconify-icon icon="solar:logout-3-outline" class="align-middle me-2 fs-18"></iconify-icon>
                              <span class="align-middle">Logout</span>
                         </a>

                         </div>
                    </div>
               </div>
          </div>
     </div>
</header>

<script>
     logoutRoute = "{{ route('logout') }}"
     function logout() {
               // Perform the logout request
               fetch(logoutRoute, {
                    method: "GET",
               })
                    .then(response => {
                         if (response.ok) {
                              // Clear the 'access_token' cookie
                              localStorage.setItem('access_token', '');
                              // Refresh the page after logout
                              window.location.reload();
                         }
                    })
                    .catch(error => {
                         console.error('Logout failed:', error);
                    });
          }
</script>