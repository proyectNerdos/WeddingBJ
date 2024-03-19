columns: [

    //ID
   { data: null,targets:0, orderable:false,  render: function ( data, type, row ) {
       return data.id
        }},
   
    //nombre
   { data: null , visible:true ,targets:0, orderable:true, render: function ( data, type, row ) {
       return data.name
        }},
   
    //slug
   { data: null , visible:true ,targets:0, orderable:true, render: function ( data, type, row ) {
       return data.slug
        }},

    //description
    { data: null , visible:true ,targets:0, orderable:true, render: function ( data, type, row ) {
        return data.description
            }},
    
    //level
    { data: null , visible:true ,targets:0, orderable:true, render: function ( data, type, row ) {
        return data.level
        }},


   
   { data: null, targets:0, orderable:false,  render: function ( data, type, row ) {
       return `
      

       <span data-placement="top" data-toggle="tooltip" title="EDITAR" >
              <a class="btn btn-dark" href="user-roles-edit/`+data.uuid+` ">
                <i class="fas fa-edit" ></i></a>
       </span>
   
        
       <span data-placement="top" data-toggle="tooltip" title="ELIMINAR" >
           <button type="button" class="btn btn-danger" onclick="ModalDelete(`+"'"+data.uuid+"'"+`);"><i class="fas fa-trash" aria-hidden="true"></i></button>
       </span>
       
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