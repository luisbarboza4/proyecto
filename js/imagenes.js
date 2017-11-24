$('html').loading();


$(document).ready(function(){
    let size_items = [];
    let suporte_items  = [];
    $('#dialog_image').submit(function(e){
    	if(!validateimage()){
    		return false;
    	}
    	var type = $("#id_imagen").val()== 0 ? "post": "update";
        $('html').loading();
        e.preventDefault();
        var data = new FormData(this);
        $('#myModal').modal('hide');
        clearModal();
        $('html').loading();
	    $.ajax({
        url: "ajax/saveimages.php?type="+type,
        type: "POST",
        data: data,
	    cache: false,
        contentType: false,
        processData: false,
        success:function (data) {
        	$('html').loading("stop");
        	swal("Aviso","Imagen Guardada Exitosamente","success");
        	searchIMG();
        }
	});
    });
    function searchIMG(){
       $.ajax({
           url:"ajax/saveimages.php?type=get",
            success:function (data) {
                $('html').loading("stop");
                let imagenes = JSON.parse(data);
                $(".images-list").empty();
                $.each(imagenes,function(i,e){
                    let div = $("<div>")
                                .addClass("col-xs-offset-4 col-xs-4");
                    let imgdiv = $("<div>").addClass("img");
                    div.append(imgdiv);
                    let img = $("<img>")
                                .attr("src",e.ruta)
                                .data("item",e)
                                .addClass("img-responsive ignore big-image")
                                .click(function(e){
    				                showModal($(this).data('item'));
                                });
                    imgdiv.append(img);
                    let buttonEdit = $('<button>')
                                    .addClass('btn btn-primary')
                                    .data("item",e)
                                    .append('<span class="glyphicon glyphicon-edit"></span>Editar')
                                    .click(function(e){
    				                    showModal($(this).data('item'));
                                    });
                    imgdiv.append(buttonEdit);
                    let buttonDel = $('<button>')
                                    .addClass('btn btn-danger')
                                    .attr("id",e.id)
                                    .append('<span class="glyphicon glyphicon-trash"></span>Eliminar')
                                    .click(function(e){
                                    	var button = this;
                                    	swal({
									        title: "Aviso",
									        text: "Desea eliminar esta imagen?",
									        type: "warning",
									        showCancelButton: true,
									        confirmButtonText: 'Si, eliminar',
									        cancelButtonText: "No, conservar",
									        closeOnConfirm: true,
									        closeOnCancel: true
									    },
									    function(isConfirm) {
									        if (isConfirm) {
									            $(button).parent().parent().remove();
    				                        	deletebyid($(button).attr('id'));
									        }
									    });
                                        /*if(confirm("Desea eliminar este costo")){
    				                        $(this).parent().parent().remove();
    				                        deletebyid($(this).attr('id'));
    			                        }*/
                                    });
                    imgdiv.append(buttonDel);
                    $(".images-list").append(div);
                });
            }
       });
    }
   $.ajax({
       url:"ajax/savetypesize.php?type=get",
        success:function (data) {
            suporte_items = JSON.parse(data);
        }
   });
   
   $.ajax({
       url:"ajax/savetypesize.php?type=get&pag=size",
        success:function (data) {
            size_items = JSON.parse(data);
        }
   });
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
	$("#add-costo").click(function() {
	    add_costo();
	})
	function add_costo(costo="",id_size="",id_soporte="",id_costo='0'){
		let tr = $('<tr>');
		let td = $('<td>');
		td.append('<input type="text" id="costo" name="costo[]" class="form-control input-xs" value="'+costo+'">');
		td.append('<input type="hidden" id="id_costo" name="id_costo[]" class="form-control input-xs" value="'+id_costo+'">');
		tr.append(td);
		td = $('<td>');
		let select = $('<select>')
		                .attr("name","size_img[]")
		                .addClass("form-control")
		                .addClass("input-xs");
		$.each(size_items,function(i,e){
		    var selected = id_size == e.id ? "selected" : "";
		    select.append('<option value="'+e.id+'" '+selected+'>'+e.name+'</option>');
		});
		td.append(select);
		tr.append(td);
		td = $('<td>');
		select = $('<select>')
		                .attr("name","type_img[]")
		                .addClass("form-control")
		                .addClass("input-xs");
		$.each(suporte_items,function(i,e){
		    var selected = id_soporte == e.id ? "selected" : "";
		    select.append('<option value="'+e.id+'" '+selected+'>'+e.name+'</option>');
		});
		td.append(select);
		tr.append(td);
		tr.append('<td><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</button></td>');
		$("#table-cost tbody").append(tr);
		$("#table-cost tbody tr:last td:last").click(function(){
			var button = this;
			swal({
		        title: "Aviso",
		        text: "Desea eliminar este costo?",
		        type: "warning",
		        showCancelButton: true,
		        confirmButtonText: 'Si, eliminar',
		        cancelButtonText: "No, conservar",
		        closeOnConfirm: true,
		        closeOnCancel: true
		    },
		    function(isConfirm) {
		        if (isConfirm) {
		            $(button).parent().remove();
					viewtable();
		        }
		    });
			/*if(confirm("Desea eliminar este costo")){
				$(this).parent().remove();
				viewtable();
			}*/
		})
		viewtable();
	}
	function deletebyid(id){
    	var pag = $("#pag").val();
    	$('html').loading();
    	$.ajax({
    	    url: "ajax/saveimages.php?type=del",
    	    type: "POST",
    	    data: {
    	        id: id
    	    },
    	    success:function (data) {
    	    	$('html').loading("stop");
    	    	swal("Aviso","Imagen Borrada Exitosamente","success");
    	    	searchIMG();
    	    }
        });
    }
	function clearModal(){
		$("#table-cost tbody").empty();
		$("#image_user").val("");
		$("#image-show").attr("src","img/placeholder.jpg");
		$("#name_img").val("");
		$("#public_img").prop("checked",false);
		$("#numberlike").text("0 ");
		$("#numberdislike").text("0 ");
		$("#id_imagen").val("0");
		viewtable();
	}
	$("[data-dismiss]").click(clearModal);
	function viewtable(){
		if($("#table-cost tbody tr").length > 0){
			$("#table-cost").show();
		}else{
			$("#table-cost").hide();
		}
	}
	function validateimage(){
		var valid = true
		if($("#image_user").val()=="" && $("#id_imagen").val()==0){
    		swal("Alerta","Debe seleccionar imagen","error");
    		valid = false;
    	}else if($("#name_img").val()==""){
    		swal("Alerta","Debe colocar nombre","error");
    		valid = false;
    	}else{
	    	var key = []
	    	$("#table-cost tbody tr").each(function(i, e) {
	    		var array = {};
	    		array.id_sop = $(e).find("[name='type_img[]']").val();
	    		array.id_size = $(e).find("[name='size_img[]']").val();
	    		$(key).each(function(ind,ele) {
	    		    if(array.id_sop==ele.id_sop && array.id_size==ele.id_size){
	    		    	swal("Alerta","Costos repetidos","error");
	    		    	valid = false;;
	    		    }
	    		})
	    		key.push(array);
	    	})
    	}
    	return valid;
	}
	function showModal(result) {
	    $("#id_imagen").val(result.id);
	    $("#name_img").val(result.name);
	    $("#public_img").prop("checked",result.mostrar == 1 ? true : false);
	    $("#numberlike").val(result.like+" ");
	    $("#numberdislike").val(result.dislike+" ");
	    $("#image-show").attr("src",result.ruta);
	    $(result.costo).each(function(i,e){
	        add_costo(e.costo,e.id_size,e.id_soporte,e.id);
	    })
    	$('#myModal').modal('show');
    }
	searchIMG()
});