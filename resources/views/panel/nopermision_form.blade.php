
    <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
      <i class="bi bi-box-arrow-right"></i>
      <span> {{ __('Logout') }}</span>
    </a>
    nie masz uprawnień do tej strony, zgłoś się do administratora aby zweryfikować uprawnienia
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
  </form>
