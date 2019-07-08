 $(buscar_datos());
 
  
 function buscar_datos(consulta){
	 $.ajax({
			url: 'App/buscar.php',
			type:'POST',
			datatype: 'html',
			data: {consulta: conslta},
		})
		.done(function(respuesta){
			$("$datos").html(respuesta);
			
		})
		.fail(function(){
			console.log("error");
		})
}

$(documento).on('keyup','#caja_busqueda', function(){
	var valor = $(this).val();
	if(valor != ""){
		buscar_datos(vaalor);
	}else{
	buscar_datos();	
	
	}
});		
