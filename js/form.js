jQuery(document).ready(function() {
    
    if(jQuery("#Articulo_plantilla").val()==1 || jQuery("#Articulo_plantilla").val()==2){
            jQuery(".url_img").css("display", "block");
            jQuery(".pie_img").css("display", "none");
        }
        else if(jQuery("#Articulo_plantilla").val()==3){
            jQuery(".url_img").css("display", "block");
            jQuery(".pie_img").css("display", "block");
        }
        else if(jQuery("#Articulo_plantilla").val()==4 || jQuery("#Articulo_plantilla").val()==5){
            jQuery(".url_img").css("display", "none");
            jQuery(".pie_img").css("display", "none");
        }

	jQuery('#Articulo_plantilla').change(function(){
		if(jQuery(this).val()==1 || jQuery(this).val()==2){
		    jQuery(".url_img").css("display", "block");
            jQuery(".pie_img").css("display", "none");
		}
		else if(jQuery(this).val()==3){
            jQuery(".url_img").css("display", "block");
            jQuery(".pie_img").css("display", "block");
        }
        else if(jQuery(this).val()==4 || jQuery(this).val()==5){
            jQuery(".url_img").css("display", "none");
            jQuery(".pie_img").css("display", "none");
        }
    		
	});
	
	jQuery('#Spot_id_categoria').change(function(){
	    if(jQuery(this).val()){
	        jQuery('#imagen_cat').attr("class", "img_"+jQuery(this).val());
            jQuery('#imagen_cat').css("display", "block"); 
       
	    }
	    else{
            jQuery('#imagen_cat').css("display", "none");    
	    }
	    
    });
    
    jQuery('#imagen_cat').click(function(e){
            /**/

              if(e.offsetX==undefined) // this works for Firefox
              {
                xpos = Math.round(e.pageX-$('#imagen_cat').offset().left);
                ypos = Math.round(e.pageY-$('#imagen_cat').offset().top);
              }             
              else                     // works in Google Chrome
              {
                xpos = e.offsetX;
                ypos = e.offsetY;
              }
                jQuery('#Spot_p_left').val(xpos);
                jQuery('#Spot_p_top').val(ypos);
                jQuery('#tip').css("left", xpos-11+"px");
                jQuery('#tip').css("top", ypos-11+"px");
                jQuery('#tip').css("display", "block");
    });

});