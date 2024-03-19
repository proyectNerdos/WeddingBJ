
@extends('layouts.theme-admin.volgh.index')




@section('title-module')
                <div>
                    <h1 class="page-title"><img src="{{ asset('theme-admin/volgh/assets/images/icon/user.svg') }}" alt="" width="50" height="50" class="responsive"> Seccion de Roles</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{!! URL::to('/user') !!}">Usuarios</a></li>
                        <li class="breadcrumb-item active"><a href="{!! URL::to('/user-roles') !!}">Roles</a></li>
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
                                                <span data-placement="top" data-toggle="tooltip" title="Crear Rol" class='pr-2'>
                                                    <button type="button" class="btn btn-primary " data-toggle="modal"
                                                        data-target="#create-roles"><i class="fa fa-plus "> </i></button>
                                                </span>
                                                <span data-placement="top" data-toggle="tooltip"
                                                    title="Seleccionar/Deseleccionar Todo" class='pr-2'>
                                                    <button type="button" class="btn btn-success" onclick="SeleccionarTodo();"><i
                                                            class="fa fa-check" style="color:black;"> </i></button>
                                                </span>
                                                <span data-placement="top" data-toggle="tooltip" title="Eliminar" class='pr-2'>
                                                    <button type="button" class="btn btn-danger" id="enviar" data-toggle="modal"
                                                        data-target="#delete-roles"><i class="fa fa-trash"> </i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </h4>



{{-- <ul class="nav nav-tabs" role="tablist">
    @include('admin.user.partials.menu')
</ul> --}}

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
                                                <th>#Id</th>
                                                <th>Nombre</th>
                                                <th>Slug</th>
                                                <th>Descripcion</th>
                                                <th>Level</th>
                                                <th>Operaciones</th>
                                                <th>Select</th>
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


<!--modal crear roles-->
@include('admin.user.roles.modal.create-roles')
<!--modal Editar roles-->
 {{-- @include('admin.user.roles.modal.edit-roles') --}}
 <!--modal Eliminar roles-->
 @include('admin.user.roles.modal.delete-roles')




@section('mis-scripts')
{{-- IMPUTMASK --}}
{{-- @include('admin.user.roles.js.inputmask') --}}
{{-- FUNCIONES --}}
{{-- @include('admin.user.roles.js.funciones') --}}
{{-- DATATABLE --}}
@include('admin.user.roles.js.datatable')
{{-- SWITCH --}}
{{-- @include('admin.user.roles.js.switch') --}}
{{-- MODAL AJAX --}}
@include('admin.user.roles.js.modal-datos')

{{-- CIUDADES --}}
{{-- {!!Html::script('plugins/ciudades/countrystatecity.js')!!}  --}}
@stop



@endsection


