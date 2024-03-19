{{-- Extiende la plantilla base --}}
@extends('layouts.theme-admin.volgh.index')

@section('other-css')

@endsection

{{-- Sección del título del módulo --}}
@section('title-module')
    <div>
        <h1 class="page-title"><img src="{{ asset('theme-admin/volgh/assets/images/icon/gastos.svg') }}" alt="" width="50" height="50" class="responsive"> Flujo de Efectivo</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{!! URL::to('/cashflow') !!}">Flujo de Efectivo</a></li>
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
                                    @permission('cashflow-create')
                                    <span data-placement="top" data-toggle="tooltip" title="Crear Nuevo Flujo de Efectivo" class='pr-2'>
                                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#create"><i class="fa fa-plus "> </i></button>
                                    </span>
                                    @endpermission

                                </div>
                            </div>
                        </div>
                    </h4>



                    {{-- BUSCADOR --}}
                    @include('cashflow::admin.cashflow.forms.search')
                    {{-- BUSCADOR --}}

                    <br><br>


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="my-3 ml-5">
                                    <h3 class="card-title">Datos totales</h3>
                                </div>

                                <div class="mx-5">
                                    {{-- CARD PESOS --}}
                                    <div class="row row-cards">

                                        <!-- Ingresos Totales -->
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                            <div class="card bg-dark img-card box-dark-shadow">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="text-white">
                                                            <h2 class="mb-0 number-font" id="totalIngresos">0</h2> <!-- ID para actualizar con jQuery -->
                                                            <p class="text-white mb-0">Ingresos Totales</p>
                                                        </div>
                                                        <div class="ml-auto"> <i class="fas fa-dollar-sign text-white fs-30 mr-2 mt-2"></i> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- COL END -->

                                        <!-- Egresos Totales -->
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                            <div class="card bg-info img-card box-info-shadow">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="text-white">
                                                            <h2 class="mb-0 number-font" id="totalEgresos">0</h2> <!-- ID para actualizar con jQuery -->
                                                            <p class="text-white mb-0">Egresos Totales</p>
                                                        </div>
                                                        <div class="ml-auto"> <i class="fas fa-dollar-sign text-white fs-30 mr-2 mt-2"></i> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- COL END -->

                                        <!-- Ganancias Totales -->
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                            <div class="card bg-success img-card box-success-shadow">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="text-white">
                                                            <h2 class="mb-0 number-font" id="gananciasTotales">0</h2> <!-- ID para actualizar con jQuery -->
                                                            <p class="text-white mb-0">Ganancias Totales</p>
                                                        </div>
                                                        <div class="ml-auto"> <i class="fas fa-dollar-sign text-white fs-30 mr-2 mt-2"></i> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- COL END -->

                                    </div>
                                    {{-- CARD USD --}}
                                    <div class="row row-cards">
                                        <!-- Ingresos Totales USD -->
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                            <div class="card bg-dark img-card box-dark-shadow">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="text-white">
                                                            <h2 class="mb-0 number-font" id="totalIngresosUsd">0</h2> <!-- ID para actualizar con jQuery -->
                                                            <p class="text-white mb-0">Ingresos Totales</p>
                                                        </div>
                                                        <div class="ml-auto"><i class="text-white fs-30 mr-2 mt-2">USD</i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- COL END -->

                                        <!-- Egresos Totales  USD-->
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                            <div class="card bg-info img-card box-info-shadow">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="text-white">
                                                            <h2 class="mb-0 number-font" id="totalEgresosUsd">0</h2> <!-- ID para actualizar con jQuery -->
                                                            <p class="text-white mb-0">Egresos Totales</p>
                                                        </div>
                                                        <div class="ml-auto"><i class="text-white fs-30 mr-2 mt-2">USD</i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- COL END -->

                                        <!-- Ganancias Totales USD-->
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                            <div class="card bg-success img-card box-success-shadow">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="text-white">
                                                            <h2 class="mb-0 number-font" id="gananciasTotalesUsd">0</h2> <!-- ID para actualizar con jQuery -->
                                                            <p class="text-white mb-0">Ganancias Totales</p>
                                                        </div>
                                                        <div class="ml-auto"><i class="text-white fs-30 mr-2 mt-2">USD</i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- COL END -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tabla de Caja</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered text-nowrap w-100">
                                            <thead>
                                                <tr>
                                                    {{-- <th></th> --}}
                                                    <th width="1"></th>
                                                    <th>OPERACIONES</th>
                                                    <th>Fecha</th>
                                                    <th>Tipo</th>
                                                    <th>Cliente / Proveedor</th>
                                                    <th>Remito / O.T.</th>
                                                    <th>N° Factura</th>
                                                    <th>Cento de Gasto</th>
                                                    <th>Monto($)</th>
                                                    <th>Monto(USD)</th>
                                                    <th>Sector</th>
                                                    <th>Item</th>
                                                    <th>Item Cat./Sub Cat.</th>
                                                    <th>Operario</th>
                                                    <th>Ayudante Uno</th>
                                                    <th>Ayudante Dos</th>
                                                    <th>Descripcion</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- TABLE WRAPPER -->
                            </div>
                            <!-- SECTION WRAPPER -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




<!--modal crear Sector-->
@include('cashflow::admin.cashflow.modal.create')
<!--modal ver Sector-->
@include('cashflow::admin.cashflow.modal.show')
<!--modal Eliminar Sector-->
@include('cashflow::admin.cashflow.modal.delete')
<!--modal Eliminar muchas Sectors-->
@include('cashflow::admin.cashflow.modal.massDelete')



@section('mis-scripts')

{{-- include datatable --}}
@include('cashflow::admin.cashflow.js.datatable')
{{-- include search --}}
@include('cashflow::admin.cashflow.js.search')
{{-- include datetimepicker --}}
@include('cashflow::admin.cashflow.js.datepicker')
{{-- include inputmask --}}
@include('cashflow::admin.cashflow.js.inputmask')
{{-- include select2 --}}
@include('cashflow::admin.cashflow.js.select2')
{{-- include sweetalert2 --}}


@stop
@endsection
