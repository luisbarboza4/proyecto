$(document).ready(function () {
    
    $('#recuperar').submit(function (e){
        e.preventDefault();
        
        $.ajax({
			url: "service/service.php/session/login/recover",
			data: $('#recuperar').serialize(),
			type: "POST",
			success: function(data) {
				var result = JSON.parse(data);
				if (!result.success) {
					swal("Aviso", result.message, "error");
				}
				else {
					
					swal({
					    
        		        title: "Aviso",
        		        text: "Se le ha enviado un correo con la información necesaria para continuar con el proceso de recuperación de contraseña",
        		        type: "success",
        		        allowEscapeKey: false
        		    },function(isConfirm) {
        		        if (isConfirm) {
        		            location.href="index.php";
        		        }
		            });
				}
				
			}
		});
    });
    
    $('#cambiar').submit(function (e){
        e.preventDefault();
        
        if(!$('[name="currentpassword"]').val() || $('[name="currentpassword"]').val().length < 6){
           swal("Error", "El campo contraseña actual no puede estar vacio ni ser menor a 6 caracteres", "error");
           return;
       }
       if(!$('[name="newpassword"]').val() || $('[name="newpassword"]').val().length < 6){
           swal("Error", "El campo nueva contraseña no puede estar vacio ni ser menor a 6 caracteres", "error");
           return;
       }
       if(!$('[name="r_newpassword"]').val() || $('[name="r_newpassword"]').val().length < 6){
           swal("Error", "El campo repetir nueva contraseña no puede estar vacio ni ser menor a 6 caracteres", "error");
           return;
       }
       if($('[name="newpassword"]').val() !=  $('[name="r_newpassword"]').val()){
           swal("Error", "Las contraseñas no coinciden", "error");
           return;
       }
       if($('[name="newpassword"]').val() ==  $('[name="currentpassword"]').val()){
           swal("Error", "La nueva contraseña debe de ser diferente a la actual", "error");
           return;
       }
        
        $.ajax({
			url: "service/service.php/session/changepass",
			data: $('#cambiar').serialize(),
			type: "POST",
			success: function(data) {
				var result = JSON.parse(data);
				if (!result.success) {
					swal("Aviso", result.message, "error");
				}
				else {
					
					swal({
					    
        		        title: "Aviso",
        		        text: result.response,
        		        type: "success",
        		        allowEscapeKey: false
        		    },function(isConfirm) {
        		        if (isConfirm) {
        		            location.href="catalogo.php";
        		        }
		            });
				}
				
			}
		});
    });
    
    
})