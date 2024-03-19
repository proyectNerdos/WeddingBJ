@extends('layouts.theme-admin.volgh.index')
@section('content')



@section('title-module')
<div>
    <h1 class="page-title"><img src="{{ url('theme-admin/volgh/assets/images/icon/user.svg') }}" alt="" width="50"
            height="50" class="responsive"> Seccion de Usuarios</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{!! URL::to('/user') !!}">Usuarios</a></li>
    </ol>
</div>
@endsection




@include('flash::message')



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                @include('client.user.setting.forms.create')

            </div>
        </div>
    </div>
</div>






<!--modal editar Perfil (Avatar)-->
@include('client.user.setting.modal.edit-perfil')
<!--modal Eliminar Perfil (Avatar)-->
@include('client.user.setting.modal.delete-perfil')



@section('mis-scripts')
{{-- IMPUTMASK --}}
{{-- @include('client.user.user.js.inputmask') --}}
{{-- DATEPICKER --}}
@include('client.user.setting.js.datepicker')
{{-- FUNCIONES --}}
@include('client.user.setting.js.funciones')
{{-- IMAGE --}}
@include('client.user.setting.js.image-upload')
@stop



@endsection
