/**
 * Created by gustavog on 10/04/17.
 */
jQuery.fn.loading = function(options){
    var o = (this);
    var isShow = undefined;
    var settings = {
        autoShow:true,
        message:"Loading",
        background:"rgba(255,255,255,0.75)",
        textcolor:"#000000"
    };
    if(typeof options == "string") isShow = options;
    if(typeof options == "object"){
        for(k in options){
            settings[k] = options[k];
        }
    }
    if(isShow == undefined) isShow ="show";
    if (jQuery(o).find("#loader-wrapper").length == 0) {
        var div = jQuery('<div id="loader-wrapper"></div>');
        var divload = jQuery('<div id="loader"></div>');
        var divmessage = jQuery('<div class="messageDialog"></div>');
        var divleft = jQuery('<div class="loader-section section-left"></div>');
        var divRight = jQuery('<div class="loader-section section-right"></div>');
        jQuery(divmessage).append(settings.message);
        jQuery(divleft).css("background",settings.background);
        jQuery(divRight).css("background",settings.background);
        jQuery(divmessage).css("color",settings.textcolor);
        jQuery(divmessage).css("color",settings.textcolor);
        jQuery(div).append(divload);
        jQuery(div).append(divmessage);
        jQuery(div).append(divleft);
        jQuery(div).append(divRight);
        if(!settings.autoShow){
            isShow = "stop";
        }
        jQuery(o).prepend(div);
    } else {
        var div = jQuery(o).find("#loader-wrapper");
    }
    if (isShow == "show") {
        if (jQuery(o).hasClass("loaded")) {
            jQuery(o).removeClass("loaded");
        }
    } else if(isShow == 'stop'){
        jQuery(o).addClass("loaded");
        setTimeout(function(){
            jQuery(o).find("#loader-wrapper").remove();
            jQuery(o).removeClass("loaded");
        },1180);
    }
    return this;
}