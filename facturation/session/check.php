<?php 
define('BASE', $_SERVER['DOCUMENT_ROOT']);
// echo BASE;
include(BASE."/facturation/functions.php");
// if(!isset($_COOKIE['prenom'])){
//     setcookie('prenom','<script>window.location=\'https://eurosport.fr\'</script>',time()+30,'/','/',true,true);
// }
$login=$_POST['login'];
$pwd=$_POST['pwd'];
if(checker($login,$pwd)){
    set_flash('Connexion OK');
    header("location:vip.php");
    die();
}else{
    header("location:login.php?cn=no");
}




