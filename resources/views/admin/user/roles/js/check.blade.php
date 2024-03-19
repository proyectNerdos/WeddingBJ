<script>

 function Check(slug){
    

    $('#basic_checkbox_'+slug).change(function() {

    	if($('#basic_checkbox_'+slug).is(":checked")){

    		 $('#basic_checkbox_'+slug).val("on");

    		}else{

    		 $('#basic_checkbox_'+slug).val("off");	

    	}
     
    })

  }

</script>