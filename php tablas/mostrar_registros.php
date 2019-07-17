<?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

$host="";
$usuario="";
$contraseña="";
$base="";

$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}
////////////////// VARIABLES DE CONSULTA////////////////////////////////////

$where="";
$usuario=$_POST['xusuario'];
$Destino=$_POST['xDestino'];


////////////////////// BOTON BUSCAR //////////////////////////////////////

if (isset($_POST['buscar']))
{

	

	if (empty($_POST['xusuario']))
	{
		$where="where Destino like '".$Destino."%'";
	}

	else if (empty($_POST['xDestino']))
	{
		$where="where usuario='".$usuario."'";
	}

	else
	{
		$where="where usuario like '".$usuario."%' and Destino='".$Destino."'";
	}
}
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////

$Orlando="SELECT * FROM Orlando $where";
$resOrlando=$conexion->query($Orlando);
$resDestino=$conexion->query($Orlando);

if(mysqli_num_rows($resOrlando)==0)
{
	$mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
}
?>
<html lang="es">

	<head>
		<title>Registros de Viaje</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

		<link href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h2>Registros de Viaje</h2>
			</div>
		</header>
		<section>
			<form method="post">
				<input type="text" placeholder="Nombre..." name="xusuario"/>
				<select name="xDestino">
					<option value="">Destino </option>
					<?
						while ($registroDestino = $resDestino->fetch_array(MYSQLI_BOTH))
						{
							echo '<option value="'.$registroDestino['Destino'].'">'.$registroDestino['Destino'].'</option>';
						}
					?>
				</select>
				

				
				<button name="buscar" type="submit">Buscar</button>
			</form>
			<table class="table">
				<tr>
					<th>Usuario</th>
					<th>Local</th>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Importe_Dolar</th>
					<th>TC</th>
					<th>Fecha</th>
					<th>Pesos</th>
					<th>pesos_unidad</th>
					<th>Destino</th>
				</tr>

				<?php

				while ($registroOrlando = $resOrlando->fetch_array(MYSQLI_BOTH))
				{

					echo'<tr>
						 <td>'.$registroOrlando['usuario'].'</td>
						 <td>'.$registroOrlando['Local'].'</td>
						 <td>'.$registroOrlando['Producto'].'</td>
						 <td>'.$registroOrlando['Cantidad'].'</td>
						 <td>'.$registroOrlando['Importe_Dolar'].'</td>
						 <td>'.$registroOrlando['TC'].'</td>
						 <td>'.$registroOrlando['Fecha'].'</td>
						 <td>'.$registroOrlando['Pesos'].'</td>
						 <td>'.$registroOrlando['pesos_unidad'].'</td>
						 <td>'.$registroOrlando['Destino'].'</td>
						 </tr>';
				}
				?>
			</table>

			<?
				echo $mensaje;
			?>
		</section>
	</body>
</html>
