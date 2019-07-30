<?
/////////// CONEXION A LA BASE DE DATOS ////////

$host="sql8.main-hosting.eu.";
$modelo="u644738137_alito";
$contraseña="SZ17eSOr8Jn1Lv441";
$base="u644738137_fas2";

$conexion= new mysqli($host, $modelo, $contraseña, $base);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

/////////////////variables psot//////////////////////

 
$genero=$_POST['genero'];

////////TITULOS CAMPOS EXPORTADOS Y FORMATO////////////////// 

header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Peliculas x genero.xls');
 
////////////////////QUERIE ODBC//////////////////////////// 
 
$consulta="SELECT * FROM Peliculas where  genero ='$genero' order by nombre";
$resultado=mysqli_query($conexion,$consulta);


//////////////ARMADO DE TITULOS////////////////////
?>
 
<table border="1">
            	<tr style="background-color:red;">
	    
                 	<th>Pelicula</th>
                    <th>Actor</th>
                    <th>Director</th>
                    <th>Genero</th>
                    <th>Año Estreno</th>
                    <th>Calidad</th>
                    <th>Ubicacion Item</th>
                    <th>Original o Copia</th>
                    <th>Repetida</th>
				 
				</tr>
<?php	
//////////////ARMADO DE CAMPOS DE RTA ODBC//////////////////


		while ($row=mysqli_fetch_assoc($resultado)) {
			?> 
				<tr> 
                	<td><?php echo $row['nombre']; ?></td>
                	<td><?php echo $row['actor']; ?></td>
                	<td><?php echo $row['director']; ?></td>
                	<td><?php echo $row['genero']; ?></td>
                	<td><?php echo $row['estreno']; ?></td>
                	<td><?php echo $row['calidad']; ?></td>
                	<td><?php echo $row['ubicacion']; ?></td>
                	<td><?php echo $row['tipo']; ?></td>
                	<td><?php echo $row['repetida']; ?></td>
				</tr>	

			<?php
		}

/////////////CIERRE CONEXION ODBC//////////////////////////////

		mysqli_close($conexion)
	?>
</table>
 