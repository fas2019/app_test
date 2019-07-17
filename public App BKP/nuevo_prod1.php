<?php
  
  include("conexion.php");

$conexion=mysql_connect($db_host, $db_user, $db_pass) or die("problema server");
mysql_select_db($db_name,$conexion) or die("problema en db");
  
  
  
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Alta de Producto</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="todo">
  
  <div id="cabecera">
  	<img src="img/swirl.png" width="1188" id="img1">
  </div>
  
  <div id="contenido">
  	<div style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<span> <h1>Alta de Nuevo Pelicula</h1> </span>
  		<br>
	  <form action="nuevo_prod2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
  		<label>id : Automaticamente Generado </label>
  		<input type="hidden" id="id" name="id"><br>
  		
  		<label>Pelicula: </label>
  		<input type="text" id="nombre" name="nombre" ><br>
  		
		<label>Actor Principal: </label>
  		<input type="text" id="actor" name="actor" ><br>
		
		<label>Director: </label>
  		<input type="text" id="director" name="director" ><br>
		
		<label>Genero: </label>
  		<input type="text" id="genero" name="genero" ><br>
		
		<label>Ano Estreno: </label>
  		<input type="text" id="estreno" name="estreno" ><br>
		
		
		<label>Calidad: </label>
  		<input type="text" id="calidad" name="calidad" ><br>
		
		<label>Ubicacion guardada: </label>
  		<input type="text" id="ubicacion" name="ubicacion" ><br>
		
		<label>Tipo: </label>
  		<input type="text" id="tipo" name="tipo" ><br>
		
		<label>Indicar el destino la Tapa: </label>
  		<input type="text" id="tapa" name="tapa" ><br>
		
		<label>La tengo repetida: </label>
  		<input type="text" id="repetida" name="repetida" ><br>
		
  		
  		<br>
  		<button type="submit" class="btn btn-success">Guardar</button>
  		<a href="form.html"> <button type='button' class='btn btn-danger'>Subir Imagen</button>
     </form>
  	</div>
  	
  </div>
  
	<div id="footer">
  		<img src="img/swirl2.png"  width="1188" id="img2">
  	</div>

</div>
<body>

</body>

</body>
</html>

 