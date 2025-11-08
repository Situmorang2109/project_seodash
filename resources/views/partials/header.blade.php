<header class="app-header">
  <nav class="navbar navbar-expand-lg navbar-light">
      <ul class="navbar-nav">
          <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse">
                  <i class="ti ti-menu-2"></i>
              </a>
          </li>
      </ul>

      <div class="navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

              <li class="nav-item dropdown">
                  <a class="nav-link nav-icon-hover" data-bs-toggle="dropdown">
                      <img src="{{ asset('assets/images/profile/user-1.jpg') }}" 
                           width="35" height="35" class="rounded-circle">
                  </a>

                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up">
                      <div class="message-body">
                          <form action="{{ url('/logout') }}" method="POST">
                              @csrf
                              <button class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</button>
                          </form>
                      </div>
                  </div>
              </li>

          </ul>
      </div>

  </nav>
</header>
