@extends('layouts.admin-pro')
@section('content')
{{-- @role('administrador') --}}

<!-- muestra mensaje que se a modificado o creado exitosamente-->
<!--include('alerts.success')-->


           <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><i class="icon-user font-red"></i>
                  <span class="caption-subject font-red sbold uppercase">Seccion de Editar Roles</span></h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
                            <li class="breadcrumb-item "><a href="{!! URL::to('/usuario') !!}">Usuarios</a></li>
                            <li class="breadcrumb-item active"><a href="{!! URL::to('/usuario-roles') !!}">Roles</a></li>
                            <li class="breadcrumb-item active"><a href="#">Editar Roles</a></li>
                        </ol>
                    </div>
                </div>





                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">







        <h4 class="card-title">




           </h4>



<ul class="nav nav-tabs" role="tablist">
           @include('admin.usuario.partials.menu')
      </ul>

                                <br><br>





<h6 class="card-subtitle"></h6>

<div class="card card-outline-info">
  <div class="card-header">
      <h4 class="m-b-0 text-white">Editar  Rol</h4></div>
  <div class="card-body">

      {{ Form::model($role, array('route' => array('usuario.roles.update', $role->id), 'method' => 'PUT', 'files'=>True)) }}
      @include('admin.usuario.roles.forms.edit-roles')
      {!!Form::close()!!}

  </div>
</div>








 {{ Form::open(['route' => ['usuario.rol.asignar.permiso'], 'method' => 'GET', 'files'=>True]) }}

  <!--mandamos oculto el campo del id del rol-->
  <input type="text" value="{{$role->id}}" name="idrol" hidden>


<div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Permisos del Usuario {{ $role->name }}</h4></div>
                            <div class="card-body">

<div class="row">

@foreach($ModuloPermisos as $key => $modulo)
<div class="card card-outline-info col-xs-12 col-sm-12 col-md-3">
      <div class="card-header">
          <h4 class="m-b-0 text-white">Modulo {{$key}}</h4></div>
      <div class="card-body">
        <div class="row">


@foreach($modulo as $key => $permiso)

  @if(DB::table('permission_role')->where('role_id', '=', $role->id)->where('permission_id', '=', $permiso->id)->first() )

    <div class="form-group col-xs-12 col-sm-12 col-md-12">
          <input id="basic_checkbox_{{$permiso->slug}}"    type="checkbox" name="{{$permiso->slug}}" checked="" onclick="Check('{{$permiso->slug}}')" >
        <label for="basic_checkbox_{{$permiso->slug}}">{{$permiso->description}}</label>
    </div>


  @else

    <div class="form-group col-xs-12 col-sm-12 col-md-12">
          <input id="basic_checkbox_{{$permiso->slug}}"    type="checkbox" name="{{$permiso->slug}}" onclick="Check('{{$permiso->slug}}')" >
        <label for="basic_checkbox_{{$permiso->slug}}">{{$permiso->description}}</label>
    </div>


  @endif
@endforeach



        </div>
      </div>
  </div>
@endforeach
</div> {{-- end row --}}

<button type="submit" class="btn green"><i class="fa fa-check"></i>
Asignar Permisos
</button>





{!!Form::close()!!}



  {{ Form::open(['route' => ['usuario.rol.asignar.all.permiso'], 'method' => 'GET', 'files'=>True]) }}
  <div class="row">

      <div class="form-group col-xs-12 col-sm-12 col-md-3 pull-left">

        <span class="input-group-btn">
      <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Asignar Todos los Permiso </button>
        </span>
    </div>
</div>
  <!--mandamos oculto el campo del id del rol-->
  <input type="text" value="{{$role->id}}" name="idrol" hidden>
            {!!Form::close()!!}


                            </div>
                        </div>


                                </div>
                            </div>
                        </div>
                    </div>





<!--modal crear role-->
 @include('admin.usuario.roles.modal.crear-roles')



@section('mis-scripts')
{{-- SWITCH --}}
@include('admin.usuario.roles.js.check')
@stop


{{-- @endrole --}}
@endsection
