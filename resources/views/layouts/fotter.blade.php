
    <!--footer start-->
    
    <footer class="py-11 bg-dark">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-3">
                  <img width="100%" src="{{ Storage::url('resources/footer/logo_cyberkultura_biale_poziom_cien.png') }}"><a class="footer-logo text-white h2 mb-0" href="index.html"></a>
              <p class="my-3 text-muted"><strong>Cyberkultura</strong> - usługi z zakresu małej poligrafi. Drukowanie, skanowanie, oprawa prac dyplomowych, inżynierskich / magisterskich. Projektowanie zaproszeń ślubnych i okolicznościowych, winietek. Projektowanie i drukowanie ulotek, banerów reklamowych, stendów reklamowych</p>
              <ul class="list-inline mb-0">
                <li class="list-inline-item"><a class="text-light ic-2x" href="#"><i class="la la-facebook"></i></a>
                </li>
                <li class="list-inline-item"><a class="text-light ic-2x" href="#"><i class="la la-instagram"></i></a>
                </li>
                <li class="list-inline-item"><a class="text-light ic-2x" href="#"><i class="la la-linkedin"></i></a>
                </li>
              </ul>
            </div>
            <div class="col-12 col-lg-6 mt-6 mt-lg-0">
              <div class="row">
                <div class="col-12 col-sm-4 navbar-dark">
                  <h5 class="mb-4 text-white">Quick Links</h5>
                  <ul class="navbar-nav list-unstyled mb-0">
                    <li class="mb-3 nav-item"><a class="nav-link" href="{{ route('page.start') }}">Start</a>
                    </li>
                    <li class="mb-3 nav-item"><a class="nav-link" href="{{ route('page.pages',['about']) }}">O firmie</a>
                    </li>
                    <li class="mb-3 nav-item"><a class="nav-link" href="{{ route('page.pages',['faq']) }}">Faq</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('page.contact') }}">Kontakt</a>
                    </li>
                  </ul>
                </div>
                <div class="col-12 col-sm-4 mt-6 mt-sm-0 navbar-dark">
                  <h5 class="mb-4 text-white">Polecamy</h5>
                  <ul class="navbar-nav list-unstyled mb-0">
                    <li class="mb-3 nav-item"><a class="nav-link" href="{{ route('page.offer.show',['26','pieczatki']) }}">Pieczątki</a>
                    </li>
                    <li class="mb-3 nav-item"><a class="nav-link" href="{{ route('page.offer.show',['11','wizytówki']) }}">Wizytówki</a>
                    </li>
                    <li class="mb-3 nav-item"><a class="nav-link" href="{{ route('page.offer.show',['29','kubki']) }}">Kubki</a>
                    </li>
                    <li class="mb-3 nav-item"><a class="nav-link" href="{{ route('page.offer.show',['13','plakaty']) }}">Plakaty / Ulotki</a>
                    </li>
                    <li class="mb-3 nav-item"><a class="nav-link" href="{{ route('page.offer.show',['16','banery']) }}">Banery reklamowe</a>
                    </li>
                    <li class="mb-3 nav-item"><a class="nav-link" href="{{ route('page.offer.show',['34','pudelka_prezentowe']) }}">Pudełka prezentowe</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('page.offer.show',['23','grawertony']) }}">Grawertony</a>
                    </li>
                  </ul>
                </div>
                <div class="col-12 col-sm-4 mt-6 mt-sm-0 navbar-dark">
                  <h5 class="mb-4 text-white">Informacje</h5>
                  <ul class="navbar-nav list-unstyled mb-0">
                    <li class="mb-3 nav-item"><a class="nav-link" href="{{ route('page.pages',['polityka_prywatnosci']) }}">Polityka prywatności</a>
                    </li>
                    </li>
                    <li class="mb-3 nav-item"><a class="nav-link" href="{{ route('page.pages',['regulamin']) }}">Regulamin strony</a>
                    </li>
                    <li class="mb-3 nav-item"><a class="nav-link" href="{{ route('page.pages',['reklamacje']) }}">Reklamacje i zwroty</a>
                    </li>
                    <li class="mb-3 nav-item"><a class="nav-link" href="{{ route('page.pages',['rodo']) }}">Rodo</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-3 mt-6 mt-lg-0">
              <div class="d-flex mb-3">
                <div class="me-2"> <i class="las la-map ic-2x text-primary"></i>
                </div>
                <div>
                  <h6 class="mb-1 text-light">Siedziba</h6>
                  <p class="mb-0 text-muted">Kutno, ul. Barlickiego 14, Polska</p>
                </div>
              </div>
              <div class="d-flex mb-3">
                <div class="me-2"> <i class="las la-envelope ic-2x text-primary"></i>
                </div>
                <div>
                  <h6 class="mb-1 text-light">Napisz do nas</h6>
                  <a class="text-muted" href="mailto:cyberkultura@op.pl">cyberkultura@op.pl</a>
                </div>
              </div>
              <div class="d-flex mb-3">
                <div class="me-2"> <i class="las la-mobile ic-2x text-primary"></i>
                </div>
                <div>
                  <h6 class="mb-1 text-light">Zadzwoń</h6>
                  <a class="text-muted" href="tel:+48690313800">+48 690 313 800</a>
                </div>
              </div>
              <div class="d-flex">
                <div class="me-2"> <i class="las la-clock ic-2x text-primary"></i>
                </div>
                <div>
                  <h6 class="mb-1 text-light">Pracujemy</h6>
                  <span class="text-muted">Pon - Pt:</span> <span class="text-light">9:00 - 17:00</span>
                  <span class="text-muted">Sobota:</span> <span class="text-light">9:00 - 14:00</span>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-8">
          <div class="row text-muted align-items-center">
            <div class="col-md-7">Copyright ©2020 All rights reserved | <i class="lar la-heart text-primary heartBeat2"></i>  <u><a class="text-primary" href="#">Cyberkultura</a></u>
            </div>
            
          </div>
          <div class="row text-muted align-items-center">
            <div class="col-md-7">Polecamy: <i class="lar la-heart text-primary heartBeat2"></i>  <a class="text-primary" href="https://kalendarium.kutno.pl">Kutnowskie Kalendarium - koncerty imprezy i wydarzenia w Kutnie</a>
            </div>
            <div class="col-md-5 text-md-end mt-3 mt-md-0">
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="#">
                    <img class="img-fluid" src="{{ asset('assets/images/pay-icon/01.png') }}" alt="">
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <img class="img-fluid" src="{{ asset('assets/images/pay-icon/02.png') }}" alt="">
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      <!--footer end-->
