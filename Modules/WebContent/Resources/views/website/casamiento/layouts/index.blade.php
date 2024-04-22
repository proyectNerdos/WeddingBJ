<!DOCTYPE html>
<html lang="en">


@section('htmlheader')
	@include('webcontent::website.casamiento.layouts.htmlheader')
@show


<body id="home">


    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <div class="preloader">
            <div class="vertical-centered-box">
                <div class="content">
                    <div class="loader-circle"></div>
                    <div class="loader-line-mask">
                        <div class="loader-line"></div>
                    </div>
                    <img src="{{ asset('theme-front/casamiento/images/preloader.gif') }}" alt="">
                    </div>
            </div>
        </div>
        <!-- end preloader -->
        <!-- Start header -->
        <header id="header">
            <div class="wpo-site-header">
                <nav class="navigation navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-3 col-3 d-lg-none dl-block">
                                <div class="mobail-menu">
                                    <button type="button" class="navbar-toggler open-btn">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar first-angle"></span>
                                        <span class="icon-bar middle-angle"></span>
                                        <span class="icon-bar last-angle"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-6">
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="https://belenyjose.site/">Sí, quiero!</a>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-1 col-1">
                                <div id="navbar" class="collapse navbar-collapse navigation-holder">
                                    <button class="menu-close"><i class="ti-close"></i></button>
                                    <ul class="nav navbar-nav mb-2 mb-lg-0">
                                        <li class="">
                                            <a  href="{{ route('home') }}">Home</a>
                                        </li>
                                       <li class="">
                                            <a href="#event">Evento</a>
                                        </li>
                                        <li class="">
                                            <a href="#acompañanos">Acompañanos</a>
                                        </li>

                                        <li class="">
                                            <a href="{{ route('galeria') }}">Fotos</a>
                                        </li>

                                        <li class="">
                                            <a href="#asistencia">Confirmar Asistencia</a>
                                        </li>
                                    </ul>
                                </div><!-- end of nav-collapse -->
                            </div>
                            <div class="col-lg-2 col-md-2 col-2">
                                <div class="header-right">
                                    <div class="header-search-form-wrapper">
                                        <div class="cart-search-contact">
                                            {{-- <button class="search-toggle-btn"><i class="fi flaticon-search"></i></button> --}}
                                            <div class="header-search-form">
                                                <form>
                                                    <div>
                                                        <input type="text" class="form-control" placeholder="Search here...">
                                                        <button type="submit"><i class="fi flaticon-search"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end of container -->
                </nav>
            </div>
        </header>
        <!-- end of header -->
        <!-- start of hero -->
        <section class="static-hero">
            <div class="hero-container">
                <div class="hero-inner">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-6 col-12">
                                <div class="wpo-static-hero-inner">
                                    <div class="shape-1 wow fadeInUp" data-wow-duration="1400ms">
                                        <img src="{{ asset('theme-front/casamiento/images/slider/shape1.svg') }}" alt="">
                                    </div>
                                    <div class="slide-title wow fadeInUp" data-wow-duration="1500ms">
                                        <h2 style="font-size: 75px">Belén & José Maria</h2>
                                    </div>
                                    <div data-swiper-parallax="400" class="slide-text wow fadeInUp" data-wow-duration="1600ms">
                                        <p>¡Nos Casamos!</p>
                                    </div>
                                    <div class="wpo-wedding-date wow fadeInUp" data-wow-duration="1700ms">
                                        <div class="clock-grids">
                                            <ul class="counter">
                                                <li><div><span id="d"></span><span class="days">Días</span></div></li>
                                                <li><div><span id="h"></span><span class="hours">Hrs</span></div></li>
                                                <li><div><span id="m"></span><span class="minutes">Min</span></div></li>
                                                <li><div><span id="s"></span><span class="seconds">Seg</span></div></li>
                                                </ul>
                                        </div>
                                    </div>
                                    <div class="shape-2 wow fadeInUp" data-wow-duration="1800ms"><img src="{{ asset('theme-front/casamiento/images/slider/shape2.svg') }}" alt=""></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="static-hero-right">
                <div class="static-hero-img scene" id="scene">
                    <div class="static-hero-img-inner">
                        <img src="{{ asset('theme-front/casamiento/images/slider/hero-1.png') }}" alt="">
                    </div>

                    <div class="static-hero-shape-4 wow fadeInUp" data-wow-delay=".5s">
                            <img src="{{ asset('theme-front/casamiento/images/slider/shape6.svg') }}" alt="">
                    </div>
                </div>
                <div class="static-hero-img-bg">
                    <img src="{{ asset('theme-front/casamiento/images/slider/hero-bg.jpg') }}" alt="">
                </div>
            </div>
            <div class="right-shape">
                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 650 597" fill="none">
                    <path d="M717 0C717 0 527.91 0 475.696 129.736C423.481 259.472 501.092 358.185 396.683 423.034C292.274 487.902 74.9839 485.573 26.2847 646.096C-22.3947 806.598 11.4538 863 11.4538 863L653.509 803.776L717 0Z"></path>
                </svg>
            </div>
        </section>
        <!-- end of hero slider -->
        <!-- start couple-section -->
        <section class="wpo-couple-section section-padding" id="couple">
            <div class="container">
                <div class="couple-area clearfix">
                    <div class="row align-items-center">
                        <div class="col col-md-12 col-12">
                            <div class="couple-item">
                                <div class="couple-img-wrap wow fadeInLeftSlow" data-wow-duration="1700ms">
                                    <div class="couple-img" style="mask-image: url({{ asset('theme-front/casamiento/images/couple/mask-1.svg') }}); -webkit-mask-image: url({{ asset('theme-front/casamiento/images/couple/mask-1.svg') }});">
                                        <img src="{{ asset('theme-front/casamiento/images/couple/1.png') }}" alt="">
                                    </div>
                                    <div class="c-shape">
                                        <img src="{{ asset('theme-front/casamiento/images/couple/image-bg.svg') }}" alt="">
                                    </div>
                                </div>
                                <div class="couple-text wow fadeInRightSlow" data-wow-duration="1700ms">
                                    <h3 style="font-size: 55px">Maria Belén Ruiu</h3>

                                </div>
                            </div>
                        </div>
                        <div class="col col-md-12 col-12">
                            <div class="couple-item">
                                <div class="couple-img-wrap wow fadeInRightSlow" data-wow-duration="1700ms">
                                    <div class="couple-img" style="mask-image: url({{ asset('theme-front/casamiento/images/couple/mask-2.svg') }}); -webkit-mask-image: url({{ asset('theme-front/casamiento/images/couple/mask-2.svg') }});">
                                        <img src="{{ asset('theme-front/casamiento/images/couple/2.png') }}" alt="">
                                    </div>
                                    <div class="c-shape">
                                        <img src="{{ asset('theme-front/casamiento/images/couple/image-bg.svg') }}" alt="">
                                    </div>
                                </div>
                                <div class="couple-text wow fadeInLeftSlow" data-wow-duration="1700ms">
                                    <h3 style="font-size: 55px">José Maria Soraire</h3>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
            <div class="shape-1">
                <svg viewbox="0 0 1920 692" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.1">
                        <path class="stroke-color" d="M-11 689C176.333 697 609 669.4 841 495L1111 279C1263.67 154.333 1640.6 -71.0002 1927 24.9998" stroke="" stroke-width="2"></path>
                        <path d="M-11 689C176.333 697 609 669.4 841 495L1111 279C1263.67 154.333 1640.6 -71.0002 1927 24.9998" stroke="black" stroke-opacity="0.2" stroke-width="2"></path>
                    </g>
                    <g opacity="0.1">
                        <path class="stroke-color" d="M1927 689C1739.67 697 1307 669.4 1075 495L805 279C652.333 154.333 275.4 -71.0002 -11 24.9998" stroke="" stroke-width="2"></path>
                        <path d="M1927 689C1739.67 697 1307 669.4 1075 495L805 279C652.333 154.333 275.4 -71.0002 -11 24.9998" stroke="black" stroke-opacity="0.2" stroke-width="2"></path>
                    </g>
                    <path class="fill-color" d="M879 397C501.4 54.5998 135 31.6665 -1 62.9998V649C579.8 636.2 827.667 475.667 879 397Z" fill=""></path>
                    <path class="fill-color" d="M1041 397C1418.6 54.5998 1785 31.6665 1921 62.9998V649C1340.2 636.2 1092.33 475.667 1041 397Z" fill=""></path>
                </svg>
            </div>
        </section>
        <!-- end couple-section -->

        <!-- start wpo-portfolio-section -->
        <section class="wpo-portfolio-section section-padding" id="gallery">
            <h2 class="hidden">some</h2>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="portfolio-grids gallery-container clearfix portfolio-slide owl-carousel">
                            <div class="grid">
                                <div class="img-holder">
                                    <a href="{{ asset('theme-front/casamiento/images/portfolio/1.png') }}" class="fancybox" data-fancybox-group="gall-1">
                                        <img src="{{ asset('theme-front/casamiento/images/portfolio/1.png') }}" alt="" class="img img-responsive">
                                        <div class="hover-content">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-holder">
                                    <a href="{{ asset('theme-front/casamiento/images/portfolio/2.png') }}" class="fancybox" data-fancybox-group="gall-1">
                                        <img src="{{ asset('theme-front/casamiento/images/portfolio/2.png') }}" alt="" class="img img-responsive">
                                        <div class="hover-content">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-holder">
                                    <a href="{{ asset('theme-front/casamiento/images/portfolio/3.png') }}" class="fancybox" data-fancybox-group="gall-1">
                                        <img src="{{ asset('theme-front/casamiento/images/portfolio/3.png') }}" alt="" class="img img-responsive">
                                        <div class="hover-content">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-holder">
                                    <a href="{{ asset('theme-front/casamiento/images/portfolio/4.png') }}" class="fancybox" data-fancybox-group="gall-1">
                                        <img src="{{ asset('theme-front/casamiento/images/portfolio/4.png') }}" alt="" class="img img-responsive">
                                        <div class="hover-content">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-holder">
                                    <a href="{{ asset('theme-front/casamiento/images/portfolio/5.png') }}" class="fancybox" data-fancybox-group="gall-1">
                                        <img src="{{ asset('theme-front/casamiento/images/portfolio/5.png') }}" alt="" class="img img-responsive">
                                        <div class="hover-content">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-holder">
                                    <a href="{{ asset('theme-front/casamiento/images/portfolio/6.png') }}" class="fancybox" data-fancybox-group="gall-1">
                                        <img src="{{ asset('theme-front/casamiento/images/portfolio/6.png') }}" alt="" class="img img-responsive">
                                        <div class="hover-content">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end wpo-portfolio-section -->


            <!-- start wpo-event-section -->
            <section class="wpo-event-section section-padding" id="event">
                <div class="container">
                    <div class="wpo-section-title">
                        <span>Evento</span>
                        <h2 style="font-size: 50px">Cuando y Donde</h2>
                    </div>
                    <div class="wpo-event-wrap">
                        <div class="row">
                            <div class="col col-lg-4 col-md-6 col-12">
                                <div class="wpo-event-item wow fadeInUp" data-wow-duration="1000ms">
                                    <div class="wpo-event-img">
                                        <div class="wpo-event-img-inner">
                                            <img src="{{ asset('theme-front/casamiento/images/event/1.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="wpo-event-text">
                                        <div class="title">
                                            <h2>Ceremonia</h2>
                                        </div>
                                        <ul>
                                            <li>Sabado, 01 Jun. 2024 <br>
                                                16:45</li>
                                            <li>Capilla Santa Lucía, Ruta 308, Km 5, Marapa, Alberdi</li>
                                            <li> <a class="popup-gmaps" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3535.4160915825637!2d-65.64525549999999!3d-27.6116271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9423e92c062c1beb%3A0xf4152e58a32c58d3!2sCapilla%20Santa%20Luc%C3%ADa!5e0!3m2!1ses-419!2sar!4v1713025298043!5m2!1ses-419!2sar">Ubicación</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-4 col-md-6 col-12">
                                <div class="wpo-event-item wow fadeInUp" data-wow-duration="1200ms">
                                    <div class="wpo-event-img">
                                        <div class="wpo-event-img-inner">
                                            <img src="{{ asset('theme-front/casamiento/images/event/2.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="wpo-event-text">
                                        <div class="title">
                                            <h2>Civil</h2>
                                        </div>
                                        <ul>
                                            <li>Sabado, 01 Jun. 2024 <br>
                                                18:00</li>
                                            <li>Salón La Serviliana, ,Ruta 308, Km 5, Marapa, Alberdi </li>
                                            <li> <a class="popup-gmaps" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3535.4380992168158!2d-65.6446677!3d-27.610945200000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9423e97b313426ff%3A0x260819936a6f768!2sLa%20Serviliana%20Multiespacio!5e0!3m2!1ses-419!2sar!4v1713025385914!5m2!1ses-419!2sar">Ubicación</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-4 col-md-6 col-12">
                                <div class="wpo-event-item wow fadeInUp" data-wow-duration="1400ms">
                                    <div class="wpo-event-img">
                                        <div class="wpo-event-img-inner">
                                            <img src="{{ asset('theme-front/casamiento/images/event/3.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="wpo-event-text">
                                        <div class="title">
                                            <h2>Fiesta</h2>
                                        </div>
                                        <ul>
                                            <li>Sabado, 01 Jun. 2024 <br>
                                                18:30 - 3:00</li>
                                                <li>Salón La Serviliana, ,Ruta 308, Km 5, Marapa, Alberdi </li>
                                                <li> <a class="popup-gmaps" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3535.4380992168158!2d-65.6446677!3d-27.610945200000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9423e97b313426ff%3A0x260819936a6f768!2sLa%20Serviliana%20Multiespacio!5e0!3m2!1ses-419!2sar!4v1713025385914!5m2!1ses-419!2sar">Ubicación</a></li>
                                            </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container -->
            </section>


 <!-- start wpo-event-section -->
 <section class="wpo-event-section section-padding" id="acompañanos">
    <div class="container">
        <div class="wpo-section-title">
            <span>Junto a Nosotros</span>
            <h2 style="font-size: 50px">Esperamos que nos acompañes!</h2>
        </div>
        <div class="wpo-event-wrap">
            <div class="row">
                <div class="col col-lg-4 col-md-6 col-12">
                    <div class="wpo-event-item wow fadeInUp" data-wow-duration="1000ms">
                        <div class="wpo-event-img">
                            <div class="wpo-event-img-inner">
                                <img src="{{ asset('theme-front/casamiento/images/event/travelmarried.png') }}" alt="">
                            </div>
                        </div>
                        <div class="wpo-event-text">
                            <div class="title">
                                <h2>Regalo</h2>
                            </div>
                            <ul>
                                <li>CBU: 2850600140001035210905 <br>
                                    Alias: Belen.Ruiu <br>Nombre de la cuenta: MARIA BELEN RUIU
                                </li>
                            </ul>
                            <span>No habrá urna en el salón - Por otros regalos <a target="_blank" href="https://wa.me/5493865202297">ponete en contacto con nosotros!</a> </span>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4 col-md-6 col-12">
                    <div class="wpo-event-item wow fadeInUp" data-wow-duration="1200ms">
                        <div class="wpo-event-img">
                            <div class="wpo-event-img-inner">
                                <img src="{{ asset('theme-front/casamiento/images/event/spotify.png') }}" alt="">
                            </div>
                        </div>
                        <div class="wpo-event-text">
                            <div class="title">
                                <h2>Música</h2>
                            </div>
                            <ul>
                                <li>¡Haz que nuestra fiesta sea inolvidable! Agrega las canciones que no pueden faltar a nuestra playlist <br></li>
                                <li>
                                    <a style="color: whitesmoke; text-decoration: none;" class="button" target="_blank" href="https://open.spotify.com/playlist/6SFO3wi5TDka9OEkU2Oxjx?si=iPSXQpZuQne8pLqywX7wcQ&pt=f395beb68a7ae4f2254bddfd0a8bc08c&pi=u-uyE8kac_To-3">Spotify</a>                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4 col-md-6 col-12">
                    <div class="wpo-event-item wow fadeInUp" data-wow-duration="1400ms">
                        <div class="wpo-event-img">
                            <div class="wpo-event-img-inner">
                                <img src="{{ asset('theme-front/casamiento/images/event/party.png') }}" alt="">
                            </div>
                        </div>
                        <div class="wpo-event-text">
                            <div class="title">
                                <h2>Comparte tus Fotografías</h2>
                            </div>

                            <ul>
                                <li>¡Comparte tus fotos de la fiesta!</li>
                                <li>
                                    <form action="{{ url('/upload') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label for="image">Selecciona una foto:</label>
                                        <label for="image" class="custom-file-upload">
                                            <i class="fas fa-cloud-upload-alt"></i> Seleccionar o Tomar Foto
                                          </label>
                                          <input type="file" name="image" id="image" style="display:none;">
                                        {{-- <input type="file" name="image" id="image"> --}}
                                        <button class="button" type="submit">Cargar Foto a la galería</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>

        <!-- start of wpo-contact-section -->
        <section class="wpo-contact-section section-padding" id="asistencia">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col col-xl-4 col-lg-6 col-md-6 col-12">
                        <div class="wpo-contact-section-wrapper">
                            <div class="wpo-section-title">
                                <h2>Confirmar asistencia?</h2>
                            </div>
                            <div class="wpo-contact-form-area">

                            <form method="post" class="contact-validation-active"  action="{{ route('contact.submit') }}">
                                @csrf
                                    <div>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre y Apellido">

                                    </div>
                                    <div>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                    </div>
                                    <div class="radio-buttons">
                                        <p>
                                            <input type="radio" id="attend" name="asistencia" checked="" value="si-asistire">
                                            <label for="attend">Si!, Ahí estaré</label>
                                        </p>
                                        <p>
                                            <input type="radio" id="not" name="asistencia" value="no-asistire">
                                            <label for="not">Perdón, No podré asistir</label>
                                        </p>
                                    </div>

                                    <div class="submit-area">
                                        <button type="submit" class="theme-btn">Enviar Asistencia</button>
                                        <div id="c-loader">
                                            <i class="ti-reload"></i>
                                        </div>
                                    </div>
                                    <div class="clearfix error-handling-messages">
                                        <div id="success">Muchas Gracias!, Asistencia Enviada</div>
                                        <div id="error"> Se produjo un error al enviar la asistencia. Por favor, inténtelo de nuevo más tarde.
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-bg">
                <svg viewbox="0 0 1920 634" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="bg-path" d="M207 286C162.2 87.6 39 44.6667 -17 48L-91 22L-71 726H13L1977 670L1957 424C1926.6 318.4 1815 392 1763 442C1619.8 570 1503.33 495.333 1463 442C1270.2 162.8 1197.33 325.667 1185 442C1159.4 584.4 1117 537.333 1099 496C953.4 192.8 868.333 328.333 844 434C791.2 649.2 649.333 555.667 585 482C455.4 356.4 380.333 429.667 359 482C315 616.4 273.333 547.333 258 496L207 286Z" fill=""></path>
                    <path class="bg-stroke" d="M207 266C162.2 67.6 39 24.6667 -17 28L-91 2L-71 706H13L1977 650L1957 404C1926.6 298.4 1815 372 1763 422C1619.8 550 1503.33 475.333 1463 422C1270.2 142.8 1197.33 305.667 1185 422C1159.4 564.4 1117 517.333 1099 476C953.4 172.8 868.333 308.333 844 414C791.2 629.2 649.333 535.667 585 462C455.4 336.4 380.333 409.667 359 462C315 596.4 273.333 527.333 258 476L207 266Z" stroke="" stroke-width="2"></path>
                </svg>

                <div class="shape-1">
                    <img src="{{ asset('theme-front/casamiento/images/rsvp/shape.svg') }}" alt="">
                </div>
                <div class="shape-2 wow fadeInUp" data-wow-duration="1000ms">
                    <img src="{{ asset('theme-front/casamiento/images/rsvp/shape2.svg') }}" alt="">
                </div>
                <div class="shape-3 wow fadeInUp" data-wow-duration="1200ms">
                    <img src="{{ asset('theme-front/casamiento/images/rsvp/shape3.svg') }}" alt="">
                </div>
                <div class="shape-4 wow fadeInUp" data-wow-duration="1400ms">
                    <img src="{{ asset('theme-front/casamiento/images/rsvp/shape4.svg') }}" alt="">
                </div>
                <div class="shape-5 wow fadeInUp" data-wow-duration="1600ms">
                    <img src="{{ asset('theme-front/casamiento/images/rsvp/shape5.svg') }}" alt="">
                </div>
                <div class="shape-6 wow fadeInUp" data-wow-duration="1800ms">
                    <img src="{{ asset('theme-front/casamiento/images/rsvp/shape6.svg') }}" alt="">
                </div>
            </div>
        </section>



    @section('scripts')
         @include('webcontent::website.casamiento.layouts.scripts')
         @include('webcontent::website.casamiento.js.dropify')
     @show


</body>

@extends('webcontent::website.casamiento.layouts.footer')

</html>
