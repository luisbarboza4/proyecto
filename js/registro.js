$(document).ready(function(){
    $("#registro").submit(function(e){
       e.preventDefault();
       if(!$('[name="pass"]').val() || $('[name="pass"]').val().length < 6){
           swal("Error", "El campo contraseña no puede estar vacio ni ser menor a 6 caracteres", "error");
           return;
       }
       if(!$('[name="passrepit"]').val() || $('[name="passrepit"]').val().length < 6){
           swal("Error", "El campo repetir contraseña no puede estar vacio ni ser menor a 6 caracteres", "error");
           return;
       }
       if($('[name="passrepit"]').val() !=  $('[name="pass"]').val()){
           swal("Error", "Las contraseñas no coinciden", "error");
           return;
       }
       $("body").loading();
       $.ajax({
           url:"service/service.php/session/register",
           method:"post",
           data:$(this).serialize(),
           success:function(data){
               $("body").loading('stop');
               data = JSON.parse(data);
               if(data.success){
                   swal({
		        title: "Aviso",
		        text: "Usuario Registrado Exitosamente",
		        type: "success",
		        allowEscapeKey: false
		        },function(isConfirm) {
		        if (isConfirm) {
		            location.href="index.php";
		        }
		    });
               }else{
                    swal("Aviso", "Usuario Registrado Exitosamente", "error");
               }
           }
       });
    });
});