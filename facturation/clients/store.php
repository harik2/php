<?php 
try{

    // recuperer les donnees du formulaires (par leurs name )
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
   
    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=db_facturation', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
    $r=$cnx->prepare("insert into client(nom,prenom,email) values(?,?,?)");
    //execution de la requete 
    $r->execute([$nom,$prenom,$email]);
    header("location:index.php?m=ok");
}catch (PDOException $e) {
    echo "Erreur : cet email exist deja    " ;
}

?>