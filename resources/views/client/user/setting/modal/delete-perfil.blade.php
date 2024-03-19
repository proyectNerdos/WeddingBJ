
<div class="modal fade" id="delete-perfil" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
          <h4 class="modal-title">Confirmar Eliminacion del Perfil</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>
         <div class="modal-body">
             <p>Esta seguro que desea eliminar el Perfil ?</p>
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cerrar</button>

             
            
                {!! Form::open(['method' => 'DELETE', 'route' => ['user.setting.delete.photo']]) !!}
                
              {{-- almacenamos el id del usuario --}}
              <input type="text" name="uuid_perfil_delete" id="uuid_perfil_delete" hidden="" value="{{$user->uuid}}" >

             <button type="submit" class="btn btn-danger">Eliminar</button>
               {!! Form::close() !!}
         </div>
     </div>
   </div>
 </div>
