<!-- LARGE MODAL -->
<div  class="modal fade" id="edit-user">
	<div class="modal-dialog  modal-xl" role="document" swt>
		<div class="modal-content ">
			<div class="modal-header ">
				<h6 class="modal-title">Editar Usuario</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

	

	
	  {!!Form::open(['route'=>['user.update'],'method'=>'PUT','files'=>True])!!}


			<div class="modal-body pd-20">
				
        
<br>


{{-- almacenamos el id del usuario --}}
<input type="text" name="uuid_user" id="uuid_user" hidden="">


@include('admin.user.user.forms.changeImage')

@include('admin.user.user.forms.changeData')

@include('admin.user.user.forms.changeRolesPermissions')





<div style="display: none;" id="cargador_empresa" align="center">
        <br>
         <label style="color:#FFF; background-color:#ABB6BA; text-align:center">&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label>

         <img src="{{ url('/img/cargando.gif') }}" align="middle" alt="cargador"> &nbsp;<label style="color:#ABB6BA">Realizando tarea solicitada ...</label>

          <br>
         <hr style="color:#003" width="50%">
         <br>
</div>


      </div><!-- modal-body -->
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Guardar</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
      {!!Form::close()!!}
		</div>
	</div><!-- MODAL DIALOG -->
</div>
<!-- LARGE MODAL CLOSED -->


