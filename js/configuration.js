$('html').loading();
$(document).ready(function(){
    function clearModal(){
    	$("#name_modal").val("");
    	$("#size_modal").val("");
    	$("#id_modal").val("0");
    }
    $("[data-dismiss]").click(clearModal);
    function showModal(result) {
        $("#name_modal").val(result.name);
    	$("#size_modal").val(result.resolucion);
    	$("#id_modal").val(result.id);
    	$('#myModal').modal('show');
    }
    $("#buscar").keyup(filter);
    function filter(){
        filter = $(this).val().toUpperCase();
        $('#lista tbody tr').each(function(i,e){
          if ($(e).find("td:first").html().toUpperCase().indexOf(filter) > -1) {
            $(e).show();
          } else {
            $(e).hide();
          }
        })
    }
    function deletebyid(id){
    	var pag = $("#pag").val();
    	$('html').loading();
    	$.ajax({
    	    url: "ajax/savetypesize.php?type=del&pag="+pag,
    	    type: "POST",
    	    data: {
    	        id: id
    	    },
    	    success:function (data) {
    	    	$('html').loading("stop");
    	    	swal("Aviso",(pag=='size' ? 'Tamaño' : 'Soporte')+" Borrado Exitosamente","success");
    	    }
        });
    }
    $("#save-modal").click(function(){
        var name = $("#name_modal").val();
        if(name==""){
            swal("Alerta","Nombre de "+(pag=='size' ? 'Tamaño' : 'Soporte')+" no puede estar vacio","error");
            return false;
        }
        var size = $("#size_modal").val();
        var pag = $("#pag").val();
        var type = $("#id_modal").val()== 0 ? "post": "update";
        $('#myModal').modal('hide');
    	$('html').loading();
    	$.ajax({
            url: "ajax/savetypesize.php?type="+type+"&pag="+pag,
            type: "POST",
            data: {
                id: $("#id_modal").val(),
                name: name,
                size: size
            },
            success:function (data) {
            	$('html').loading("stop");
            	clearModal();
            	swal("Aviso",(pag=='size' ? 'Tamaño' : 'Soporte')+" Guardado Exitosamente","success");
            	search();
            }
    	});
    })
    function search(){
        var pag = $("#pag").val();
        $('html').loading();
    	$.ajax({
            url: "ajax/savetypesize.php?type=get&pag="+pag,
            type: "POST",
            success:function (data) {
            	$('html').loading("stop");
            	var result = JSON.parse(data);
            	$("#lista tbody").empty()
            	$(result).each(function(i,e){
            	  $("#lista tbody").append(
            	      $('<tr>').append(
            	          $('<td>').text(e.name))
            	          .append(
            	              $('<td>').append(
            	                  $('<button>')
            	                  .attr('type','button')
            	                  .addClass('btn btn-primary')
            	                  .data('full-item',JSON.stringify(e))
            	                  .append($('<span>')        	                  
            	                  .addClass('glyphicon glyphicon-edit')
            	                  .text('Editar')
            	                  )
            	              )
            	              .append(
            	                  $('<button>')
            	                  .attr('type','button')
            	                  .addClass('btn btn-danger')
            	                  .attr('item-id',e.id)
            	                  .append($('<span>')        	                  
            	                  .addClass('glyphicon glyphicon-trash')
            	                  .text('Eliminar')        	              
            	                  )
            	          )
            	      )
            	    );
            	    $("#lista tbody tr:last td:last .btn-danger").click(function(){
            			
            		    var button = this;
                        swal({
							title: "Aviso",
							text: "Desea eliminar este "+(pag=='size' ? 'Tamaño' : 'Soporte')+"?",
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
            				    deletebyid($(button).attr("item-id"))
							}
						});
						/*if(confirm("Desea eliminar este "+(pag=='size' ? 'Tamaño' : 'Soporte'))){
            				$(this).parent().parent().remove();
            				deletebyid($(this).attr("item-id"))
            			}*/
            		})
            		$("#lista tbody tr:last td:last .btn-primary").click(function(){
            			showModal(JSON.parse($(this).data("full-item")));
            		})
            	});    
            }
    	});
    }
    search();
});