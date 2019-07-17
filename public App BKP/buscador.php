<?
include 'config.php';
?>

<form action="buscador.php" method="get">
<input type="text" name="palabra" value="<?  echo ($_GET["palabra"]);  ?>"  />
<input type="submit" name="buscador" value="Buscar"  />
</form>

<? 

if ($_GET['buscador'])
{

$buscar = $_GET['palabra'];

if (empty($buscar))
{
echo "No se ha ingresado ninguna palabra";
}
else
{

$sql = "SELECT *  FROM Peliculas WHERE nombre LIKE '%$buscar%'";
$result = mysql_query($sql,$connect);

$total = mysql_num_rows($result);

if ($row = mysql_fetch_array($result)) {

echo "Resultados para: $buscar";
echo "Total de resultados: $total";

do {
?>
<br>
<br>
<? echo $row['nombre']; ?> - <? echo $row['calidad']; ?> - <? echo $row['tipo']; ?> - <? echo $row['ubicacion']; ?>

<?
}
while ($row = mysql_fetch_array($result));
}
else
{
echo "No se encontraron resultados para: $buscar";
}
}
}
?>