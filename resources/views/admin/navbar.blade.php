<nav class="main-header navbar navbar-expand navbar-white navbar-light"
    style="background-color: #ef7f4d; font-family: Raleway, sans-serif;">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color:white;"><i
                    class="fas fa-bars"></i></a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> --}}
        @if (Auth::check() && Auth::user()->role === 'admin')
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('dashboard') }}" class="nav-link" style="color:white;">Home</a>
            </li>
        @elseif (Auth::check() && Auth::user()->role === 'user')
            <li class="nav-item
                    d-none d-sm-inline-block">
                <a href="{{ url('beranda') }}" class="nav-link" style="color:white;">Home</a>
            </li>
        @endif
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('datapppk') }}" class="nav-link">PPPK</a>
        </li> --}}
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn"
                    style="background-color:; color:white;border-radius: 25px">Logout</button>
            </form>
        </li>
    </ul>

</nav>
