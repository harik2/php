<?php 
try{
$id=$_GET['id'];
// echo $id;

    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=db_zero', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
    $r=$cnx->prepare("delete from produit where id=?");
    //execution de la requete 
    $r->execute([$id]);
}catch (PDOException $e) {
    echo "Échec de suppression du produit  : " . $e->getMessage();
}
header("location:read.php");
?>