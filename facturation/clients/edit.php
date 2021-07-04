<?php 
try{

    // recuperer les donnees depuis le lien 
  $id=$_GET['id'];
//    echo "id est $id";

//    exit();
    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=db_facturation', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
 $r=$cnx->prepare("select *  from client where client_id=?");
    //execution de la requete 
    $r->execute([$id]);
   $client= $r->fetch();
//    var_dump($client);
    // header("location:index.php");
}catch (PDOException $e) {
    echo "  erreur   ".$e->getMessage() ;
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

<h3>Edition du  client</h3>
<form action="update.php" method="post">
<input type="hidden" name="client_id" value="<?=$client['client_id']?>">
    Nom : <input type="text" name="nom" value="<?=$client['nom']?>"> 
    Prenom : <input type="text" name="prenom" value="<?=$client['prenom']?>"> 
    Email : <input type="email" name="email" value="<?=$client['email']?>"> 
    <button>Valider</button>
</form>
    
</body>
</html>