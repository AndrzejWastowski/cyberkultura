
    <!--hero section start-->

    <section class="banner pos-r p-0">
      <div class="container-fluid px-lg-8">
        <div class="row">
          <div class="col-lg-3">
            <nav class="navbar navbar-expand-lg navbar-light categories d-block shadow-sm">
              <button class="navbar-toggler w-100 d-flex d-md-none align-items-center text-uppercase text-white p-3 border-0 rounded" type="button" data-bs-toggle="collapse" data-bs-target="#categoriesDropdown" aria-controls="categoriesDropdown" aria-expanded="false" aria-label="Toggle navigation"> <i class="las la-stream me-2"></i>Categories</button>
              <span class="cat-btn text-uppercase w-100 d-none d-lg-flex align-items-center text-white p-3 rounded"> 
                <i class="las la-stream me-2"></i>Wykonujemy</span>
              <div class="collapse navbar-collapse" id="categoriesDropdown">
                <ul class="navbar-nav d-block w-100">

                   @foreach ($offers as $item)
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('page.offer.show',[ $item->id, $item->link]) }}">{{  $item->name }}</a>
                          </li>
                  @endforeach
                </ul>
              </div>
            </nav>
          </div>
          <div class="col-lg-9">
            <div class="banner-slider owl-carousel no-pb h-100" data-dots="false" data-margin="5">
              <div class="item bg-pos-rt" data-bg-img="{{ Storage::url('resources/start/wizytowki.jpg') }}">
                <div class="container h-20">
                  <div class="row h-20 align-items-center">
                    <div class="col ps-lg-8 py-11 py-lg-0">
                      <h1 class="mb-4 animated4 text-white line-h-1">Profesjonalne<br>
                        <span class="bg-dark px-2 pt-2 text-uppercase">wizytówki</span> Firmowe</h1>
                        <div class="animated1"> <a class="btn btn-dark" href="{{ route('page.offer.show',[11,'wizytówki']) }}">duży wybór styli</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item bg-pos-rt" data-bg-img="{{ Storage::url('resources/start/toper.jpg') }}">
                <div class="container h-50">
                  <div class="row h-150 align-items-center">
                    <div class="col ps-lg-8">
                      <h6 class="letter-space-1 animated3 text-white">Topery</h6>
                      <h1 class="mb-4 animated1 text-white">dekoracje na <br> Torty</h1>
                      <div class="animated1"> <a class="btn btn-dark" href="{{ route('page.offer.show',[23,'topery']) }}">topery - drewno / pleksa</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item bg-pos-rt" data-bg-img="{{ Storage::url('resources/start/wycinanie_laserem.jpg') }}">
                <div class="container h-100">
                  <div class="row h-100 align-items-center">
                    <div class="col ps-lg-8">
                      <h6 class="letter-space-1 animated3 text-white">Laserowe</h6>
                      <h1 class="mb-4 animated2 text-white">Wycinanie<br> Grawerowanie</h1>
                      <div class="animated2"> <a class="btn btn-dark" href="{{ route('page.offer.show',[24,'laser']) }}">wycinanie i grawerowanie laserem </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item bg-pos-rt" data-bg-img="{{ Storage::url('resources/start/zaproszenia_slubne.jpg') }}">
                <div class="container h-100">
                  <div class="row h-100 align-items-center">
                    <div class="col ps-lg-8">
                      <h1 class="mb-4 animated3 text-white">Zaproszenia <br>ślubne</h1>
                        <div class="animated3"> <a class="btn btn-dark" href="{{ route('page.offer.show',[7,'zaproszenia okolicznościowe']) }}">projektowanie zaproszeń</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--hero section end--> 
    