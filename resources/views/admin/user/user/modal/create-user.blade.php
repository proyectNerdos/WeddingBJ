<div class="modal fade" id="create-user"  role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-xl" role="document">
     <div class="modal-content">
         <div class="modal-header">
         	<h4 class="modal-title">Crear Usuario </h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>


     {{-- form --}}
     
{{ Form::open(['route'=>['user.store'], 'method'=>'POST' , 'files'=>True]) }}

<div class="modal-body">      

@include('admin.user.user.forms.create-user')
</div>

<div class="modal-footer">
{!!Form::submit('Crear',['class'=>'btn btn-primary pull-right'])!!}
<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>
