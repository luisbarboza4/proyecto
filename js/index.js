$("#image_user").change(function(){
	var allowedExtension = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/bmp'];
	if(allowedExtension.indexOf($(this).get(0).files[0].type) < 0){
		alert("Extension no permitida");
		$(this).val("");
		return false;
	}else{
		var reader = new FileReader();
	       reader.onload = function (e) {
	          $('#image-show').attr('src', e.target.result);
	       }
	      reader.readAsDataURL($(this).get(0).files[0]);
	}
})
$("#form").submit(function(e){
	e.preventDefault();
	var data = new FormData(this);
	$('html').loading();
	$.ajax({
        url: "ajax/saveconf.php?type=post",
        type: "POST",
        data: data,
	    cache: false,
        contentType: false,
        processData: false,
        success:function (data) {
        	$('html').loading("stop");
        	alert("Configuracion Guardada Exitosamente");        
            
        }
	});
})
$('html').loading();
$.ajax({
    url: "ajax/saveconf.php?type=get",
    type: "POST",
    success:function (data) {
    	var result = JSON.parse(data);
    	$("#name_user").val(result.name_user.value);
    	$("#about_user").val(result.about_user.value);
    	$("#image-show").attr("src",result.image_user.value);
    	$('html').loading("stop");
    }
});