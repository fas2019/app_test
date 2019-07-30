<?php
 

include("conexion.php");

$conexion=mysql_connect($db_host, $db_user, $db_pass) or die("problema server");
mysql_select_db($db_name,$conexion) or die("problema en db");

$reg=mysql_query("SELECT id FROM Peliculas WHERE id='$_GET[id]'",$conexion);

if($re=mysql_fetch_array($reg))
{
mysql_query("DELETE FROM Peliculas WHERE id='$_GET[id]'",$conexion);
echo "datos eliminados";
}else{
	echo "dato no se borraron";
}

?>
 
<script type="text/javascript">
	alert("Producto Eliminado exitosamente");
	window.location.href='http://fas-sistems.pe.hu/mostrar_registros_peliculas.php';
</script>