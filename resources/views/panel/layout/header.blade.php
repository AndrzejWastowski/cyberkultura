
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/panel" class="logo d-flex align-items-center">
        <img src="{{ asset('assets_panel/img/logo.png') }}" alt="">
        <span class="d-none d-lg-block">Panel</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    @guest
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

        @if (Route::has('login'))
        <li class="nav-item d-block d-lg-none">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
        <li class="nav-item d-block d-lg-none">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    @endif
    @else

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('assets_panel/img/profile-img.jpg') }}" alt="Profil" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">
                    {{ Auth::user()->name }}
            </span>

          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
                <h6>{{ Auth::user()->name }}</h6>
                <span>{{ Auth::user()->email }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{  route('panel.user.main_profile') }}">
                <i class="bi bi-person"></i>
                <span>Mój profil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('panel.user.edit',['user'=>Auth::user()]) }}">
                <i class="bi bi-gear"></i>
                <span>Ustawienia konta</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('panel.help') }}">
                <i class="bi bi-question-circle"></i>
                <span>Potrzebujesz pomocy?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span> {{ __('Logout') }}</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
      @endguest
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
