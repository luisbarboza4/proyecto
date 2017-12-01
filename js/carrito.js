$("body").loading();
$(document).ready(function(){
    $.ajax({
        url:"service/service.php/backend/carrito/items_descr",
        method:"get",
        success:function(data){
            $("#carrito tbody").empty();
            $("body").loading('stop');
            data = JSON.parse(data);
            console.log(data);
            
            if(data.success){
                var total = 0;
                var cant = 0;
                $.each(data.response,function(i,e){
                    var tr = $("<tr>")
                        .attr("data-id",e.id)
                        .attr("data-carid",e.car_id)
                        .append($("<td>")
                            .append($("<div>")
                                .addClass("img-profile img-circle")
                                .css({"background-image":"url("+e.image+")","width":"100px","height":"100px","margin":"auto"})))
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
                                    var id = $(this).parent().parent().attr("data-id");
                                    var carid = $(this).parent().parent().attr("data-carid");
                                    alert("boton de eliminar debe tener alguna funcion "+id+" "+carid);
                                })))
                        .click(function(e){
                            e.stopPropagation();
                            var id = $(this).attr("data-id");
                            var carid = $(this).attr("data-carid");
                            alert("Cuadro de preview "+id+" "+carid);
                        });
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
    $("#btnCompra").click(function(){
        
        alert("agregar funcion de procesar el carrito"); 
    });
});