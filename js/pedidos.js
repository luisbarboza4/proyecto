$('html').loading();
$(document).ready(function(){
    function clearModal(){
    	$("#status").prop("checked",false);
    	$("#lista-art table tbody").empty();
    	$("#id_modal").val("0");
    }
    $("[data-dismiss]").click(clearModal);
    $("[data-toggle]").click(clearModal);
    function showModal(result) {
        clearModal();
        $("#status").prop("checked",result.active==0 ? false : true);
    	$(result.items).each(function(i,e){
            $("#lista-art table tbody").append(
                $('<tr>').append(
                          $('<td>').text(e.imagen))
                          .append(
                          $('<td>').text(e.size))
                          .append(
                          $('<td>').text(e.soporte))
                          .append(
                          $('<td>').text(e.cantidad))
                          .append(
                          $('<td>')
                          .data('src-image',e.ruta)
                          .append("<span class='glyphicon glyphicon-picture'></span>")
                          .click(function(){
                            window.open($(this).data("src-image"));
                          })
                          
                )
            )
        })
    	$("#id_modal").val(result.id);
    	$('#myModal').modal('show');
    }
    $("#buscar").keyup(function(){
        filter = $(this).val().toUpperCase();
        $('#lista tbody tr').each(function(i,e){
          if ($(e).find("td:first").html().toUpperCase().indexOf(filter) > -1) {
            $(e).show();
          } else {
            $(e).hide();
          }
        })
    });
    $("#status_select").change(function(){
        filter = $(this).val().toUpperCase();
        if(filter==""){
            $('#lista tbody tr').show();
        }else{
            $('#lista tbody tr').each(function(i,e){
              if ($(e).find("td:last").html().toUpperCase().indexOf(filter) > -1) {
                $(e).show();
              } else {
                $(e).hide();
              }
            })
        }
        
    });
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
    $("#save-modal").click(function(){
        $('#myModal').modal('hide');
    	$('html').loading();
    	$.ajax({
            url: "ajax/savecarrito.php?type=update",
            type: "POST",
            data: {
                id: $("#id_modal").val(),
                status: $("#status").prop("checked")==true ? 1 : 0,
            },
            success:function (data) {
            	$('html').loading("stop");
                search()
            }
    	});
    })
    function search(){
        $('html').loading();
    	$.ajax({
            url: "ajax/savecarrito.php?type=get",
            type: "POST",
            success:function (data) {
            	$('html').loading("stop");
            	var result = JSON.parse(data);
            	$("#lista tbody").empty()
            	$(result).each(function(i,e){
            	  $("#lista tbody").append(
            	      $('<tr>').append(
            	          $('<td>').text(e.nombre+" "+e.apellido))
            	          .append(
            	          $('<td>').text(e.fecha))
                          .append(
                          $('<td>').text(e.active))
                          .data("full-item",e)
            	    );
            		$("#lista tbody tr:last").click(function(){
            			showModal($(this).data("full-item"));
            		})
            	});
            }
    	});
    }
    search();
    $("[href]").click(function(){
      $('html').loading();
    })
});