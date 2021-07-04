<?php 
try{

  
    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=db_facturation', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
    $r=$cnx->prepare("select * from client");
    //execution de la requete 
    $r->execute();
    $clients=$r->fetchAll();
}catch (PDOException $e) {
    echo "Erreur     ".$e->getMessage() ;
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
    <table>
        <tr>
            <th>#</th>
            <th>Nom prenom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>

        <?php foreach($clients as $c) {?>
        <tr>
            <td><?=$c['client_id']?></td>
            <td><?=$c['nom']?> <?=$c['prenom']?></td>
            <td><?=$c['email']?></td>
            <td>
                <a href="delete.php?id=<?=$c['client_id']?>">Supprimer</a>
                <a href="edit.php?id=<?=$c['client_id']?>">Modifier</a><a href="">Consulter</a>
            </td>
        </tr>
        <?php }?>
    </table>

</body>

</html>