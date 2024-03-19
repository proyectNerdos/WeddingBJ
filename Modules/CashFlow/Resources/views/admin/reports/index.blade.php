{{-- Extiende la plantilla base --}}
@extends('layouts.theme-admin.volgh.index')

{{-- Sección del título del módulo --}}
@section('title-module')
    <div>
        <h1 class="page-title"><img src="{{ asset('theme-admin/volgh/assets/images/icon/gastos.svg') }}" alt="" width="50" height="50" class="responsive"> Reportes</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.cashflow.index') }}">Flujo de Efectivo</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.cashflow.reports.index') }}">Reportes</a></li>
            </ol>
    </div>
@endsection

{{-- Contenido principal --}}
@section('content')
@include('flash::message')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <h4 class="card-title">
                        <div class="form-actions">
                            <div class="btn-list">
                                <div class="row justify-content-end">

                                </div>
                            </div>
                        </div>
                    </h4>



                    <br><br>


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="my-3 ml-5">
                                    <h3 class="card-title">Datos totales</h3>
                                </div>

                                <div class="mx-5">
                                    <div class="row row-cards">

                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                            <div class="card bg-dark img-card box-dark-shadow">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="text-white">
                                                            <h2 class="mb-0 number-font">{{$totalIngresos}}</h2>
                                                            <p class="text-white mb-0">Ingresos Totales</p>
                                                        </div>
                                                        <div class="ml-auto"> <i class="fas fa-dollar-sign text-white fs-30 mr-2 mt-2"></i> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- COL END -->

                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                            <div class="card bg-info img-card box-info-shadow">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="text-white">
                                                            <h2 class="mb-0 number-font">{{$totalEgresos}}</h2>
                                                            <p class="text-white mb-0">Egresos Totales</p>
                                                        </div>
                                                        <div class="ml-auto"> <i class="fas fa-dollar-sign text-white fs-30 mr-2 mt-2"></i> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- COL END -->

                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                            <div class="card  bg-success img-card box-success-shadow">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="text-white">
                                                            <h2 class="mb-0 number-font">{{$gananciasTotales}}</h2>
                                                            <p class="text-white mb-0">Ganancias Totales</p>
                                                        </div>
                                                        <div class="ml-auto"> <i class="fas fa-dollar-sign text-white fs-30 mr-2 mt-2"></i> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- COL END -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>




@section('mis-scripts')



@stop


@endsection
