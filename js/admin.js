$('html').loading();
$(document).ready(function () {
	$("#image_user").change(function () {
		var allowedExtension = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/bmp'];
		if (allowedExtension.indexOf($(this).get(0).files[0].type) < 0) {
			alert("Extension no permitida");
			$(this).val("");
			return false;
		} else {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#image-show').css({"background-image":"url("+e.target.result+")"});
			}
			reader.readAsDataURL($(this).get(0).files[0]);
		}
	})
	$("#image-show").click( function(){
		$("#image_user").click()
	});
	$("#form").submit(function (e) {
		e.preventDefault();
		var data = new FormData(this);
		$('html').loading();
		$.ajax({
			url: "service/service.php/backend/config",
			type: "POST",
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			success: function (data) {
				$('html').loading("stop");
				swal("Aviso", "Configuracion Guardada Exitosamente", "success");

			}
		});
	})
	$.ajax({
		url: "service/service.php/backend/config",
		type: "GET",
		success: function (data) {
			var result = JSON.parse(data);
			result = result.response;
			if (result.name_user) {
				$("#name_user").val(result.name_user.value);
			}
			if (result.about_user) {
				$("#about_user").val(result.about_user.value);
			}
			if (result.image_user) {
    			$("#image-show").css({
    			    "background-image":"url("+result.image_user.value+"?time="+(new Date()).getTime()+")"
    			});
			}
			$('html').loading("stop");
		}
	});
	$("[href]").click(function () {
		$('html').loading();
	})
	document.oncontextmenu = function () {
		return false
	}
});