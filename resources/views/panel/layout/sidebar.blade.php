@guest
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="/">
        <i class="bi bi-grid"></i>
        <span>Niezalogowany</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('login') }}">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Logowanie</span>
      </a>
    </li><!-- End Login Page Nav -->

  </ul>
</aside><!-- End Sidebar-->
@else
        <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('panel.dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Tablica główna</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#offer-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Oferta</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="offer-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{  route('panel.offers.add') }}">
              <i class="bi bi-circle"></i><span>Dodaj oferte</span>
            </a>
          </li>
          <li>
            <a href="{{  route('panel.offers.list') }}">
              <i class="bi bi-circle"></i><span>Lista ofertowa</span>
            </a>
          </li>
        </ul>
      </li><!-- End news Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#news-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Produkty</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="news-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{  route('panel.products.add') }}">
              <i class="bi bi-circle"></i><span>Dodaj produkt</span>
            </a>
          </li>
          <li>
            <a href="{{  route('panel.products.list') }}">
              <i class="bi bi-circle"></i><span>Lista produktów</span>
            </a>
          </li>
        </ul>
      </li><!-- End news Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#news-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Wiadomości</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="news-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{  route('panel.news.list') }}">
              <i class="bi bi-circle"></i><span>Lista wiadomości </span>
            </a>
          </li>
          <li>
            <a href="{{  route('panel.news.add') }}">
              <i class="bi bi-circle"></i><span>Dodaj nową</span>
            </a>
          </li>
        </ul>
      </li><!-- End news Nav -->

      <!-- start organization  Nav -->
      

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#gallery-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Galerie</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="gallery-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{  route('panel.gallery.list') }}">
              <i class="bi bi-circle"></i><span>Wszystkie zdjęcia</span>
            </a>
          </li>
          <li>
            <a href="{{  route('panel.gallery.add') }}">
              <i class="bi bi-circle"></i><span>Uzupełnij galerię</span>
            </a>
          </li>
          <li>
            <a href="{{  route('panel.gallery.category_list') }}">
              <i class="bi bi-circle"></i><span>Lista galerii</span>
            </a>
          </li>
          <li>
            <a href="{{  route('panel.gallery.category_add') }}">
              <i class="bi bi-circle"></i><span>Dodaj nową galerię</span>
            </a>
          </li>
        </ul>
      </li><!-- End gallery Nav -->

      <li class="nav-heading">Podstrony</li>


      @foreach ($pages as $page)
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('panel.pages.edit',$page) }}">
          <i class="bi bi-person"></i>
          <span>{{  $page->title }}</span>
        </a>
      </li>

  @endforeach

  <li class="nav-heading"> statyczne</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{  route('panel.files.list')  }}">
          <i class="bi bi-person"></i>
          <span>Pliki do pobrania</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{  route('panel.contact')  }}">
          <i class="bi bi-envelope"></i>
          <span>Kontakt</span>
        </a>
      </li>


      <li class="nav-heading">Systemowe</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{  route('panel.user.list')  }}">
          <i class="bi bi-person"></i>
          <span>Użytkownicy</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{  route('panel.faq')  }}">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-heading">Dodatki</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('panel.statistics') }}">
          <i class="bi bi-bar-chart"></i>
          <span>Statystyki</span>
        </a>
      </li><!-- End Charts Nav -->


    </ul>

  </aside><!-- End Sidebar-->
  @endguest