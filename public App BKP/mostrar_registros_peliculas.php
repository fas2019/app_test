<?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

$host="";
$modelo="";
$contraseña="";
$base="";

$conexion= new mysqli($host, $modelo, $contraseña, $base);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}
////////////////// VARIABLES DE CONSULTA////////////////////////////////////

$where="";
$nombre=$_POST['xnombre'];
$tipo=$_POST['xtipo'];
 


////////////////////// BOTON BUSCAR //////////////////////////////////////

if (isset($_POST['buscar']))
{

	

	if (empty($_POST['xtipo']))
	{
		$where="where nombre like '".$nombre."%'";
	}

	else if (empty($_POST['xnombre']))
	{
		$where="where tipo='".$tipo."'";
	}
 

	else
	{
		$where="where nombre like '".$nombre."%' and tipo='".$tipo."'" ;
	}
}
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////

$Peliculas="SELECT * FROM Peliculas $where Order by nombre";
$resPeliculas=$conexion->query($Peliculas);
$restipo=$conexion->query($Peliculas);


if(mysqli_num_rows($resPeliculas)==0)
{
	$mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
}
?>
<html lang="es">

	<head>
		<title>Registro de FAS MOVIES</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

		<link href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h2>Registro de FAS MOVIES</h2>
			</div>
		</header>
		<section>
			<form method="post">
				<input type="text" placeholder="Nombre..." name="xnombre"/>
				<select name="xtipo">
					<option value="">tipo </option>
					<?
						while ($registrotipo = $restipo->fetch_array(MYSQLI_BOTH))
						{
							echo '<option value="'.$registrotipo['tipo'].'">'.$registrotipo['tipo'].'</option>';
						    
						}
					?>

				</select>
			
                  
			
				
				<button name="buscar" type="submit">Buscar</button>

			</form>
			<table class="table">
			     
				<tr>
                 	<th>Pelicula</th>
                    <th>Actor</th>
                    <th>Director</th>
                    <th>Genero</th>
                    <th>Año Estreno</th>
                    <th>Calidad</th>
                    <th>Ubicasion Item</th>
                    <th>Original o Copia</th>
                    <th>Repetida</th>
                    <th>tapa</th>
                    <th> <a href="nuevo_prod1.php"> <button type="button" class="btn btn-info">Nuevo</button> </a> </th>
				</tr>
				
         	
			 
				<?php
               
                
				while ($registroPeliculas = $resPeliculas->fetch_array(MYSQLI_BOTH))
				{

					echo'<tr>
								<td>'.$registroPeliculas['nombre'].'</td>
								<td>'.$registroPeliculas['actor'].'</td>
								<td>'.$registroPeliculas['director'].'</td>
								<td>'.$registroPeliculas['genero'].'</td>
								<td>'.$registroPeliculas['estreno'].'</td>
								<td>'.$registroPeliculas['calidad'].'</td>
								<td>'.$registroPeliculas['ubicacion'].'</td>
								<td>'.$registroPeliculas['tipo'].'</td>
							    <td>'.$registroPeliculas['repetida'].'</td>
						        <td>'; echo "<img src='".$registroPeliculas['tapa']."' width='60' >"; echo '</td>;
						        <td>'; echo "<a href='eliminar_prod.php?id=".$registroPeliculas['id']."'> <button type='button' class='btn btn-danger'>Eliminar</button> </a>"; echo '</td>;
						       
        
						
                         
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
               