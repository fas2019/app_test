<?php
  include("conexion.php");
  
  $id= $_GET['id'];

    $sentencia="SELECT * FROM Peliculas WHERE id=".$id." ";
    $resultado=$conexion->query($sentencia);
    $filas=$resultado->fetch_array(MYSQLI_BOTH);


  
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
	  <form action="modif_pelicula2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
  		<label>id : Automaticamente Generado </label>
  		<input type="hidden" id="id" name="id" value="<?php echo $filas['id']; ?>" ><br>
  		
  		<label>Pelicula: </label>
  		<input type="text" id="nombre" name="nombre" value="<?php echo $filas['nombre']; ?>" ><br>
  		
		<label>Actor Principal: </label>
  		<input type="text" id="actor" name="actor" value="<?php echo $filas['actor']; ?>" ><br>
		
		<label>Director: </label>
  		<input type="text" id="director" name="director" value="<?php echo $filas['director']; ?>" ><br>
		
		<label>Genero: </label>
  		<input type="text" id="genero" name="genero" value="<?php echo $filas['genero']; ?>" ><br>
		
		<label>Ano Estreno: </label>
  		<input type="text" id="estreno" name="estreno" value="<?php echo $filas['estreno']; ?>" ><br>
		
		
		<label>Calidad: </label>
  		<input type="text" id="calidad" name="calidad" value="<?php echo $filas['calidad']; ?>" ><br>
		
		<label>Ubicacion guardada: </label>
  		<input type="text" id="ubicacion" name="ubicacion" value="<?php echo $filas['ubicacion']; ?>" ><br>
		
		<label>Tipo: </label>
  		<input type="text" id="tipo" name="tipo" value="<?php echo $filas['tipo']; ?>" ><br>
		
		<label>Indicar el destino la Tapa: </label>
  		<input type="text" id="tapa" name="tapa" value="<?php echo $filas['tapa']; ?>" ><br>
		
		<label>La tengo repetida: </label>
  		<input type="text" id="repetida" name="repetida" value="<?php echo $filas['repetida']; ?>" ><br>
		
  		
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
 