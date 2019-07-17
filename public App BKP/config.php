<?PHP

$host = " "; 	//TU HOST//
$dbuser = " ";	 	//TU USUARIO DEL HOST//
$dbpwd = " ";	//TU CONTRASEÑA//
$db = " ";		//TU BASE DE DATOS//

$connect = mysql_connect ($host, $dbuser, $dbpwd);
if(!connect)
echo ("No se pudo conectar a la base de datos");
else
$select = mysql_select_db($db);
?>


 