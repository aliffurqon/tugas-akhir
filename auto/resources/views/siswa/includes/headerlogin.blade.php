<!-- Header -->
<header id="header" class="transparent-nav">
    <div class="container">

        <div class="navbar-header">
            <!-- Logo -->
            <div class="navbar-brand">
                <a class="logo" href="/">
                    <img src="{{url('img/auto.png'); }}" alt="logo">
                </a>
            </div>
            <!-- /Logo -->

            <!-- Mobile toggle -->
            <button class="navbar-toggle">
                <span></span>
            </button>
            <!-- /Mobile toggle -->
        </div>

        <!-- Navigation -->
        <nav id="nav">
            <ul class="main-menu nav navbar-nav navbar-left">
                <li><a href="{{ route('user.home') }}">Home</a></li>
                <li><a href="{{ route('user.jadwaluser.index') }}">Jadwal Belajar</a></li>
            </ul>
            <ul class="main-menu nav navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b style="color: #ff6700;">{{ Auth::user()->name }}</b>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <b style="color: #ff6700; padding:10px;">{{ __('Logout') }}</b>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
            </ul>
        </nav>
            <!-- /Navigation -->

        {{-- <!-- Navigation -->
        <nav id="nav">
        @if (Route::has('login'))
            <ul class="main-menu nav navbar-nav navbar-left">
                @auth
                <li><a href="/home">Home</a></li>
                <li><a href="#">Jadwal Belajar</a></li>
                <li><a href="#about">Tentang Kami</a></li>
                <li><a href="#courses">Paket Kursus</a></li>
                <li><a href="#contact-cta">Kontak</a></li>
                @else
                <li><a href="/">Home</a></li>
                <li><a href="#about">Tentang Kami</a></li>
                <li><a href="#courses">Paket Kursus</a></li>
                <li><a href="#contact-cta">Kontak</a></li>
                @endauth
            </ul>
            @auth
            <ul class="main-menu nav navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <b style="color: #ff6700;">{{ Auth::user()->name }}</b>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <b style="color: #ff6700; padding:10px;">{{ __('Logout') }}</b>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                    </li>
            </ul>
            @else
            <ul class="main-menu nav navbar-nav navbar-right">
                <li><a href="{{ route('login') }}">Login</a></li>
                @if (Route::has('register'))
                <li><a href="{{ route('register') }}">Register</a></li>
                @endif
            </ul>
            @endauth
        @endif
        </nav>
        <!-- /Navigation --> --}}
    </div>
</header>
<!--  End Header -->