
@extends('layouts.theme-admin.volgh.index')




@section('title-module')
                <div>
                    <h1 class="page-title"><img src="{{ url('theme-admin/volgh/assets/images/icon/user.svg') }}" alt="" width="50" height="50" class="responsive"> Seccion de Usuarios</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{!! URL::to('/user') !!}">Usuarios</a></li>
                        <li class="breadcrumb-item active"><a href="{!! URL::to('/user-roles') !!}">Roles</a></li>
                        <li class="breadcrumb-item active"><a href="#">Editar</a></li>
                    </ol>
                </div>
@endsection



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
                                                <span data-placement="top" data-toggle="tooltip" title="Crear Usuario" class='pr-2'>
                                                    <button type="button" class="btn btn-primary " data-toggle="modal"
                                                        data-target="#create-user"><i class="fa fa-plus "> </i></button>
                                                </span>

                                            </div>
                                        </div>
                                    </div>
                                </h4>



{{-- <ul class="nav nav-tabs" role="tablist">
    @include('admin.user.partials.menu')
</ul> --}}

                                <br><br>



                                {{ Form::model($roles, array('url' => array('user-roles-update', $roles->uuid), 'method' => 'PUT', 'files'=>True)) }}
                                        @include('admin.user.roles.forms.edit-roles')
                                        <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                                {!!Form::close()!!}



                            </div>
                        </div>
                    </div>
                </div>







<!--modal crear roles-->
@include('admin.user.roles.modal.create-roles')



@section('mis-scripts')
{{-- IMPUTMASK --}}
{{-- @include('admin.user.roles.js.inputmask') --}}
{{-- FUNCIONES --}}
{{-- @include('admin.user.roles.js.funciones') --}}
{{-- DATATABLE --}}
{{-- @include('admin.user.roles.js.datatable') --}}
{{-- SWITCH --}}
{{-- @include('admin.user.roles.js.switch') --}}
{{-- MODAL AJAX --}}
@include('admin.user.roles.js.modal-datos')

{{-- CIUDADES --}}
{{-- {!!Html::script('plugins/ciudades/countrystatecity.js')!!}  --}}
@stop



@endsection


