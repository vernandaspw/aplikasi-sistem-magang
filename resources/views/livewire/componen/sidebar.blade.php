{{-- <div>
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-secondary navbar-dark">
            <a href="{{ url('/') }}" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Magang RRI</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="
                    @if (auth()->user()->img)
                    {{ Storage::url(auth()->user()->img) }}
                    @else
                    {{ asset('img/logo.png') }}
                    @endif
                    " alt=""
                        style="width: 40px; height: 40px;">
                    <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                    </div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">{{ auth()->user()->nama }}</h6>
                    <span>{{ auth()->user()->role }}</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="{{ url('dashboard', []) }}"
                    class="nav-item nav-link @if (Request::is('dashboard')) active @endif"><i
                        class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <hr>

                @if (auth()->user()->role == 'peserta')
                    <a href="{{ url('daftar-magang', []) }}"
                        class="nav-item nav-link @if (Request::is('daftar-magang')) active @endif"><i
                            class="fa fa-keyboard me-2"></i>Daftar magang</a>
                    <hr>
                @endif

                <a href="{{ url('data-magang', []) }}"
                    class="nav-item nav-link @if (Request::is('data-magang')) active @endif"><i
                        class="fa fa-th me-2"></i>Data
                    Magang</a>
                @if (auth()->user()->role != 'admin')
                    <a href="{{ url('data-kehadiran', []) }}"
                        class="nav-item nav-link @if (Request::is('data-kehadiran')) active @endif"><i
                            class="fa fa-th me-2"></i>Data
                        Kehadiran</a>
                    <a href="{{ url('chat') }}" class="nav-item nav-link @if (Request::is('chat')) active @endif"><i
                            class="fa fa-envelope me-lg-2"></i>Chat</a>
                @endif

                @if (auth()->user()->role == 'admin')
                    <hr>
                    <a href="{{ url('data-admin', []) }}"
                        class="nav-item nav-link @if (Request::is('data-admin')) active @endif"><i
                            class="fa fa-table me-2"></i>Data Admin</a>
                    <a href="{{ url('data-pembimbing', []) }}"
                        class="nav-item nav-link @if (Request::is('data-pembimbing')) active @endif"><i
                            class="fa fa-table me-2"></i>Data Pembimbing</a>
                    <a href="{{ url('data-peserta', []) }}"
                        class="nav-item nav-link @if (Request::is('data-peserta')) active @endif"><i
                            class="fa fa-table me-2"></i>Data Peserta</a>
                    <a href="{{ url('data-posisi', []) }}"
                        class="nav-item nav-link @if (Request::is('data-posisi')) active @endif"><i
                            class="fa fa-table me-2"></i>Data
                        Posisi</a>
                    <a href="{{ url('data-bagian', []) }}"
                        class="nav-item nav-link @if (Request::is('data-bagian')) active @endif"><i
                            class="fa fa-table me-2"></i>Data
                        Bagian</a>
                    <a href="{{ url('setting', []) }}"
                        class="nav-item nav-link @if (Request::is('setting')) active @endif"><i
                            class="fa fa-table me-2"></i>Setting
                    </a>
                @endif
            </div>
        </nav>
    </div>
</div> --}}

<ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item @if (Request::is('dashboard')) active @endif">
        <a href="{{ url('/', []) }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>


    <li class="menu-header small text-uppercase"><span class="menu-header-text">Pages</span></li>
    @if (auth()->user()->role == 'peserta')
        <li class="menu-item @if (Request::is('daftar-magang')) active @endif">
            <a href="{{ url('daftar-magang', []) }}"  class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="daftar magang">daftar magang</div>
            </a>
        </li>
    @endif
    <li class="menu-item @if (Request::is('data-magang')) active @endif">
        <a href="{{ url('data-magang', []) }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-collection"></i>
            <div data-i18n="Basic">Data Magang</div>
        </a>
    </li>

    @if (auth()->user()->role != 'peserta')
    <li class="menu-item @if (Request::is('data-kehadiran-pembimbing')) active @endif">
        <a href="{{ url('data-kehadiran-pembimbing', []) }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-collection"></i>
            <div data-i18n="Basic">Data Kehadiran Pembimbing</div>
        </a>
    </li>
    @endif
    @if (auth()->user()->role != 'admin')
        <li class="menu-item @if (Request::is('data-kehadiran')) active @endif">
            <a href="{{ url('data-kehadiran', []) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Data Kehadiran</div>
            </a>
        </li>
        <li class="menu-item @if (Request::is('chat')) active @endif">
            <a href="{{ url('chat', []) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">Chat</div>
            </a>
        </li>
    @endif
    @if (auth()->user()->role == 'admin')
    <li class="menu-header small text-uppercase"><span class="menu-header-text"></span></li>
        <li class="menu-item @if (Request::is('data-admin')) active @endif">
            <a href="{{ url('data-admin', []) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Data admin</div>
            </a>
        </li>
        <li class="menu-item @if (Request::is('data-pembimbing')) active @endif">
            <a href="{{ url('data-pembimbing', []) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Data pembimbing</div>
            </a>
        </li>
        <li class="menu-item @if (Request::is('data-peserta')) active @endif">
            <a href="{{ url('data-peserta', []) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Data peserta</div>
            </a>
        </li>
        <li class="menu-item @if (Request::is('data-posisi')) active @endif">
            <a href="{{ url('data-posisi', []) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Data penempatan kerja</div>
            </a>
        </li>
        <li class="menu-item @if (Request::is('data-bagian')) active @endif">
            <a href="{{ url('data-bagian', []) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Data Unit Kerja</div>
            </a>
        </li>
        <li class="menu-item @if (Request::is('setting')) active @endif">
            <a href="{{ url('setting', []) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Setting</div>
            </a>
        </li>

    @endif


    <li class="menu-header small text-uppercase"><span class="menu-header-text"></span></li>
    <li class="menu-item">
        <a href="javascript:void()" wire:click='logout' class="menu-link">
            <i class="menu-icon tf-icons bx bx-collection"></i>
            <div data-i18n="Basic">Logout</div>
        </a>
    </li>

</ul>
