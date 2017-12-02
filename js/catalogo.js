$("body").loading();
$(document).ready(function() {
	$("#pedido").on("submit", function(e) {
		e.preventDefault();
		$("#addCarrito").prop("disabled", true);
		var datosform = {
			rel: $(".ilumodal .supp").find(':selected').attr('data-rel'),
			cantidad: $(".ilumodal .cantidad").val()
		};
		console.log(datosform);
		$.ajax({
			url: "service/service.php/carrito/agregar",
			type: "POST",
			data: datosform,
			success: function(data) {
				$("#addCarrito").prop("disabled", false);
				var response = JSON.parse(data);
				if (response.success) {
					swal({
						"title": 'Exito!',
						"text": 'Tu item ha sido agregado al carrito de compras',
						"type": 'success',
						"timer": 1500
					});
					$("#ilusModal").modal("hide");
				}
				else {
					swal({
						"title": 'Error',
						"text": response.message,
						"type": 'error',
						"timer": 1500
					});
				}
				console.log(response);
			}
		});

	});
	$(".ilumodal .cantidad:input").bind('keyup mouseup', function() {
		console.log(parseInt($(this).val()));
		if (parseInt($(this).val()) <= 10) {
			console.log("mardicion");
			$(".ilumodal #precio").text(parseInt($(this).val()) * parseInt($(".ilumodal .supp").val()));
		}
	});
	$.ajax({
		url: "service/service.php/images/",
		type: "GET",
		success: function(data) {
			$("body").loading("stop");
			var result = JSON.parse(data);
			result = result.response;
			for (var i = 0; i < result.length; i++) {
				var divitem = $("<div>")
					.addClass("item col-xs-12 col-sm-3");
				var img = $("<img>")
					//href="#ilusModal" data-toggle="modal" data-target="#ilusModal"
					.attr({
						"src": result[i].ruta,
						"href": "#ilusModal",
						"data-toggle": "modal",
						"data-target": "#ilusModal",
						"data-name": result[i].name,
						"data-id": result[i].id
					})
					.addClass("ignore")
					.on('load', function() {
						$(this).closest(".item").animate({ "opacity": "1" });
					})
					.on('click', function() {
						$(".ilumodal .cantidad").prop("disabled", true);
						$(".ilumodal .name").html($(this).attr("data-name"));
						$(".ilumodal .illus").attr("src", $(this).attr("src"));
						var idimagen = $(this).attr("data-id");
						console.log("idimagen: " + idimagen);
						$(".ilumodal .size")
							.prop("disabled", true)
							.empty()
							.on("change", function() {
								console.log("id imagen" + idimagen + "size_id = " + $(this).val());
								$(".ilumodal .supp").empty();
								$.ajax({
									url: "service/service.php/images/rel/getSupport",
									type: "POST",
									data: {
										"id": idimagen,
										"size_id": $(this).val()
									},
									success: function(data3) {
										var supports = JSON.parse(data3);
										if (supports.success) {
											console.log(supports);
											supports = supports.response;
											$(".ilumodal .supp").empty();
											for (var i = 0; i < supports.length; i++) {
												$(".ilumodal .supp").append("<option data-rel=" + supports[i].id + " data-image=" + supports[i].id_imagen + " value=" + supports[i].costo + ">" + supports[i].name + "</option>");
											}
										}
									}
								});
							});
						$(".ilumodal .supp").prop("disabled", true).empty();
						var id = $(this).attr("data-id");
						$.ajax({
							url: "service/service.php/images/rel/",
							type: "POST",
							data: { "id": id },
							success: function(data) {
								var result = JSON.parse(data);
								if (result.success) {
									result = result.response;
									for (var i = 0; i < result.length; i++) {
										var sizeid = result[i].id_size
										$.ajax({
											url: "service/service.php/size",
											type: "POST",
											data: { "id": sizeid },
											success: function(data2) {
												$(".ilumodal .size").prop("disabled", false);
												var sizer = JSON.parse(data2);
												sizer = sizer.response;
												console.log(sizer.name);
												$(".ilumodal .size")
													.append("<option value='" + sizer.id + "'>" + sizer.name + "</option>");
												$(".ilumodal .supp").prop("disabled", false);
											}
										}).always(function() {
											$(".ilumodal .size").change();
											$(".ilumodal .cantidad")
												.prop("disabled", false);
										});
									}
								}
								else {
									if ($(".ilumodal .size").length > 0) {
										$(".ilumodal .size").empty().append("<option disabled selected>No existen tamaños disponibles</option>");
										$(".ilumodal .supp").empty().append("<option disabled selected>No existen soportes disponibles</option>");
									}
								}
							}
						})
					});
				divitem.append(img);
				$(".row.catalogo").append(divitem);
			}
		}
	});

	$('#loginBTN').click(function(e) {
		e.preventDefault();
		$('#mensajeError').hide();
		$("#cargandoLogin").show();
		$.ajax({
			url: "service/service.php/session/login",
			data: $('#modalLogin').serialize(),
			type: "POST",
			success: function(data) {
				var result = JSON.parse(data);
				if (!result.success) {
					$('#mensajeError').show();
					$('#mensajeError').html(result.message);
				}
				else {
					$("#modalLogin").submit();
					//location.reload();
				}
				$("#cargandoLogin").hide();
			}
		});

	});
	document.oncontextmenu = function() {
		return false
	}
});
