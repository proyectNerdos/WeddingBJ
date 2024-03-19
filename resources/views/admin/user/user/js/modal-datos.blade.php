<script>
  function ModalEditar(uuid) {
  	var user = uuid;
    var token = $("#token").val();
    	//hace referencia a la ruta , y le mandos los parametros
  		$.get('user-edit/'+ user , function(data){

      //AVATAR
      var urlImagen = "{{ url('/') }}";
      $("#avatar").attr('src', urlImagen+'/storage/user/'+data[0].imagen);

  		//me lo muesta en el input que tenga id mostrar
    	$("#uuid_user").val(data[0].uuid);

      //Image
      if(data[0].image != null){
        $("#image-edit").attr('src', data[0].image);
      }else{
        $("#image-edit").attr('src', 'storage/users/avatar-default.svg');
      }

      // CKEDITOR.instances.contenidoedit.setData(data.contenido);
$("#email").val(data[0].email);

$("#name").val(data[0].name);
$("#lastname").val(data[0].lastname);

//-----------DATOS DE ENVIO----------//     
if(data[0] == null){
  $("#addres").val("");
}else{
  $("#addres").val(data[0].address);
}

if(data[0] == null){
  $("#lote").val("");
}else{
  $("#lote").val(data[0].lote);
}

if(data[0] == null){
  $("#addres_number").val("");
}else{
  $("#addres_number").val(data[0].addres_number);
}

if(data[0] == null){
  $("#addres_plant").val("");
}else{
  $("#addres_plant").val(data[0].addres_plant);
}

if(data[0] == null){
  $("#addres_department").val("");
}else{
  $("#addres_department").val(data[0].addres_department);
}

if(data[0] == null){
  $("#cp").val("");
}else{
  $("#cp").val(data[0].cp);
}

if(data[0] == null){
  $("#phone").val("");
}else{
  $("#phone").val(data[0].phone);
}


if(data[0] == null){
  $("#country").val("");
}else{
  $("#country").val(data[0].country);
}


if(data[0] == null){
  $("#province").val("");
}else{
  $("#province").val(data[0].province);
}


if(data[0] == null){
  $("#city").val("");
}else{
  $("#city").val(data[0].city);
}




//-----------DATOS DE FACTURACIOn----------//
// if(data[3] == null){
//   $("#clase_fiscal").val("consumidor-final");
// }else{
//   $("#clase_fiscal").val(data[3].clase_fiscal);
// }

// if(data[3] == null){
//   $("#tipo_documento_select").val("");
// }else{
//   $("#tipo_documento_select").val(data[3].tipo_documento);
// }



// if(data[3] == null){
//   $("#dni").val("");
//   $("#cuit").val("");
// }else{
//       if(data[3].tipo_documento == "CUIT"){
//       $("#cuit").val(data[3].numero_documento);
//     }

//     if(data[3].tipo_documento == "DNI"){
//       $("#dni").val(data[3].numero_documento);
//     } 
// }


// if(data[3] == null){
//   $("#direccion_facturacion").val("");
// }else{
//   $("#direccion_facturacion").val(data[3].direccion_facturacion);
// }




//-----------TODOS LOS ROLES AGREGAR----------//
var todos_los_roles = $("#todos_los_roles");
todos_los_roles.empty();
if(data[1] != [] ){
$(data[1]).each(function(key,value){
    todos_los_roles.append(`
    	<option value="`+data[1][key].id+`">`+data[1][key].name+`</option>  
    	`);
  });
}//end if



var asignar_rol = $("#asignar_rol");
asignar_rol.empty();
asignar_rol.append(`
<button type="button" class="btn btn-primary" onclick="asignarRol();" >
<i class="fa fa-check"></i> Asignar Roles 
</button>  
`);
//-----------TODOS LOS ROLES AGREGAR----------//


//-----------TODOS LOS ROLES QUITAR----------//
var todos_los_roles_quitar = $("#todos_los_roles_quitar");
todos_los_roles_quitar.empty();
if(data[1] != [] ){
$(data[1]).each(function(key,value){
    todos_los_roles_quitar.append(`
    	<option value="`+data[1][key].id+`">`+data[1][key].name+`</option>  
    	`);
  });
}//end if

var quitar_rol = $("#quitar_rol");
quitar_rol.empty();
quitar_rol.append(`
<button type="button" class="btn btn-primary" onclick="quitarRol();" >
<i class="fa fa-trash"></i> Quitar Roles </button>
`);
//-----------TODOS LOS ROLES QUITAR----------//



var etiqueta_roles = $("#etiqueta_roles_asignados");
etiqueta_roles.empty();
if(data[2] != [] ){
$(data[2]).each(function(key,value){
    etiqueta_roles.append(`
        <span class="badge badge-warning" >`+value.name+`</span> 
    `);
  });
}//end if


      // if(data.status == "on"){
      //   $('#status-edit').val(data.status).prop('checked', true).change();
      // }else{
      //   // $('#status').val(data.status).prop('checked', false).change();
      //   $('#status-edit').bootstrapToggle('off')
      // }
  

		});
  

   $('#edit-user').modal('show');
}









function ModalDelete(uuid) {
    var token = $("#token").val();
    $("#uuid_user_delete").val(uuid);
    $('#delete-user').modal('show');
}
</script>