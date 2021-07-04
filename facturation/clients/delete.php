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
    $r=$cnx->prepare("delete from client where client_id=?");
    //execution de la requete 
    $r->execute([$id]);
    header("location:index.php");
}catch (PDOException $e) {
    echo "  erreur de suppression du client  ".$e->getMessage() ;
}

?>