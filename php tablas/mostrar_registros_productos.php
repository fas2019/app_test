<?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

$host="sql8.main-hosting.eu.";
$modelo="u644738137_alito";
$contraseña="SZ17eSOr8Jn1Lv441";
$base="u644738137_fas2";

$conexion= new mysqli($host, $modelo, $contraseña, $base);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}
////////////////// VARIABLES DE CONSULTA////////////////////////////////////

$where="";
$modelo=$_POST['xmodelo'];
$Producto=$_POST['xProducto'];


////////////////////// BOTON BUSCAR //////////////////////////////////////

if (isset($_POST['buscar']))
{

	

	if (empty($_POST['xProducto']))
	{
		$where="where modelo like '".$modelo."%'";
	}

	else if (empty($_POST['xProducto']))
	{
		$where="where Producto='".$Producto."'";
	}

	else
	{
		$where="where modelo like '".$modelo."%' and Producto='".$Producto."'";
	}
}
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////

$Productos="SELECT * FROM Productos $where";
$resProductos=$conexion->query($Productos);
$resProducto=$conexion->query($Productos);

if(mysqli_num_rows($resProductos)==0)
{
	$mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
}
?>
<html lang="es">

	<head>
		<title>Registro de Productos ya tenemos</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

		<link href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h2>Registro de Productos ya tenemos</h2>
			</div>
		</header>
		<section>
			<form method="post">
				<input type="text" placeholder="Nombre..." name="xmodelo"/>
				<select name="xProducto">
					<option value="">Producto </option>
					<?
						while ($registroProducto = $resProducto->fetch_array(MYSQLI_BOTH))
						{
							echo '<option value="'.$registroProducto['Producto'].'">'.$registroProducto['Producto'].'</option>';
						}
					?>
				</select>
				

				
				<button name="buscar" type="submit">Buscar</button>
			</form>
			<table class="table">
				<tr>
                 	<th>Producto</th>
                    <th>Nombre</th>
                    <th>Dimensiones</th>
				</tr>

				<?php

				while ($registroProductos = $resProductos->fetch_array(MYSQLI_BOTH))
				{

					echo'<tr>
								<td>'.$registroProductos['Producto'].'</td>
								<td>'.$registroProductos['modelo'].'</td>
								<td>'.$registroProductos['medida'].'</td>
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
