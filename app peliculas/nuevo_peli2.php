<?php
  
	include("conexion.php");

	$conexion=mysql_connect($db_host, $db_user, $db_pass) or die("problema server");
	mysql_select_db($db_name,$conexion) or die("problema en db");
  


	 NuevoProducto($_POST['nombre'], $_POST['actor'], $_POST['director'], $_POST['genero'],$_POST['estreno'],$_POST['calidad'],$_POST['ubicacion'],$_POST['tipo'],$_POST['tapa'],$_POST['repetida']);

	function NuevoProducto($nombre,$actor,$director,$genero,$estreno,$calidad,$ubicacion,$tipo,$tapa,$repetida)
	{
		echo $sentencia="INSERT INTO Peliculas ( nombre, actor,director,genero,estreno,calidad,ubicacion,tipo,tapa,repetida)VALUES ('".$nombre."', '".$actor."', '".$director."', '".$genero."', '".$estreno."', '".$calidad."', '".$ubicacion."', '".$tipo."', '".$tapa."', '".$repetida."')";


		mysql_query($sentencia) or die (mysql_error());
	}
?>

<script type="text/javascript">
	alert("Pelicula Ingresado exitosamente");
	window.location.href='mostrar_registros_peliculas.php';
</script>


 