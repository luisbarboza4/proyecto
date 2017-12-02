$("body").loading();
$(document).ready(function(){
    function getCarrito(){
        $.ajax({
            url:"service/service.php/backend/carrito/items_descr",
            method:"get",
            success:function(data){
                $("#carrito tbody").empty();
                $("body").loading('stop');
                data = JSON.parse(data);
                if(data.success){
                    var total = 0;
                    var cant = 0;
                    $.each(data.response,function(i,e){
                        $("#id_modal").val(e.car)
                        var tr = $("<tr>")
                            .attr("data-id",e.id)
                            .append($("<td>")
                                .append($("<div>")
                                    .addClass("img-profile img-circle")
                                    .css({"background-image":"url("+e.image+")","width":"8em","height":"8em","margin":"auto"})))
                            .append($("<td>")
                                .append(e.cant))
                            .append($("<td>")
                                .append(e.size))
                            .append($("<td>")
                                .append(e.support))
                            .append($("<td>")
                                .append(Number(e.cant)*Number(e.price)))
                            .append($("<td>")
                                .append($("<button>")
                                    .addClass("btn elim")
                                    .text("Eliminar")
                                    .click(function(e){
                                        e.stopPropagation();
                                        var button = this;
                                        var id = $(this).parent().parent().attr("data-id");
                                        swal({
    									        title: "Aviso",
    									        text: "Desea eliminar esta imagen?",
    									        type: "warning",
    									        showCancelButton: true,
    									        confirmButtonText: 'Si, eliminar',
    									        cancelButtonText: "No, conservar",
    									        closeOnConfirm: true,
    									        closeOnCancel: true,
    									        allowEscapeKey: false
    									    },
    									    function(isConfirm) {
    									        if (isConfirm) {
    									            $(button).parent().parent().remove();
        				                        	deletebyid(id);
    									        }
    									    });
                                    })))
                            /*.click(function(e){
                                e.stopPropagation();
                                var id = $(this).attr("data-id");
                                var carid = $(this).attr("data-carid");
                                alert("Cuadro de preview "+id+" "+carid);
                            });*/
                        $("#carrito tbody").append(tr);
                        total += Number(e.cant)*Number(e.price);
                        cant += Number(e.cant);
                        $("#btnCompra").prop("disabled",false);
                    });
                    $("#tpago").text(total);
                    $("#timp").text(cant);
                }
            }
        });
    }
    getCarrito()
    $("#save-modal").click(function () {
        $('#myModal').modal('hide');
        $('html').loading();
        $.ajax({
            url: "service/service.php/backend/carrito/items",
            type: "POST",
            data: {
                id: $("#id_modal").val(),
                status: '0',
                message: $("#comentario").val()
            },
            success: function (data) {
                console.log(data);
                $('html').loading("stop");
                getCarrito()
            }
        });
    })
    function deletebyid(id){
    	$("body").loading();
    	$.ajax({
    	    url: "service/service.php/backend/carrito/delete_item",
            type: "POST",
            data: {
                id: id
            },
    	    success:function (data) {
    	    	$('body').loading("stop");
    	    	swal("Aviso","Imagen Borrada Exitosamente","success");
    	    	getCarrito()
    	    }
        });
    }
    $("[type='button']").click(function(){
        $("#comentario").val("");
    })
});