<script>
function asignarRol(){
    //obtengo el id del rol selecconado
    rol = $("#todos_los_roles option:selected").val();
    //obtengo el uuid del usuario
    user = $("#uuid_user").val();

    $.get('user-assign-rol/'+ user +"/"+rol+"", function(data){

      Command: toastr["success"]("", "EL ROL FUE AGREGADO")
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }

      var etiqueta_roles = $("#etiqueta_roles_asignados");
      etiqueta_roles.empty();
      if(data[0] != [] ){
      $(data[0]).each(function(key,value){
        console.log(value.name);
      etiqueta_roles.append(`
      <span class="badge badge-warning" >`+value.name+`</span>
       `);

      });
      }//end if

    }).fail( function(){
      $("#zona_etiquetas_roles-"+idusu).html('<span style="color:red;">...Error: Aun no ha agregado roles o revise su conexion...</span>');
    }) ;


}


function quitarRol(){

  //obtengo el id del rol selecconado
    rol = $("#todos_los_roles_quitar option:selected").val();
    //obtengo el uuid del usuario
    user = $("#uuid_user").val();

    $.get('user-delete-rol/'+ user +"/"+rol+"", function(data){

      Command: toastr["success"]("", "EL ROL FUE QUITADO")
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }


      var etiqueta_roles = $("#etiqueta_roles_asignados");
      etiqueta_roles.empty();
      if(data[0] != [] ){
      $(data[0]).each(function(key,value){
      etiqueta_roles.append(`
      <span class="badge badge-warning" >`+value.name+`</span>
      `);

      });
      }//end if

    }).fail( function(){
      $("#zona_etiquetas_roles-"+idusu).html('<span style="color:red;">...Error: Aun no ha agregado roles o revise su conexion...</span>');
    }) ;


}




function SeleccionarTodo() {
        if($('.checkbox').prop('checked')){
            $(".checkbox").prop("checked", false);
        }else{
             $(".checkbox").prop("checked", true);
        }
    }






// function ClaseFiscal(){
//    var TipoComprobante = document.getElementById('clase_fiscal');

//   if(TipoComprobante.value == "consumidor-final"){
//       document.getElementById('tipo_documento').readonly = true;
//       document.getElementById('tipo_documento').value="";
//       document.getElementById('dni').value="";
//       document.getElementById('cuit').value="";
//       document.getElementById('direccion_facturacion').disabled=true;

//       document.getElementById('direccion_facturacion_box').hidden = true;
//       document.getElementById('tipo_documento_select_box').hidden = true;
//       document.getElementById('tipo_documento_box').hidden = true;
//       document.getElementById('documento_box').hidden = true;
//       document.getElementById('cuit').disabled = true;
//       document.getElementById('dni').disabled = true;


//     }

//     if(TipoComprobante.value == "monotributista"){
//       var TipoDocumento = document.getElementById('tipo_documento_select');

//       document.getElementById('tipo_documento').readonly = true;
//       document.getElementById('tipo_documento_select').required = true;
//       document.getElementById('tipo_documento').value="";
//       document.getElementById('direccion_facturacion').disabled=false;
//       document.getElementById('direccion_facturacion').required = true;

//       document.getElementById('direccion_facturacion_box').hidden = false;

//       document.getElementById('tipo_documento_select_box').hidden = false;
//       document.getElementById('tipo_documento_select').hidden = false;
//       document.getElementById('tipo_documento_box').hidden = true;
//       document.getElementById('documento_box').hidden = true;



//         if(TipoDocumento.value == "DNI"){
//             document.getElementById('tipo_documento').value="DNI";
//             document.getElementById('documento_box').hidden = false;
//             document.getElementById('dni').hidden = false;
//             document.getElementById('dni').disabled = false;
//             document.getElementById('dni').required = true;
//             document.getElementById('cuit').hidden = true;
//             document.getElementById('cuit').disabled = true;
//         }

//         if(TipoDocumento.value == "CUIT"){
//           document.getElementById('tipo_documento').value="CUIT";
//           document.getElementById('documento_box').hidden = false;
//             document.getElementById('dni').hidden = true;
//             document.getElementById('dni').disabled = true;
//             document.getElementById('cuit').hidden = false;
//             document.getElementById('cuit').disabled = false;
//             document.getElementById('cuit').required = true;
//         }


//     }

//     if(TipoComprobante.value == "responsable-inscripto"){
//       document.getElementById('tipo_documento').readonly = true;
//       document.getElementById('tipo_documento').value="CUIT";
//       document.getElementById('tipo_documento_select').required = true;
//       document.getElementById('direccion_facturacion').disabled=false;
//        document.getElementById('direccion_facturacion').required = true;

//       document.getElementById('tipo_documento_select_box').hidden = true;
//       document.getElementById('direccion_facturacion_box').hidden = false;
//       document.getElementById('tipo_documento_box').hidden = false;
//       document.getElementById('documento_box').hidden = false;

//       document.getElementById('dni').hidden = true;
//       document.getElementById('dni').disabled = true;
//       document.getElementById('cuit').hidden = false;
//       document.getElementById('cuit').disabled = false;
//       document.getElementById('cuit').required = true;

//     }

//  }
// ClaseFiscal();




// function asignarPermisoaRoles(idrol){


//     var idpermiso=$("#rol1-"+idrol).val();
//     var tablaDatos = $("#datos");
//     $("#datos").empty();


//     //hace referencia a la ruta , y le mandos los parametros
//   $.get('usuario-rol-asignar-permiso/'+idrol+"/"+idpermiso+"" , function(data){
//   //me lo muesta en el input que tenga id mostrar
//   console.log(data);
// $(data).each(function(key,value){
//             tablaDatos.append("<tr><td>"+key.id+"</td><td>"+value.name+"</td><td><span class='label label-success'> Agregado! </span></td></tr>");
//         });
// });
// }









// function borrarPermisoaRoles(idrol,idper){


//      var miurl="../usuario-rol-quitar-permiso/"+idrol+"/"+idper+"";

//      $("#filaP_"+idper+"").html($("#cargador_empresa").html() );

//      console.log(idper);
//         $.ajax({
//     url: miurl
//     }).done( function(resul)
//     {
//      $("#filaP_"+idper+"").hide();

//     }).fail( function()
//    {
//      alert("No se borro correctamente, intentalo nuevamente o revisa tu conexion");
//    }) ;

// }
</script>
