<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
            {{-- <i class="bx bx-search fs-4 lh-0"></i>
        <input
          type="text"
          class="form-control border-0 shadow-none"
          placeholder="Search..."
          aria-label="Search..."
        /> --}}
            <div class="">
                LAYANAN ADMINISTRASI MAGANG RRI PALEMBANG
            </div>
        </div>
    </div>
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- Place this tag where you want the button to render. -->
        <li class="nav-item lh-1 me-3">
            {{-- {{ auth()->user()->nama }} --}}
        </li>

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    <img src="
                    @if (auth()->user()->img) {{ Storage::url(auth()->user()->img) }}
                    @else
                    {{ asset('sneat/assets/img/avatars/1.png') }} @endif"
                        alt class="w-px-40 h-auto rounded-circle" />
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="{{ url('profil', []) }}">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                    <img src="
                                    @if (auth()->user()->img) {{ Storage::url(auth()->user()->img) }}
                    @else
                    {{ asset('sneat/assets/img/avatars/1.png') }} @endif
                                    "
                                        alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-semibold d-block">{{ auth()->user()->nama }}</span>
                                <small class="text-muted">{{ auth()->user()->role }}</small>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ url('profil', []) }}">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ url('ubah-password', []) }}">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Ubah password</span>
                    </a>
                </li>

                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a wire:click='logout' class="dropdown-item" href="javascript:void()">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                    </a>
                </li>
            </ul>
        </li>
        <!--/ User -->
    </ul>
</div>
