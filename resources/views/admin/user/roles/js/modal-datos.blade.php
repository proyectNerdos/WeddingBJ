<script>
//   function ModalEditar(uuid) {
//   	var rol = uuid;
//     var token = $("#token").val();
//     	//hace referencia a la ruta , y le mandos los parametros
//   		$.get('user-roles-edit/'+ rol , function(data){

//       //AVATAR
//       var urlImagen = "{{ url('/') }}";
//       $("#avatar").attr('src', urlImagen+'/storage/user/'+data[0].imagen);

//   		//me lo muesta en el input que tenga id mostrar
//     	//$("#uuid_user").val(data[0].uuid);

// console.log(data[0].name);
// $("#name").val(data[0].name);
// $("#description").val(data[0].description);


  

// 		});
  

//    $('#edit-roles').modal('show');
// }









function ModalDelete(uuid) {
    var token = $("#token").val();
    $("#uuid_roles_delete").val(uuid);
    $('#delete-roles').modal('show');
}
</script>