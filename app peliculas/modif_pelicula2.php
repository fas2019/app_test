<?php
 

	include("conexion.php");

	$conexion=mysql_connect($db_host, $db_user, $db_pass) or die("problema server");
	mysql_select_db($db_name,$conexion) or die("problema en db");
  


	 NuevoProducto($_POST['id'],$_POST['nombre'], $_POST['actor'], $_POST['director'], $_POST['genero'],$_POST['estreno'],$_POST['calidad'],$_POST['ubicacion'],$_POST['tipo'],$_POST['tapa'],$_POST['repetida']);

	function NuevoProducto($id,$nombre,$actor,$director,$genero,$estreno,$calidad,$ubicacion,$tipo,$tapa,$repetida)
	{
		echo $sentencia="UPDATE Peliculas SET  
		nombre = '".$nombre."',
		actor = '".$actor."',
		director = '".$director."',
		genero = '".$genero."',
		estreno = '".$estreno."',
		calidad = '".$calidad."',
		ubicacion = '".$ubicacion."',
		tipo = '".$tipo."',
		tapa = '".$tapa."',
		repetida = '".$repetida."'
		
	     where id= '".$id."'";


		mysql_query($sentencia) or die (mysql_error());
	}
?>
	
 

<script type="text/javascript">
	alert("Producto Modificado exitosamente");
	window.location.href='mostrar_registros_peliculas.php';
</script>