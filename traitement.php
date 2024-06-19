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

//var_dump($_GET);
if (isset($_GET['action'])) {
    switch($_GET['action']) {
        case "nomvillage":
            $nomvillage = $_GET['name'];//name
            $idvillage = $_GET['id'];//name
            echo $nomvillage;
            $_SESSION['nomvillage']=[$nomvillage,$nomvillage];
            $_SESSION['idvillage']=[$idvillage,$idvillage];
           
           // session_unset();
           // session_destroy();
           
    }
}
header("Location:index.php");exit;
?>

</body>
</html>