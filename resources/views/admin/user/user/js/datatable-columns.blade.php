columns: [

    //ID
   { data: null,targets:0, orderable:false,  render: function ( data, type, row ) {
       return data.id
        }},
   
    //nombre
   { data: null , visible:true ,targets:0, orderable:true, render: function ( data, type, row ) {
       return data.name+" "+data.lastname
        }},
   
    //apelllido , lo mantenemos oculto solo para buscar por apelldio
   { data: null , name : 'lastname', visible:false ,targets:0, orderable:true, render: function ( data, type, row ) {
       return data.lastname
        }},
   
   //DNI
   { data: null ,name:'dni', visible:true ,targets:0, orderable:true, render: function ( data, type, row ) {
       return data.dni
        }},
   
   //email
   { data: 'email', name: 'email' },
   
   //telefono
   { data: 'phone', name: 'phone' },
   
   
   // { data: null,targets:0, orderable:true,  render: function ( data, type, row ) {
   //     return data.puntos
   //      }},
   
   
   
   { data: null, targets:0, orderable:false,  render: function ( data, type, row ) {
       return `
      
       @permission('user-edit')
       <span data-placement="top" data-toggle="tooltip" title="EDITAR" >
           <button type="button" class="btn btn-dark" onclick="ModalEditar(`+"'"+data.uuid+"'"+`);"><i class="fas fa-edit" aria-hidden="true"></i></button>
       </span>
         @endpermission
   
       @permission('user-delete')
       <span data-placement="top" data-toggle="tooltip" title="ELIMINAR" >
           <button type="button" class="btn btn-danger" onclick="ModalDelete(`+"'"+data.uuid+"'"+`);"><i class="fas fa-trash" aria-hidden="true"></i></button>
       </span>
        @endpermission
                     `}
       
               },
   
           //CHECKBOX
               { data: null,  render: function ( data, type, row ) {
   
            return `
             
             <div class='col-md-3'><input id=`+"'"+data.uuid+"'"+` name='usuarios[]' class='chk-col-teal checkbox'  type='checkbox' value=`+"'"+data.uuid+"'"+` ><label for=`+"'"+data.uuid+"'"+`></label></div>
            
             `  
                   
                    }
                 },
   
   
           ],