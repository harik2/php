<?php 
try{

    // recuperer les donnees depuis le lien 
  $id=$_GET['id'];
//    echo "id est $id";

//    exit();
    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=db_facturation', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
    $r=$cnx->prepare("delete from produit where produit_id=?");
    //execution de la requete 
    $r->execute([$id]);
    header("location:index.php?m=del");
}catch (PDOException $e) {
    header("location:index.php?m=uniq");
    // echo "  erreur de suppression du produit  ".$e->getMessage() ;
}

?>