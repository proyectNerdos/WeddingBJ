@foreach($users as $user)
<div class="modal fade " id="ver-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
 <div class="modal-dialog modal-full" role="document">
     <div class="modal-content">
         <div class="modal-header">
         	<h4 class="modal-title">Ver User {{ $user->usu_nombre }}</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>


{!!Form::model($user,['url'=>['usuario-update',$user->id],'method'=>'PUT' , 'files'=>True])!!}

<div class="modal-body">
<fieldset disabled>      
{{ Html::image('storage/user/' . $user->path , 'img', array('class' => 'user-image center-block' , 'style'=>'height:100px')) }}<br>
@include('admin.usuario.forms.formscreate')
</fieldset>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>
	@endforeach