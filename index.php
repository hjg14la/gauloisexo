<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
    
<?php

//unset($_SESSION);
try//nomrecette tempspreparation categorie
{
	$mysqlClient = new PDO('mysql:host=localhost;dbname=gaulois;charset=utf8', 'root', '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
//$id_lieu = 4;
$sqlQuery = 'SELECT * FROM lieu';//where lieu.id_lieu=:id_lieu';
$gauloisStatement = $mysqlClient->prepare($sqlQuery);
$gauloisStatement->execute();
$gauloisl = $gauloisStatement->fetchAll();

?>

<?php echo "<div><table><tbody>";
?>
<?php foreach ($gauloisl as $gauloisc) { 
    echo "<li><a href=traitement.php?action=nomvillage&id=".$gauloisc['id_lieu']."
    &name=".$gauloisc['nom_lieu'].
    ">".$gauloisc['nom_lieu']."</a></li>";

} 
?>    

<?php echo "</tbody></table></div>";

//$_GLOBALS=null;

//echo var_dump($_SESSION);
$id_village=$_SESSION['idvillage'];
$nom_du_village="";

foreach ($gauloisl as $gauloisc) {
 if ($gauloisc['id_lieu']==$id_village[0]) {
    $nom_du_village=$gauloisc['nom_lieu'];
 }
}
$village=$nom_du_village;//$_SESSION['nomvillage'];
echo "VILLAGE: ".$village." ";
?>
<?php
$id_village=$_SESSION['idvillage'];

$sqlQuery = 'SELECT personnage.nom_personnage
FROM personnage
WHERE personnage.id_lieu=:id_village';
$personnagesStatement = $mysqlClient->prepare($sqlQuery);
$personnagesStatement->execute(["id_village" => $id_village[0]]);
$personnagesl = $personnagesStatement->fetchAll();

?>
<div>
    <p>welcome<?php echo "";?></p>
</div>
<div>

<?php foreach ($personnagesl as $personnagesc) { 
    echo "<p> ".$personnagesc['nom_personnage']."</p>";
}?>
</div>


    </body>
    </html>