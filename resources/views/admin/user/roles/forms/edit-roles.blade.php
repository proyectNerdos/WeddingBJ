<div class="card card-outline-info">
  <div class="card-header">
      <h4 class="m-b-0 text-white">Datos del Rol</h4></div>
  <div class="card-body">
    <div class="row">

<div class="form-group col-xs-12 col-sm-12 col-md-6">
<div class="input-group input-icon right ">
<span class="input-group-addon"><i class="fa fa-user color-white"></i></span>
<input type="text" name="name" class="form-control" placeholder="ingrese el nombre del rol" required="" value="{{$roles->name}}">
</div>
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-6">
<div class="input-group input-icon right ">
<span class="input-group-addon"><i class="fa fa-book color-white"></i></span>
<input type="text" name="description" class="form-control" placeholder="ingrese la Descripcion" required="" value="{{$roles->description}}">
</div>
</div>




    </div>
  </div>
</div>





<div class="card card-outline-info">
  <div class="card-header">
      <h4 class="m-b-0 text-white">Permisos</h4></div>
  <div class="card-body">

    <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="table-responsive">
                  <table class="table card-table">
                      <tr class="border-bottom">
                          <th>MODULOS</th>
                          <th>VER</th>
                          <th>CREAR</th>
                          <th>EDITAR</th>
                          <th>ELIMINAR</th>
                      </tr>
                 
                      @foreach ($Permissions as $key => $module)

                      <tr class="border-bottom">
                        
                          <td>{!!$key!!}</td>
                        
                          @foreach ($module as $Permission)
                           
                                @if ($Permission->active == "yes")
                                  <td>
                                    <label class="custom-switch">
                                        <input type="checkbox" name="{{$Permission->slug}}" class="custom-switch-input" checked>
                                        <span class="custom-switch-indicator"></span>
                                        
                                    </label>
                                  </td>
                                @else
                                  <td>
                                    <label class="custom-switch">
                                        <input type="checkbox" name="{{$Permission->slug}}" class="custom-switch-input" data-on="on">
                                        <span class="custom-switch-indicator"></span>
                                        
                                    </label>
                                  </td> 
                                @endif
                         



                          @endforeach

                      </tr>
                        
                      @endforeach
                  </table>
              </div>
          </div>
      </div>
    </div>
    <!-- ROW CLOSED -->
  </div>
</div>








