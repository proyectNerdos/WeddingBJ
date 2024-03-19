{{-- Extiende la plantilla base --}}
@extends('layouts.theme-admin.volgh.index')

{{-- Sección del título del módulo --}}
@section('title-module')
    <div>
        <h1 class="page-title"><img src="{{ asset('theme-admin/volgh/assets/images/icon/transporte.svg') }}" alt="" width="50" height="50" class="responsive"> Sección de Vehículo y Fincas</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{!! URL::to('/category') !!}">Items</a></li>
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
                                    @permission('cashflow-unit-create')
                                    <span data-placement="top" data-toggle="tooltip" title="Crear Nueva Categoria" class='pr-2'>
                                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#create"><i class="fa fa-plus "> </i></button>
                                    </span>
                                    @endpermission

                                </div>
                            </div>
                        </div>
                    </h4>



                    {{-- BUSCADOR --}}
                    {{-- @include('admin.user.user.forms.search') --}}
                    {{-- BUSCADOR --}}

                    <br><br>


                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Listado de Items</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered text-nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th width="1"></th>
                                                     <th>Nombre</th>
                                                     <th>Descripcion</th>
                                                     <th>Operaciones</th>

                                                    {{-- <th>Nombre</th>
                                                    <th hidden="true">Apellido</th>
                                                    <th>DNI</th>
                                                    <th>Correo</th>
                                                    <th>Telefono</th>
                                                    <th>Operaciones</th>
                                                    <th>select</th> --}}
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



<!--modal ver Categoria-->
@include('cashflow::admin.cashflow_units.modal.show')
<!--modal crear Categoria-->
@include('cashflow::admin.cashflow_units.modal.create')
<!--modal Editar Categoria-->
@include('cashflow::admin.cashflow_units.modal.edit')
<!--modal Eliminar Categoria-->
@include('cashflow::admin.cashflow_units.modal.delete')
<!--modal Eliminar muchas categorias-->
@include('cashflow::admin.cashflow_units.modal.massDelete')




@section('mis-scripts')
    {{-- include datatable --}}
    @include('cashflow::admin.cashflow_units.js.datatable')
@stop


@endsection
