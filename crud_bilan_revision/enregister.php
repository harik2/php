<?php 
try{

    // recuperer les donnees du formulaires (par leurs name )
    $nomprenom=$_POST['nomprenom'];
    $email=$_POST['email'];
    $specialite=$_POST['specialite'];
    $genre=$_POST['genre'];
    $message=$_POST['message'];
    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=db_contact', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
    $r=$cnx->prepare("INSERT INTO `contact` ( `nomprenom`, `email`, `specialite`, `genre`, `message`)
     VALUES ( ?, ?, ?, ?, ?)");
    //execution de la requete 
    $r->execute([$nomprenom,$email,$specialite,$genre,$message]);
}catch (PDOException $e) {
    echo "Erreur d'envoi du formulaire  : " . $e->getMessage();
}
header("location:form_contact.php?m=ok");

?>