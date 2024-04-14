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
                                    <a class="navbar-brand" href="index.html">Sí, quiero!</a>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-1 col-1">
                                <div id="navbar" class="collapse navbar-collapse navigation-holder">
                                    <button class="menu-close"><i class="ti-close"></i></button>
                                    <ul class="nav navbar-nav mb-2 mb-lg-0">
                                        <li class="menu-item-has-children">
                                            <a class="active" href="#">Home</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="nosotros">Nosotros</a>

                                        <li class="menu-item-has-children">
                                            <a href="fotos.html">Fotos</a>

                                        </li>
                                        <li><a href="#event">Ceremonia y Fiesta</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="asistencia">Asistencia</a>
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

        <!-- start wpo-story-section -->
        {{-- <section class="wpo-story-section section-padding" id="story">
            <div class="container">
                <div class="wpo-section-title">
                    <span>Our Story</span>
                    <h2>How it Happened</h2>
                </div>
                <div class="wpo-story-wrap">
                    <div class="wpo-story-item">
                        <div class="wpo-story-img-wrap">
                            <div class="wpo-story-img wow zoomIn" data-wow-duration="1000ms">
                                <img src="{{ asset('theme-front/casamiento/images/story/1.jpg') }}" alt="">
                            </div>
                            <div class="wpo-img-shape">
                                <img src="{{ asset('theme-front/casamiento/images/story/shape.png') }}" alt="">
                            </div>
                        </div>
                        <div class="wpo-story-content">
                            <div class="wpo-story-content-inner wow fadeInRightSlow" data-wow-duration="1700ms">
                                <span>15 June, 2014</span>
                                <h2>How we meet</h2>
                                <p>Consectetur adipiscing elit. Fringilla at risus orci, tempus facilisi sed. Enim
                                    tortor, faucibus netus orci donec volutpat adipiscing. Sit condimentum elit
                                    convallis libero. Nunc in eu tellus ipsum placerat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="wpo-story-item">
                        <div class="wpo-story-img-wrap">
                            <div class="wpo-story-img wow zoomIn" data-wow-duration="1000ms">
                                <img src="{{ asset('theme-front/casamiento/images/story/2.jpg') }}" alt="">
                            </div>
                            <div class="clip-shape">
                                <svg viewbox="0 0 382 440" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M191 0L381.526 110V330L191 440L0.474411 330V110L191 0Z"></path>
                                </svg>
                            </div>
                            <div class="wpo-img-shape">
                                <img src="{{ asset('theme-front/casamiento/images/story/shape2.png') }}" alt="">
                            </div>
                        </div>
                        <div class="wpo-story-content">
                            <div class="wpo-story-content-inner wow fadeInLeftSlow" data-wow-duration="1700ms">
                                <span>02 Nov, 2020</span>
                                <h2>He proposed, I said yes</h2>
                                <p>Consectetur adipiscing elit. Fringilla at risus orci, tempus facilisi sed. Enim
                                    tortor, faucibus netus orci donec volutpat adipiscing. Sit condimentum elit
                                    convallis libero. Nunc in eu tellus ipsum placerat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="wpo-story-item">
                        <div class="wpo-story-img-wrap">
                            <div class="wpo-story-img wow zoomIn" data-wow-duration="1000ms">
                                <img src="{{ asset('theme-front/casamiento/images/story/3.jpg') }}" alt="">
                            </div>
                            <div class="wpo-img-shape">
                                <img src="{{ asset('theme-front/casamiento/images/story/shape3.png') }}" alt="">
                            </div>
                        </div>
                        <div class="wpo-story-content">
                            <div class="wpo-story-content-inner wow fadeInRightSlow" data-wow-duration="1700ms">
                                <span>15 Apr, 2021</span>
                                <h2>Our Engagement Day</h2>
                                <p>Consectetur adipiscing elit. Fringilla at risus orci, tempus facilisi sed. Enim
                                    tortor, faucibus netus orci donec volutpat adipiscing. Sit condimentum elit
                                    convallis libero. Nunc in eu tellus ipsum placerat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
            <div class="flower-shape-1">
                <img src="{{ asset('theme-front/casamiento/images/story/flower-shape1.svg') }}" alt="">
            </div>
            <div class="flower-shape-2">
                <img src="{{ asset('theme-front/casamiento/images/story/flower-shape2.svg') }}" alt="">
            </div>
            <div class="flower-shape-3">
                <img src="{{ asset('theme-front/casamiento/images/story/flower-shape3.svg') }}" alt="">
            </div>
            <div class="flower-shape-4">
                <img src="{{ asset('theme-front/casamiento/images/story/flower-shape4.svg') }}" alt="">
            </div>
        </section> --}}
        <!-- end story-section -->

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
                                                16:30 – 17:00 </li>
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
                                            <h2>Recepción</h2>
                                        </div>
                                        <ul>
                                            <li>Sabado, 01 Jun. 2024 <br>
                                                18:30 – 21:00</li>
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
                                                21:00 - 3:00</li>
                                                <li>Salón La Serviliana, ,Ruta 308, Km 5, Marapa, Alberdi </li>
                                                <li> <a class="popup-gmaps" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3535.4380992168158!2d-65.6446677!3d-27.610945200000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9423e97b313426ff%3A0x260819936a6f768!2sLa%20Serviliana%20Multiespacio!5e0!3m2!1ses-419!2sar!4v1713025385914!5m2!1ses-419!2sar">Ubicación</a></li>
                                            </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                                    {{-- Spotify --}}

                        <div class="wpo-event-section section-padding spotify wow fadeInRightSlow" id="spotify">
                            <div class="button_spotify">
                                <div class="wpo-section-title">
                                    <span>Agrega tu musica para la fiesta! <br><h2>Playlist</h2></span>
                                </div>
                                <a target="_blank" class="popup gmaps" href="https://open.spotify.com/playlist/2LWCRYGXQ7OMNPfo3a5YGG?si=Eklamt4STQuaaAdQesfX6Q&pt=0baf40013519eabe533693a301d4d799&pi=u-2CCBzP__SuSC">
                                    <img src="{{ asset('/theme-front/casamiento/images/button_spotify_wedding.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container -->
            </section>


{{-- Regalo --}}


<section class="wpo-event-section section-padding" id="event">
    <div class="container">
        <div class="wpo-section-title">
            {{-- <span>Regalo</span> --}}
            <h2 style="font-size: 50px">Regalo</h2>
            <p>Dejamos un número de cuenta para ayudarnos en nuestro viaje de Luna de Miel </p>
        </div>
        <div class="wpo-event-wrap">
            <div class="row">
                <div class="col-12">
                    <div class="wpo-event-item wow fadeInUp" data-wow-duration="1200ms">
                        <div class="wpo-event-img">
                            <div class="wpo-event-img-inner">
                                <img src="{{ asset('theme-front/casamiento/images/event/travelmarried.png') }}" alt="">
                            </div>
                        </div>
                        <div class="wpo-event-text">
                            <div class="title">
                                <h2>Información</h2>
                            </div>
                            <ul>
                                <li>CBU: 123456789987654312 <br>
                                    Alias: joseybelen.nx <br>Nombre de la cuenta: Belen Ruiu</li>
                            </ul>
                            <span>No habrá urna en el salón</span>
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
                                <form method="post" class="contact-validation-active" id="contact-form-main">
                                    <div>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre y Apellido">
                                    </div>
                                    <div>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                    </div>
                                    <div class="radio-buttons">
                                        <p>
                                            <input type="radio" id="attend" name="radio-group" checked="">
                                            <label for="attend">Si!, Ahí estaré</label>
                                        </p>
                                        <p>
                                            <input type="radio" id="not" name="radio-group">
                                            <label for="not">Perdón, No podré asistir</label>
                                        </p>
                                    </div>
                                    <div>
                                        <select name="guest" class="form-control">
                                            <option disabled="disabled" selected="">Número de asistencia</option>
                                            <option>01</option>
                                            <option>02</option>
                                            <option>03</option>
                                            <option>04</option>
                                            <option>05</option>
                                        </select>
                                    </div>
                                    <div>
                                        <input type="text" class="form-control" name="what" id="what" placeholder="Dejanos un mensaje!">
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
        <!-- end of wpo-contact-section -->

    @section('scripts')
         @include('webcontent::website.casamiento.layouts.scripts')
     @show


</body>

@extends('webcontent::website.casamiento.layouts.footer')

</html>
