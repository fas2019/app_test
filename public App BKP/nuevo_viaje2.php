<?php
  
	include("conexion.php");

	$conexion=mysql_connect($db_host, $db_user, $db_pass) or die("problema server");
	mysql_select_db($db_name,$conexion) or die("problema en db");
  
	

	 NuevoProducto($_POST['usuario'], $_POST['Local'], $_POST['Producto'], $_POST['Cantidad'],$_POST['Importe_Dolar'],$_POST['TC'],$_POST['Destino'],$_POST['observacion'],$_POST['ticket']);
	

     
	
	function NuevoProducto($usuario,$Local,$Producto,$Cantidad,$Importe_Dolar,$TC,$Destino, $observacion, $ticket)
	
	{
		echo $sentencia="INSERT INTO Orlando ( usuario, Local,Producto,Cantidad,Importe_Dolar,TC,Fecha,Pesos,pesos_unidad,Destino,observacion, ticket)VALUES ('".$usuario."', '".$Local."', '".$Producto."', '".$Cantidad."', '".$Importe_Dolar."', '".$TC."', (NOW()), (round(('".$Importe_Dolar."')*( '".$TC."'),2)),(round(('".$Importe_Dolar."')*( '".$TC."')/('".$Cantidad."'),2)),'".$Destino."', '".$observacion."', '".$ticket."')";


		mysql_query($sentencia) or die (mysql_error());
	}
?>

<script type="text/javascript">
	alert("Factura del viaje Ingresado exitosamente");
	window.location.href=' mostrar_registros.php';
</script>
