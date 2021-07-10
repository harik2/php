<?php 
try{

    // recuperer les donnees du formulaires (par leurs name )
    $datefacture=$_POST['datefacture'];
    $client_id=$_POST['client_id'];
   
    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=db_facturation', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
    $r=$cnx->prepare("insert into facture(datefacture,client_id) values(?,?)");
    //execution de la requete 
    $r->execute([$datefacture,$client_id]);
  //   header("location:index.php?m=ok");
}catch (PDOException $e) {
    echo "Erreur d'ajout de la facture   ".$e->getMessage() ;
}

?>