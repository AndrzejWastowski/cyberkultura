@extends('panel.app')
@section('content')
    <div class="container pt-5"></div>
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h2>Galeria</h2>
                    <p>Galeria zdjęć z działek członków naszego stowarzyszenia</p>
                </div>
            </div>
        </div>
        <div class="container">
            <ol>
                <li><a href="/">Słoneczko</a></li>
                <li>Galeria</li>
            </ol>
        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="row">


                <div class="col-lg-3 d-flex " data-aos="fade-up">
                  <div class="sidebar">

                    <h3 class="sidebar-title">Galerie</h3>
                    <div class="sidebar-item categories">
                      <ul id="portfolio-flters">
                        <h4><li data-filter=".filter-dzialki" class="filter-active">Nasze działki</li></h4>
                        <li data-filter=".filter-kwiaty">Kwiaty i rabaty</li>
                        <li data-filter=".filter-infra">Infrastruktura</li>
                        <li data-filter=".filter-oczka">Oczka wodne</li>
                      </ul>
                    </div><!-- End sidebar categories-->

                  </div><!-- End sidebar -->
                </div>

                <div class="col-lg-9" data-aos="fade-up">
                    <div class="row portfolio-container" data-aos="fade-up">

                        <div class="col-lg-4 col-md-6 portfolio-item filter-dzialki">
                          <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1">
                            <div class="portfolio-wrap">
                                    <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                            </div>
                          </a>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-dzialki">
                            <div class="portfolio-wrap">
                                <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>Web 3</h4>
                                    <p>Web</p>
                                    <div class="portfolio-links">
                                        <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery"
                                            class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
    </section><!-- End Portfolio Section -->
@endsection
