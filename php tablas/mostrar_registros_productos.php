<?php

/////////////////////conexion SQL ////////////////////////////

$host="sql8.main-hosting.eu.";
$usuario="u644738137_alito";
$contrasena="SZ17eSOr8Jn1Lv441";
$base="u644738137_fas2";

$conexion= new mysqli($host,$usuario,$contrasena,$base);
if ($conexion -> connect_errno)
{
	die("fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion -> mysql_connect_error());
}
///////////////////////consulta sql////////////////////////////////

$orlando="SELECT * FROM Productos";
$resorlando=$conexion->query($orlando);
?>



<html lang= "es">
	
    <head>
    	<title>Mostrar registros Orlando</title>
        <meta charset = "utf-8">
        <meta name="viewport" content="wigth=device-width, initial-scale=1, maximum-scale=1"/>
        <link href="css/stilos.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
     </head>
     
     <body>
     	<header>
        	<div class="alert alert-info">
            <h2>Mostrame los registros</h2>
            </div>
        </header>
        
        <section>
        
        	<table class="table">
            	 <tr>
                 	<th>Producto</th>
                    <th>Item</th>
                    <th>Dimensiones</th>
          
  				</tr>
                
                <?php
					while ($registroOrlando= $resorlando ->fetch_array(MYSQLI_BOTH))
					
					{
						echo'<tr>
								<td>'.$registroOrlando['Producto'].'</td>
								<td>'.$registroOrlando['modelo'].'</td>
								<td>'.$registroOrlando['medida'].'</td>
						
							 </tr>';	
					}
				
				
				?>
                
                
                
            </table>	              
        
        
        </section>
        
        <footer>
        </footer>
     </body>
 </html>
               