<!-- muestra mensaje cuando se loguea el usuario-->
@if(Session::has('error'))
<div class="alert alert-danger" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  <a href="#" class="alert-link"></a>
  {{Session::get('error')}}
</div>
@endif


@if(Session::has('success'))
<div class="alert alert-success alert-dismissable" >
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  <a href="#" class="alert-link"></a>
  {{Session::get('success')}}
</div>
@endif


<!-- si mi errores son mayores a cero , entocens -->
@if(count($errors) > 0)
<div class="alert alert-danger" role="alert">
  <!--creamos una lista y recorremos los errores para imprimir cada error-->
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  @foreach($errors->all() as $error)
  <li>{!! $error !!}</li>
  @endforeach
</div>
@endif
