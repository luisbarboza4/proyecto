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
	        	alert((pag=='size' ? 'Tamaño' : 'Soporte')+" Borrado Exitosamente");
	        }
    	});
	}
$("#save-modal").click(function(){
    var name = $("#name_modal").val();
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
        	alert((pag=='size' ? 'Tamaño' : 'Soporte')+" Guardado Exitosamente");
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
        	for(var i in result) {
        	  $("#lista tbody").append(
        	      $('<tr>').append(
        	          $('<td>').text(result[i].name))
        	          .append(
        	              $('<td>').append(
        	                  $('<button>')
        	                  .attr('type','button')
        	                  .addClass('btn btn-primary')
        	                  .data('full-item',JSON.stringify(result[i]))
        	                  .append($('<span>')        	                  
        	                  .addClass('glyphicon glyphicon-edit')
        	                  .text('Editar')
        	                  )
        	              )
        	              .append(
        	                  $('<button>')
        	                  .attr('type','button')
        	                  .addClass('btn btn-danger')
        	                  .attr('item-id',result[i].id)
        	                  .append($('<span>')        	                  
        	                  .addClass('glyphicon glyphicon-trash')
        	                  .text('Eliminar')        	              
        	                  )
        	          )
        	      )
        	    );
        	    $("#lista tbody tr:last td:last .btn-danger").click(function(){
        			if(confirm("Desea eliminar este "+(pag=='size' ? 'Tamaño' : 'Soporte'))){
        				$(this).parent().parent().remove();
        				deletebyid($(this).attr("item-id"))
        			}
        		})
        		$("#lista tbody tr:last td:last .btn-primary").click(function(){
        			showModal(JSON.parse($(this).data("full-item")));
        		})
        	}        
        }
	});
}
search();