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
                                            <a  href="{{ route('home') }}">Home</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="{{ route('home') }}#event">Evento</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="{{ route('home') }}#acompañanos">Acompañanos</a>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="{{ route('galeria') }}">Fotos</a>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="{{ route('home') }}#asistencia">Confirmar Asistencia</a>
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


           <!-- start wpo-page-title -->
           <section class="wpo-page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Galería de Fotografías</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="index.html">Home</a></li>
                                <li>Gallery</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->
        <!-- start wpo-portfolio-section -->
        <section class="wpo-portfolio-section-s2 section-padding pt-120" id="gallery">
            <h2 class="hidden">some</h2>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sortable-gallery">
                            <div class="gallery-filters"></div>
                            <div class="portfolio-grids gallery-container clearfix">
                                <div class="grid">
                                    <div class="img-holder">
                                        <a href="{{ asset('theme-front/casamiento/images/portfolio/1.png') }}" class="fancybox"
                                            data-fancybox-group="gall-1">
                                            <img src="{{ asset('theme-front/casamiento/images/portfolio/1.png') }}" alt class="img img-responsive">
                                            <div class="hover-content">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="img-holder">
                                        <a href="{{ asset('theme-front/casamiento/images/portfolio/2.png') }}" class="fancybox"
                                            data-fancybox-group="gall-1">
                                            <img src="{{ asset('theme-front/casamiento/images/portfolio/2.png') }}" alt class="img img-responsive">
                                            <div class="hover-content">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="img-holder">
                                        <a href="{{ asset('theme-front/casamiento/images/portfolio/3.png') }}" class="fancybox"
                                            data-fancybox-group="gall-1">
                                            <img src="{{ asset('theme-front/casamiento/images/portfolio/3.png') }}" alt class="img img-responsive">
                                            <div class="hover-content">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="img-holder">
                                        <a href="{{ asset('theme-front/casamiento/images/portfolio/4.png') }}" class="fancybox"
                                            data-fancybox-group="gall-1">
                                            <img src="{{ asset('theme-front/casamiento/images/portfolio/4.png') }}" alt class="img img-responsive">
                                            <div class="hover-content">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="img-holder">
                                        <a href="{{ asset('theme-front/casamiento/images/portfolio/5.png') }}" class="fancybox"
                                            data-fancybox-group="gall-1">
                                            <img src="{{ asset('theme-front/casamiento/images/portfolio/5.png') }}" alt class="img img-responsive">
                                            <div class="hover-content">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="img-holder">
                                        <a href="{{ asset('theme-front/casamiento/images/portfolio/6.png') }}" class="fancybox"
                                            data-fancybox-group="gall-1">
                                            <img src="{{ asset('theme-front/casamiento/images/portfolio/6.png') }}" alt class="img img-responsive">
                                            <div class="hover-content">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end wpo-portfolio-section -->



        @section('scripts')
        @include('webcontent::website.casamiento.layouts.scripts')
    @show


</body>

@extends('webcontent::website.casamiento.layouts.footer')

</html>
