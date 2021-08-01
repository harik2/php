<?php 
// if(!isset($_COOKIE['prenom'])){
//     setcookie('prenom','<script>window.location=\'https://eurosport.fr\'</script>',time()+30,'/','/',true,true);
// }
$login=$_POST['login'];
$pwd=$_POST['pwd'];
if ($login=='admin' && $pwd==1234) {
    session_start();
    $_SESSION['login']='admin';
    $_SESSION['pwd']=1234;

   header("location:vip.php");
}else{
    header('location:login.php?cn=no');
}

?>