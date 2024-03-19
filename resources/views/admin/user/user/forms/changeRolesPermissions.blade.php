<div class="card card-outline-info">
      <div class="card-header">
          <h4 class="m-b-0 text-white">Permisos y Roles</h4></div>
      <div class="card-body">
        <div class="row">


<div class="form-group col-xs-12 col-sm-12 col-md-6">
<div class="input-group" style="text-align:left">

 <select  id="todos_los_roles" name="rol1" class="form-control rol1 todos_los_roles">
     {{-- @foreach($roles as $rol)
        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
     @endforeach --}}
 </select>
    <span class="input-group-btn" id="asignar_rol">
    {{-- <button type="button" class="btn green" onclick="asignarRoles({{ $user->id }});" >
    <i class="fa fa-check"></i> Asignar Roles </button>   --}}
    </span>
</div>       
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-6">
<div class="input-group" style="text-align:left">
 <select  id="todos_los_roles_quitar" name="perfil_id" class="form-control">
    {{--  @foreach($roles as $rol)
      <option value="{{ $rol->id }}">{{ $rol->name }}</option>
     @endforeach --}}
  </select>
    <span class="input-group-btn" id="quitar_rol">
    {{-- <button type="button" class="btn green" onclick="quitarRoles({{ $user->id }});" >
    <i class="fa fa-close"></i> Quitar Roles </button>   --}}
    </span>
</div>       
</div>


 <div id="etiqueta_roles_asignados"  >Roles asignados:
    {{-- @foreach($user->getRoles() as $rl)
      <span class="label label-warning" style="margin-left:10px;">{{ $rl }} </span> 
    @endforeach --}}
  </div>
     

        </div>
      </div>
  </div>
