<?php 
try{

    // recuperer les donnees depuis le lien 
  $id=$_POST['client_id'];
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $email=$_POST['email'];

//    echo "id est $id";

//    exit();
    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=db_facturation', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
    $r=$cnx->prepare("update  client  set nom=?, prenom=?, email=? where client_id=?");
    //execution de la requete 
    $r->execute([$nom,$prenom,$email,$id]);
    header("location:index.php");
}catch (PDOException $e) {
    echo "  erreur  ".$e->getMessage() ;
}

?>