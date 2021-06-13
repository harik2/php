<?php 
// print_r($_POST);
// on recupere les valeurs envoyees depuis le formulaire
$email=$_POST['email'];
$sujet=$_POST['sujet'];
$message=$_POST['message'];
if(empty($sujet)){
header("location:create.php?s=sujet");
exit();
}

try{
//connexion a la bd

$cnx= new PDO('mysql:host=localhost;dbname=dbcontact', "root", "",[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// on prepare la requete sql 
$requete=$cnx->prepare("insert into contact(email,sujet,message) value(?,?,?)");

// execution de la requete 
$requete->execute([$email,$sujet,$message]);
}catch(PDOException $e){
 echo "Erreur ".$e->getMessage();
}finally{
    echo "fin du programme";
}

// redirection vers create.php
header("location:create.php?s=ok");
echo "";
?>