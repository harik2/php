<?php 
include('../functions.php');
demarrer_session();
// if(!($_SESSION['login']=='admin' && $_SESSION['pwd']==1234)){
// header('location:login.php?cn=no');
// die();
// }


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
    HOME : <?=$_SESSION['pseudo']?> 
    
</body>
</html>