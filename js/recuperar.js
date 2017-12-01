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
})