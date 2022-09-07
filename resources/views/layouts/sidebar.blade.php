
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <span class="brand-text font-weight-light">Parkirin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @guest
                    <li class="nav-item">
                        <a href="/login" class="nav-link" method="get">
                            <i class="nav-icon fa fa-sign-in"></i>
                            <p>Login</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link" method="get">
                            <i class="nav-icon fa fa-pencil"></i>
                            <p>Register</p>
                        </a>
                    </li>
                @else
                    @if(\Auth::user()->hasVerifiedEmail())
                        <li class="nav-item">
                            <a href="/home" class="nav-link" method="get">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        <li class="nav-header">Administration</li>
                        @if(\Auth::user()->role == 'Admin')
                            <li class="nav-item">
                                <a href="/masterUser" class="nav-link" method="get">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                       All Users
                                    </p>
                                </a>

                                <ul>

                                    <li class="nav-item">
                                        <a href="/masterUser/User" class="nav-link" method="get">
                                            <i class="nav-icon fas fa-user"></i>
                                            <p>
                                                User
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/masterUser/Partner" class="nav-link" method="get">
                                            <i class="nav-icon fas fa-user"></i>
                                            <p>
                                                Partner
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/masterUser/Operator" class="nav-link" method="get">
                                            <i class="nav-icon fas fa-user"></i>
                                            <p>
                                                Operator
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if(in_array(\Auth::user()->role, ['Admin','User']))
                            <li class="nav-item">
                                <a href="/masterKendaraan" class="nav-link" method="get">
                                    <i class="nav-icon fas fa-car"></i>
                                    <p>
                                        Kendaraan
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if(in_array(\Auth::user()->role, ['Admin','User','Partner','Operator']))
                            <li class="nav-item">
                                <a href="/masterTransaksi" class="nav-link" method="get">
                                    <i class="nav-icon fas fa-clipboard-list"></i>
                                    <p>
                                        Transaksi
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if(in_array(\Auth::user()->role, ['Admin','Partner']))
                            <li class="nav-item">
                                <a href="/masterLokasi" class="nav-link" method="get">
                                    <i class="nav-icon fas fa-map-marker-alt"></i>
                                    <p>
                                        Lokasi
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/tambahLokasi" class="nav-link" method="get">
                                    <i class="nav-icon fas fa-plus"></i>
                                    <p>
                                        Tambah Lokasi
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/masterDenda" class="nav-link" method="get">
                                    <i class="nav-icon fas fa-gavel"></i>
                                    <p>
                                        Denda
                                    </p>
                                </a>
                            </li>
                        @endif
                    @endif
                    <li class="nav-header">{{ Auth::user()->email  }}</li>
                    <li class="nav-item">
                        <a class="nav-link" method="get" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
