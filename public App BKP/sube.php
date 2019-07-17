<?  
if($_POST){ 
// Creamos la cadena aletoria 
$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
$cad = ""; 
for($i=0;$i<12;$i++) { 
$cad .= substr($str,rand(0,62),1); 
} 
// Fin de la creacion de la cadena aletoria 
$tamano = $_FILES [ 'file' ][ 'size' ]; // Leemos el tamaño del fichero 
$tamaño_max="50000000000"; // Tamaño maximo permitido 
if( $tamano < $tamaño_max){ // Comprovamos el tamaño  
$destino = 'images' ; // Carpeta donde se guardata 
$sep=explode('image/',$_FILES["file"]["type"]); // Separamos image/ 
$tipo=$sep[1]; // Optenemos el tipo de imagen que es 
if($tipo == "gif" || $tipo == "jpeg" || $tipo == "png"){ // Si el tipo de imagen a subir es el mismo de los permitidos, segimos. Puedes agregar mas tipos de imagen 
move_uploaded_file ( $_FILES [ 'file' ][ 'tmp_name' ], $destino . '/' .$cad.'.'.$tipo);  // Subimos el archivo 
include('post.html'); // Incluimos la plantilla 
} 
else echo "el tipo de archivo no es de los permitidos";// Si no es el tipo permitido lo desimos 
} 
else echo "El archivo supera el peso permitido.";// Si supera el tamaño de permitido lo desimos 
} 
?>

<a href="nuevo_prod1.php"> <button type='button' class='btn btn-danger'>Cargar los datos de la pelicula</button>