<!-- LARGE MODAL -->
<div  class="modal fade" id="edit-perfil">
	<div class="modal-dialog  modal-xl" role="document" swt>
		<div class="modal-content ">
			<div class="modal-header ">
				<h6 class="modal-title">Editar Usuario</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			{{-- {!!Form::model($user,['route'=>['user.setting.change.photo',$user->uuid],'method'=>'PUT' , 'files'=>True])!!}
			<div class="modal-body pd-20"> --}}
				
      {!!Form::open(['route'=>['user.setting.change.photo'],'method'=>'PUT','files'=>True])!!}
			<div class="modal-body pd-20">
				

		{{-- almacenamos el id del usuario --}}
		<input type="text" name="uuid_perfil_edit" id="uuid_perfil_edit" hidden="" value="{{$user->uuid}}">

		@include('client.user.setting.forms.changeImage')

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


