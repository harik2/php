<?php 
try{

    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=db_zero', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
    $r=$cnx->prepare("insert into produit(libelle,prix) values (?,?)");
    //execution de la requete 
    $r->execute(['hp dv 7',7000]);
}catch (PDOException $e) {
    echo "Échec d'ajout du produit  : " . $e->getMessage();
}

?>