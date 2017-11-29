$(document).ready(function(){
   	$.ajax({
		url: "service/service.php/images/",
		type: "GET",
		success: function (data) {
			var result = JSON.parse(data);
			result = result.response;
			for (var i = 0 ; i < result.length ; i++ ) {
			    var divitem = $("<div>")
			    .addClass("item col-md-4");
			    var img = $("<img>")
			    //href="#ilusModal" data-toggle="modal" data-target="#ilusModal"
			    .attr({"src" : result[i].ruta,
			    	"href" : "#ilusModal",
			    	"data-toggle" : "modal",
			    	"data-target" : "#ilusModal",
			    	"data-name"   : result[i].name
			    })
			    .addClass("ignore")
			    .on('load',function(){
			    $(this).closest(".item").animate({"opacity" : "1"});
			    })
			    .on('click',function(){
			    	$(".ilumodal .name").html($(this).attr("data-name"));
			    	$(".ilumodal .illus").attr("src" , $(this).attr("src"));
			    	$(".ilumodal .size").attr("disabled", true);
			    	$(".ilumodal .supp").attr("disabled" , true);
			    	var sizes,supp,rel;
			    	$.ajax({
			    		
			    	})
			    });
			    divitem.append(img);
				$(".row.catalogo").append(divitem);
			}
		}
	});

    $('#loginBTN').click(function(e){
  		e.preventDefault();
  		$('#mensajeError').hide();
  		$("#cargandoLogin").show();
  		$.ajax({
		    url: "service/service.php/session/login",
		    data: $('#modalLogin').serialize(),
		    type: "POST",
		    success:function (data) {
		    	var result = JSON.parse(data);
		    	if(!result.success){
		    		$('#mensajeError').show();
		    	    $('#mensajeError').html(result.message);
		    	}else{
		    		$("#modalLogin").submit();
		    	}
		    	$("#cargandoLogin").hide();
		    }
  		});
  	
      });
      document.oncontextmenu = function(){
		return false
	  }
});