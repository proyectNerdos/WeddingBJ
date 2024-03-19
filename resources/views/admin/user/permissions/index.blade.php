
@extends('layouts.theme-admin.volgh.index')

@section('title-module')
                <div>
                    <h1 class="page-title"><img src="{{ asset('theme-admin/volgh/assets/images/icon/user.svg') }}" alt="" width="50" height="50" class="responsive"> Seccion de Permisos</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{!! URL::to('/user') !!}">Usuarios</a></li>
                        <li class="breadcrumb-item active"><a href="{!! URL::to('/user-permissions') !!}">Permisos</a></li>
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
                                                <span data-placement="top" data-toggle="tooltip" title="Crear Permiso" class='pr-2'>
                                                    <button type="button" class="btn btn-primary " data-toggle="modal"
                                                        data-target="#create-permissions"><i class="fa fa-plus "> </i></button>
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
                                                <th>Modulo Permisos</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                {{-- <th>Operaciones</th>  --}}
                                            </tr>
                                        </thead>
                                        @if($Permissions->first() != null)
                                            @foreach ($Permissions as $key => $module)
                                                <tr>
                                                    <td>{!!$key!!}</td>
                                                    @foreach ($module as $Permission)
                                                    <td>{!!$Permission->slug!!}</td>
                                                    @endforeach
                                                    {{-- <td>
                                                        <span data-placement="top" data-toggle="tooltip" title="ELIMINAR" >
                                                            <button type="button" class="btn btn-danger"  onclick="ModalDelete('{{$key}}');"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                                        </span>
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        @endif
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
@include('admin.user.permissions.modal.create-permissions')
<!--modal Editar roles-->
 {{-- @include('admin.user.permissions.modal.edit-roles') --}}
 <!--modal Eliminar roles-->
 @include('admin.user.permissions.modal.delete-permissions')




@section('mis-scripts')
{{-- IMPUTMASK --}}
{{-- @include('admin.user.roles.js.inputmask') --}}
{{-- FUNCIONES --}}
{{-- @include('admin.user.roles.js.funciones') --}}
{{-- DATATABLE --}}
{{-- @include('admin.user.permissions.js.datatable') --}}
{{-- SWITCH --}}
{{-- @include('admin.user.roles.js.switch') --}}
{{-- MODAL AJAX --}}
@include('admin.user.permissions.js.modal-datos')

{{-- CIUDADES --}}
{{-- {!!Html::script('plugins/ciudades/countrystatecity.js')!!}  --}}
@stop



@endsection


