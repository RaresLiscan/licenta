
<?php

include("Conectare.php");
// se verifica daca id a fost primit
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
// preluam variabila 'id' din URL
$id = $_GET['id'];
echo $id;
// stergem inregistrarea cu ib=$id
if ($stmt = $mysqli->prepare("DELETE FROM services WHERE id = ? LIMIT 1"))
{
$stmt->bind_param("i",$id);
$stmt->execute();
$stmt->close();
}
else
{
echo "ERROR: Nu se poate executa delete.";
}
$mysqli->close();
echo "<div>Inregistrarea a fost stearsa!!!!</div>";
}
echo "<p><a href=\"Admin.php\">Index</a></p>";
echo "<p><a href=\"logout.php\">Iesire</a></p>";
?>