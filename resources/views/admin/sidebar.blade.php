<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:white;">

    <a href="#" class="brand-link pl-4" style="border-bottom: 1px solid #e7c9ba;background-color: #;">
        {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8"> --}}
        <span class="brand-text font-weight-light" style="color:#7a6960; font-family: Raleway, sans-serif;">Guru
            Kreatif 4.0</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-bottom: 1px solid #e7c9ba;">
            <div class="image">
                {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
                @if (Auth::check())
                    <a href="#" class="d-block"
                        style="color:#7a6960; font-family: Raleway, sans-serif;">{{ Auth::user()->nama }}</a>
                @endif

            </div>

        </div>

        <div class="form-inline">
            {{-- <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div> --}}
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item menu-open">
                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <a href="#" class="nav-link" style="color:#7a6960; font-family: Raleway, sans-serif;">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Kelola Soal
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                    @elseif (Auth::check() && Auth::user()->role === 'user')
                        <a href="#" class="nav-link " style="color:#7a6960; font-family: Raleway, sans-serif;">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Paket
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                    @endif
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if (Auth::check() && Auth::user()->role === 'admin')
                                <a href="{{ url('datapppk') }}" class="nav-link "
                                    style="color:#7a6960; font-family: Raleway, sans-serif;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SOAL</p>
                                </a>
                            @elseif (Auth::check() && Auth::user()->role === 'user')
                                <a href="{{ url('table') }}" class="nav-link "
                                    style="color:#7a6960; font-family: Raleway, sans-serif;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SOAL</p>
                                </a>
                            @endif
                        </li>
                        {{-- <li class="nav-item">
                            <a href="./index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>

            </ul>
        </nav>

    </div>

</aside>
