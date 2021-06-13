<?php 

$libelle=$_POST['libelle'];
$prix=$_POST['prix'];
// connection db
$link=mysqli_connect("localhost","root","","db_zero") or die("Erreur de connexion bd");
//preparer une requete 
$sql="insert into produit (libelle,prix) values('$libelle',$prix)";
//executer
mysqli_query($link,$sql) or die("erreur d'ajout bd ");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>AJOut ok</h3>
</body>
</html>