<li class="nav-item navbar-dropdown dropdown-user dropdown">
    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
      <i class="bx bx-menu bx-sm d-lg-none"></i>
      <div class="avatar avatar-online d-none d-lg-block">
        <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
      </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
      <li>
        <a class="dropdown-item" href="#">
          <div class="d-flex">
            <div class="flex-shrink-0 me-3">
              <div class="avatar avatar-online">
                <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
              </div>
            </div>
            <div class="flex-grow-1">
              <span class="fw-semibold d-block">John Doe</span>
              <small class="text-muted">Admin</small>
            </div>
          </div>
        </a>
      </li>
      <li>
        <div class="dropdown-divider"></div>
      </li>
        <x-mobile-menu/>
      <li>
        <div class="dropdown-divider"></div>
      </li>
      <li>
        @guest
        <a wire:navigate class="dropdown-item" href="{{ route('login') }}">
          <i class="bx bx-power-off me-2"></i>
          <span class="align-middle">Login</span>
        </a>
        @else
        <a class="dropdown-item" href="/login">
          <i class="bx bx-power-off me-2"></i>
          <span class="align-middle">Log Out</span>
        </a>
        @endguest
        
      </li>
    </ul>
  </li>