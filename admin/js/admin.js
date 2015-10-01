/**
 * Custom jQuery functions and trigger events
 */
jQuery(document).ready(function($){
	$("#setting-error-settings_updated").hide();
	
	// Show Hide Toggle Box
	$(".option-content").hide();
	
	$(".open").show();

	$("h3.option-toggle").click(function(){
	$(this).toggleClass("option-active").next().slideToggle("fast");
		return false; 
	});

    setTimeout(function () {
        $(".fade").fadeOut("slow", function () {
            $(".fade").remove();
        });

    }, 2000);
	
	if (jQuery('#catchwebtools_seo_title').length ) {
	var length	=	jQuery("#catchwebtools_seo_title").val().length;
			jQuery("#catchwebtools_seo_title_left").html(70-length);
		
		length	=	jQuery("#catchwebtools_seo_description").val().length;
			jQuery("#catchwebtools_seo_description_left").html(156-length);
		
		jQuery("#catchwebtools_seo_title").keypress (function(){
			var length	=	jQuery(this).val().length;
			jQuery("#catchwebtools_seo_title_left").html(70-length);
		});
		jQuery("#catchwebtools_seo_description").keypress (function(){
			var length	=	jQuery(this).val().length;
			jQuery("#catchwebtools_seo_description_left").html(156-length);
		});
	}
	
	//For Color picker in social icons
	if (jQuery('#catchwebtools_social_colorpicker').length ) {
		$('#catchwebtools_social_colorpicker').hide();
		
		$("#catchwebtools_social_color").click(function(){jQuery('#catchwebtools_social_colorpicker').slideToggle()});
		
		$('#catchwebtools_social_colorpicker').farbtastic(function() {
			$("#catchwebtools_social_color").css("background-color",$.farbtastic('#catchwebtools_social_colorpicker').color).css("color", invertColor($.farbtastic('#catchwebtools_social_colorpicker').color));
			
			$("#catchwebtools_social_color").val($.farbtastic('#catchwebtools_social_colorpicker').color);
			
			$(".genericon").css("color", $.farbtastic('#catchwebtools_social_colorpicker').color);
		});
		
		var default_color	=	$("#catchwebtools_social_color").val();
		
		var icon_size		=	$("#catchwebtools_social_icon_size").val() + 'px';
		
		$("#catchwebtools_social_color").css({
			'background-color' 	:	default_color,
			'color'	:	invertColor(default_color)
		});
	}
	
	$(".genericon").css({
		'color' 	:	default_color,
   		'font-size'	:	icon_size,
		width 		: 	icon_size,
   		height 		:	icon_size
	});
	
	$("#catchwebtools_social_icon_size").change(function(){
		var size	=	this.value + 'px';
		
		$(".genericon").css({
			'font-size'	:	size,
			width 		: 	size,
			height 		:	size
		});
	});
	
});

/**
 * Function to inverted hex color with the one in parameter 
 * @param  {[string]} hexTripletColor [hex color]
 * @return {[string]}                 [inverted hex color]
 */
function invertColor(hexTripletColor) {
    var color = hexTripletColor;
    color = color.substring(1);           // remove #
    color = parseInt(color, 16);          // convert to integer
    color = 0xFFFFFF ^ color;             // invert three bytes
    color = color.toString(16);           // convert to hex
    color = ("000000" + color).slice(-6); // pad with leading zeros
    color = "#" + color;                  // prepend #
    return color;
}

