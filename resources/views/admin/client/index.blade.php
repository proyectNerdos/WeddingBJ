{{-- Extiende la plantilla base --}}
@extends('layouts.theme-admin.volgh.index')

{{-- Sección del título del módulo --}}
@section('title-module')
    <div>
        <h1 class="page-title"><img src="{{ url('theme-admin/volgh/assets/images/icon/roles.svg') }}" alt="" width="50" height="50" class="responsive"> Sección de Cliente / Proveedor</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{!! URL::to('/category') !!}">Cliente</a></li>
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
                                    @permission('client-create')
                                    <span data-placement="top" data-toggle="tooltip" title="Crear Nuevo Cliente" class='pr-2'>
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
                                    <h3 class="card-title">Lista de Clientes / Proveedores</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered text-nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th width="1"></th>
                                                     <th>Nombre / Empresa</th>
                                                     <th>Operaciones</th>
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
@include('admin.client.modal.show')
<!--modal crear Categoria-->
@include('admin.client.modal.create')
<!--modal Editar Categoria-->
@include('admin.client.modal.edit')
<!--modal Eliminar Categoria-->
@include('admin.client.modal.delete')
<!--modal Eliminar muchas categorias-->
@include('admin.client.modal.massDelete')

@section('mis-scripts')

{{-- include datatable --}}
@include('admin.client.js.datatable')

@stop


@endsection
