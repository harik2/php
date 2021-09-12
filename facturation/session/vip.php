<?php 
include($_SERVER['DOCUMENT_ROOT'].'/facturation/functions.php');
// if(isset($_COOKIE['prenom'])){
//     echo htmlentities( $_COOKIE['prenom']);// contre XSS 
// }

demarrer_session();
if(checker($_SESSION['login'],$_SESSION['passe'])==false){
    header("location:login.php?cn=no");
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php get_flash()?>
    </div>
   <a href="deconnect.php">Deconnxion</a> 
BIENVENUE <?=$_SESSION['pseudo']?>>
</body>
</html>