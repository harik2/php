<?php 

// $_POST

// print_r($_POST);

//FILE
// print_r($_FILES['photo']);
// $taille = $_FILES['photo']['size'];
// echo "la taille du fichier $nom est $taille octets";
// $infos=$_FILES['photo'];
// $name=$infos['name'];
// echo  "<br> $name";

// $nom = $_FILES['photo']['name'];
// $tmp = $_FILES['photo']['tmp_name'];
// //upload du fichier 
// move_uploaded_file($tmp,"../images/$nom");
try{

    // recuperer les donnees du formulaires (par leurs name )
    $libelle=$_POST['libelle'];
    $prix=$_POST['prix'];
    $qte=$_POST['qtestock'];
    $nom = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];
    //upload du fichier 
    $chemin="images/".$nom;
    move_uploaded_file($tmp,"../$chemin");
    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=db_facturation', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $r=$cnx->prepare("insert into produit(libelle,prix,qtestock,photo) values(?,?,?,?)");
    //execution de la requete 
    $r->execute([$libelle,$prix,$qte,$chemin]);
}catch (PDOException $e) {
    echo "Erreur d'ajout du produit     ".$e->getMessage() ;
}
    header("location:create.php?m=ok");
?>