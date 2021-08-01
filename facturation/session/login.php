<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<?php if(isset($_GET['cn']) && $_GET['cn']=='no') {?>
    <h4>Login/mot de passe non valides</h4>
    <?php } ?>
<form action="check.php" method="post">
Login : <input type="text" name="login" id="login">
Mot de passe  : <input type="password" name="pwd" id="pwd">
<button>Connexion</button>
</form>

</body>
</html>