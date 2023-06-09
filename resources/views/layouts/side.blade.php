<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sidebar Navigation | Almeida Space</title>

    <link rel="stylesheet" href="{{ url('assets/style/style.css') }}">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ url('assets/vendors/bootstrap.min.css') }}">

    {{-- BOXICON --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>

<body>

    <div class="sidebar">
        <div class="logo-content">
            <div class="logo">
                <div class="logo-name">Inventory
                </div>
            </div>

            <i class="bx bx-menu" id="toggleMenu"></i>
        </div>
        <ul class="nav-list">
            <li class="nav-item">
                <i class="bx bx-search"></i>
                <input type="text" placeholder="Search . . ." class="sidebar-search">
                <span class="tooltip">Search</span>
            </li>
            <li class="nav-item">
                <a href="{{ url('../home') }}" class="nav-link">
                    <i class="bx bx-grid-alt"></i> <span class="nav-name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li class="nav-item">
                <a href="{{ route('karyawan.index') }}" class="nav-link">
                    <i class="bx bx-user"></i> <span class="nav-name">Data Karyawan</span>
                </a>
                <span class="tooltip">Data Karyawan</span>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bx bx-data"></i> <span class="nav-name">Data Barang</span>
                </a>
                <span class="tooltip">Data Barang</span>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class='bx bx-cart me-2'></i> <span class="nav-name">Pengambilan Barang</span>
                </a>
                <span class="tooltip">Pengambilan Barang</span>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bx bx-folder"></i> <span class="nav-name">Laporan Pengambilan</span>
                </a>
                <span class="tooltip">Laporan Pengambilan</span>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bx bx-cog"></i> <span class="nav-name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li>
        </ul>
        {{-- Authentication Links --}}
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class='bx bx-log-in me-2'></i>{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><i
                            class='bx bx-registered me-2'></i>{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <div class="profile-content">
                <div class="profile">
                    <div class="profile-details mt-1">
                        <i class='bx bx-user me-2'></i>
                        <div class="name-job">
                            <div class="name ">

                                {{ Auth::user()->name }}
                            </div>
                        </div>
                    </div>

                    <div class="logout">
                        <a class="text-decoration-none text-white" id="logout" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">

                            <i class='bx bx-log-out'></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="py-0 px-0 mt-0">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        @endguest

    </div>

    <div class="content-wrapper">
        @yield('content')
    </div>

    <script src="{{ url('assets/scripts/script.js') }}"></script>
    <script src="{{ url('assets/vendors/bootstrap.bundle.js') }}"></script>
</body>

</html>
