$(document).ready(function(){
    
    $.ajax({
       url:"service/service.php/session/perfil",
       method:"post",
       data: $('#perfil').serialize(),
       success:function(data){
           $("body").loading('stop');
           data = JSON.parse(data);
           if(!data.success){
               swal("Aviso", "Ocurrió un error al momento de consultar la información de tu perfil", "error");
           } else {
               $('#p_nombre').val(data.response.nombre);
               $('#p_apellido').val(data.response.apellido);
               $('#p_email').val(data.response.email);
           }
       }
       });
   
   $('#perfil').submit(function(e){
       e.preventDefault();
       $("body").loading();
       
       $.ajax({
           url:"service/service.php/session/perfil/editar",
           method:"post",
           data: $('#perfil').serialize(),
           success:function(data){
               $("body").loading('stop');
               data = JSON.parse(data);
               if(!data.success){
                   swal("Aviso", data.message, "error");
               } else {
                   swal({
					    
        		        title: "Aviso",
        		        text: data.response,
        		        type: "success",
        		        allowEscapeKey: false
        		    },function(isConfirm) {
        		        if (isConfirm) {
        		            location.href="perfil.php";
        		        }
		            });
               }
           }
       });
   }); 
});