jQuery(document).ready(function() {

	tinymce.init({
		selector: "#Articulo_contenido",
		inline: true,
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
	
	tinymce.init({
		selector: "#Articulo_titulo",
		inline: true,
		toolbar: "undo redo",
		menubar: false
	});
	
	tinymce.init({
		selector: "#Articulo_pie_imagen",
		inline: true,
		toolbar: "undo redo",
		menubar: false
	});
	
	jQuery('#Articulo_plantilla').change(function(){
		jQuery('#layoutSelected').attr("class", "layout_"+jQuery(this).val());
		jQuery('#layoutSelected').css("display", "block"); 
		//alert("Has seleccionado: "+jQuery(this).val());
	});

});