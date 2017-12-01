$('html').loading();
$(document).ready(function () {
    $.ajax({
    	url: "service/service.php/backend/config",
    	type: "GET",
    	success: function (data) {
    		var result = JSON.parse(data);
    		result = result.response;
    		if (result.name_user) {
    			$("h3").text(result.name_user.value);
    		}
    		if (result.about_user) {
    			$("p").text(result.about_user.value);
    		}
    		if (result.image_user) {
    			$(".img-profile").css({
    			    "background-image":"url("+result.image_user.value+"?time="+(new Date()).getTime()+")"
    			});
    		}
    		$('html').loading("stop");
    	}
    });
    document.oncontextmenu = function () {
		return false
	}
})