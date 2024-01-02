<!--header start-->

<header class="site-header header-2">
    <div class="header-top bg-dark border-0 py-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 d-flex align-items-center justify-content-between">
                    <div class="d-none d-md-flex align-items-center text-light"> <small class="me-3"><i
                                class="las la-store text-primary me-1 align-middle"></i>Witamy w Cyberkulturze!</small>
                        <small><i class="las la-truck text-primary me-1 align-middle"></i> Drukarnia hurt / detal.
                            Zapraszamy do sklepu stacjonarnego!</small>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="text-light">
                            <small><a class="btn-link text-light" href="facebook"><i
                                        class="la la-facebook ic-1x text-primary me-1 align-middle"></i></a></small>
                            <small><a class="btn-link text-light" href="instagram"><i
                                        class="la la-instagram ic-1x text-primary me-1 align-middle"></i></a></small>
                            <small><a class="btn-link text-light" href="linkedin"><i
                                        class="la la-linkedinic-1x text-primary me-1 align-middle"></i></a></small>
                            <small><i class="las la-phone-volume ic-1x text-primary me-1 align-middle"></i> Tel: <a
                                    class="btn-link text-light" href="tel:+48690313800">+48 690 313 800</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-top  border-0 p-1">
        <div class="container">
            <img class="img-fluid" src="{{ asset('/storage/resources/strona_w_przygotowaniu.jpg') }}"
                alt="Strona w budowie">
        </div>
    </div>
    <div class="shadow-sm py-md-3 py-2">
        <div class="container">
            <div class="row align-items-center">
                <!--menu start-->
                <div class="col-md-6">
                    <div class="social-icons d-none d-md-block">
                        <ul class="list-inline">
                            <li class="list-inline-item"><a class="bg-white shadow-sm rounded p-2" href="#"><i
                                        class="la la-instagram"></i></a>
                            </li>
                            <li class="list-inline-item"><a class="bg-white shadow-sm rounded p-2" href="#"><i
                                        class="la la-twitter"></i></a>
                            </li>
                            <li class="list-inline-item d-none d-sm-inline-block"><a
                                    class="bg-white shadow-sm rounded p-2" href="#"><i
                                        class="la la-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="align-items-center d-flex justify-content-end">
                        <div class="input-group mb-3 border rounded">
                            <select class="form-select border-0 rounded-0 bg-light form-control d-none d-lg-inline">
                                <option selected>Szukaj wszędzie</option>
                                <option value="1">Gotowe produkty</option>
                                <option value="2">Gadżety reklamowe</option>
                            </select>
                            <input class="form-control border-0 border-start" type="search"
                                placeholder="wpisz szukane słowo" aria-label="Szukaj">
                            <button class="btn btn-primary text-white" type="submit"><i class="las la-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!--menu end-->
            </div>
        </div>
    </div>
    <div id="header-wrap">
        <div class="container">
            <div class="row">
                <!--menu start-->
                <div class="col">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand logo" href="{{ route('page.start') }}">
                            <img class="img-fluid" src="{{ asset('assets/images/logo.png') }}" alt="Logo Cyberkultura">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span
                                class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav mx-auto">

                                <li class="nav-item dropdown position-static">
                                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Usługi
                                        poligraficzne</a>
                                    <div class="dropdown-menu custom-drop">
                                        <div class="container p-0">
                                            <div class="row w-100 g-0">
                                                <div class="col-12 col-md-4 p-3">
                                                    <!-- Heading -->
                                                    <div class="mb-2 font-w-7">Drobna poligrafa</div>
                                                    <!-- Links -->
                                                    <ul class="list-unstyled">
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['1', 'name' => 'drukowanie']) }}">Drukowanie</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['2', 'name' => 'kserowanie']) }}">Kserowanie</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['7', 'name' => 'zaproszenia okolicznosciowe']) }}">Zaproszenia</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['8', 'name' => 'winietki']) }}">Winietki</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['9', 'name' => 'zawieszki']) }}">Zawieszki</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['10', 'name' => 'numery_stolow']) }}">Numery
                                                                stołów</a></li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['11', 'name' => 'wizytowki']) }}">Wizytówki</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['12', 'name' => 'ulotki']) }}">Ulotki</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['13', 'name' => 'plakaty']) }}">Plakaty</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['21', 'name' => 'dyplomy']) }}">Dyplomy</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-12 col-md-4 p-3">
                                                    <!-- Heading -->
                                                    <div class="mb-2 font-w-7">Duży format i nakład</div>
                                                    <!-- Links -->
                                                    <ul class="list-unstyled">
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['15', 'name' => 'teczki']) }}">Teczki
                                                                reklamowe</a></li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['19', 'name' => 'bilety']) }}">Bilety/karnety</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['20', 'name' => 'vouchery']) }}">Vouchery</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['22', 'name' => 'naklejki']) }}">Naklejki</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['18', 'name' => 'kalendarze']) }}">Kalendarze</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['16', 'name' => 'banery']) }}">Banery</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['17', 'name' => 'rollupy']) }}">Rollup</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['15', 'name' => 'teczki']) }}">Teczki
                                                                / broszury</a></li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['27', 'name' => 'długopisy z nadrukiem']) }}">Długopisy
                                                                z nadrukiem</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <img class="img-fluid rounded-bottom rounded-top"
                                                        src="{{ Storage::url('resources/header/poligrafia_kw.jpg') }}"
                                                        alt="drukowanie">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown position-static">
                                    <a class="nav-link dropdown-toggle" href="#"
                                        data-bs-toggle="dropdown">Obróbka laserowa</a>
                                    <div class="dropdown-menu custom-drop">
                                        <div class="container p-0">
                                            <div class="row w-100 g-0">
                                                <div class="col-12 col-md-4 p-3">
                                                    <!-- Heading -->
                                                    <div class="mb-2 font-w-7">Wycinanie laserem </div>
                                                    <!-- Links -->
                                                    <ul class="list-unstyled">
                                                        <li> <a
                                                                href="{{ route('page.offer.show', ['33', 'Notesty_kalendarze_z_grawerem]) }}">Grawerowane notesy i kalendarze</a>
                                                        </li>
                                                        <li> <a href="{{ route('page.offer.show', ['34', 'pudelka_prezentowe']) }}">Pudełka prezentowe</a>
                                                        </li>
                                                        <li> <a
                                                                href="{{ route('page.offer.show', ['26', 'pieczatki']) }}">Pieczątki</a>
                                                        </li>
                                                        <li> <a
                                                                href="{{ route('page.offer.show', ['31', 'topery']) }}">Topery na tort</a>
                                                        </li>
                                                        <li> <a
                                                                href="{{ route('page.offer.show', ['35', 'puzle z własnym zdjęciem']) }}">Puzzle
                                                                z własntym nadrukiem</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-12 col-md-4 p-3">
                                                    <!-- Heading -->
                                                    <div class="mb-2 font-w-7">Grawerowanie laserowe</div>
                                                    <!-- Links -->
                                                    <ul class="list-unstyled">
                                                        <li> <a
                                                                href="{{ route('page.offer.show', ['32', 'tabliczki okolicznościowe w drewnie']) }}">Drewniane
                                                                tabliczki z dedykacja</a>
                                                        </li>
                                                        <li> <a href="{{ route('page.offer.show', ['31', 'toper']) }}">topery
                                                                na tort</a>
                                                        </li>
                                                        <li> <a
                                                                href="{{ route('page.offer.show', ['23', 'grawerowanie']) }}">Grawertony</a>
                                                        </li>
                                                        <li> <a href="{{ route('page.offer.show', ['33', 'notesy_kalendarze']) }}">Notesy
                                                                / kalendarze</a>
                                                        </li>
                                                        <li> <a
                                                                href="{{ route('page.offer.show', ['27', 'długopisy']) }}">Długopisy
                                                                z napisami</a>
                                                        </li>
                                                        <li> <a
                                                                href="{{ route('page.offer.show', ['28', 'breloczki_ze_sklejki']) }}">Breloczki
                                                                wypalane w sklejce</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <img class="img-fluid rounded-bottom rounded-top"
                                                        src="{{ Storage::url('resources/header/wypalanie_kw.jpg') }}"
                                                        alt="laserowe wycinanie i grawerowanie">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>


                                <li class="nav-item dropdown position-static">
                                    <a class="nav-link dropdown-toggle" href="#"
                                        data-bs-toggle="dropdown">Usługi introligarotrskie</a>
                                    <div class="dropdown-menu custom-drop">
                                        <div class="container p-0">
                                            <div class="row w-100 g-0">
                                                <div class="col-12 col-md-4 p-3">
                                                    <!-- Heading -->
                                                    <div class="mb-2 font-w-7">Oprawianie dokumentów </div>
                                                    <!-- Links -->
                                                    <ul class="list-unstyled">
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['3', 'name' => 'oprawa_twarda']) }}">Oprawa
                                                                twarda</a></li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['4', 'name' => 'oprawa_miekka']) }}">Oprawa
                                                                miękka</a></li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['5', 'name' => 'bindowanie']) }}">Bindowanie</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-12 col-md-4 p-3">
                                                    <!-- Heading -->
                                                    <div class="mb-2 font-w-7">Skanowanie i laminowanie</div>
                                                    <!-- Links -->
                                                    <ul class="list-unstyled">
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['30', 'name' => 'skanowanie_dokumentow']) }}">Skanowanie</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('page.offer.show', ['7', 'name' => 'laminowanie']) }}">Laminowanie</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <img class="img-fluid rounded-bottom rounded-top"
                                                        src="{{ Storage::url('resources/header/introligator_kw.jpg') }}"
                                                        alt="skanowanie i laminowanie">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('page.contact') }}">Kontakt</a>
                                </li>

                                <li class="nav-item">
                                  <a class="nav-link" href="{{ route('page.faq') }}">FAQ - Pytania</a>
                              </li>


                            </ul>
                        </div>
                    </nav>
                </div>
                <!--menu end-->
            </div>
        </div>
    </div>
</header>
