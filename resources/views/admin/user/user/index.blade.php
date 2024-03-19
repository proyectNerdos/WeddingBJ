@extends('layouts.theme-admin.volgh.index')




@section('title-module')
                <div>
                    <h1 class="page-title"><img src="{{ asset('theme-admin/volgh/assets/images/icon/user.svg') }}" alt="" width="50" height="50" class="responsive"> Seccion de Usuarios</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{!! URL::to('/user') !!}">Usuarios</a></li>
                    </ol>
                </div>
@endsection



@section('content')

@include('flash::message')

{!!Form::open(['route'=>'usuario.destroy.selected', 'method'=>'POST' , 'files'=>True])!!}



<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">


        <h4 class="card-title">
            <div class="form-actions">
                <div class="btn-list">
                    <div class="row justify-content-end">
                        @permission('user-create')
                        <span data-placement="top" data-toggle="tooltip" title="Crear Usuario" class='pr-2'>
                            <button type="button" class="btn btn-primary " data-toggle="modal"
                                data-target="#create-user"><i class="fa fa-plus "> </i></button>
                        </span>
                        @endpermission
                        <span data-placement="top" data-toggle="tooltip"
                            title="Seleccionar/Deseleccionar Todo" class='pr-2'>
                            <button type="button" class="btn btn-success" onclick="SeleccionarTodo();"><i
                                    class="fa fa-check" style="color:black;"> </i></button>
                        </span>
                        <span data-placement="top" data-toggle="tooltip" title="Eliminar" class='pr-2'>
                            <button type="button" class="btn btn-danger" id="enviar" data-toggle="modal"
                                data-target="#delete-user"><i class="fa fa-trash"> </i></button>
                        </span>
                    </div>
                </div>
            </div>
        </h4>



{{-- BUSCADOR --}}
@include('admin.user.user.forms.search')
{{-- BUSCADOR --}}

                                <br><br>


            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Data Tables</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="mydatatable" class="table table-striped table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th hidden="true">Apellido</th>
                                                <th>DNI</th>
                                                <th>Correo</th>
                                                <th>Telefono</th>
                                                <th>Operaciones</th>
                                                <th>select</th>
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






{!!Form::close()!!}


<!--modal crear usuario-->
@include('admin.user.user.modal.create-user')
<!--modal Editar user-->
 @include('admin.user.user.modal.edit-user')
 <!--modal Eliminar user-->
 @include('admin.user.user.modal.delete-user')




@section('mis-scripts')
{{-- IMPUTMASK --}}
{{-- @include('admin.user.user.js.inputmask') --}}
{{-- DATEPICKER --}}
@include('admin.user.user.js.datepicker')
{{-- FUNCIONES --}}
@include('admin.user.user.js.funciones')
{{-- BUSCADOR --}}
@include('admin.user.user.js.search')
{{-- DATATABLE --}}
@include('admin.user.user.js.datatable')
{{-- SWITCH --}}
@include('admin.user.user.js.switch')
{{-- MODAL AJAX --}}
@include('admin.user.user.js.modal-datos')
{{-- IMAGE --}}
@include('admin.user.user.js.image-upload')

{{-- CIUDADES --}}
{{-- {!!Html::script('plugins/ciudades/countrystatecity.js')!!}  --}}
@stop



@endsection


