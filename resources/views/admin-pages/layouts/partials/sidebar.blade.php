<div class="app-sidebar">
     <!-- Sidebar Logo -->
     <div class="logo-box">
          <a href="{{ route('any', 'index') }}" class="logo-dark">
               <img src="/images/logo-sm.png" class="logo-sm" alt="logo sm">
               <img src="/images/logo-dark.png" class="logo-lg" alt="logo dark">
          </a>

          <a href="{{ route('any', 'index') }}" class="logo-light">
               <img src="/images/logo-sm.png" class="logo-sm" alt="logo sm">
               <img src="/images/logo-light.png" class="logo-lg" alt="logo light">
          </a>
     </div>

     <div class="scrollbar" data-simplebar data-bs-theme="dark" data-topbar-color="dark" data-sidebar-color="darkt">
          <ul class="navbar-nav" id="navbar-nav">

               <li class="menu-title">Menu</li>

               <li class="nav-item">
                    <a class="nav-link" href="{{ route('any', 'admin-pages.index') }}
">
                         <span class="nav-icon">
                              <iconify-icon icon="mingcute:home-3-line"></iconify-icon>
                         </span>
                         <span class="nav-text"> Dashboard </span>
                         <span class="badge bg-primary badge-pill text-end">03</span>
                    </a>
               </li>

               <li class="menu-title">User Management</li>

               <li class="nav-item">
                    <a class="nav-link" href="{{ route('second', ['user-management', 'manage-user']) }}">
                         <span class="nav-icon">
                              <iconify-icon icon="mingcute:chart-bar-line"></iconify-icon>
                         </span>
                         <span class="nav-text"> Account Management </span>
                    </a>
               </li>

               <li class="nav-item">
                    <a class="nav-link menu-arrow" href="#sidebarTransactions" data-bs-toggle="collapse" role="button"
                         aria-expanded="false" aria-controls="sidebarTransactions">
                         <span class="nav-icon">
                              <iconify-icon icon="mingcute:box-line"></iconify-icon>
                         </span>
                         <span class="nav-text"> Manage Transaction </span>
                    </a>
                    <div class="collapse" id="sidebarTransactions">
                         <ul class="nav sub-navbar-nav">
                              <li class="sub-nav-item">
                                   <a class="sub-nav-link" href="{{ route('second', ['user-management', 'manage-transaction']) }}">Transactions</a>
                              </li>
                              <li class="sub-nav-item">
                                   <a class="sub-nav-link" href="{{ route('second', ['user-management', 'manage-invoices']) }}">Invoices</a>
                              </li>
                         </ul>
                    </div>
               </li>

               <li class="nav-item">
                    <a class="nav-link" href="{{ route('second', ['user-management', 'manage-template']) }}">
                         <span class="nav-icon">
                              <iconify-icon icon="mingcute:chart-bar-line"></iconify-icon>
                         </span>
                         <span class="nav-text"> Manage Template </span>
                    </a>
               </li>

          </ul>
     </div>
</div>


<div class="animated-stars">
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
</div>